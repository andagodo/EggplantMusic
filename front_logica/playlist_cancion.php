<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';

	$idpl = $_POST['idp'];
	$conex = conectar();
	$r = new TienePlaylist($idpl,'');
	$datos_r=$r->consultaIDContieneAl($conex);
	$Cuenta=count($datos_r);

		for ($i=0;$i<$Cuenta;$i++){
				
			$idca =  $datos_r[$i][0];
			$t = new ContieneAlbum($idca);

			$datos_t=$t->ConsultaIDPerteneceC($conex);
				$idpc = $datos_t[0][0];

				$y = new PerteneceCancion($idpc);
				$datos_y=$y->DatosCancionPC($conex);

				$arr[] = array('nom' => $datos_y[0][0],'ruta' => $datos_y[0][3], 'idca' => $datos_r[$i][0], 'id' => $datos_y[0][5]);

	
			
		}
	
	echo json_encode($arr);

?>



