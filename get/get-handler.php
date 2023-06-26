<?php
if(isset($_GET["name"]) && isset($_GET["other"])) 
	$name = $_GET["name"];
	$oother = $_GET["other"];
?>
<!DOCTYPE html>
	<html lang="ru">
<head>
<title> Name </title>
    </head>
    <body>
		<h2 style="text-align:center;">Ваше имя: <?php echo $_GET['name']; ?></h2>
		<h2 style="text-align:center;">Прочее: <?php echo $_GET['other']; ?></h2>
    </body>
</html>