<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$IDS=$_POST['ID'];
$accion=$_POST['accion'];
$contenido=$_POST['contenido'];
$conex = conectar();

/*
$cuenta = count ($IDS);

var_dump($IDS);
echo "</br>";
var_dump($accion);
echo "</br>";
var_dump($contenido);
*/

// aprobar / habilitar / deshabilitar
$i=0;

foreach ($IDS as $id){
	
if ($contenido == 'cancion'){

	if ($accion == "habilitar" || $accion == "aprobar" ){
			$u= new Cancion ($id);
			$ok=$u->ActivaCancion($conex);
			if ($ok){	
				$i++;
			}else{
				?>			
				<script language="javascript">
					window.alert("Ocurrió un error, vuelve a intentarlo.");
					location.href="/presentacion/Menu.php";
				</script>
				<?php
			}
	}elseif($accion == "deshabilitar"){
			$u= new Cancion($id);
			$ok=$u->eliminaCancion($conex);
			if ($ok){
				$i++;
			}else{
				?>			
				<script language="javascript">
					window.alert("Ocurrió un error, vuelve a intentarlo.");
					location.href="/presentacion/Menu.php";
				</script>
				<?php
			}
	}
}elseif($contenido == 'album'){

	if ($accion == "habilitar" || $accion == "aprobar" ){
			$u= new Album ($id);
			$ok=$u->ActivaAlbum($conex);
			if ($ok){	
				$i++;
			}else{
				?>			
				<script language="javascript">
					window.alert("Ocurrió un error, vuelve a intentarlo.");
					location.href="/presentacion/Menu.php";
				</script>
				<?php
			}
	}elseif($accion == "deshabilitar"){
			$u= new Album($id);
			$ok=$u->eliminaAlbum($conex);
			if ($ok){
				$i++;
			}else{
				?>			
				<script language="javascript">
					window.alert("Ocurrió un error, vuelve a intentarlo.");
					location.href="/presentacion/Menu.php";
				</script>
				<?php
			}

	}
	

}
}

if ($contenido == 'cancion'){
	?>			
	<script language="javascript">
		window.alert("Se ha/n modificado <?php echo $i; ?> cancion/es.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}elseif ($contenido == 'album'){
	?>			
	<script language="javascript">
		window.alert("Se ha/n modificado <?php echo $i; ?> album/es.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
	
}				

	
// desconectar($conex);

?>
