<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/getid3/getid3.php';
session_start();

$conex = conectar();
$serialized = $_POST['GrabaMusica'];

$serialized = ereg_replace("'", "\"", $serialized);

// var_dump($serialized);

$GrabaMusica = unserialize($serialized);


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
}

