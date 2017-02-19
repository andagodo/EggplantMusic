<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>

<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />

<?php

$mus=$_SESSION["mai"];
$pus=trim($_POST['pus']);

// debe de contener:
// de 8 a 20 caracteres
// minuscula
// mayuscula
// un numero

if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $pus)){
	
	$conex = conectar();
	$u= new Admin ('','',$mus,$pus,'','','','');
	$ok=$u->ActualizarPass($conex);
	
	if ($ok){
	?>
		<script language="javascript">
			window.alert("Has cambiado tu clave exitosamente.");
			location.href="/presentacion/Menu.php";
		</script>  
 
	<?php
	}else{
	?>
	
		<script language="javascript">
			window.alert("Hubo un problema al cambiar tu clave \nIntenta nuevamente.");
			location.href="/presentacion/Menu.php";
		</script>

	<?php
	}
	
} else {
?>

	<script language="javascript">
		window.alert("Tu clave no cumple con los mínimos requisitos de complejidad. \nIntenta nuevamente.");
		location.href="/presentacion/Menu.php";
	</script>

<?php
}

// desconectar($conex);
?>
