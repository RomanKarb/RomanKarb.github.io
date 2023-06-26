<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LocalUsersTest";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
    <meta charset="utf-8">
	<html lang="ru">
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
  </head>
  <body>
<form action="reg_result.php" method="post">
    <h2>Регистрация пользователя</h2>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="username">Логин:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="username">Имя:</label>
        <input type="text" class="form-control" id="f_name" name="f_name" required>
    </div>
    <div class="form-group">
        <label for="username">Фамилия:</label>
        <input type="text" class="form-control" id="s_name" name="s_name" required>
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    <button type="submit" class="btn btn-primary" name="register">Зарегистрироваться</button>
</form>