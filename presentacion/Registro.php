<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Usuario.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
$conex = conectar();

$clave = $_GET["id"];

$u= new Usuario ('','','','','','','','','','',$clave);

$ok=$u->ConfirmaMail($conex);

if ($ok){
	echo "<table  align='center' >";
	echo "<tr height='400'>";
       echo "<td class='leyenda'>";
			echo "Muchas gracias por confirmar tu correo, ahora puedes usar la aplicación.";
			echo " </br><a href=\"\" style='color: black'>Volver</a>";
       echo "</td>";
	echo "</tr>";
	echo "</table>";	
}else{
   ?>
	<script language="javascript">
		window.alert("Fallo la activación por mail.");
		location.href="/portada_front\";
	</script>
<?php
}
?>