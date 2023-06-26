<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = $_POST['login'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    
    // Проверяем, что пароли совпадают
    if($password !== $password_repeat){
        $message = "Пароли не совпадают";
    }
    else{
        // Генерируем случайный код из 6 цифр
        $code = mt_rand(100000, 999999);
        
        // Отправляем письмо с кодом на почту
        require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/SMTP.php';
		require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/DSNConfigurator.php';
		require $_SERVER['DOCUMENT_ROOT'].'/authorization/PHPMailer/POP3.php'; // путь до библиотеки PHPMailer
        $mail = new PHPMailer;
            //Настройки SMTP-сервера Yandex
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
        $mail->isHTML(true);                                 
        $mail->Subject = 'Your code';
        $mail->Body    = 'Your code: ' . $code;
        if(!$mail->send()) {
            $message = 'Ошибка отправки письма: ' . $mail->ErrorInfo;
        } 
		    // Проверяем, что код верный
   # if($code !== $_SESSION['code']){
      #  $message = "Неверный код";
   # }
      #  else {
            // Сохраняем данные в базу данных или отправляем их по почте администратору
            // В данном примере мы только выводим их на экран
           # $message = 'Вы почти зарегистрировались. Введите код из письма, чтобы продолжить.';
          #  $code_sent = true;
    #    }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Регистрация</title>
</head>
<body>
 <h1>Регистрация</h1>
 <?php if(isset($message)): ?>
  <p><?php echo $message; ?></p>
 <?php endif; ?>
 <?php if(isset($code_sent)): ?>

  <form method="post" action="">
   <label for="code">Введите код из письма:</label>
   <input type="text" name="code">
   <input type="hidden" name="login" value="<?php echo htmlspecialchars($login, ENT_QUOTES); ?>">
   <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>">
   <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">
   <input type="hidden" name="surname" value="<?php echo htmlspecialchars($surname, ENT_QUOTES); ?>">
   <input type="hidden" name="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES); ?>">
   <input type="submit" value="Отправить">
  </form>
 <?php else: ?>
  <form method="post">
   <label for="login">Логин:</label>
   <input type="text" name="login" required><br>
   <label for="email">Электронная почта:</label>
   <input type="email" name="email" required><br>
   <label for="name">Имя:</label>
   <input type="text" name="name" required><br>
   <label for="surname">Фамилия:</label>
   <input type="text" name="surname"><br>
   <label for="password">Пароль:</label>
   <input type="password" name="password" required><br>
   <label for="password_repeat">Повторите пароль:</label>
   <input type="password" name="password_repeat" required><br>
   <input type="submit" value="Регистрация">
  </form>
  <script>
function validateForm() {
  var password1 = document.getElementById("password1").value;
  var password2 = document.getElementById("password2").value;

  if (password1 !== password2) {
    alert("Пароли не совпадают");
    return false;
  }
  return true;
}
</script>
 <?php endif; ?>
</body>
</html>
