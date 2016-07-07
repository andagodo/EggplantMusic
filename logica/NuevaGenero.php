<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

$nomg=trim($_POST['nomg']);
$desc=trim($_POST['desc']);


$conex = conectar();
$a= new Genero ('',$nomg,$desc);
$ok=$a->altaGenero($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto el Género: $nomg";
			echo " </br><a href=\"\presentacion\Menu.php\.\" style='color: black'>Volver</a>";
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
