<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$idg=trim($_POST['idg']);
$cg= new Cancion ('','','','',$idg);
$canciones=$cg->CuentaCancionGenero($conex);

if($canciones[0][0] != "0" ){
	
	if (!isset ($_POST['idgnu'])){
		?>
		<script language="javascript">
			window.alert("El Género seleccionado tiene canciones asociadas,\npor favor seleccione un nuevo género al eliminar.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php	
	}else{
		
		$idgnu=$_POST['idgnu'];
		$g=new Cancion ('','','','',$idgnu,$idg);
		$gnu=$g->ActualizaGenero($conex);
		if ($gnu){
			$u= new Genero ($idg);
			$ok=$u->eliminaGenero($conex);
			$nomgen=$u->ConsultaGenero($conex);
			$nomg=$nomgen[0][0];
			if ($ok){
				?>
				<script language="javascript">
					window.alert("Se eliminó exitosamente el género: <?php echo $nomg?> .");
					location.href="/presentacion/Menu.php";
				</script>
				<?php
			}
		}
	}
}else{

	$u= new Genero ($idg);
	$ok=$u->eliminaGenero($conex);
	$nomgen=$u->ConsultaGenero($conex);
	$nomg=$nomgen[0][0];
	if ($ok){
		?>
		<script language="javascript">
			window.alert("Se eliminó exitosamente el género: <?php echo $nomg?> .");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}

}
?>