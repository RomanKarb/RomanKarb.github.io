<?php
// Устанавливаем соединение с базой данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LocalUsersTest";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['reset_password'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Генерация уникального ключа для восстановления пароля
        $key = uniqid();
        $sql = "UPDATE users SET reset_key='$key' WHERE email='$email'";
        mysqli_query($conn, $sql);

        // Отправка письма на указанный email со ссылкой на скрипт восстановления
        $message = "Для восстановления пароля перейдите по ссылке: example.com/example_script.php?key=$key&email=$email";
        mail($email, 'Восстановление пароля', $message);

        echo "<div class='alert alert-success'>Письмо с инструкциями отправлено на указанный email!</div>";
    } else {
        echo "<div class='alert alert-danger'>Не найден указанный email!</div>";
    }
}
?>