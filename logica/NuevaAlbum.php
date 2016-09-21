<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

$nom=trim($_POST['nom']);
$anio=trim($_POST['anio']);
$link=trim($_POST['link']);
$activ="S";
$feactivo=date("d/m/Y");


$conex = conectar();
$a= new Album ('',$nom,$anio,$link,$activ,$feactivo);
$ok=$a->altaAlbum($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto el Álbum: $nom";
			echo " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
        echo "</td>";
    echo "</tr>";
    echo "</table>";

}
else
{
   ?>
 <script language="javascript">
 
   window.alert("El Usuario o Password \n no es correcto.");
   location.href="/presentacion/indice.php";
 </script>
  <?php
  
}
// desconectar($conex);
 
?>
