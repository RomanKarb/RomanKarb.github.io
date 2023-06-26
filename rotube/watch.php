<!DOCTYPE html>
<html>
<head>
 <title>RoTUbe - <?php echo $video['title']; ?></title>
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
        width: 400px;
        max-width: 400px;
        background-color: white;
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
    input[type=id] {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 3px;
        border: 1px solid #ddd; /* добавляем серую рамку */
        margin-bottom: 10px;
        width: 100%; /* вычитаем размер кнопки */
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
 .video-button {
        background-color: blue;
        margin-bottom: 20px;
        width: 960px;
        height: 540px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    .video-button video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .video-button::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }
 </style>
 </head>
<body>
<?php
// Получение идентификатора видео из GET-запроса
$id = $_GET['id'];
if ($id) {

// Поиск информации о видео в базе данных
$conn = new mysqli('localhost', 'root', '', 'LocalUsersTest');
$stmt = $conn->prepare('SELECT filename, title, description FROM RoTUbe WHERE id =?');
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();
$video = $result->fetch_assoc();

$path = '/rotube/video/upload/' . $video['filename'];
$video_file = $path;
#echo $video_file;

// Отображение видео и его информации
if (!$video) {
    echo '<form method="get" action="">
    <p>
        <label for="id">Видео не найдено, введите ID:</label>
        <input type="id" name="id" id="id" required>
    </p>
	<button type="submit">Искать</button>
	</form>';
} else {
	echo '<div class="video-button">
	<video src="' . $video_file . '" controls></video>
	</div>';
    echo '<h1>' . $video['title'] . '</h1>';
    echo '<p>' . $video['description'] . '</p>';
}
} else {
echo '<form method="get" action="">
    <p>
        <label for="id">Пустой запрос, введите ID:</label>
        <input type="id" name="id" id="id" required>
    </p>
	<button type="submit">Искать</button>
	</form>';
}
?>
