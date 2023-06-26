<?php

// генерация уникального кода для подтверждения номера телефона
function generate_verification_code() {
    // генерируем случайное число
    $random_number = rand(1000, 9999);
    // хэшируем число, чтобы получить код фиксированной длины
    $hash = hash('sha256', strval($random_number)); 
    $verification_code = substr($hash, 0, 6); // получаем первые 6 символов хэша
    return $verification_code;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['phone'])) {
    $phone_number = $_GET['phone'];
    $verification_code = generate_verification_code();

    // кодирование и сохранение кода в сессии
    session_start();
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['phone_number'] = $phone_number;

    // отправка сообщения в Telegram
    $telegram_token = '6072592824:AAEANQrR6vIqNypeW_CaHCI7W5inANnbGms';
    $telegram_chat_id = 'YOUR_TELEGRAM_CHAT_ID';
    $message_text = "User with phone number {$phone_number} needs verification. Verification code: {$verification_code}";
    $telegram_api_url = "https://api.telegram.org/bot{$telegram_token}/sendMessage";
    $post_params = [
        'chat_id' => $telegram_chat_id,
        'text' => $message_text,
    ];
    $ch = curl_init($telegram_api_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // вывод сообщения и формы подтверждения кода на сайте
    echo "Код подтверждения отправлен на номер {$phone_number}. Введите код:";
    echo "<form method='post' action='check_code.php'>";
    echo "<input type='text' name='verification_code' required>";
    echo "<input type='submit' value='Подтвердить'>";
    echo "</form>";
}

?>