# TopChef: сайт доставки комплексного питания (Laravel 13)

## Быстрый старт
```powershell
.\setup.ps1                      # один раз: убирает лишнее, готовит .env, зависимости, базу, тесты
php artisan serve --port=8000    # запуск: http://127.0.0.1:8000
```

## Структура
| Папка / файл | Что это |
|---|---|
| `routes/web.php` | адреса сайта (`/`, `/menu`, `/en`, `/lead` ...) |
| `resources/views/layouts/app.blade.php` | общий шаблон (head, SEO-теги, шапка, подвал) |
| `resources/views/partials/` | шапка, подвал, модалка «Обратный звонок», JSON-LD |
| `resources/views/pages/` | страницы сайта |
| `lang/ru`, `lang/en` | тексты интерфейса и SEO (title, description) |
| `app/Http/Controllers/LeadController.php` | приём заявок с форм |
| `app/Models/Lead.php`, `database/migrations/` | таблица заявок `leads` |
| `public/` | то, что видит браузер: `style.css`, `script.js`, `picture/`, `fonts/`, `sitemap.xml` |
| `docs/` | инструкции и SEO-таблица ключевых запросов |
| `tests/` | автотесты (`php artisan test`) |

## Полезные команды
- `php artisan leads:list` - последние заявки
- `php artisan test` - тесты
- `npm run sitemap` - пересобрать `public/sitemap.xml`
- `npm run site:open` / `npm run site:close` - открыть или закрыть сайт для поисковиков (затем `php artisan config:clear`)

## Почта
По умолчанию письма о заявках пишутся в `storage/logs/laravel.log` (`MAIL_MAILER=log`). Для боевой отправки настройте SMTP в `.env` (пример в `.env.example`). Заявки при этом всегда сохраняются в базе.

## Как поменять телефон или адрес
Один раз в `resources/views/partials/header.blade.php` и `footer.blade.php`.
