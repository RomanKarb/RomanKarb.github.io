<!DOCTYPE html>
<html>
<head>
  <title>Модель игрока Minecraft</title>
  <!-- Подключение библиотеки Three.js для отрисовки модели игрока -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Введите никнейм...">
    <button type="submit">Получить модель</button>
  </form>

  <?php
  // Если был отправлен запрос на получение модели игрока
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';

    if (!empty($username)) {
      // Получение UUID по никнейму с помощью API Mojang
      $url = "https://api.mojang.com/users/profiles/minecraft/{$username}";
      $response = file_get_contents($url);
      $data = json_decode($response, true);

      if (isset($data['id'])) {
        $uuid = $data['id'];

        // Получение ссылки на скин игрока с помощью API Crafatar
        $skinUrl = "https://crafatar.com/skins/{$uuid}";

        // Получение ссылки на модель игрока с помощью API MineSkin
        $modelUrl = "https://api.mineskin.org/get/id/{$uuid}";

        // Создание элементов для отрисовки модели игрока
        echo '<div id="player-model"></div>';
        echo '<button id="save-button" type="button" style="display: none;">Сохранить</button>';

        // Создание скрипта, который загружает и отрисовывает модель игрока
        echo '<script>';
        echo 'var skinUrl = "' . $skinUrl . '";';
        echo 'var modelUrl = "' . $modelUrl . '";';
        echo 'var headFilename = "' . $uuid . '.png";';
        echo file_get_contents('player-model.js');
        echo '</script>';
      } else {
        echo 'Неверный никнейм!';
      }
    }
  }

  // Если была нажата кнопка "Сохранить", сохранение рендера головы игрока в папку heads с прозрачным фоном
  if (isset($_GET['save']) && $_GET['save'] == 1 && isset($uuid)) {
    $url = "https://crafatar.com/renders/head/{$uuid}?overlay";
    $filename = "heads/{$uuid}.png";
    file_put_contents($filename, file_get_contents($url));
    echo 'Рендер головы игрока сохранен в папку heads';
  }
  ?>
</body>
</html>