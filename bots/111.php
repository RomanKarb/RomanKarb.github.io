<?php

// Задаем токен нашего бота
define('BOT_TOKEN', '6117896964:AAGNr0UHD4gaCKk9OWN_SN4krj2bKJmXR7M');

// Получаем запрос от Telegram
$update = json_decode(file_get_contents('php://input'), true);

// Получаем chat_id пользователя, который отправил запрос
$chat_id = $update['message']['chat']['id'];

// Получаем текст сообщения
$message = strtolower($update['message']['text']);

// Если пользователь отправил "привет", отправляем ответ
if ($message == "привет") {
    sendMessage($chat_id, "Здравствуйте! Как я могу Вам помочь?");
}

// Функция отправки сообщений
function sendMessage($chat_id, $message) {
    $data = [
        'chat_id' => $chat_id,
        'text' => $message,
        'parse_mode' => 'HTML',
    ];

    $url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage?' . http_build_query($data);
    file_get_contents($url);
}
?>