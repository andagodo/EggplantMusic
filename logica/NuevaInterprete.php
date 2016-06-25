<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

$nomi=trim($_POST['nomi']);
$foto=trim($_POST['foto']);
$pais=trim($_POST['pais']);


$conex = conectar();
$a= new Interprete ('',$nomi,$foto,$pais);
$ok=$a->altaInterprete($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto el Intérprete: $nomi";
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
