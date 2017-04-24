<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$nomg=trim($_POST['nomg']);
$desc=trim($_POST['desc']);
$activ="S";
$feactivo=date("Y-m-d");

$g= new Genero ('',$nomg);
$existeg=$g->buscaLikeGenero($conex);

if ($existeg){
	?>
	<script language="javascript">
		window.alert("Ya existe el género que intenta dar de alta.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}else{

	$a= new Genero ('',$nomg,$desc,$activ,$feactivo);
	$ok=$a->altaGenero($conex);
	if ($ok){
		?>
		<script language="javascript">
			window.alert("Se creo un nuevo Género: <?php echo $nomg?>");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("El Usuario o Password \n no es correcto.");
			location.href="/presentacion/indice.php";
		</script>
		<?php
	}
}
?>