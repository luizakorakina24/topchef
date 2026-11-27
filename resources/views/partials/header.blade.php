@use('App\Support\Locale', 'L')
<header class="header">
    <div class="container">
        <button class="burger-btn" id="burgerBtn" aria-label="{{ __('layout.header_1') }}">
            <span></span><span></span><span></span>
        </button>
        <div class="header__top">
            <div class="header__logo">
                <a href="{{ L::r('home') }}"><img src="/picture/logo.png" width="92" height="92" alt="{{ __('layout.header_2') }}"></a>
                <span class="header__logo-text">{{ __('layout.header_3') }} <br>{{ __('layout.header_4') }}</span>
            </div>
            <div class="header__info">
                <p>{{ __('layout.header_5') }}</p>
                <p>{{ __('layout.header_6') }}</p>
            </div>
            <div class="header__contacts">
                <p>+7 (938) 865-46-65</p>
                <p>+7 (861) 292-79-32</p>
            </div>
            <button class="header__callback open-modal-btn">{{ __('layout.header_7') }}</button>
        </div>
        <nav class="header__nav" aria-label="{{ __('layout.nav_1') }}">
            <a href="{{ L::r('home') }}">{{ __('layout.nav_2') }}</a>
            <a href="{{ L::r('promo') }}">{{ __('layout.nav_3') }}</a>
            <a href="{{ L::r('menu') }}">{{ __('layout.nav_4') }}</a>
            <a href="{{ L::r('services') }}">{{ __('layout.nav_5') }}</a>
            <a href="{{ L::r('jobs') }}">{{ __('layout.nav_6') }}</a>
            <a class="lang-switch" href="{{ L::switchUrl() }}" hreflang="{{ L::otherLocale() }}" lang="{{ L::otherLocale() }}" title="{{ __('layout.lang_title') }}">{{ strtoupper(L::otherLocale()) }}</a>
        </nav>
    </div>
</header>

<nav class="mobile-menu" id="mobileMenu">
    <button class="mobile-menu__close" id="closeMenuBtn" aria-label="{{ __('layout.mobile_1') }}">&times;</button>
    <div class="mobile-menu__nav">
       <div class="mobile-menu__col">
                <a href="{{ L::r('home') }}">{{ __('layout.nav_2') }}</a>
                <a href="{{ L::r('promo') }}">{{ __('layout.nav_3') }}</a>
                <a href="{{ L::r('menu') }}">{{ __('layout.nav_4') }}</a>
                <a href="{{ L::r('services') }}">{{ __('layout.nav_5') }}</a>
                <a href="{{ L::r('jobs') }}">{{ __('layout.nav_6') }}</a>
                <a class="lang-switch lang-switch--mobile" href="{{ L::switchUrl() }}" hreflang="{{ L::otherLocale() }}" lang="{{ L::otherLocale() }}">{{ strtoupper(L::otherLocale()) }}</a>
            </div>
        <div class="mobile-menu__col">
            <a href="{{ L::r('home') }}#trust">{{ __('layout.mobile_2') }}</a>
            <a href="{{ L::r('home') }}#how">{{ __('layout.mobile_3') }}</a>
            <a href="{{ L::r('home') }}#contact">{{ __('layout.mobile_4') }}</a>
        </div>
    </div>
    <div class="mobile-menu__info">
        <p>{{ __('layout.mobile_5') }}<br>{{ __('layout.mobile_6') }}</p>
        <p>{{ __('layout.mobile_7') }}<br>{{ __('layout.mobile_8') }}</p>
        <div class="mobile-menu__phones">
            <a href="tel:+79388654665">+7 (938) 865-46-65</a>
            <a href="tel:+78612927932">+7 (861) 292-79-32</a>
        </div>
        <button class="mobile-menu__btn open-modal-btn">{{ __('layout.header_7') }}</button>
    </div>
    <div class="mobile-menu__socials">
        <a href="https://wa.me/79388654665" target="_blank" rel="noopener" aria-label="WhatsApp"><img src="/picture/whatsapp.png" width="28" height="28" alt="WhatsApp"></a>
        <a href="https://t.me/+79388654665" target="_blank" rel="noopener" aria-label="Telegram"><img src="/picture/telegram.png" width="28" height="28" alt="Telegram"></a>
        <a href="https://2gis.ru/krasnodar/search/%D0%A7%D0%B5%D1%80%D0%BA%D0%B0%D1%81%D1%81%D0%BA%D0%B0%D1%8F%2C%2026" target="_blank" rel="noopener" aria-label="4gis"><img src="/picture/4gis.png" width="28" height="28" alt="4gis"></a>
    </div>
</nav>
