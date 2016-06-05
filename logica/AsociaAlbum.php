<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

$idi=trim($_POST['idi']);
$idc=trim($_POST['idc']);


$conex = conectar();
$a= new PerteneceCancion ('',$idi,$idc);
$ok=$a->altaPerteneceCancion($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "La asociación se generó correctamente";
			echo " </br><a href=\"\presentacion\cargaMenu.php\.\" style='color: black'>Volver</a>";
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
