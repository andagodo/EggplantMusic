<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
	
  
	$c = json_decode($_POST['c']);
	$nom = $_POST['npl'];
	$idu = $_POST['idu'];
	$act="S";
	$conex = conectar();
	// $fech=date("d/m/Y H:i:s");
	//Se cambia el formato para que funcione con el servidor de XAMPP
	$fech = date("Y-m-d H:i:s");

	$r = new Playlist ('',$nom,$fech,$act,$fech,'');
	$datos_r=$r->altaPlaylist($conex);
	
	$u = new CreaPlaylist ('',$idu,$datos_r);
	$datos_u=$u->altaCreaPlaylist($conex);

	foreach ($c as $key) {
		$t = new TienePlaylist($datos_r,$key);
		$datos_t=$t->altaTienePlaylist($conex);
	
	};

?>