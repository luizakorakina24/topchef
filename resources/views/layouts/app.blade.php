@use('App\Support\Locale', 'L')
@php
    $locale = app()->getLocale();
    $alternates = trim($__env->yieldContent('robots')) !== '' ? [] : L::alternates();
    $ogImage = rtrim(config('seo.base_url'), '/') . config('seo.og_image');
    $modalVars = trim($__env->yieldContent('modal_variant')) === 'jobs'
        ? ['modalForm' => 'form_3', 'modalTitle' => 'layout.modal_6', 'modalButton' => 'layout.modal_7']
        : [];
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @hasSection('robots')
    <meta name="robots" content="@yield('robots')">
    @elseif (config('seo.index'))
    <meta name="robots" content="index, follow">
    @else
    <meta name="robots" content="noindex, nofollow">
    @endif
    <meta name="csrf-token" content="{{ session()->isStarted() ? csrf_token() : '' }}">
    <title>@yield('title', 'TopChef')</title>
    <meta name="description" content="@yield('description')">
    <link rel="canonical" href="{{ L::canonical() }}">
    @foreach ($alternates as $lang => $url)
    <link rel="alternate" hreflang="{{ $lang }}" href="{{ $url }}">
    @endforeach
    @if ($alternates)
    <link rel="alternate" hreflang="x-default" href="{{ $alternates['ru'] }}">
    @endif
    <link rel="icon" href="/picture/favicon.ico" type="image/x-icon">
    <meta property="og:title" content="@yield('title', 'TopChef')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ L::canonical() }}">
    <meta property="og:locale" content="{{ $locale === 'en' ? 'en_US' : 'ru_RU' }}">
    <meta property="og:site_name" content="TopChef">
    <meta property="og:image" content="{{ $ogImage }}">
    <link rel="alternate" type="application/rss+xml" title="TopChef" href="{{ rtrim(config('seo.base_url'), '/') }}/rss.xml">
    {{-- Bootstrap 5: только сетка (без сброса стилей); используется в форме заявки на странице услуг --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/style.css">
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KL82D9ZL');</script>
    @hasSection('jsonld_business')
        @yield('jsonld_business')
    @else
        @include('partials.jsonld-business')
    @endif
    @stack('head')
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KL82D9ZL"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@hasSection('no_messengers')
@else
    @include('partials.messengers')
@endif

@include('partials.header')

@yield('content')

@include('partials.footer')

@include('partials.modal', $modalVars)

<script>
    window.I18N = @json(__('js'));
    window.LEAD_URL = @json(route('lead.store', [], false));
</script>
<script src="/script.js" defer></script>
@stack('scripts')
</body>
</html>
