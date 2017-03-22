<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
//require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/getid3/getid3.php';
session_start();

$conex = conectar();
$serialized = $_POST['GrabaMusica'];
$accion = $_POST['accion'];

$serialized = ereg_replace("'", "\"", $serialized);
$GrabaMusica = unserialize($serialized);

// var_dump($serialized);
// var_dump($GrabaMusica);
//$GrabaMusica = $_POST['GrabaMusica'];
//echo $GrabaMusica;
/*
$nombrearch = $_POST['nombrearch'];
$titulo = $_POST['titulo'];
$interprete = $_POST['interprete'];
$genero = $_POST['genero'];
$duracion = $_POST['duracion'];
$anio = $_POST['anio'];
$track = $_POST['track'];
*/

$cuenta=count($GrabaMusica);

for ($i=0;$i<$cuenta;$i++){

	$ec = new Cancion ('',$GrabaMusica[$i]['titulo'],$GrabaMusica[$i]['duracion'],'',$GrabaMusica[$i]['interprete']);
	$ExisteCancion = $ec->ExisteCancion($conex);
	//var_dump($ExisteCancion);

	
if ($ExisteCancion == false){

		$activ="S";
		$feactivo=date("d/m/Y");
		$c= new Cancion ('',$GrabaMusica[$i]['titulo'],$GrabaMusica[$i]['duracion'],$GrabaMusica[$i]['nomarch'],$GrabaMusica[$i]['genero'],$accion,$feactivo);
		$idCancion=$c->altaCancion($conex);
		echo $idCancion;
		echo "</br>";
		echo "</br>";
		
		if ($idCancion){
			$pc = new PerteneceCancion ('',$GrabaMusica[$i]['interprete'],$idCancion,$activ,$feactivo);
			$idPerteneceCancion = $pc->altaPerteneceCancion($conex);
			
			if($idPerteneceCancion){
				
				echo $idPerteneceCancion;
				echo "</br>";
				echo "</br>";
				$ca = new ContieneAlbum ('',$GrabaMusica[$i]['album'],$idPerteneceCancion,$activ,$feactivo);
				$okContieneAlbum = $ca->altaContieneAlbum($conex);
				
				if($okContieneAlbum){
					
					echo "Di de alta OK";
				
				}else{
					
					echo "Falló el alta en ContieneAlbum";
					
				}
				
			}else{
				
				echo "No se grabó la tupla en la tabla PerteneceCancion";
				
			}
			
		}else{
			
			echo "No se grabó la tupla en la tabla Cancion";
		}
		
		
	}else{
		// guardo las canciones que existen de a una para luego mostrar un window.alert con el listado de canciones que ya existen en la base de datos
		
		$CancionesQueExisten[$i]= ['cancion' =>$GrabaMusica[$i]['titulo']];
		
	}
		
	
/*
echo "HOLA MANOLA";
echo "</br>";
echo $cuenta;
echo "</br>";
echo $GrabaMusica[$i]['nomarch'];
echo "</br>";
echo $GrabaMusica[$i]['titulo'];
echo "</br>";
echo $GrabaMusica[$i]['interprete'];
echo "</br>";
echo $GrabaMusica[$i]['album'];
echo "</br>";
echo $GrabaMusica[$i]['genero'];
echo "</br>";	
echo $GrabaMusica[$i]['duracion'];
echo "</br>";
echo $GrabaMusica[$i]['anio'];
echo "</br>";
echo $GrabaMusica[$i]['track'];
echo "</br>";
echo "</br>";

*/
}

echo "</br>";
echo "</br>";
echo "Canciones que existen en BD";
var_dump($CancionesQueExisten);

?>