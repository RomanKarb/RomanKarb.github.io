<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Форма обратной связи</title>
    <style type="text/css">
      #contact-form {
        width: 40%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
	  
	  input[type="text"],
	  textarea {
        max-width: 100%;
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      input[type="text"],
      textarea {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        box-sizing: border-box;
      }

      textarea {
        height: 100px;
      }

      input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
      }
    </style>
  </head>
  <script src="https://www.google.com/recaptcha/api.js?render=6Ldy-MElAAAAAHYlkOGO4qtC3dms3SZN_h_s66zw"></script>
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('6Ldy-MElAAAAAHYlkOGO4qtC3dms3SZN_h_s66zw', {action: 'submit'}).then(function(token) {
      var recaptchaResponse = document.getElementById('recaptchaResponse');
      recaptchaResponse.value = token;
    });
  });
</script>
 <script>
   function onSubmit(token) {
     document.getElementById("contact-form").submit();
   }
 </script>
  <body>
    <form id="contact-form" method="post" action="anketa.php" enctype="multipart/form-data">
      <label for="name">Имя:</label>
      <input type="text" name="name" required>

      <label for="email">Почта:</label>
      <input type="email" name="email" required>

      <label for="description">Описание:</label>
      <textarea name="description" maxlength="1000" required></textarea>

      <label for="other">Другое:</label>
      <textarea name="other"></textarea>

      <label for="file">Прикрепить файл:</label>
      <input type="file" name="file">
	  <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
	  <button class="g-recaptcha" 
        data-sitekey="6Ldy-MElAAAAAHYlkOGO4qtC3dms3SZN_h_s66zw" 
        data-callback='onSubmit'
        type="submit"		
        data-action='submit'>Отправить</button>
</form>
    </form>
<?php	if (isset($_POST['recaptcha_response'])) {
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
    'secret' => '6Ldy-MElAAAAAKP63Skk07BLva42rpQN1VCarnt3',
    'response' => $_POST['recaptcha_response']
  );
  $options = array(
    'http' => array (
      'method' => 'POST',
      'content' => http_build_query($data),
      'header' => 'Content-Type: application/x-www-form-urlencoded'
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $response = json_decode($result);
  if ($response && $response->success) {
    // reCAPTCHA прошла успешно
  } else {
    // reCAPTCHA не прошла
  }
}
?>
  </body>
</html>