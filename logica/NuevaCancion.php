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


try {
$conex = conectar();
$c= new Cancion ('',$nom,$dur,$ruta,$idg);
$ok=$c->altaCancion($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto la cancion: $nom";
			echo " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
        echo "</td>";
    echo "</tr>";
    echo "</table>";

}
}
catch (PDOException $e) {
    print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
	print " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";

}
// desconectar($conex);
 
?>