<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Usuario.class.php';

	$idu = $_POST['idu'];
	$conex = conectar();
	$r = new Usuario($idu);
	$datos_r=$r->consultaTipoCuentaUsr($conex);


	$arr[] = array('id' => $datos_r[0][0],'Tipo' => $datos_r[0][1], 'Cant_PlaylistxC' => $datos_r[0][2], 'Precio' => $datos_r[0][3]);
	echo json_encode($arr);
 ?>