# setup.ps1 - подготовка проекта TopChef (Laravel). Запуск в папке проекта:  .\setup.ps1
# Скрипт можно запускать повторно: он ничего не удаляет (лишние файлы переносит в _trash_old).
$ErrorActionPreference = 'Continue'
Set-Location -LiteralPath $PSScriptRoot

function Step([string]$text) { Write-Host ''; Write-Host "==> $text" -ForegroundColor Cyan }
function Fail([string]$text) { Write-Host "ОШИБКА: $text" -ForegroundColor Red; exit 1 }
function Run([string]$command) {
    Write-Host "> $command" -ForegroundColor DarkGray
    Invoke-Expression $command
    if ($LASTEXITCODE -ne 0) { Fail "команда завершилась с ошибкой: $command" }
}
function Set-EnvValue([string]$key, [string]$value, [bool]$overwrite) {
    $path = Join-Path $PSScriptRoot '.env'
    $lines = @(Get-Content -LiteralPath $path -Encoding UTF8)
    $found = $false
    for ($i = 0; $i -lt $lines.Count; $i++) {
        if ($lines[$i] -match ('^' + [regex]::Escape($key) + '=')) {
            $found = $true
            if ($overwrite) { $lines[$i] = "$key=$value" }
        }
    }
    if (-not $found) { $lines += "$key=$value" }
    [System.IO.File]::WriteAllLines($path, $lines, (New-Object System.Text.UTF8Encoding($false)))
}

Step 'Проверка PHP и Composer'
if (-not (Get-Command php -ErrorAction SilentlyContinue)) { Fail 'не найден php (добавьте его в PATH)' }
if (-not (Get-Command composer -ErrorAction SilentlyContinue)) { Fail 'не найден composer' }
php -v 2>$null | Select-Object -First 1

Step 'Убираю лишние старые файлы (переношу в папку _trash_old, потом её можно удалить)'
$trash = Join-Path $PSScriptRoot '_trash_old'
$script:moved = 0
function Move-ToTrash([string]$path) {
    if (-not (Test-Path -LiteralPath $path)) { return }
    if (-not (Test-Path -LiteralPath $trash)) { New-Item -ItemType Directory -Path $trash | Out-Null }
    $name = Split-Path -Leaf $path
    $target = Join-Path $trash $name
    if (Test-Path -LiteralPath $target) { $target = Join-Path $trash ((Get-Date -Format 'HHmmss') + '_' + $name) }
    Move-Item -LiteralPath $path -Destination $target -Force
    Write-Host "  перенесено: $name"
    $script:moved++
}
# старый статический сайт (его заменили шаблоны Blade и папка public)
$oldFiles = @('404.html','agreement.html','index.html','jobs.html','menu.html','privacy.html','promo.html','services.html',
              'style.css','script.js','rss.xml','sitemap.xml','robots.txt','send.php','apache.htaccess','topchef.conf',
              'project.ini','renameImages.py')
foreach ($f in $oldFiles) { Move-ToTrash (Join-Path $PSScriptRoot $f) }
# любые .php в корне: это файлы, брошенные не в ту папку (у artisan расширения нет)
Get-ChildItem -LiteralPath $PSScriptRoot -Filter '*.php' -File | ForEach-Object { Move-ToTrash $_.FullName }
# случайный файл от опечатки в git-команде
Get-ChildItem -LiteralPath $PSScriptRoot -File | Where-Object { $_.Name -like 'et --hard*' } | ForEach-Object { Move-ToTrash $_.FullName }
# старые папки со статикой: картинки и шрифты теперь в public/
if (Test-Path -LiteralPath 'public\picture') { Move-ToTrash (Join-Path $PSScriptRoot 'picture') }
if (Test-Path -LiteralPath 'public\fonts') { Move-ToTrash (Join-Path $PSScriptRoot 'fonts') }
Move-ToTrash (Join-Path $PSScriptRoot '_old')
# устаревший кеш приложения (создаётся заново сам)
foreach ($f in @('bootstrap\cache\packages.php', 'bootstrap\cache\services.php')) {
    $p = Join-Path $PSScriptRoot $f
    if (Test-Path -LiteralPath $p) { Remove-Item -LiteralPath $p -Force }
}
if ($script:moved -eq 0) { Write-Host '  лишних файлов нет' }

Step 'Файл .env'
if (-not (Test-Path -LiteralPath '.env')) { Copy-Item '.env.example' '.env'; Write-Host '  создан .env' }
else { Write-Host '  .env уже есть: обновляю нужные настройки' }
Set-EnvValue 'APP_NAME' 'TopChef' $true
Set-EnvValue 'APP_LOCALE' 'ru' $true
Set-EnvValue 'APP_FALLBACK_LOCALE' 'ru' $true
Set-EnvValue 'APP_FAKER_LOCALE' 'ru_RU' $true
Set-EnvValue 'SESSION_DRIVER' 'file' $true
Set-EnvValue 'CACHE_STORE' 'file' $true
Set-EnvValue 'QUEUE_CONNECTION' 'sync' $true
Set-EnvValue 'DB_CONNECTION' 'sqlite' $true
Set-EnvValue 'APP_PUBLIC_URL' 'https://topchef.ru' $false
Set-EnvValue 'LEADS_TO' 'luizakorakina24@gmail.com' $false
Set-EnvValue 'SITE_INDEX' 'false' $false
Set-EnvValue 'MAIL_MAILER' 'log' $false

Step 'Зависимости Composer'
if (Test-Path -LiteralPath 'vendor\autoload.php') { Run 'composer dump-autoload' } else { Run 'composer install' }

Step 'Ключ приложения'
$envText = Get-Content -LiteralPath '.env' -Raw
if ($envText -notmatch '(?m)^APP_KEY=.+') { Run 'php artisan key:generate --force' } else { Write-Host '  ключ уже есть' }

Step 'База данных (SQLite)'
if (-not (Test-Path -LiteralPath 'database\database.sqlite')) {
    New-Item -ItemType File -Path 'database\database.sqlite' | Out-Null
    Write-Host '  создан database\database.sqlite'
}
Run 'php artisan optimize:clear'
Run 'php artisan migrate --force'

Step 'Автотесты'
php artisan test
if ($LASTEXITCODE -ne 0) { Write-Host 'Часть тестов не прошла: скопируйте вывод выше и пришлите мне.' -ForegroundColor Yellow }
else { Write-Host 'Все тесты прошли' -ForegroundColor Green }

Step 'Готово'
Write-Host 'Запуск сайта:  php artisan serve --port=8000   (затем откройте http://127.0.0.1:8000)' -ForegroundColor Green
Write-Host 'Заявки:        php artisan leads:list' -ForegroundColor Green
