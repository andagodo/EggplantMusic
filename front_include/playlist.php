<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
/*$alb1=$_SESSION['idalbum'];*/
$alb = $_POST['idalbum'];
$conex = conectar();
$r = new ContieneAlbum('',$alb,'');
$datos_r=$r->consultaCancionA($conex);
$Cuenta=count($datos_r);

	for ($i=0;$i<$Cuenta;$i++){
			//recibo la informacion de canciones de la playlist y las coloco en el $arr
			$arr[] = array('id' => $datos_r[$i][0],'nom' => $datos_r[$i][1],'idca' => $datos_r[$i][2]);
}
echo json_encode($arr);

?>



