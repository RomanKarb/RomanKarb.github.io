<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['register'])) {
    // получаем данные из формы
    $login = $_POST['login'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    // проверяем, что пароли совпадают
    if ($password != $password_confirmation) {
        echo "Пароли не совпадают";
		header("Location: messages.php?message=Пароли не совпадают!&color=red&color_form=white&title=Пароли не совпадают");
        die();
    }

    // отправляем письмо с кодом на почту
        require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/SMTP.php';
		require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/DSNConfigurator.php';
		require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/POP3.php';
		
    $mail = new PHPMailer;
			$mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.yandex.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'roshkamun@yandex.ru';
            $mail->Password = 'gakcnnxsxkrhgfxj';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            //Отправка письма
            $mail->setFrom('roshkamun@yandex.ru', 'Поддержка Basedata');
            $mail->addAddress($email); //email получателя
    $code = rand(100000, 999999);
	$mail->isHTML(true);
    $mail->Subject = 'Код подтверждения';
    $mail->Body = "<!DOCTYPE html>
<html>
<head>
 <title>HTML Email</title>
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
 <style>
  body {
   margin: 0;
   padding: 0;
   background: linear-gradient(to bottom, #4CC2E4, #0B4E92);
  }

  .container {
   width: 100%;
   max-width: 600px;
   margin: 0 auto;
   padding: 40px 20px;
   text-align: center;
  }
      form {
        width: 100%;
        max-width: 400px;
        background-color: #fff;
        border-radius: 25px;
        padding: 60px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
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

  h1, p {
   color: #fff;
   margin: 0;
   padding: 0;
  }

  h1 {
   font-size: 36px;
   margin-bottom: 20px;
  }
    A {
   color: #FFEFBA;
   margin: 0;
   padding: 0;
  }

  p {
   font-size: 39px;
   margin-bottom: 20px;
  }

  p {
   font-size: 18px;
   margin-bottom: 40px;
   color: white;
  }
 </style>
</head>
<body>
 <div class=container>
 <form>
  <h1>Введите этот код на сайте:</h1>
  <h1>$code</h1>
  </form>
 </div>
</body>
</html>";
    if (!$mail->send()) {
        echo "Ошибка при отправке письма: " . $mail->ErrorInfo;
		header("Location: messages.php?message=Ошибка при отправке письма: . $mail->ErrorInfo &color=red&color_form=white&title=Ошибка при отправке письма");
        die();
    }
	
	$password_safe = md5($password);
    // сохраняем данные в сессии;
    session_start();
    setcookie("login_pre_reg", $login, time()+3600);
    setcookie("email_pre_reg", $email, time()+3600);
    setcookie("first_name_pre_reg", $first_name, time()+3600);
    setcookie("last_name_pre_reg", $last_name, time()+3600);
    setcookie("password_pre_reg", $password, time()+3600);
    setcookie("code_pre_reg", $code, time()+3600);

    // перенаправляем на страницу ввода кода
    header('Location: enter_code.php');
    exit;
}
?>