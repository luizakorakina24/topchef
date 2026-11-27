@extends('layouts.app')
@use('App\Support\Locale', 'L')

@section('title', __('seo.promo.title'))
@section('description', __('seo.promo.description'))
@push('head')
@include('partials.jsonld-breadcrumbs', ['crumbs' => [['home', 'Главная'], ['promo', 'Акции']]])
@endpush

@section('content')
    <div class="container" style="padding-top: 20px; padding-bottom: 10px; font-family: 'Montserrat', sans-serif; font-size: 14px; color: #888;">
        <a href="{{ L::r('home') }}" style="color: #14AFBF; text-decoration: none;">Главная</a> 
        <span style="margin: 0 5px;">&gt;</span> 
        <span>Акции</span>
    </div>

<section class="page-section">
        <div class="container">
            <h1 class="title">Акции и скидки TopChef на доставку обедов</h1>
            <div class="promo-grid">
                <div class="promo-card"><div class="promo-card__image-wrapper"><img src="/picture/skidka.png" alt="Скидка 10% в День Рождения" class="promo-card__img"><h3 class="promo-card__title">Скидка 10 %<br>в День Рождения</h3></div><div class="promo-card__body"><p>Приобретите вместе с TopChef</p></div></div>
                <div class="promo-card"><div class="promo-card__image-wrapper"><img src="/picture/skidka2.png" alt="Скидка на самовывоз" class="promo-card__img"><h3 class="promo-card__title">Скидка 10 %<br>на самовывоз</h3></div><div class="promo-card__body"><p>Заберите с собой дешевле !</p></div></div>
                <div class="promo-card"><div class="promo-card__image-wrapper"><img src="/picture/nakop-skidka.png" alt="Накопительная скидка" class="promo-card__img"><h3 class="promo-card__title">Накопительная скидка<br>постоянным клиентам</h3></div><div class="promo-card__body"><p>Мы рады каждому !</p></div></div>
                <div class="promo-card"><div class="promo-card__image-wrapper"><img src="/picture/banner.webp" alt="Обед в подарок" class="promo-card__img"><h3 class="promo-card__title">Обед в подарок<br>при заказе от 30 порций</h3></div><div class="promo-card__body"><p>Для больших коллективов</p></div></div>
            </div>

            <div class="promo-details">
                <article class="promo-detail">
                    <div class="promo-detail__image">
                        <img src="/picture/skidka.png" alt="Скидка в День Рождения TopChef">
                    </div>
                    <div class="promo-detail__content">
                        <h3>Скидка 10% в День Рождения</h3>
                        <p class="promo-detail__desc">Празднуйте день рождения вместе с TopChef! Мы дарим скидку 10% на любой заказ в честь вашего праздника.</p>
                        <h4>Условия акции:</h4>
                        <ul>
                            <li>Скидка действует в течение 3 дней до и после дня рождения.</li>
                            <li>Для получения скидки предъявите документ, подтверждающий дату рождения.</li>
                            <li>Скидка распространяется на всё меню, включая комплексные обеды.</li>
                        </ul>
                        <h4>Как получить:</h4>
                        <ul>
                            <li>Оформите заказ на сайте или по телефону.</li>
                            <li>Укажите, что у вас день рождения, и пришлите фото документа.</li>
                            <li>Мы применим скидку к вашему заказу.</li>
                        </ul>
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">Заказать со скидкой</a>
                    </div>
                </article>

                <article class="promo-detail">
                    <div class="promo-detail__image">
                        <img src="/picture/skidka2.png" alt="Скидка на самовывоз TopChef">
                    </div>
                    <div class="promo-detail__content">
                        <h3>Скидка 10% на самовывоз</h3>
                        <p class="promo-detail__desc">Заберите свой обед самостоятельно и сэкономьте 10%. Это удобно, быстро и выгодно.</p>
                        <h4>Условия акции:</h4>
                        <ul>
                            <li>Скидка действует при самовывозе с нашего адреса: Краснодар, ул. Черкасская, 26.</li>
                            <li>Скидка суммируется с другими акциями (кроме дня рождения).</li>
                            <li>Заказ нужно оформить заранее.</li>
                        </ul>
                        <h4>Как получить:</h4>
                        <ul>
                            <li>Оформите заказ и выберите «Самовывоз».</li>
                            <li>Приезжайте в назначенное время и заберите обед.</li>
                            <li>Оплата на месте или онлайн.</li>
                        </ul>
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">Оформить самовывоз</a>
                    </div>
                </article>

                <article class="promo-detail">
                    <div class="promo-detail__image">
                        <img src="/picture/nakop-skidka.png" alt="Накопительная скидка TopChef">
                    </div>
                    <div class="promo-detail__content">
                        <h3>Накопительная скидка постоянным клиентам</h3>
                        <p class="promo-detail__desc">Заказывайте чаще и получайте больше! Мы ценим наших постоянных клиентов и дарим накопительную скидку.</p>
                        <h4>Условия акции:</h4>
                        <ul>
                            <li>Скидка растёт с каждым заказом: 3% — после 5 заказов, 5% — после 10, 7% — после 20.</li>
                            <li>Скидка не сгорает и действует бессрочно.</li>
                            <li>Скидка применяется ко всему меню.</li>
                        </ul>
                        <h4>Как получить:</h4>
                        <ul>
                            <li>Зарегистрируйтесь на сайте или сообщите номер телефона при заказе.</li>
                            <li>Мы автоматически фиксируем ваши заказы.</li>
                            <li>Каждый раз при оформлении заказа скидка применяется автоматически.</li>
                        </ul>
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">Стать постоянным клиентом</a>
                    </div>
                </article>

                <article class="promo-detail">
                    <div class="promo-detail__image">
                        <img src="/picture/banner.webp" alt="Обед в подарок TopChef">
                    </div>
                    <div class="promo-detail__content">
                        <h3>Обед в подарок при заказе от 30 порций</h3>
                        <p class="promo-detail__desc">Заказываете обеды для большого коллектива? Получите ещё один комплексный обед в подарок!</p>
                        <h4>Условия акции:</h4>
                        <ul>
                            <li>Скидка действует при единовременном заказе от 30 порций.</li>
                            <li>Подарочный обед — «Стандарт» или «Бизнес» на выбор.</li>
                            <li>Акция распространяется на офисы, школы и мероприятия.</li>
                        </ul>
                        <h4>Как получить:</h4>
                        <ul>
                            <li>Оформите заказ от 30 порций на сайте или по телефону.</li>
                            <li>Укажите, что хотите получить подарок.</li>
                            <li>Мы включим его в ваш заказ.</li>
                        </ul>
                        <a href="{{ L::r('home') }}#contact" class="btn btn--yellow">Заказать от 30 порций</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    
@endsection
