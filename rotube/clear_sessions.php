<?php
session_start();
setcookie("username-rotube", "", time()-432000);
setcookie("open_id-rotube", "", time()-432000);
sleep(1); // ждем 1 секунду
header ("Location: http://base.roservers.com/rotube/load");
?>