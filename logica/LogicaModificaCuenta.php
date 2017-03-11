<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cuenta.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$cuenta=$_POST['cuenta'];
$accion=$_POST['accion'];
$feactivo=date("d/m/Y");

if ($accion == "habilitar"){


		$conex = conectar();
		$u= new Cuenta ($cuenta,'','','','',$feactivo);
		$ok=$u->HabilitaCuenta($conex);

		if ($ok){
			?>
			<script language="javascript">
				window.alert("Activaste la Cuenta exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php

		}else{
			?>
			<script language="javascript">
				window.alert("Activaste la Cuenta exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php			
		}
	
}elseif($accion == "deshabilitar"){

		
		$conex = conectar();
		$u= new Cuenta($cuenta);
		$ok=$u->eliminaCuenta($conex,'','','','',$feactivo);
		
		if ($ok){		
			?>
			<script language="javascript">
				window.alert("Deshabilitaste la Cuenta exitosamente");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
			
		}else{
			?>
			<script language="javascript">
				window.alert("Ocurrio un error, Intente nuevamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php			
		}
	
}elseif($accion == "modificar"){
		$conex = conectar();
		$tipo=$_POST['tipo'];
		$play=$_POST['playlist'];
		$precio=$_POST['precio'];
		$u= new Cuenta ($cuenta,$tipo,$play,$precio,'',$feactivo);
		$ok=$u->ActualizaCuenta($conex);
		
		if ($ok){
			?>
			<script language="javascript">
				window.alert("Actualizaste los datos de la cuenta exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
		<?php
		}else{
			?>
			<script language="javascript">
				window.alert("Ocurrió un problema al cambiar el tipo de Administrador.\nIntentelo nuevamente.");
			</script>
		<?php			
			
		}
}
// desconectar($conex);
 
?>
