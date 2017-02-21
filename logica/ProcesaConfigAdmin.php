<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>

<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<script src="/estilos/js/jsmenu.js"></script>

<?php

$mus=$_SESSION["mai"];	// Almacena en variable $mus el mail del usuario que está con la sesión iniciada.

if (! isset($_POST["pusEC"])) {		// Si no se trae por POST a "pusEC" entra en la condición.
	
	$pus=trim($_POST['pus']);		// Almacena en $pus la contraseña del usuario actual.
	$npass=trim($_POST['npass']);	// Almacena en $npass la contraseña del usuario nueva.
	
	if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $npass)){	// Si $npass cumple con las siguientes condiciones accede:
																						// De 8 a 20 caracteres
																						// Una Mayuscula
																						// Una Minuscula
																						// Un nuemro
		$conex = conectar();
		$u= new Admin ('','',$mus,$pus,'','','','');	// Crea un nuevo objeto de tipo Admin con los valores de mail y clave actual.
		$ok=$u->ActualizarPass($conex,$npass);			// Envia a la función ActualizarPass 
		
		if ($ok){		// Si devuelve OK es "true" cumple la condificón y muestra mensaje de cambio de contraseña exitoso.
		?>
			<script language="javascript">
				window.alert("Has cambiado tu clave exitosamente.")
				$("#DASH").load('/includes/ConfigAdmin.php');
			<!--	location.href="/presentacion/Menu.php"; -->
			</script>  
 
		<?php
		}else{		// Si ok es "false" cumple la condificón y muestra mensaje de inconveniente al cambiar la contraseña.
		?>
	
			<script language="javascript">
				window.alert("Hubo un problema al cambiar tu clave \nIntenta nuevamente.")
			<!--	location.href="/presentacion/Menu.php"; -->			
				$("#DASH").load('/includes/ConfigAdmin.php');
			</script>

		<?php
		}
	
	} else {	// Si no cumple con la condición de la contrasaña nueva muestra mensaje de que no cumple con los requisitos mínimos.
	?>	

		<script language="javascript">
			window.alert("Tu clave no cumple con los mínimos requisitos de complejidad. \nIntenta nuevamente.")
			<!--	location.href="/presentacion/Menu.php"; -->			
			$("#DASH").load('/includes/ConfigAdmin.php');
		</script>

	<?php
	}
	
} elseif(isset($_POST["pusEC"])){		// Si trae por POST a "pusEC" entra en la condición.
	
	$pusEC=trim($_POST['pusEC']);		// Almacena en $pusEC la contraseña del usuario para elimiar su cuenta.
	
	$conex = conectar();
	$u= new Admin ('','',$mus,$pusEC,'','','','');	// Crea un nuevo objeto de tipo Admin con los valores de mail y contraseña, lo almacena en $u.
	$ok=$u->eliminaAdminConPass($conex);			// Ejecuta la función eliminaAdminConPass con los datos de $u.
	
	if ($ok){		// Si la contraseña que se envió es correcta, deshabilita al usuaio, muestra mensaje avisando y sale al indice del sistema.
		?>
			<script language="javascript"> 
			window.alert("Has deshabilitado tu usuario.")
			location.href="/presentacion/indice.php";
			</script>
			
		<?php
		}else{		// Si la contraseña que se envió no es correcta, muestra mensaje de error y vuelve a Configuración de Admin.
		?>
	
			<script language="javascript">
				window.alert("Hubo al deshabilitar tu usuario, contraseña incorrecta \nIntenta nuevamente.")
			<!--	location.href="/presentacion/Menu.php"; -->			
				$("#DASH").load('/includes/ConfigAdmin.php');
			</script>

		<?php
		}

}

?>
