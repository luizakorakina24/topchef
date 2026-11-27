<?php

return [
    // Куда отправлять письма о новых заявках (LEADS_TO в .env). Пусто - письма не отправляются.
    'to' => env('LEADS_TO'),

    // Подписи полей для письма
    'labels' => [
        'form_id'       => 'Форма',
        'page'          => 'Страница',
        'locale'        => 'Язык',
        'service_type'  => 'Тип услуги',
        'name'          => 'Имя',
        'phone'         => 'Телефон',
        'email'         => 'Email',
        'event_date'    => 'Дата',
        'budget'        => 'Бюджет',
        'comment'       => 'Комментарий',
        'portions'      => 'Порций',
        'address'       => 'Адрес доставки',
        'delivery_time' => 'Время доставки',
        'menu_type'     => 'Тип меню',
        'event_type'    => 'Тип мероприятия',
        'guests'        => 'Персон',
        'format'        => 'Формат',
        'venue'         => 'Площадка',
        'staff'         => 'Персонал',
    ],
];
