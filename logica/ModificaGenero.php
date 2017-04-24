<?php
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/presentacion/Menu.php';

?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$conex = conectar();

$idg=trim($_POST['idg']);


if ($_POST['nom'] == "" && $_POST['desc'] == ""){
	?>
	<script language="javascript">
		window.alert("Debes de modificar por lo menos uno de los valores.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}else{

if (!isset ($_POST['nom'])){
	$u= new Genero ($idg);
	$Genero=$u->ConsultaGenero($conex);
	$nom=$Genero[0][0];
	
}else{
	$nom=trim($_POST['nom']);
}
if (!isset ($_POST['desc'])){
	$u= new Genero ($idg);
	$Genero=$u->ConsultaGenero($conex);
	$desc=$Genero[0][1];
	
}else{
	$desc=trim($_POST['desc']);
}

$u= new Genero ($idg,$nom,$desc);
$ok=$u->UpdateGenero($conex);

if ($ok){
	?>
	<script language="javascript">
		window.alert("Se modificaron los datos del género: <?php echo $nom?>  <?php echo $desc?>.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}
}
?>
