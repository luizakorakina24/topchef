@php
    $menuJson = str_replace(
        '__BASE__',
        rtrim(config('seo.base_url'), '/'),
        file_get_contents(resource_path('seo/menu-' . (app()->getLocale() === 'en' ? 'en' : 'ru') . '.json'))
    );
@endphp
<script type="application/ld+json">{!! $menuJson !!}</script>
