<?php
session_start();
if (isset($_POST['confirm'])) {
    // проверяем код
    if ($_POST['code'] != $_SESSION['code']) {
        header("Location: messages.php?message=Не верный код&color=red&color_form=white&title=Не верный код");
        die();
    }

// подключаем файл с настройками базы данных
require_once('db_config.php');

    $username = $_SESSION['login'];
    $email = $_SESSION['email'];
    $f_name = $_SESSION['first_name'];
    $s_name = $_SESSION['last_name'];
    $password = $_SESSION['password'];
    $reset_key = uniqid();
	$reset_key_used = "0";
	
		// проверяем, что username не существует в базе данных
	
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header("Location: messages.php?message=Пользователь с таким логином уже существует&color=red&color_form=white&title=Пользователь с таким логином уже существует");
    die();
}

	// проверяем, что email не существует в базе данных
	
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header("Location: messages.php?message=Пользователь с такой почтой уже существует&color=red&color_form=white&title=Пользователь с такой почтой уже существует");
    die();
}

    $sql = "INSERT INTO users (username, email, f_name, s_name, password, reset_key, reset_key_used) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $username, $email, $f_name, $s_name, $password, $reset_key, $reset_key_used);
    $stmt->execute();

    if ($stmt->error) {
        echo "Ошибка: " . $stmt->error;
    } else {
        header("Location: dashboard.php?username=$username");
    }

    $stmt->close();
    $conn->close();

    // удаляем данные из сессии
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['f_name']);
    unset($_SESSION['s_name']);
    unset($_SESSION['password']);
    unset($_SESSION['code']);
}
?>