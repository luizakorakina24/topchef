<?php

namespace App\Http\Middleware;

use App\Support\Locale;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Устанавливает язык интерфейса по маршруту: ->middleware(SetLocale::class . ':en')
 */
class SetLocale
{
    public function handle(Request $request, Closure $next, string $locale = 'ru'): Response
    {
        abort_unless(in_array($locale, Locale::LOCALES, true), 404);

        app()->setLocale($locale);
        app()->setFallbackLocale('ru');

        return $next($request);
    }
}
