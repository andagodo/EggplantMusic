<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$mus=$_POST['mus'];


	try {
		$conex = conectar();
		$u= new Admin ('','',$mus);
		$ok=$u->ActivaAdmin($conex);

		if ($ok){
			?>
			<script language="javascript">
				window.alert("Activaste el Administrador exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
 <?php

		}
	}catch (PDOException $e) {
		print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
		print " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
	}
	


// desconectar($conex);
 
?>
