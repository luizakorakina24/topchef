<?php
header('Content-Type: application/json; charset=utf-8');

$to = 'luizakorakina24@gmail.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false]);
    exit;
}

$d = json_decode(file_get_contents('php://input'), true);
if (!is_array($d) || empty($d['phone'])) {
    http_response_code(400);
    echo json_encode(['ok' => false]);
    exit;
}

$labels = [
    'form_id' => 'Форма', 'page' => 'Страница', 'service_type' => 'Тип услуги',
    'name' => 'Имя', 'phone' => 'Телефон', 'email' => 'Email',
    'event_date' => 'Дата', 'budget' => 'Бюджет', 'comment' => 'Комментарий',
    'portions' => 'Порций', 'address' => 'Адрес доставки', 'delivery_time' => 'Время доставки',
    'menu_type' => 'Тип меню', 'event_type' => 'Тип мероприятия', 'guests' => 'Персон',
    'format' => 'Формат', 'venue' => 'Площадка', 'staff' => 'Персонал',
];

$lines = [];
foreach ($labels as $key => $label) {
    if (isset($d[$key]) && $d[$key] !== '') {
        $val = trim(preg_replace('/[\r\n]+/', ' ', strip_tags((string)$d[$key])));
        $lines[] = $label . ': ' . mb_substr($val, 0, 500);
    }
}

$subject = '=?UTF-8?B?' . base64_encode('Заявка с сайта TopChef') . '?=';
$headers = "From: no-reply@topchef.ru\r\nContent-Type: text/plain; charset=utf-8";
$ok = mail($to, $subject, implode("\n", $lines), $headers);

if (!$ok) http_response_code(500);
echo json_encode(['ok' => (bool)$ok]);