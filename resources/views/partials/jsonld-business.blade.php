@php
    $base = rtrim(config('seo.base_url'), '/');
    $business = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'TopChef',
        'image' => $base . '/picture/logo.png',
        'description' => __('seo.business_description'),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => app()->getLocale() === 'en' ? 'Cherkasskaya St., 26' : 'ул. Черкасская, 26',
            'addressLocality' => __('seo.city'),
            'addressCountry' => 'RU',
        ],
        'telephone' => ['+7 (938) 865-46-65', '+7 (861) 292-79-32'],
        'areaServed' => __('seo.city'),
        'url' => $base,
    ];
@endphp
<script type="application/ld+json">{!! json_encode($business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
