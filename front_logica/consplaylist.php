<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';


	$conex = conectar();
	$idu = $_POST['idu'];
	$r = new CreaPlaylist('',$idu,'');
	$datos_r=$r->consultaplayusr($conex);
	$Cuenta=count($datos_r);
		
		for ($i=0;$i<$Cuenta;$i++){

			$idp =  $datos_r[$i][0];
			$t = new Playlist($idp,'','');
			$datos_t=$t->consultaPlaylist($conex);
			//recibo la informacion de playlist y las coloco en el $arr
			$arr[] = array('id' => $datos_t[0][0],'nom' => $datos_t[0][1],'fech' => $datos_t[0][2]);
			
		}

		//envio las playlist del usuario por Json
		echo json_encode($arr);

	//desconectar($conex);
	
 ?>