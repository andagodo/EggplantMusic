<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '../clases/Cancion.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '../logica/funciones.php';
	
	$conex = conectar();
	$idc = $_POST['idc'];
	$r = new Cancion($idc,'','','','');
	$datos_r=$r->consCancionId($conex);

	$arr = array('id' => $datos_r[0][0], 'nombre' => $datos_r[0][1], 'duracion' => $datos_r[0][2], 'ruta'=> $datos_r[0][3], 'genero' => $datos_r[0][4]);
	echo json_encode($arr);
?>