<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
	$conex = conectar();
	$idpl = $_POST['idpl'];
	$idca = $_POST['idca'];
	$idc = $_POST['idc'];

	$c = new TienePlaylist($idpl,$idca);
	$datos_c=$c->ConsultacancionyPL($conex);

	

	if ($datos_c){
		#echo("Existe en la playlist");		
		$arr = array('ok' => "False");
		echo json_encode($arr);
	}else{
		#echo("No existe en la PLaylist");
		$arr = array('ok' => "True");
		echo json_encode($arr);
			$tp=new TienePlaylist($idpl,$idca);
			$okTP=$tp->altaTienePlaylist($conex);

	}
?>