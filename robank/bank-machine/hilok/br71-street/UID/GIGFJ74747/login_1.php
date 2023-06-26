<?php

// Получаем указанный логин и пароль из post запроса
$login = $_POST['login'];
$password = $_POST['password'];

// Создаем XML документ
$xml = new SimpleXMLElement('<response/>');

// Проверяем, есть ли логин и пароль в POST запросе
if (!empty($login) && !empty($password)) {
    // Подключаемся к базе данных
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "LocalUsersTest";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Проверяем подключение к базе данных
    if ($conn->connect_error) {
        $xml->addChild('error', 'Connection failed: ' . $conn->connect_error);
    } else {
        // Проверяем логин и пароль через MySQL
        $sql = "SELECT * FROM users_robank WHERE login = '{$login}' AND password = '{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Создаем уникальный идентификатор
            $unique_id = uniqid();

            // Сохраняем идентификатор в базе данных
            $sql = "UPDATE users_robank SET unique_id = '{$unique_id}' WHERE login='{$login}'";
            $conn->query($sql);

            // Создаем папки
            $root_dir = "";
            $uid_dir = $root_dir . $unique_id . "/";
            $security_dir = $uid_dir . "security/";
            $money_dir = $security_dir . "money/";
            $profile_dir = $security_dir . "profile/";
            $operation_dir = $security_dir . "operation/";
            $example_txt = "have0money0example";

            mkdir($uid_dir);
            mkdir($security_dir);
            mkdir($money_dir);
            mkdir($profile_dir);
            mkdir($operation_dir);

            // Создаем файл уникальный id_profile.php
            $profile_file = $profile_dir . $unique_id . "_profile.php";
            $profile_text = "<?php\necho 'loh';\n?>";
            file_put_contents($profile_file, $profile_text);

            // Создаем файл уникальный id_have_money.php
            $have_money_file = $money_dir . $unique_id . "_have_money.php";
            $have_money_text = file_get_contents("have0money0example.sec00000");
            file_put_contents($have_money_file, $have_money_text);

            // Добавляем уникальный идентификатор в XML
            $xml->addChild('unique_id', $unique_id);
			$xml->addChild('login', $login);
			$xml->addChild('password', $password);

        } else {
            // Добавляем сообщение об ошибке в XML
            $xml->addChild('error', 'Login or password is incorrect.');
        }
        $conn->close();
    }
} else {
    // Добавляем сообщение об ошибке в XML, если логин или пароль не были указаны
    $xml->addChild('error', 'Login and password are required.');
}

// Отправляем XML как ответ на запрос
header('Content-type: text/xml');
echo $xml->asXML();

?>