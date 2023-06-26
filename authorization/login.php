<?php
session_start();
require_once('detect_lang.php');
require_once('theme.php');

if(isset($_GET['username'])) {
    $value = 'value="' . $_GET['username'] . '"';
} else {
    if(isset($_GET['login'])) {
        $value = 'value="' . $_GET['login'] . '"';
    }
}

if(isset($_GET['password'])) {
    $value_pass = 'value="' . $_GET['password'] . '"';
} else {
    if(isset($_POST['password'])) {
        $value_pass = 'value="' . $_POST['password'] . '"';
    }
}

if(isset($_GET['clear_sessions'])) {
	$redirect_url = $_GET['redirect_url'];
    session_start();
    unset($_SESSION['login_log_roshkam']);
	setcookie("login_log_roshkam", "", time()-432000);
    unset($_SESSION['password_log_roshkam']);
	setcookie("password_log_roshkam", "", time()-432000);
	header("Location: login.php?redirect_url=$redirect_url"); 

} else { if(isset($_COOKIE['login_log_roshkam']) && isset($_COOKIE['password_log_roshkam'])) {
    $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
    $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
    $login = $_COOKIE['login_log_roshkam'];
    $password = $_COOKIE['password_log_roshkam'];
	
	    // выполним запрос MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LocalUsersTest";

    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Выполним запрос, чтобы получить open_id пользователя по его логину
    $sql = "SELECT open_id FROM users WHERE username = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Если пользователь найден, добавляем open_id в URL
        $row = $result->fetch_assoc();
        $open_id = $row["open_id"];
    } else {
        echo "Пользователь не найден";
		header("Location: messages.php?message=Пользователь \"$login\" не найден!&color=red&color_form=white&title=Пользователь не найден!");
        $conn->close();
        exit();
    }
    


    if(isset($_GET['redirect_url'])) {
        $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
        $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
        $redirect_url_1 = $_GET['redirect_url'];
		$redirect_url = $_GET['redirect_url'];

        // проверяем, что URL является валидным
        if(filter_var($redirect_url, FILTER_VALIDATE_URL)) {
            $url_components = parse_url($redirect_url);
            $query_string = isset($url_components['query']) ? $url_components['query'] : '';
            $redirect_url = $url_components['scheme'] . '://' . $url_components['host'] . $url_components['path'];

if(isset($_GET['disable_auth'])) {
} else {
// добавляем логин и open_id к запросу
if(!empty($query_string)) {
    $query_string .= '&login=' . urlencode($login) . '&open_id=' . urlencode($open_id);
} else {
    $query_string = 'login=' . urlencode($login) . '&open_id=' . urlencode($open_id);
}
}

            // отправляем GET запрос
            $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
            $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
            header('Location: ' . $redirect_url . '?' . $query_string);
        } else {
            $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
            $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
            echo 'Неправильный URL';
			header("Location: messages.php?message=Неправильный Redirect URL \"$redirect_url\"&color=red&color_form=white&title=Неправильный URL");
        }
    } else {
        $_SESSION['login_log_roshkam'] = $_COOKIE['login_log_roshkam'];
        $_SESSION['password_log_roshkam'] = $_COOKIE['password_log_roshkam'];
        header('Location: dashboard.php');
    }
}
} #else {
    // перенаправляем на страницу входа
    #$redirect_url = isset($_GET['redirect_url']) ? $_GET['redirect_url'] : '';
    #header('Location: http://base.roservers.com/authorization/login.php?redirect_url=' . urlencode($redirect_url));
#}

#$lang = $_GET['lang'];
#if($lang == 'en'){
#    include('en.lang.php');
#}else{
#    include('ru.lang.php');
#}
?>
<!DOCTYPE html>
<html lang="<?php echo $user_language ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $translations['login'] ?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
<style>
        body {
            background: <?php echo $used_theme['body-backround'] ?>;
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
            background: <?php echo $used_theme['form-background'] ?>;
            border-radius: 25px;
            padding: 60px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
        }
        h2 {
            color: <?php echo $used_theme['h2-color'] ?>;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
		        p {
            color: <?php echo $used_theme['p-color'] ?>;
			font-family: Arial;
            font-size: 22px;
            margin-bottom: 1px;
            text-align: left;
        }
        input[type=text] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: <?php echo $used_theme['input-type-text-border'] ?>; /* добавляем серую рамку */
            margin-bottom: 10px;
            width: calc(100% - 42px); /* вычитаем размер кнопки */
            background-color: <?php echo $used_theme['input-type-text-backround'] ?>;
            border-radius: 10px;
			margin-bottom: -5px;
        }
        input[type=password] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: <?php echo $used_theme['input-type-text-border'] ?>; /* добавляем серую рамку */
            margin-bottom: 10px;
            width: calc(100% - 42px); /* вычитаем размер кнопки */
            background-color: <?php echo $used_theme['input-type-text-backround'] ?>;
            border-radius: 10px;
        }
        label[for="username"],
        label[for="password"] {
            margin-bottom: 70px;
        }
        button[type=submit] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: none;
            margin-bottom: 10px;
            width: 100%;
        }
        a {
            display: block;
            color: #2c3e50;
            text-decoration: none;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
        button[type=submit] {
            background-color: #2c3e50;
            color: #fff;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 10px;
        }
        button[type=submit]:hover {
            background-color: #3498db;
        }
        ::placeholder {
  color: <?php echo $used_theme['placeholder-color'] ?>; /* черный цвет подсказки */
}
    </style>
</head>
<body>
    <form action="log.php?redirect_url=<?php echo $_GET['redirect_url']; ?>" method="post">
        <h2><?php echo $translations['login'] ?></h2>
        <div class="form-group">
            <p for="username"><?php echo $translations['Username, email'] ?>:</p>
            <input type="text" <?php echo $value ?> id="username" name="username" placeholder="<?php echo $translations['Username, email'] ?>" required>
        </div>
        <div class="form-group">
            <p for="password"><?php echo $translations['Password'] ?>:</p>
            <input type="password" <?php echo $value_pass ?> id="password" name="password" placeholder="<?php echo $translations['Password'] ?>" required>
        </div>
        <a href="reset_password<?php 
    if(isset($_GET['redirect_url'])) {
      $redirect_url = $_GET['redirect_url'];
    echo "?redirect_url=" . $redirect_url; }
    ?>"><?php echo $translations['Forgot password'] ?></a>
        <button type="submit" name="login"><?php echo $translations['Log in'] ?></button>
    </form>
</body>
</html>