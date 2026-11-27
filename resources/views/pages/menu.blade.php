@extends('layouts.app')
@use('App\Support\Locale', 'L')

@section('title', __('seo.menu.title'))
@section('description', __('seo.menu.description'))
@section('jsonld_business')
@include('partials.jsonld-menu')
@endsection
@push('head')
@include('partials.jsonld-breadcrumbs', ['crumbs' => [['home', __('layout.nav_2')], ['menu', __('layout.nav_4')]]])
@endpush

@push('scripts')
<script src="/menu-filter.js" defer></script>
@endpush

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 10px; font-family: 'Montserrat', sans-serif; font-size: 14px; color: #888;">
    <a href="{{ L::r('home') }}" style="color: #14AFBF; text-decoration: none;">{{ __('layout.nav_2') }}</a> 
    <span style="margin: 0 5px;">&gt;</span> 
    <span>{{ __('layout.nav_4') }}</span>
</div>

<section class="page-section menu-section menu-section--first menu-section--carousel" id="lunches">
    <div class="container">
        <h1 class="title">{{ __('menu.lunches_1') }}</h1>
        <div class="menu-filter" id="menuFilter" role="search" data-all="{{ __('menu.filter_all') }}">
            <input type="search" id="menuSearch" class="menu-filter__search" placeholder="{{ __('menu.filter_placeholder') }}" aria-label="{{ __('menu.filter_placeholder') }}" autocomplete="off">
            <div class="menu-filter__chips" role="group" aria-label="{{ __('menu.filter_label') }}"></div>
            <p class="menu-filter__empty" role="status" hidden>{{ __('menu.filter_empty') }}</p>
        </div>
        <h2 class="title">{{ __('menu.lunches_2') }}</h2>
        <div class="menu-carousel-wrapper">
            <div class="menu-carousel">
                <article class="menu-card">
                    <img src="/picture/standart.webp" alt="{{ __('menu.lunches_3') }}" class="menu-card__img">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.lunches_4') }}</h3>
                        <ul class="menu-card__list">
                            <li><strong>{{ __('menu.lunches_5') }}</strong> {{ __('menu.lunches_6') }}</li>
                            <li>{{ __('menu.lunches_7') }}</li>
                            <li>{{ __('menu.lunches_8') }}</li>
                            <li>{{ __('menu.lunches_9') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.lunches_11') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/bisness.webp" alt="{{ __('menu.lunches_12') }}" class="menu-card__img">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.lunches_13') }}</h3>
                        <ul class="menu-card__list">
                            <li><strong>{{ __('menu.lunches_5') }}</strong> {{ __('menu.lunches_14') }}</li>
                            <li>{{ __('menu.lunches_15') }}</li>
                            <li>{{ __('menu.lunches_16') }}</li>
                            <li>{{ __('menu.lunches_17') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.lunches_18') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/premium.png" alt="{{ __('menu.lunches_19') }}" class="menu-card__img">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.lunches_20') }}</h3>
                        <ul class="menu-card__list">
                            <li><strong>{{ __('menu.lunches_5') }}</strong> {{ __('menu.lunches_21') }}</li>
                            <li>{{ __('menu.lunches_15') }}</li>
                            <li>{{ __('menu.lunches_22') }}</li>
                            <li>{{ __('menu.lunches_23') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.lunches_24') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="page-section menu-section menu-section--carousel" id="soups">
    <div class="container">
        <h2 class="title">{{ __('menu.soups_1') }}</h2>
        <div class="menu-carousel-wrapper">
            <div class="menu-carousel">
                <article class="menu-card">
                    <img src="/picture/akikse.webp" alt="{{ __('menu.soups_2') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.soups_2') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.soups_3') }}</li>
                            <li>{{ __('menu.soups_4') }}</li>
                            <li>{{ __('menu.soups_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.soups_6') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/soup-with-mushrooms-e1548054125974.webp" alt="{{ __('menu.soups_7') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.soups_7') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.soups_8') }}</li>
                            <li>{{ __('menu.soups_9') }}</li>
                            <li>{{ __('menu.soups_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.soups_10') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/alp1gyqbmdinfyeiob1iywdue6vnbqnjba8dphxu.webp" alt="{{ __('menu.soups_11') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.soups_11') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.soups_12') }}</li>
                            <li>{{ __('menu.soups_13') }}</li>
                            <li>{{ __('menu.soups_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.soups_14') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="page-section menu-section menu-section--carousel" id="snacks">
    <div class="container">
        <h2 class="title">{{ __('menu.snacks_1') }}</h2>
        <div class="menu-carousel-wrapper">
            <div class="menu-carousel">
                <article class="menu-card">
                    <img src="/picture/chatgpt-image-7-202.webp" alt="{{ __('menu.snacks_2') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.snacks_2') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.snacks_3') }}</li>
                            <li>{{ __('menu.snacks_4') }}</li>
                            <li>{{ __('menu.snacks_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.snacks_6') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/1600x1600.webp" alt="{{ __('menu.snacks_7') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.snacks_7') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.snacks_8') }}</li>
                            <li>{{ __('menu.snacks_9') }}</li>
                            <li>{{ __('menu.snacks_10') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.snacks_11') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/178-970.webp" alt="{{ __('menu.snacks_12') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.snacks_12') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.snacks_13') }}</li>
                            <li>{{ __('menu.snacks_14') }}</li>
                            <li>{{ __('menu.snacks_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.lunches_11') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="page-section menu-section menu-section--carousel" id="hot-dishes">
    <div class="container">
        <h2 class="title">{{ __('menu.hot_dishes_1') }}</h2>
        <div class="menu-carousel-wrapper">
            <div class="menu-carousel">
                <article class="menu-card">
                    <img src="/picture/mlcaspb7g2yziscttdwlwnwafthyahkinmjkjveo.webp" alt="{{ __('menu.hot_dishes_2') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.hot_dishes_2') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.hot_dishes_3') }}</li>
                            <li>{{ __('menu.hot_dishes_4') }}</li>
                            <li>{{ __('menu.hot_dishes_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.hot_dishes_6') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/44686-mramornyy-striployn-gril-pod-dyukselskim-sousom.webp" alt="{{ __('menu.hot_dishes_7') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.hot_dishes_8') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.hot_dishes_9') }}</li>
                            <li>{{ __('menu.hot_dishes_10') }}</li>
                            <li>{{ __('menu.snacks_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.lunches_18') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/delicious-pasta-plate.webp" alt="{{ __('menu.hot_dishes_11') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.hot_dishes_12') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.hot_dishes_13') }}</li>
                            <li>{{ __('menu.hot_dishes_14') }}</li>
                            <li>{{ __('menu.hot_dishes_15') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.hot_dishes_16') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="page-section menu-section menu-section--carousel" id="sauces">
    <div class="container">
        <h2 class="title">{{ __('menu.sauces_1') }}</h2>
        <div class="menu-carousel-wrapper">
            <div class="menu-carousel">
                <article class="menu-card">
                    <img src="/picture/ketchup-3000h3000-2048x2048.webp" alt="{{ __('menu.sauces_2') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.sauces_2') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.sauces_3') }}</li>
                            <li>{{ __('menu.sauces_4') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.sauces_5') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/18032daad613a4ece4e5232babe19775.webp" alt="{{ __('menu.sauces_6') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.sauces_6') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.sauces_7') }}</li>
                            <li>{{ __('menu.sauces_4') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.sauces_8') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/e7e120240472b1b85697b8776d18e4ab08dc1416-744x600.webp" alt="{{ __('menu.sauces_9') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.sauces_9') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.sauces_10') }}</li>
                            <li>{{ __('menu.sauces_11') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.sauces_5') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="page-section menu-section menu-section--carousel" id="drinks">
    <div class="container">
        <h2 class="title">{{ __('menu.drinks_1') }}</h2>
        <div class="menu-carousel-wrapper">
            <div class="menu-carousel">
                <article class="menu-card">
                    <img src="/picture/orig.webp" alt="{{ __('menu.drinks_2') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.drinks_2') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.drinks_3') }}</li>
                            <li>{{ __('menu.drinks_4') }}</li>
                            <li>{{ __('menu.drinks_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.drinks_6') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/1704699864-1.webp" alt="{{ __('menu.drinks_7') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.drinks_7') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.drinks_8') }}</li>
                            <li>{{ __('menu.drinks_4') }}</li>
                            <li>{{ __('menu.drinks_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.drinks_9') }}</span>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="/picture/8c304672-1662-4c9c-8073-685b93cc2b4b-1569436750-1024x512.webp" alt="{{ __('menu.drinks_10') }}" class="menu-card__img" loading="lazy" decoding="async">
                    <div class="menu-card__body">
                        <h3 class="menu-card__title">{{ __('menu.drinks_10') }}</h3>
                        <ul class="menu-card__list">
                            <li>{{ __('menu.drinks_11') }}</li>
                            <li>{{ __('menu.drinks_12') }}</li>
                            <li>{{ __('menu.drinks_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.drinks_13') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="page-section menu-section" id="pastry">
    <div class="container">
        <h2 class="title">{{ __('menu.pastry_1') }}</h2>
        <div class="promo-grid">
            <div class="promo-card">
                <div class="promo-card__image-wrapper">
                    <img src="/picture/i-9.webp" alt="{{ __('menu.pastry_2') }}" class="promo-card__img" loading="lazy" decoding="async">
                </div>
                <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.pastry_2') }}</h3>
                    <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                        <li>{{ __('menu.pastry_3') }}</li>
                        <li>{{ __('menu.pastry_4') }}</li>
                        <li>{{ __('menu.pastry_5') }}</li>
                    </ul>
                    <div class="menu-card__bottom">
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                        <span class="price">{{ __('menu.pastry_6') }}</span>
                    </div>
                </div>
            </div>

            <div class="promo-card">
                <div class="promo-card__image-wrapper">
                    <img src="/picture/i-10.webp" alt="{{ __('menu.pastry_7') }}" class="promo-card__img" loading="lazy" decoding="async">
                </div>
                <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.pastry_7') }}</h3>
                    <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                        <li>{{ __('menu.pastry_8') }}</li>
                        <li>{{ __('menu.pastry_9') }}</li>
                        <li>{{ __('menu.pastry_10') }}</li>
                    </ul>
                    <div class="menu-card__bottom">
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                        <span class="price">{{ __('menu.pastry_11') }}</span>
                    </div>
                </div>
            </div>
            <div class="promo-card">
                <div class="promo-card__image-wrapper">
                    <img src="/picture/i-11.webp" alt="{{ __('menu.pastry_12') }}" class="promo-card__img" loading="lazy" decoding="async">
                </div>
                <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.pastry_12') }}</h3>
                    <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                        <li>{{ __('menu.pastry_13') }}</li>
                        <li>{{ __('menu.pastry_14') }}</li>
                        <li>{{ __('menu.pastry_15') }}</li>
                    </ul>
                    <div class="menu-card__bottom">
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                        <span class="price">{{ __('menu.pastry_16') }}</span>
                    </div>
                </div>
            </div>
            <div class="promo-card">
                <div class="promo-card__image-wrapper">
                    <img src="/picture/kruasan.jpg"alt="{{ __('menu.pastry_17') }}" class="promo-card__img" loading="lazy" decoding="async">
                </div>
                <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.pastry_17') }}</h3>
                    <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                        <li>{{ __('menu.pastry_18') }}</li>
                        <li>{{ __('menu.pastry_19') }}</li>
                        <li>{{ __('menu.pastry_20') }}</li>
                    </ul>
                    <div class="menu-card__bottom">
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                        <span class="price">{{ __('menu.pastry_21') }}</span>
                    </div>
                </div>
            </div>
            <div class="promo-card">
                <div class="promo-card__image-wrapper">
                    <img src="/picture/chizkeyk.jpg" alt="{{ __('menu.pastry_22') }}" class="promo-card__img" loading="lazy" decoding="async">
                </div>
                <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.pastry_22') }}</h3>
                    <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                        <li>{{ __('menu.pastry_23') }}</li>
                        <li>{{ __('menu.pastry_24') }}</li>
                        <li>{{ __('menu.pastry_25') }}</li>
                    </ul>
                    <div class="menu-card__bottom">
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                        <span class="price">{{ __('menu.snacks_6') }}</span>
                    </div>
                </div>
            </div>
            <div class="promo-card">
                <div class="promo-card__image-wrapper">
                    <img src="/picture/ecler.jpg" alt="{{ __('menu.pastry_26') }}" class="promo-card__img" loading="lazy" decoding="async">
                </div>
                <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.pastry_26') }}</h3>
                    <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                        <li>{{ __('menu.pastry_27') }}</li>
                        <li>{{ __('menu.pastry_28') }}</li>
                        <li>{{ __('menu.pastry_29') }}</li>
                    </ul>
                    <div class="menu-card__bottom">
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                        <span class="price">{{ __('menu.soups_10') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="page-section menu-section" id="pastry-price">
    <div class="container">
        <h2 class="title" style="font-size: 24px; margin-bottom: 20px;">{{ __('menu.pastry_price_1') }}</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <div>
                <h3 style="font-family: 'Montserrat Alternates', sans-serif; font-size: 18px; margin-bottom: 15px; color: #14AFBF;">{{ __('menu.pastry_price_2') }}</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_3') }}</span> <strong>{{ __('menu.pastry_21') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_4') }}</span> <strong>{{ __('menu.pastry_price_5') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_6') }}</span> <strong>{{ __('menu.drinks_9') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_7') }}</span> <strong>{{ __('menu.soups_6') }}</strong></li>
                </ul>
            </div>
            <div>
                <h3 style="font-family: 'Montserrat Alternates', sans-serif; font-size: 18px; margin-bottom: 15px; color: #14AFBF;">{{ __('menu.pastry_price_8') }}</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_9') }}</span> <strong>{{ __('menu.soups_10') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_10') }}</span> <strong>{{ __('menu.snacks_6') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_11') }}</span> <strong>{{ __('menu.hot_dishes_6') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_12') }}</span> <strong>{{ __('menu.pastry_price_13') }}</strong></li>
                </ul>
            </div>
            <div>
                <h3 style="font-family: 'Montserrat Alternates', sans-serif; font-size: 18px; margin-bottom: 15px; color: #14AFBF;">{{ __('menu.pastry_price_14') }}</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_15') }}</span> <strong>{{ __('menu.pastry_price_16') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_17') }}</span> <strong>{{ __('menu.drinks_13') }}</strong></li>
                    <li style="display: flex; justify-content: space-between; border-bottom: 1px dashed #ddd; padding: 10px 0; font-size: 14px;"><span>{{ __('menu.pastry_price_18') }}</span> <strong>{{ __('menu.pastry_price_5') }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="page-section menu-section" id="cupcakes">
    <div class="container">
        <h2 class="title">{{ __('menu.cupcakes_1') }}</h2>
            
            <div class="promo-grid">
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/kapkeyk.jpg" alt="{{ __('menu.cupcakes_2') }}" class="promo-card__img" loading="lazy" decoding="async">
                    </div>
                    <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.cupcakes_2') }}</h3>
                        <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                            <li>{{ __('menu.cupcakes_3') }}</li>
                            <li>{{ __('menu.cupcakes_4') }}</li>
                            <li>{{ __('menu.cupcakes_5') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.snacks_11') }}</span>
                        </div>
                    </div>
                </div>
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/kap-chock.jpg" alt="{{ __('menu.cupcakes_6') }}" class="promo-card__img" loading="lazy" decoding="async">
                    </div>
                    <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.cupcakes_6') }}</h3>
                        <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                            <li>{{ __('menu.cupcakes_7') }}</li>
                            <li>{{ __('menu.cupcakes_8') }}</li>
                            <li>{{ __('menu.cupcakes_9') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.cupcakes_10') }}</span>
                        </div>
                    </div>
                </div>
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/conf-tr.webp" alt="{{ __('menu.cupcakes_11') }}" class="promo-card__img" loading="lazy" decoding="async">
                    </div>
                    <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.cupcakes_11') }}</h3>
                        <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                            <li>{{ __('menu.cupcakes_12') }}</li>
                            <li>{{ __('menu.cupcakes_13') }}</li>
                            <li>{{ __('menu.cupcakes_14') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.snacks_6') }}</span>
                        </div>
                    </div>
                </div>
                <div class="promo-card">
                    <div class="promo-card__image-wrapper">
                        <img src="/picture/conf-oreh.webp" alt="{{ __('menu.cupcakes_15') }}" class="promo-card__img" loading="lazy" decoding="async">
                    </div>
                    <div class="promo-card__body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 class="menu-card__title" style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">{{ __('menu.cupcakes_15') }}</h3>
                        <ul class="menu-card__list" style="flex: 1; margin-bottom: 20px;">
                            <li>{{ __('menu.cupcakes_16') }}</li>
                            <li>{{ __('menu.cupcakes_17') }}</li>
                            <li>{{ __('menu.cupcakes_18') }}</li>
                        </ul>
                        <div class="menu-card__bottom">
                            <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">{{ __('menu.lunches_10') }}</a>
                            <span class="price">{{ __('menu.soups_10') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section contact" style="padding: 60px 0; background: #FFFAEE;">
        <div class="container">
            <h2 class="title title--center" style="margin-bottom: 20px;">{{ __('menu.section_1') }}</h2>
            <p style="text-align: center; font-size: 16px; color: #555; max-width: 600px; margin: 0 auto 30px; line-height: 1.6;">
                {{ __('menu.section_2') }}
            </p>
            <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <button class="btn btn--yellow open-modal-btn" style="padding: 16px 40px; font-size: 16px;">{{ __('layout.modal_2') }}</button>
                <a href="tel:+79388654665" class="btn btn--outline" style="padding: 16px 40px; font-size: 16px; border-color: #14AFBF; color: #14AFBF;">{{ __('menu.section_3') }}</a>
            </div>
        </div>
    </section>
    
@endsection
