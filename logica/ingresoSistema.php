<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '../clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '../logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$mai=trim($_POST['NomUsuario']);
$pass=trim($_POST['PassUsuario']);
$_SESSION["mai"] = $mai;

$salt = '34a@$#aA9823$';
$pass= hash('sha512', $salt . $pass);

$conex = conectar();
$u= new Admin ('','',$mai,$pass);

$ok=$u->coincideLoginAdmin($conex);


if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo " Bienvenid@ $mai";
        echo "</td>";
    echo "</tr>";
    echo "</table>";
	

	?>
     
  <script language="javascript">
  
   location.href="/presentacion/Menu.php";

 </script>  
  <?php
}

else
{
   ?>
 <script language="javascript">
 
   window.alert("El Usuario o Password no es correcto.");
   location.href="/presentacion/indice.php";
 </script>
  <?php
  
}
desconectar($conex);

?>
