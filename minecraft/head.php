<!DOCTYPE html>
<html>
<head>
 <title>Minecraft Avatar</title>
 <style type="text/css">
  body {
   background: linear-gradient(to bottom right, #3498db, #2c3e50);
   font-family: Arial, sans-serif;
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   margin: 0;
   overflow: hidden;
  }

  form {
   width: 100%;
   max-width: 600px;
   background-color: #fff;
   border-radius: 25px;
   padding: 60px;
   box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
   height: 400px;
  }

  img {
   width: 200px;
   height: 200px;
   display: block; 
   margin: 0 auto;
  }
  
     h2 {
   color: #2c3e50;
   font-size: 24px;
   margin-bottom: 20px;
   text-align: center;
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
		
		 input[type=text] {
         font-size: 22px;
         padding: 10px 20px;
         border-radius: 3px;
         border: 1px solid #ddd; /* добавляем серую рамку */
         margin-bottom: 10px;
         width: calc(100% - 42px); /* вычитаем размер кнопки */
         background-color: #f2f2f2;
     border-radius: 10px;
     }
 </style>
</head>
<body>
 <?php
 #box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
 if(isset($_POST['username'])) {
  $username = $_POST['username'];

  $url = "https://api.mojang.com/users/profiles/minecraft/$username";

  $data = json_decode(file_get_contents($url), true);

  if (isset($data['errorMessage'])) {
   echo "<p>{$data['errorMessage']}</p>";
  } else {
   $id = $data['id'];
   $image_url = "https://crafatar.com/renders/head/$id";
   $image_path = "heads/$id.png";

   file_put_contents($image_path, file_get_contents($image_url));

   #echo "<img src=\"$image_path\">";
   $img = "<img src=\"$image_path\">
   <h2>$username</h2>";
  }
 } else {
	 if(isset($_GET['search'])) {
     $username1 = $_GET['search'];

  $url = "https://api.mojang.com/users/profiles/minecraft/$username1";

  $data = json_decode(file_get_contents($url), true);

  if (isset($data['errorMessage'])) {
   echo "<h2>{$data['errorMessage']}</h2>";
  } else {
   $id = $data['id'];
   $image_url = "https://crafatar.com/renders/head/$id";
   $image_path = "heads/$id.png";

   file_put_contents($image_path, file_get_contents($image_url));

   #echo "<img src=\"$image_path\">";
   $img = "<img src=\"$image_path\">
   <h2>$username1</h2>";
  }
 } else {
	 echo "<h2>Пустой запрос</h2>";
	 $disabled = "hidden";
 }
 }
 ?>
 <form <?php echo $disabled; ?> method="post">
  <h2 for="username">Minecraft Username:</h2>
  <input type="text" id="username" name="username" required>
  <button type="submit">Get Avatar</button>
  <?php
  echo $img;
  ?>
 </form>
</body>
</html>