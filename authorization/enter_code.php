<?php
require_once('detect_lang.php');
?>
<html lang="<?php echo $user_language ?>">
<?php
session_start();
if(isset($_COOKIE['login_pre_reg'])) {

// подключаем файл с настройками базы данных
require_once('db_config.php');

    $username = $_COOKIE['login_pre_reg'];
    $email = $_COOKIE['email_pre_reg'];
    $f_name = $_COOKIE['first_name_pre_reg'];
    $s_name = $_COOKIE['last_name_pre_reg'];
    $password = $_COOKIE['password_pre_reg'];
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
echo '
<!DOCTYPE html>
<html>
<head>
    <title>' . $translations['Check register'] . '</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #3498db, #2c3e50);
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        form {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 25px;
            padding: 60px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
        }
        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
			text-align: center;
        }
        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }
        input[type=text] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: 1px solid #CCCCCC;
            margin-bottom: 10px;
            width: 100%;
            background-color: #f2f2f2;
            border-radius: 10px;
        }
        button[type=submit] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: none;
            margin-bottom: 10px;
            width: 100%;
            background-color: #2c3e50;
            color: #fff;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 10px;
        }
        button[type=submit]:hover {
            background-color: #3498db;
        }
    </style>
</head>
<form action="reg.php?register=1" method="post">
  <h2>' . $translations['Check register'] . '</h2>
  <div>
    <label>' . $translations['Enter the code from the email'] . '</label>
    <input type="text" name="code" required>
  </div>
  <button type="submit" name="confirm">' . $translations['Confirm'] . '</button>
</form>';
} else {
    echo "<title>400 - Ошибка выполнения кода</title>";
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $address = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'] !== '80' ? ":{$_SERVER['SERVER_PORT']}" : "";
    $path = $_SERVER['REQUEST_URI'];
    $fullUrl = "{$protocol}://{$address}{$port}{$path}";
    $url = 'http://base.roservers.com/errors/400_space_1.php?url=' . urlencode($fullUrl) . '&error=' . urlencode("if(isset(\$_COOKIE[login_pre_reg])) поэтому попробуте перезапустить браузер, затем пройти регистрацию заново");
$content = file_get_contents($url);
echo $content;
}
?>