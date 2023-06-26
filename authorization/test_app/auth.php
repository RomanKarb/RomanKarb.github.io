<?php
// Подключаемся к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'LocalUsersTest');

// Получаем информацию о приложении из базы данных
$app_id = isset($_GET['id']) ? $_GET['id'] : false;
$redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : '';

if (!$app_id || !$redirect_url) {
    die('Некоторые данные отсутствуют. Попробуйте еще раз.');
}

$query = "SELECT author_name, app_name, description FROM apps WHERE id = '$app_id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die('Приложение не найдено. Попробуйте еще раз.');
}

$app_info = mysqli_fetch_assoc($result);
$author_name = $app_info['author_name'];
$app_name = $app_info['app_name'];
$description = unserialize($app_info['description']);
mysqli_free_result($result);

// Освобождаем соединение с базой данных
mysqli_close($conn);

// Генерируем ссылку на страницу авторизации
$login_url = 'login.php';
$login_url .= '?app_id='.$app_id.'&redirect_url='.urlencode($redirect_url);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Авторизация в приложении: <?php echo $app_name; ?></title>
</head>
<body>
<h1>Авторизация в приложении: <?php echo $app_name; ?></h1>
<p>Ссылка переадресации: <?php echo $redirect_url; ?></p>
<p>Имя автора: <?php echo $author_name; ?></p>
<p>Приложению будут переданы следующие данные: <?php echo implode(', ', $description); ?></p>

<p>Для авторизации в этом приложении вам необходимо будет войти со своим логином и паролем:</p>
<form method="post" action="<?php echo $login_url; ?>">
    <p>
        <label for="username">Логин:</label>
        <input type="text" name="username" id="username" required>
    </p>
    <p>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
    </p>
    <p>
        <input type="submit" value="Авторизоваться">
        <input type="button" value="Отмена" onclick="window.close()">
    </p>
</form>

</body>
</html>
</html>