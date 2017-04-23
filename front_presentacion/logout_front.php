<?php
session_name('eggplantmusic');
session_start();
session_destroy();
header('Location: /index.php')

?>
