<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';

	$data = $_POST['c'];
	$data1 = $_POST['npl'];

	foreach ($data as $key => $value) {
		echo $value["idca"];
		# code...
	}
	//$var_php = json_decode($data,true);
	//echo $var_php[0]->idca;
	//print_r($var_php);
	print_r($data1);

?>