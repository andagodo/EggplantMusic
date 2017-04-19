<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';

$conex = conectar();
$r = new Album();
$datos_r=$r->consultaTodosAlbum($conex);
$Cuenta=count($datos_r);
for ($i=0;$i<$Cuenta;$i++){
			//recibo la informacion de canciones de la playlist y las coloco en el $arr
			$arr[] = array('id' => $datos_r[$i][0],'nom' => $datos_r[$i][1]);
			}
echo json_encode($arr);
?>





