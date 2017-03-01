<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
	
  
	$c = json_decode($_POST['c']);
	$nom = $_POST['npl'];
	$idu = $_POST['idu'];
	$conex = conectar();
	
	$fech = date("d/m/Y H:i:s");

	$r = new Playlist ('',$nom,$fech,'','');
	$datos_r=$r->altaPlaylist($conex);

	$u = new CreaPlaylist ('',$idu,$datos_r,'','');
	$datos_u=$u->altaCreaPlaylist ($conex);

	foreach ($c as $key) {
		$t = new TienePlaylist($datos_r,$key);
		$datos_t=$t->altaTienePlaylist($conex);
		# code...
	};
	//$var_php = json_decode($data,true);
	//echo $var_php[0]->idca;
	//print_r($var_php);

?>