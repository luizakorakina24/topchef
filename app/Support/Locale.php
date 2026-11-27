<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;

/**
 * Помощник для ссылок с учётом языка (используется в Blade как L::r('menu')).
 */
class Locale
{
    public const LOCALES = ['ru', 'en'];

    public static function current(): string
    {
        return app()->getLocale();
    }

    public static function otherLocale(): string
    {
        return self::current() === 'ru' ? 'en' : 'ru';
    }

    /** Имя текущего маршрута без префикса en. (например, "menu"). */
    public static function baseName(): string
    {
        $name = request()->route()?->getName() ?? 'home';

        return str_starts_with($name, 'en.') ? substr($name, 3) : $name;
    }

    /** Относительная ссылка на страницу: на английскую версию, если она есть, иначе на русскую. */
    public static function r(string $name, array $params = []): string
    {
        if (self::current() === 'en' && Route::has('en.' . $name)) {
            return route('en.' . $name, $params, false);
        }

        return route($name, $params, false);
    }

    /** Ссылка переключателя языка: на ту же страницу в другом языке (или на главную). */
    public static function switchUrl(): string
    {
        $name = self::baseName();

        if (self::current() === 'ru') {
            return Route::has('en.' . $name) ? route('en.' . $name, [], false) : route('en.home', [], false);
        }

        return Route::has($name) ? route($name, [], false) : route('home', [], false);
    }

    /** Абсолютный канонический адрес (домен из config/seo.php). */
    public static function canonical(): string
    {
        $path = trim(request()->path(), '/');

        return rtrim(config('seo.base_url'), '/') . '/' . $path;
    }

    /** Альтернативные языковые версии для hreflang (только если есть обе). */
    public static function alternates(): array
    {
        $name = self::baseName();

        if (! Route::has($name) || ! Route::has('en.' . $name)) {
            return [];
        }

        $base = rtrim(config('seo.base_url'), '/');

        return [
            'ru' => $base . route($name, [], false),
            'en' => $base . route('en.' . $name, [], false),
        ];
    }
}
