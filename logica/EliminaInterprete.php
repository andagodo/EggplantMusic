<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$idi=trim($_POST['idi']);
$u= new Interprete ($idi);
$nom=$u->NombreInterprete($conex);
$ok=$u->eliminaInterprete($conex);

if ($ok){
	?>
	<script language="javascript">
		window.alert("Se dio de baja el intérprete: <?php echo $nom[0][0]?> exitosamente.");
		location.href="/presentacion/Menu.php";
	</script>	
	<?php
}else{
	?>
	<script language="javascript">
		window.alert("Ocurrió un error, no se eliminó el Interprete: <?php echo $nom[0][0]?>.");
		location.href="/presentacion/Menu.php";
	</script>	
	<?php	
}
?>