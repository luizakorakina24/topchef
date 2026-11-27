<?php

use App\Http\Controllers\LeadController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Страницы сайта
|--------------------------------------------------------------------------
| Русская версия живёт в корне (/, /menu ...), английская - под префиксом /en.
| Английские страницы есть только у главной и меню; остальные открываются на русском.
*/
$pages = ['promo', 'menu', 'services', 'jobs', 'privacy', 'agreement'];

Route::middleware(SetLocale::class . ':ru')->group(function () use ($pages) {
    Route::view('/', 'pages.index')->name('home');

    foreach ($pages as $page) {
        Route::view("/$page", "pages.$page")->name($page);
    }
});

Route::prefix('en')->name('en.')->middleware(SetLocale::class . ':en')->group(function () {
    Route::view('/', 'pages.index')->name('home');
    Route::view('/menu', 'pages.menu')->name('menu');
});

// Старые адреса со статического сайта -> чистые адреса (301, чтобы не потерять SEO)
Route::redirect('/index.html', '/', 301);
foreach ($pages as $page) {
    Route::redirect("/$page.html", "/$page", 301);
}

/*
| Приём заявок (вместо formsubmit.co и send.php).
| throttle:5,1 - не больше 5 заявок в минуту с одного IP.
*/
Route::post('/lead', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('lead.store');

// 404 внутри группы web: нужна сессия для CSRF-токена в шаблоне
Route::fallback(fn () => response()->view('errors.404', [], 404));
