<?php 
$ruta = $_POST['ruta'];
if(file_exists($ruta) == '1') {

	$data = file_get_contents($ruta);
	echo $data;
}



?>