<?php
$track_number = isset($_GET['track']) ? $_GET['track'] : '';
$author = isset($_GET['author']) ? $_GET['author'] : '';
if ($track_number) {
    echo '<h>Трек:' . $track_number . '</h>';
	echo '<h>Автор:' . $author . '</h>';
    // Дополнительный код для генерации контента для заданного трека
} else {
	echo 'Ошибка, пустой запрос';
    // Код для генерации контента для других страниц на вашем сайте
}
?>