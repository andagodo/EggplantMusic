<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cuenta.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$tipo=trim($_POST['tipo']);
$playlist=trim($_POST['playlist']);
$precio=trim($_POST['precio']);
$activo=trim($_POST['activo']);
$feactivo=date("Y-m-d");

$conex = conectar();
$u= new Cuenta ('',$tipo,$playlist,$precio,$activo,$feactivo);

$ok=$u->altaCuenta($conex);
if ($ok){

		?>
		<script language="javascript">
			window.alert("Se creo un nuevo tipo de cuenta");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrio un error.\n Vuelva a intentarlo.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
// desconectar($conex);
?>
