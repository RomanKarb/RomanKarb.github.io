<?php
// Ограничение на размер файла (в байтах): 1 МБ
$limit_size = 5024 * 5024;

// Ограничение на ширину и высоту изображения (в пикселях)
$limit_width = 500;
$limit_height = 500;

// Сохранение картинки
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $username = "username"; // Здесь необходимо получить имя пользователя
    $filename = 'logo.png';
    $path = "users/$username/$filename";

    // Если папка пользователя не существует, создаём её
    if (!is_dir("users/$username")) {
        mkdir("users/$username");
    }

    // Получаем размер файла
    $size = filesize($_FILES['image']['tmp_name']);

    // Получаем информацию об изображении
    $info = getimagesize($_FILES['image']['tmp_name']);

    // Проверяем, что файл является изображением, не больше ограничения размера и размеры соответствуют ограничениям
    if ($info && in_array($info[2], array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF)) &&
        $size <= $limit_size && $info[0] >= $limit_width && $info[1] >= $limit_height) {

        // Загружаем файл из временной папки в нужную
        if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {

            // Обрезаем картинку до квадрата 500x500
            $src = imagecreatefrompng($path);
            $width = imagesx($src);
            $height = imagesy($src);
            if ($width > $height) {
                $src_x = ($width - $height) / 2;
                $src_y = 0;
                $s_size = $height;
            } else {
                $src_x = 0;
                $src_y = ($height - $width) / 2;
                $s_size = $width;
            }
            $dest = imagecreatetruecolor($limit_width, $limit_height);
            imagecopyresampled($dest, $src, 0, 0, $src_x, $src_y, $limit_width, $limit_height, $s_size, $s_size);
            imagepng($dest, $path);
            imagedestroy($src);
            imagedestroy($dest);

            // Отображаем картинку на сайте
            $logo = "$path";
            echo "<script>document.getElementById('preview').innerHTML = \"<img src='$logo'>\";</script>";
			echo "<img src='$logo' alt='s' />";
			echo $logo;

            // Отправляем адрес картинки в POST-запросе
            $_POST['logo'] = $logo;

        } else {
            echo "<p>Не удалось сохранить картинку на сервере.</p>";
        }

    } else {
        echo "<p>Выбранный файл не соответствует ограничениям.</p>";
    }
} else {
    echo "<p>Не удалось загрузить картинку.</p>";
}
?>