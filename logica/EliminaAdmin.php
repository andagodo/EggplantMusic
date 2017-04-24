<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$mus=$_POST['mus'];
$Cuenta=count($mus);

for ($i=0;$i<$Cuenta;$i++){
	try {
		$conex = conectar();
		$u= new Admin ('','',$mus[$i]);
		$ok=$u->eliminaAdmin($conex);

		if ($ok){
			?>
			<script language="javascript">
				window.alert("Eliminaste Administrador/es exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
		}
	}catch (PDOException $e) {
		print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
		print " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
	}
	
}
?>