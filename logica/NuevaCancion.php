<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php


$conex = conectar();

// $usr= new Persona ('','','','',$_SESSION["login"]);
// $IDPersona=$usr->consultaIDPersona($conex);

//$idc =trim($_POST['idc']);
$nom=trim($_POST['nom']);
$dur=trim($_POST['dur']);
$ruta=trim($_POST['ruta']);
$idg=trim($_POST['idg']);
$activ="S";
$feactivo=date("d/m/Y");



$conex = conectar();
$c= new Cancion ('',$nom,$dur,$ruta,$idg,$activ,$feactivo);
$ok=$c->altaCancion($conex);
echo $ok;
?>

<script language="javascript">

window.alert("test");
window.alert($ok);

</script>

<?php

echo json_encode($ok);

// desconectar($conex);
 
?>