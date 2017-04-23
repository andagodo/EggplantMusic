<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/playlist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';

	$conex = conectar();
	$idu = $_POST['idu'];
	$r = new CreaPlaylist('',$idu,'');
	$datos_r=$r->consultaplayusr($conex);
	$Cuenta=count($datos_r);

		if ($Cuenta == '0') {
			$arr['confirmpu'] = 'false';

		}else {
			$arr['confirmpu'] = 'true';
			for ($i=0;$i<$Cuenta;$i++){
				$idp =  $datos_r[$i][0];
				$t = new Playlist($idp,'','');
				$datos_t=$t->consultaPlaylist($conex);
				//recibo la informacion de playlist y las coloco en el $arr
				$arr['playlistusr'][] = array('id' => $datos_t[0][0],'nom' => $datos_t[0][1]);
			}

		}
	$p = new CreaPlaylist();
	$datos_p=$p->ConsultaIdPlaylistSist($conex);
	$Cuenta1=count($datos_p);
		if ($Cuenta1 == '0') {
			$arr['confirmps'] = 'false';
		}else{
			$arr['confirmps'] = 'true';
			for ($i=0;$i<$Cuenta1;$i++) { 
				$idp =  $datos_p[$i][0];
				$f = new Playlist($idp,'','');
				$datos_f=$f->consultaPlaylist($conex);
				$arr['playlistsys'][] = array('id' => $datos_f[0][0],'nom' => $datos_f[0][1]);
			}
		}
	echo json_encode($arr);
?>
