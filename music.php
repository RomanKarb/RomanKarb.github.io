<?php
$number = NULL;
if(preg_match("|^/\d+$|", $_SERVER["REQUEST_URI"], $matches)){
    $number = substr($_SERVER["REQUEST_URI"], 1);
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Музыка</title>
    </head>
    <body>
        <?php if($number): ?>
            <h>Музыка: <?php echo $number ?></h>
        <?php endif;?>
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/authors.php">Авторы</a></li>
            <li><a href="/idea.php">Идея</a></li>
        </ul>
    </body>
</html>