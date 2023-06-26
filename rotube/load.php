<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>Загрузка видео</title>
 <meta charset="UTF-8">
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
<style>
    body {
        background: linear-gradient(to bottom right, #808080, #696969);
        font-family: Arial, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        color: #000000;
    }
    form {
        width: 800px;
        max-width: 800px;
        background-color: white;
        border-radius: 25px;
        padding: 60px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
    }
	        form[type=form1] {
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
			        p {
            color: #2c3e50;
			font-family: Arial;
            font-size: 22px;
            margin-bottom: 1px;
            text-align: left;
        }
    input[type=text] {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 3px;
        border: 1px solid #ddd; /* добавляем серую рамку */
        margin-bottom: -5px;
        width: calc(100% - 42px); /* вычитаем размер кнопки */
        background-color: #f2f2f2;
		border-radius: 10px;
    }
	    textarea[type=text]	{
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 3px;
        border: 1px solid #ddd; /* добавляем серую рамку */
        margin-bottom: 10px;
        width: 100%;
        background-color: #f2f2f2;
		border-radius: 10px;
		height: 40px;
		min-height: 40px;
		max-height: 500px;
		box-sizing: border-box;
		max-width: 100%;
		min-width: 100%;
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
input[type="file"] {
  margin-top: 10px;
  font-size: 16px;
  color: #555;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px 20px;
  background-color: #f2f2f2;
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 20px;
}

input[type="file"]::-webkit-file-upload-button {
  border: none;
  background-color: #2c3e50;
  border-radius: 3px;
  color: #fff;
  font-size: 16px;
  padding: 10px 20px;
  transition: all 0.3s ease;
  cursor: pointer;
  border-radius: 10px;
}

input[type="file"]::-webkit-file-upload-button:hover {
  background-color: #3498db;
}

    #progressBarContainer {
      position: relative;
      width: 100%;
      height: 25px;
      background-color: #808080;
      border-radius: 25px;
    }
	
    progress {
      position: centre;
      bottom: 20px;
      left: 0;
      width: 800px;
      height: 25px;
      border-radius: 25px;
    }
    
    progress::-webkit-progress-bar {
      background-color: #808080;
      border-radius: 25px;
    }
    
    progress::-webkit-progress-value {
      background-image: linear-gradient(to bottom right, #808080, #696969);
      border-radius: 25px;
    }
    
    progress::-moz-progress-bar {
      background-image: linear-gradient(to bottom right, #808080, #696969);
      border-radius: 25px;
    }
	
	    .progress-label {
      position: absolute;
      bottom: -30px;
      left: 0;
      width: 100%;
      color: gray
    }
 </style>
 <script>
    function calculateFileSize() {
      var sizeInBytes = document.getElementsByName('video')[0].files[0].size;
      var sizeInMb = sizeInBytes / (1024 * 1024);
      var progressBar = document.getElementById('progressBar');
      var progressBarContainer = document.getElementById('progressBarContainer');
      progressBar.max = sizeInMb;
      progressBarContainer.classList.remove('hidden');
      document.getElementById('uploadBtn').disabled = false;
    }
    
    function updateProgressBar(event) {
      var progressBar = document.getElementById('progressBar');
      var progressLabel = document.getElementById('progressLabel');
      var loaded = event.loaded / (1024 * 1024);
      var total = event.total / (1024 * 1024);
      progressBar.value = loaded;
      progressLabel.textContent = Math.round((loaded/total)*100) + '% (' + loaded.toFixed(2) + 'Mb / ' + total.toFixed(2) + 'Mb)';
    }
  </script>
 </head>
<body>
<?php
// начинаем сессию
session_start();

// проверяем наличие нужных данных в сессии
if(isset($_COOKIE['username-rotube']) && isset($_COOKIE['open_id-rotube'])) {
	$username_rotube = $_COOKIE['username-rotube'];
   // если данные есть, выводим нужный текст
   echo "<form enctype=\"multipart/form-data\" method=\"POST\" action=\"upload\">
   <h2>Добро пожаловать: $username_rotube <a href=\"clear_sessions.php\">(выйти)</a></h2>
<p for=\"login\">Загрузите видео:</p>
    <input type=\"file\" name=\"video\" required onchange=\"calculateFileSize()\">
	 <div id=\"progressBarContainer\" class=\"hidden\">
      <progress value=\"0\" max=\"100\" id=\"progressBar\" onprogress=\"updateProgressBar(event)\"></progress>
      <div class=\"progress-label\"></div>
    </div>
	<p for=\"login\">Введите название:</p>
    <input type=\"text\" name=\"title\" required maxlength=\"1000\" placeholder=\"Название\">
	<p for=\"login\">Введите описание:</p>
    <textarea type=\"text\" name=\"bio\" maxlength=\"7000\" placeholder=\"Описание\"></textarea>
    <button type=\"submit\" disabled=\"true\" id=\"uploadBtn\">Загрузить</button>
</form>
";
} else {
   // если данных нет, перенаправляем на страницу логина
   echo "<form type=\"form1\" action=\"fast_link/auth.php\">
   <h2>Пожалуйста войдите в систему</h2>
   <button type=\"submit\">Войти</button>";
   #header("Location: http://base.roservers.com/authorization/api/roauth/v1/web_app?client_id=rotube&redirect=http://base.roservers.com/rotube/auth.php?from=api/roauth/v1");
   exit();
}
?>

