<?php 
$ruta = $_POST['ruta'];
$data = file_get_contents($ruta);
echo $data;
?>