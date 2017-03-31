<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$nomi=trim($_POST['nomi']);
$arch= $_FILES['foto']['tmp_name'];
$pais=trim($_POST['pais']);
$activ="S";
$feactivo=date("d/m/Y");
$img = file_get_contents($arch);

$NombreArchivoClave = GenerarClave(20,false);
$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/img/test/";
$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
$NombreArchivoBD = $NombreArchivoClave . ".jpg";

$i = new Interprete ('',$nomi);
$ei=$i->buscaExisteInterprete($conex);
$cuenta = count($ei);

if ($cuenta != 0){
	if ($ei[0][2] == 'S'){
		?>
		<script language="javascript">
			window.alert("El Intérprete: <?php echo $nomi?> ya existe, y está habilitado.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("El Intérprete: <?php echo $nomi?> está deshabilitado \nPuede activarlo en Intérpretes -> Modifica Intérprete.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
}else{
	
	$a= new Interprete ('',$nomi,$NombreArchivoBD,$pais,$activ,$feactivo);
	$ok=$a->altaInterprete($conex);
	if ($ok){
		
		if(file_exists($NombreArchivo)){
			$NombreArchivoClave = GenerarClave(20,false);
			$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/img/test/";
			$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
		}
		if($archivo = fopen($NombreArchivo, "a")){
			if(fwrite($archivo, $img)){
			}else{
				?>
				<script language="javascript">
					window.alert("NO se guardo el archivo.");
				</script>	
				<?php
			}
			fclose($archivo);
		}
		?>
		<script language="javascript">
			window.alert("Alta de Intérprete: <?php echo $nomi?> exitosa.");
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
?>