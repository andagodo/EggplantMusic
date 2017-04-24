	<?php  
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Log_Musica.class.php';
	$conex = conectar();
	$idu = $_POST['idu'];
	$consulta = $_POST['consulta'];

	if ($consulta == 'RPC') {
		$idc = $_POST['idc'];
		$r = new Log_Musica ('','',$idu,$idc);
		$datos_r=$r->LogReproduceCancion($conex);

	}elseif ($consulta == 'LBA') {
		$ida = $_POST['ida'];
		$r = new Log_Musica ('','',$idu,$ida);
		$datos_r=$r->LogBusquedaAlbum($conex);

		}elseif ($consulta == 'LBP') {
			$idp = $_POST['idp'];
			$r = new Log_Musica ('','',$idu,$idp);
			$datos_r=$r->LogBusquedaPlaylist($conex);
			
			}elseif ($consulta == 'LRP') {
				$idp = $_POST['idp'];
				$r = new Log_Musica ('','',$idu,$idp);
				$datos_r=$r->LogReproducePlaylist($conex);
			}







	?>