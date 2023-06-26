<?php
session_start();
// Устанавливаем соединение с базой данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LocalUsersTest";
$redirect_url = $_GET['redirect_url'];

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
    $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		session_start();
        setcookie("username_log_roshkam", $row['username'], time()+432000);
        setcookie("id_log_roshkam", $row['id'], time()+432000);
		setcookie("login_log_roshkam", $username, time()+432000);
		setcookie("password_log_roshkam", $password, time()+432000);
        $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
        $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
		
if(isset($_GET['redirect_url']) && !empty($_GET['redirect_url'])) {
    $redirect_url = $_GET['redirect_url'];
    $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
    $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
    header("Location: login.php?redirect_url=$redirect_url");
} else {
    $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
    $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
    header("Location: dashboard.php");
}
    } else {
        echo "<div class='alert alert-danger'>Не верный логин или пароль!</div>";
		header("Location: messages.php?message=Не верный логин или пароль!&color=red&color_form=white&title=Не верный логин или пароль!");
    }
}
?>