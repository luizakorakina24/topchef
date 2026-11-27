@extends('layouts.app')
@use('App\Support\Locale', 'L')

@section('title', __('seo.home.title'))
@section('description', __('seo.home.description'))
@section('no_messengers', '1')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="hero__messengers">
                <a href="https://wa.me/79388654665" target="_blank" rel="noopener" aria-label="WhatsApp"><img src="/picture/whatsapp.png" alt="WhatsApp"></a>
                <a href="https://t.me/+79388654665" target="_blank" rel="noopener" aria-label="Telegram"><img src="/picture/telegram.png" alt="Telegram"></a>
                <a href="https://2gis.ru/krasnodar/search/%D0%A7%D0%B5%D1%80%D0%BA%D0%B0%D1%81%D1%81%D0%BA%D0%B0%D1%8F%2C%2026" target="_blank" rel="noopener" aria-label="4gis"><img src="/picture/4gis.png" alt="4gis"></a>
            </div>
            <div class="hero__wrapper">
                <div class="hero__content">
                    <p class="hero__subtitle">{{ __('home.messengers_1') }}</p>
                    <h1 class="hero__title">{{ __('home.messengers_2') }}</h1>
                    <div class="hero__bottom-row">
                        <div class="hero__price">
                            <p class="hero__price-text"><span class="hero__price-highlight">{{ __('home.messengers_3') }}</span> {{ __('home.messengers_4') }} <br> {{ __('home.messengers_5') }}</p>
                        </div>
                        <div class="hero__list-block">
                            <ul class="hero__list">
                                <li><img src="/picture/komp-obed.svg" alt="{{ __('home.messengers_6') }}"><span>{{ __('home.messengers_7') }}</span></li>
                                <li><img src="/picture/1-bluda.svg" alt="{{ __('home.messengers_8') }}"><span>{{ __('home.messengers_9') }}</span></li>
                                <li><img src="/picture/salati.png" alt="{{ __('home.messengers_10') }}"><span>{{ __('home.messengers_11') }}</span></li>
                                <li><img src="/picture/2-bluda.png" alt="{{ __('home.messengers_12') }}"><span>{{ __('home.messengers_13') }}</span></li>
                            </ul>
                            <a href="{{ L::r('menu') }}" class="hero__btn">{{ __('layout.nav_4') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo" id="promo">
        <div class="container">
            <div class="section__header">
                <h2 class="title">{{ __('layout.nav_3') }}</h2>
                <a href="{{ L::r('promo') }}" class="section__link">{{ __('home.promo_1') }}</a>
            </div>
            <div class="promo__grid">
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/skidka.png" alt="{{ __('home.promo_2') }}" class="promo-card__img" loading="lazy" decoding="async">
                        <h3 class="promo-card__title">{{ __('home.promo_3') }}<br>{{ __('home.promo_4') }}</h3>
                    </div>
                    <div class="promo-card__body"><p>{{ __('home.promo_5') }}</p></div>
                </div>
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/skidka2.png" alt="{{ __('home.promo_6') }}" class="promo-card__img" loading="lazy" decoding="async">
                        <h3 class="promo-card__title">{{ __('home.promo_3') }}<br>{{ __('home.promo_7') }}</h3>
                    </div>
                    <div class="promo-card__body"><p>{{ __('home.promo_8') }}</p></div>
                </div>
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/nakop-skidka.png" alt="{{ __('home.promo_9') }}" class="promo-card__img" loading="lazy" decoding="async">
                        <h3 class="promo-card__title">{{ __('home.promo_9') }}<br>{{ __('home.promo_10') }}</h3>
                    </div>
                    <div class="promo-card__body"><p>{{ __('home.promo_11') }}</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section menu" id="menu">
        <div class="container">
            <div class="section__header">
                <h2 class="title">{{ __('home.menu_1') }}</h2>
                <a href="{{ L::r('menu') }}" class="section__link">{{ __('home.menu_2') }}</a>
            </div>
            <div class="menu__grid">
                <article class="menu-card">
                    <img src="/picture/standart.webp" alt="{{ __('home.menu_3') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('home.menu_4') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('home.menu_5') }}</li>
                            <li>{{ __('home.menu_6') }}</li>
                            <li>{{ __('home.menu_7') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('menu') }}" class="btn btn--yellow">{{ __('home.menu_8') }}</a>
                            <span class="price">{{ __('home.menu_9') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/bisness.webp" alt="{{ __('home.menu_10') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('home.menu_11') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('home.menu_12') }}</li>
                            <li>{{ __('home.menu_13') }}</li>
                            <li>{{ __('home.menu_14') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('menu') }}" class="btn btn--yellow">{{ __('home.menu_8') }}</a>
                            <span class="price">{{ __('home.menu_15') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/premium.png" alt="{{ __('home.menu_16') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('home.menu_17') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('home.menu_12') }}</li>
                            <li>{{ __('home.menu_18') }}</li>
                            <li>{{ __('home.menu_19') }}</li>
                            <li>{{ __('home.menu_20') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('menu') }}" class="btn btn--yellow">{{ __('home.menu_8') }}</a>
                            <span class="price">{{ __('home.menu_21') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section offer" id="offer">
        <div class="container">
            <div class="section__header">
                <h2 class="title">{{ __('home.offer_1') }}</h2>
                <a href="{{ L::r('services') }}" class="section__link">{{ __('home.offer_2') }}</a>
            </div>
            <div class="offer__grid">
                <ul class="offer__tabs">
                    <li data-img="/picture/pitanie-sad.webp" data-title="{{ __('home.offer_3') }}" data-checks="{{ __('home.offer_4') }}">{{ __('home.offer_3') }}</li>
                    <li class="is-active" data-img="/picture/dostavka-v-ofis.webp" data-title="{{ __('home.offer_5') }}" data-checks="{{ __('home.offer_6') }}">{{ __('home.offer_5') }}</li>
                    <li data-img="/picture/builders-eating-lunch-274689-14165-1.webp" data-title="{{ __('home.offer_7') }}" data-checks="{{ __('home.offer_8') }}">{{ __('home.offer_7') }}</li>
                    <li data-img="/picture/closed-metal-pots-1.webp" data-title="{{ __('home.offer_9') }}" data-checks="{{ __('home.offer_10') }}">{{ __('home.offer_11') }}</li>
                    <li data-img="/picture/ben-collins-utn3ls-q0bq-unsplash-1.webp" data-title="{{ __('home.offer_12') }}" data-checks="{{ __('home.offer_13') }}">{{ __('home.offer_12') }}</li>
                    <li data-img="/picture/scooping-the-food-41969-53-1.webp" data-title="{{ __('home.offer_14') }}" data-checks="{{ __('home.offer_15') }}">{{ __('home.offer_14') }}</li>
                </ul>
                <img src="/picture/dostavka-v-ofis.webp" alt="{{ __('home.offer_5') }}" class="offer__img" id="offerImage" loading="lazy" decoding="async">
                <div class="offer__who">
                    <h3>{{ __('home.offer_16') }}</h3>
                    <ul class="offer__checks" id="offerChecks">
                        <li>{{ __('home.offer_17') }}</li>
                        <li>{{ __('home.offer_18') }}</li>
                        <li>{{ __('home.offer_19') }}</li>
                        <li>{{ __('home.offer_20') }}</li>
                        <li>{{ __('home.offer_21') }}</li>
                    </ul>
                    <a href="#contact" class="btn btn--yellow">{{ __('home.offer_22') }}</a>
                    <a href="{{ L::r('services') }}" class="btn btn--outline offer__btn-secondary">{{ __('home.offer_23') }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="trust" id="trust">
        <div class="container">
            <h2 class="title title--center">{{ __('layout.mobile_2') }}</h2>
            <div class="trust__grid">
                <div class="trust-card"><img src="/picture/group-2.svg" alt="{{ __('home.trust_1') }}" loading="lazy" decoding="async"><p>{{ __('home.trust_2') }}</p><p>{{ __('home.trust_3') }}</p></div>
                <div class="trust-card"><img src="/picture/group-3.svg" alt="{{ __('home.trust_4') }}" loading="lazy" decoding="async"><p>{{ __('home.trust_5') }}</p><p>{{ __('home.trust_6') }}</p></div>
                <div class="trust-card"><img src="/picture/group-3.png" alt="{{ __('home.trust_7') }}" loading="lazy" decoding="async"><p>{{ __('home.trust_8') }}</p><p>{{ __('home.trust_9') }}</p></div>
                <div class="trust-card"><img src="/picture/group-4.png" alt="{{ __('home.trust_10') }}" loading="lazy" decoding="async"><p>{{ __('home.trust_11') }}</p><p>{{ __('home.trust_12') }}</p></div>
            </div>
        </div>
    </section>

    <section class="section how" id="how">
        <div class="container">
            <h2 class="title">{{ __('layout.mobile_3') }}</h2>
            <div class="how__grid">
                <div class="how-step"><span class="how-step__num">1</span><h3>{{ __('home.how_1') }}</h3><p>{{ __('home.how_2') }}</p></div>
                <div class="how-step"><span class="how-step__num">2</span><h3>{{ __('home.how_3') }}</h3><p>{{ __('home.how_4') }}</p></div>
                <div class="how-step"><span class="how-step__num">3</span><h3>{{ __('home.how_5') }}</h3><p>{{ __('home.how_6') }}</p></div>
            </div>
        </div>
    </section>

    <section class="section contact" id="contact">
        <div class="container">
            <h2 class="title title--center">{{ __('home.contact_1') }}</h2>
            <div class="contact__grid">
                <form class="contact__form js-form" id="form_1">
            <input type="text" name="website" class="hp-field" tabindex="-1" autocomplete="off" aria-hidden="true">
                    <h3>{{ __('home.contact_2') }}</h3>
                    <input type="text" name="name" placeholder="{{ __('layout.modal_3') }}" class="js-input-name" required>
                    <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" class="js-input-phone" required>
                    <button class="btn btn--outline" type="submit">{{ __('layout.header_7') }}</button>
                </form>
                <div class="contact__info">
                    <h4>{{ __('home.contact_3') }}</h4>
                    <p>+7 (938) 865-46-65</p>
                    <p>+7 (861) 292-79-32</p>
                    <h4 class="contact__write">{{ __('home.contact_4') }}</h4>
                    <div class="contact__socials">
                        <a href="https://wa.me/79388654665" target="_blank" rel="noopener" aria-label="WhatsApp"><img src="/picture/whatsapp.png" alt="WhatsApp" loading="lazy" decoding="async"></a>
                        <a href="https://t.me/+79388654665" target="_blank" rel="noopener" aria-label="Telegram"><img src="/picture/telegram.png" alt="Telegram" loading="lazy" decoding="async"></a>
                        <a href="https://2gis.ru/krasnodar/search/%D0%A7%D0%B5%D1%80%D0%BA%D0%B0%D1%81%D1%81%D0%BA%D0%B0%D1%8F%2C%2026" target="_blank" rel="noopener" aria-label="4gis"><img src="/picture/4gis.png" alt="4gis" loading="lazy" decoding="async"></a>
                    </div>
                </div>
                <div class="contact__map" role="img" aria-label="{{ __('home.contact_5') }}">
                    <img src="/picture/karta.webp" alt="{{ __('home.contact_6') }}" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </section>

    <section class="jobs" id="jobs">
        <div class="container">
            <div class="section__header">
                <h2 class="title">{{ __('layout.nav_6') }}</h2>
                <a href="{{ L::r('jobs') }}" class="section__link">{{ __('home.jobs_1') }}</a>
            </div>
            <div class="jobs-carousel-wrapper">
                <div class="jobs-carousel">
                    <div class="jobs-carousel__item">
                        <div class="jobs-carousel__image-wrapper">
                            <img src="/picture/group-of-chefs-working-in-the-kitchen-1.webp" alt="{{ __('home.jobs_2') }}" class="jobs-carousel__img" loading="lazy" decoding="async">
                            <div class="jobs-carousel__content">
                                <h3>{{ __('home.jobs_2') }}</h3>
                                <p>{{ __('home.jobs_3') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="jobs-carousel__item">
                        <div class="jobs-carousel__image-wrapper">
                            <img src="/picture/joshua-lawrence-o-knmj-6acm-unsplash-1-7.webp" alt="{{ __('home.jobs_4') }}" class="jobs-carousel__img" loading="lazy" decoding="async">
                            <div class="jobs-carousel__content">
                                <h3>{{ __('home.jobs_4') }}</h3>
                                <p>{{ __('home.jobs_5') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="jobs-carousel__item">
                        <div class="jobs-carousel__image-wrapper">
                            <img src="/picture/young-businesswoman-posing-with-copy-space-1-1.webp" alt="{{ __('home.jobs_6') }}" class="jobs-carousel__img" loading="lazy" decoding="async">
                            <div class="jobs-carousel__content">
                                <h3>{{ __('home.jobs_6') }}</h3>
                                <p>{{ __('home.jobs_7') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="jobs-carousel__item jobs-carousel__item--light">
                        <div class="jobs-carousel__image-wrapper">
                            <img src="/picture/ca80f75f6ffbca8e678aa57aeb8961359ee1200b.webp" alt="{{ __('home.jobs_8') }}" class="jobs-carousel__img" loading="lazy" decoding="async">
                            <div class="jobs-carousel__content">
                                <h3>{{ __('home.jobs_8') }}</h3>
                                <p>{{ __('home.jobs_9') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection
