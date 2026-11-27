<?php

return [
    // true - сайт открыт для поисковиков (meta robots: index, follow).
    // false - закрыт (noindex, nofollow). Управляется переменной SITE_INDEX в .env.
    // Не забудьте синхронизировать с public/robots.txt (npm run site:open / site:close).
    'index' => (bool) env('SITE_INDEX', false),

    // Боевой адрес сайта: используется в canonical, hreflang, sitemap и разметке JSON-LD.
    'base_url' => env('APP_PUBLIC_URL', 'https://topchef.ru'),

    'og_image' => '/picture/og-cover.jpg',
];
