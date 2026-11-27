@use('App\Support\Locale', 'L')
<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__brand">
                <a href="{{ L::r('home') }}" class="logo"><img src="/picture/logo.png" alt="TopChef" loading="lazy" decoding="async"><span class="logo__text" style="color:#000;">{{ __('layout.header_3') }}<br>{{ __('layout.header_4') }}</span></a>
                <div class="footer__socials">
                    <a href="https://wa.me/79388654665" target="_blank" rel="noopener" aria-label="WhatsApp"><img src="/picture/whatsapp.png" alt="WhatsApp" loading="lazy" decoding="async"></a>
                    <a href="https://t.me/+79388654665" target="_blank" rel="noopener" aria-label="Telegram"><img src="/picture/telegram.png" alt="Telegram" loading="lazy" decoding="async"></a>
                    <a href="https://2gis.ru/krasnodar/search/%D0%A7%D0%B5%D1%80%D0%BA%D0%B0%D1%81%D1%81%D0%BA%D0%B0%D1%8F%2C%2026" target="_blank" rel="noopener" aria-label="4gis"><img src="/picture/4gis.png" alt="4gis" loading="lazy" decoding="async"></a>
                </div>
            </div>
            <nav class="footer__nav">
                    <a href="{{ L::r('home') }}">{{ __('layout.nav_2') }}</a>
                    <a href="{{ L::r('promo') }}">{{ __('layout.nav_3') }}</a>
                    <a href="{{ L::r('menu') }}">{{ __('layout.nav_4') }}</a>
                    <a href="{{ L::r('services') }}">{{ __('layout.nav_5') }}</a>
                    <a href="{{ L::r('jobs') }}">{{ __('layout.nav_6') }}</a>
                </nav>
            <nav class="footer__nav">
                <a href="{{ L::r('home') }}#trust">{{ __('layout.mobile_2') }}</a>
                <a href="{{ L::r('home') }}#how">{{ __('layout.mobile_3') }}</a>
                <a href="{{ L::r('home') }}#contact">{{ __('layout.mobile_4') }}</a>
            </nav>
            <div class="footer__contacts">
                <a href="tel:+79388654665" class="footer__phone">+7 (938) 865-46-65</a>
                <a href="tel:+78612927932" class="footer__phone">+7 (861) 292-79-32</a>
                <br><p>{{ __('layout.header_5') }}</p><p>{{ __('layout.header_6') }}</p>
            </div>
            <button class="btn btn--outline btn--light footer__btn open-modal-btn">{{ __('layout.header_7') }}</button>
        </div>
        <div class="footer__bottom">
            <a href="{{ L::r('privacy') }}">{{ __('layout.nav_7') }}</a>
            <a href="{{ L::r('agreement') }}">{{ __('layout.nav_8') }}</a>
            <span>{{ __('layout.nav_9') }}</span>
        </div>
    </div>
</footer>
