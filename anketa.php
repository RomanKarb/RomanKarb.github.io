<?php
if(isset($_POST["test"]) && isset($_POST["description"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["other"]) && isset($_FILES["file"])) 
    
    // Присваиваем значения переданных полей
	$test = $_POST["test"];
    $description = $_POST["description"];
    $mail = $_POST["mail"];
    $name = $_POST["name"];
    $file = $_FILES["file"]["name"];
	$other = $_POST["other"];
	
	// Сохраняем загруженный файл
    $target_dir = "userpost/problems_form/files/"; // Указываем директорию для сохранения загруженных файлов
    $target_file = $target_dir.basename($_FILES["file"]["name"]); // Формируем путь к файлу
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    #echo "Файл ". basename( $_FILES["file"]["name"]). " загружен.";
    } else {
    echo "Ошибка загрузки файла";
	header("Location: messages.php?message=Ошибка загрузки файла: . $mail->ErrorInfo &color=red&color_form=white&title=Ошибка загрузки файла");
    }

    
    // Определяем имя файла
    $date = date('d-m-y_H-i');
    $filename = "userpost/problems_form/".$date.".txt";
	
	file_put_contents($filename, '');
    
    // Открываем файл для записи
    $f = fopen($filename, "a+");
    
    // Записываем данные в файл
    fwrite($f, "Description: ".$description." :Description\r\n");
    fwrite($f, "Mail: ".$mail." :Mail\r\n");
	fwrite($f, "Name: ".$name." :Name\r\n");
	fwrite($f, "File: ".$file." :File\r\n");
    fwrite($f, "Other: ".$other." :Other\r\n");
	fclose($f);

?>
<!DOCTYPE html>
	<html lang="ru">
<head>
<title> Прием заявок </title>
<link href="local_test/css/style.css" media="screen" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
    </head>
    <body>
        <h1 style="text-align:center; color:blue;">Ваша заявка принята
		</h1>
		<h2 style="text-align:center;">Ваше имя: <?php echo $_POST['name']; ?></h2>
        <h2 style="text-align:center;">Ваша почта: <?php echo $_POST['mail']; ?></h2>
        <h2 style="text-align:center;">Описание: <?php echo $_POST['description']; ?></h2>
		<h2 style="text-align:center;">Др. информация: <?php echo $_POST['other']; ?></h2>
		<h2 style="text-align:center;">Файл: <?php echo $file; ?></h2>
    </body>
</html>