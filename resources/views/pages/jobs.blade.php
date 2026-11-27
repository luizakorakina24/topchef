@extends('layouts.app')
@use('App\Support\Locale', 'L')

@section('title', __('seo.jobs.title'))
@section('description', __('seo.jobs.description'))
@section('modal_variant', 'jobs')
@push('head')
@include('partials.jsonld-breadcrumbs', ['crumbs' => [['home', 'Главная'], ['jobs', 'Вакансии']]])
@endpush

@section('content')
<div class="container" style="padding-top: 20px; padding-bottom: 10px; font-family: 'Montserrat', sans-serif; font-size: 14px; color: #888;">
    <a href="{{ L::r('home') }}" style="color: #14AFBF; text-decoration: none;">Главная</a> 
    <span style="margin: 0 5px;">&gt;</span> 
    <span>Вакансии</span>
</div>

<section class="section">
    <div class="container">
        <h1 class="title">Присоединяйтесь к команде TopChef</h1>
        <div class="jobs-grid">
            <div class="jobs-card"><div class="jobs-card__image-wrapper"><img src="/picture/group-of-chefs-working-in-the-kitchen-1.webp" alt="Вакансия Повар" class="jobs-card__img"><div class="jobs-card__content"><h3>Повара</h3><p>Чтобы доставлять вкусные обеды, их нужно сначала приготовить. Поэтому мы ждем поваров в нашу команду для приготовления по настоящему крутых ланчей. Давайте создавать вместе !</p><button class="btn btn--yellow open-modal-btn">Откликнуться</button></div></div></div>
            <div class="jobs-card"><div class="jobs-card__image-wrapper"><img src="/picture/joshua-lawrence-o-knmj-6acm-unsplash-1-7.webp" alt="Вакансия Курьер" class="jobs-card__img"><div class="jobs-card__content"><h3>Курьеры</h3><p>А для того, чтобы доставить эти обеды, нужны не менее важные люди - курьеры. Приглашаем в нашу команду быстрых и внимательных, чтобы наши обеды всегда оставались свежими и горячими. </p><button class="btn btn--yellow open-modal-btn">Откликнуться</button></div></div></div>
            <div class="jobs-card"><div class="jobs-card__image-wrapper"><img src="/picture/young-businesswoman-posing-with-copy-space-1-1.webp" alt="Вакансия Администратор" class="jobs-card__img"><div class="jobs-card__content"><h3>Админы</h3><p>Обеды поставляются постоянно, и для этого нужен тот, кто будет контролировать передачу со стороны. Ждем вас в команде ответственных, чтобы делать наших клиентов счастливыми.</p><button class="btn btn--yellow open-modal-btn">Откликнуться</button></div></div></div>
            <div class="jobs-card"><div class="jobs-card__image-wrapper"><img src="/picture/ca80f75f6ffbca8e678aa57aeb8961359ee1200b.webp" alt="Помощник повара" class="jobs-card__img"><div class="jobs-card__content"><h3>Помощник повара</h3><p>Незаменимые помощники, без них работа бы постоянно останавливалась. Ждем в команду, для осуществления лучших рецептов.  От вас требуется только желание работать. </p><button class="btn btn--yellow open-modal-btn">Откликнуться</button></div></div></div>
        </div>

        <div class="jobs-details">
            <article class="jobs-detail">
                <div class="jobs-detail__image">
                    <img src="/picture/group-of-chefs-working-in-the-kitchen-1.webp" alt="Повар TopChef">
                </div>
                <div class="jobs-detail__content">
                    <h3>Повар</h3>
                    <p class="jobs-detail__desc">Готовим вкусные и сбалансированные обеды для офисов, школ и частных клиентов. Ищем повара, который любит своё дело и умеет работать в команде.</p>
                    <h4>Обязанности:</h4>
                    <ul>
                        <li>Приготовление блюд по технологическим картам.</li>
                        <li>Контроль качества и сроков готовки.</li>
                        <li>Поддержание чистоты на рабочем месте.</li>
                    </ul>
                    <h4>Требования:</h4>
                    <ul>
                        <li>Опыт работы от 1 года.</li>
                        <li>Знание санитарных норм.</li>
                        <li>Аккуратность и ответственность.</li>
                    </ul>
                    <h4>Условия:</h4>
                    <ul>
                        <li>Сменный график 5/2.</li>
                        <li>Питание.</li>
                        <li>Официальное трудоустройство.</li>
                    </ul>
                    <button class="btn btn--yellow open-modal-btn">Откликнуться</button>
                </div>
            </article>

            <article class="jobs-detail">
                <div class="jobs-detail__image">
                    <img src="/picture/joshua-lawrence-o-knmj-6acm-unsplash-1-7.webp" alt="Курьер TopChef">
                </div>
                <div class="jobs-detail__content">
                    <h3>Курьер</h3>
                    <p class="jobs-detail__desc">Доставляем обеды по Краснодару. Нужны быстрые и внимательные курьеры, которые любят общение и умеют держать слово.</p>
                    <h4>Обязанности:</h4>
                    <ul>
                        <li>Доставка обедов по адресам клиентов.</li>
                        <li>Контроль сроков доставки.</li>
                        <li>Вежливое общение с клиентами.</li>
                    </ul>
                    <h4>Требования:</h4>
                    <ul>
                        <li>Наличие автомобиля или велосипеда.</li>
                        <li>Пунктуальность и ответственность.</li>
                    </ul>
                    <h4>Условия:</h4>
                    <ul>
                        <li>Гибкий график.</li>
                        <li>Оплата за рейсы.</li>
                        <li>Компенсация топлива.</li>
                    </ul>
                    <button class="btn btn--yellow open-modal-btn">Откликнуться</button>
                </div>
            </article>

            <article class="jobs-detail">
                <div class="jobs-detail__image">
                    <img src="/picture/young-businesswoman-posing-with-copy-space-1-1.webp" alt="Администратор TopChef">
                </div>
                <div class="jobs-detail__content">
                    <h3>Администратор</h3>
                    <p class="jobs-detail__desc">Координируем заказы и общаемся с клиентами. Ищем ответственного администратора с хорошими коммуникативными навыками.</p>
                    <h4>Обязанности:</h4>
                    <ul>
                        <li>Приём заявок.</li>
                        <li>Координация доставки.</li>
                        <li>Работа с клиентами и документами.</li>
                    </ul>
                    <h4>Требования:</h4>
                    <ul>
                        <li>Уверенный пользователь ПК.</li>
                        <li>Знание Excel.</li>
                        <li>Коммуникабельность.</li>
                    </ul>
                    <h4>Условия:</h4>
                    <ul>
                        <li>Офис 5/2.</li>
                        <li>Обучение.</li>
                        <li>Карьерный рост.</li>
                    </ul>
                    <button class="btn btn--yellow open-modal-btn">Откликнуться</button>
                </div>
            </article>

            <article class="jobs-detail">
                <div class="jobs-detail__image">
                    <img src="/picture/ca80f75f6ffbca8e678aa57aeb8961359ee1200b.webp" alt="Помощник повара TopChef">
                </div>
                <div class="jobs-detail__content">
                    <h3>Помощник повара</h3>
                    <p class="jobs-detail__desc">Помогаем поварам на кухне. Идеальная вакансия для тех, кто хочет начать карьеру в кулинарии с нуля.</p>
                    <h4>Обязанности:</h4>
                    <ul>
                        <li>Подготовка ингредиентов.</li>
                        <li>Помощь повару.</li>
                        <li>Уборка рабочей зоны.</li>
                    </ul>
                    <h4>Требования:</h4>
                    <ul>
                        <li>Желание работать.</li>
                        <li>Аккуратность.</li>
                        <li>Обучаемость.</li>
                    </ul>
                    <h4>Условия:</h4>
                    <ul>
                        <li>Гибкий график.</li>
                        <li>Питание.</li>
                        <li>Обучение на месте.</li>
                    </ul>
                    <button class="btn btn--yellow open-modal-btn">Откликнуться</button>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
