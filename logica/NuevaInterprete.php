<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

$nomi=trim($_POST['nomi']);
$arch=trim($_POST['foto']);
$pais=trim($_POST['pais']);
$activ="S";
$feactivo=date("d/m/Y");

$foto = file_get_contents($arch);

$NombreArchivoClave = GenerarClave(20,false);
$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/img/test/";
$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
$NombreArchivoBD = $NombreArchivoClave . ".jpg";

	if(file_exists($NombreArchivo)){
		
		$NombreArchivoClave = GenerarClave(20,false);
		$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/audio/test/";
		$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
		
	}
	if($archivo = fopen($NombreArchivo, "a")){
		if(fwrite($archivo, $foto)){
			echo "FOTO GUARDADA";
			
		}else{
			?>
			<script language="javascript">
				window.alert("NO se guardo el archivo.");
			</script>	
			<?php
		}
		fclose($archivo);
	}
	
$i = new Interprete ('',$nomi);
$ei=$i->buscaExisteInterprete($conex);
$cuenta = count($ei);

if ($cuenta != 0){

	if ($ei[0][2] == 'S'){
		?>
		<script language="javascript">
			window.alert("El Intérprete ya existe.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("El Intérprete está deshabilitado \nPuede activarlo en Intérpretes -> Modifica Intérprete.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
	
}else{
	
	$a= new Interprete ('',$nomi,$NombreArchivoBD,$pais,$activ,$feactivo);
	$ok=$a->altaInterprete($conex);
	if ($ok){
		?>
		<script language="javascript">
			window.alert("Alta de Intérprete exitosa.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrió un problema al dar de Alta el Inérprete.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
}
// desconectar($conex);
 
?>
