<!DOCTYPE html>
<html>
<head>
 <title>Огромный чат</title>
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
   max-width: 600px;
   background-color: #fff;
   border-radius: 25px;
   padding: 20px;
   box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
  }
  input[type=text], textarea {
   width: 100%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
  }
  button {
   background-color: #4CAF50;
   color: white;
   padding: 12px 20px;
   border: none;
   border-radius: 4px;
   cursor: pointer;
  }
  button:hover {
   background-color: #45a049;
  }
  .chat {
   height: 500px;
   overflow-y: scroll;
   padding: 10px;
   border: 1px solid #ccc;
   border-radius: 4px;
  }
 </style>
</head>
<body>
 <?php
  // Получаем IP-адрес пользователя
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
   $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  
  // Подключаемся к базе данных
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "LocalUsersTest";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

  // Обработка отправки сообщений
  if (isset($_POST['message']) && !empty($_POST['message'])) {
   $message = $_POST['message'];
   $datetime = date('Y-m-d H:i:s');
   $user_ip = $ip_address;

   $sql = "INSERT INTO messages (message, datetime, user_ip) VALUES ('$message', '$datetime', '$user_ip')";

   if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "
" . $conn->error;
   }
  }

  // Получение и отображение сообщений
  $sql = "SELECT message, datetime FROM messages ORDER BY datetime DESC LIMIT 50";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
   echo "<div class='chat'>";
   while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row["datetime"] . ":</strong> " . $row["message"] . "</p>";
   }
   echo "</div>";
  } else {
   echo "No messages yet.";
  }

  $conn->close();
 ?>

 <form method="post" action="">
  <label for="message">Message:</label>
  <textarea id="message" name="message" rows="4" cols="50"></textarea>
  

  <button type="submit">Send</button>
 </form>
</body>
</html>