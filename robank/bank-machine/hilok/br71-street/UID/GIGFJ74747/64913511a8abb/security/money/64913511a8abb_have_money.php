<?php
header('Content-Type: text/xml');
$mysqli = new mysqli("localhost", "root", "", "LocalUsersTest");

if($mysqli->connect_error){
   echo "<response><error>Connect Error: " . $mysqli->connect_error . "</error></response>";
   exit();
}

if(isset($_POST['money']) && isset($_POST['login'])){
   $money = $_POST['money'];
   $login = $_POST['login'];
   $stmt = $mysqli->prepare("SELECT money FROM users_robank WHERE login=?");
   $stmt->bind_param("s", $login);
   $stmt->execute();
   $stmt->bind_result($old_money);
   $stmt->fetch();
   $stmt->close();
   
   $new_money = $old_money + $money;
   
   $stmt = $mysqli->prepare("UPDATE users_robank SET money=? WHERE login=?");
   $stmt->bind_param("is", $new_money, $login);
   $result = $stmt->execute();
   $stmt->close();
   
   if($result){
       echo "<response><login>$login</login><old_money>$old_money</old_money><new_money>$new_money</new_money></response>";
   }else{
       echo "<response><error>Update Error: " . $mysqli->error . "</error></response>";
   }
}else{
   echo "<response><error>Missing Parameters</error></response>";
}

$mysqli->close();
?>