<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';

	$conex = conectar();
	$idpl = $_POST['idpl'];

	$c = new TienePlaylist($idpl);
	$datos_c=$c->EliminaPlaylistInTP($conex);

		if ($datos_c == true) {
			$d = new CreaPlaylist($idpl);
			$datos_d=$d->EliminaPlaylistInCP($conex);
				if ($datos_d == true){
					$e = new Playlist($idpl);
					$datos_e=$e->EliminaPlaylistUsr($conex);
						if ($datos_e == true) {
							$arr['mensaje'] = 'OK';
							
						}else{
							$arr['mensaje'] = 'No se pudo borrar la playlist';
						}
				}else{
					$arr['mensaje'] = 'No se pudo borrar en la tabla CreaPlaylist';
				}
		}else{
			$arr['mensaje'] = 'No se pudo borrar en la tabla TienePlaylist';
		}

	echo json_encode($arr);
?>