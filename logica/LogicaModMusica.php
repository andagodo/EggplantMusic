<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$ID=$_POST['ID'];
$item=$_POST['item'];
$nom=$_POST['nom'];

if ($item == "cancion"){
	
	$idg=$_POST['idg'];
	
	if($nom == "" && $idg == "" && !isset($_POST['iditer'])){
		?>
		<script language="javascript">
			window.alert("No modificaste ningún valor de la canción seleccionada.\nVuelva a intentarlo");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
	
	$canc= new Cancion($ID);
	$datoscanc = $canc->consCancionId($conex);
	
	if($nom == ""){
		$nom=$datoscanc[0][1];
	}
	if($idg == ""){
		$idg=$datoscanc[0][4];
	}
	if(isset($_POST['iditer'])){
		$idi=$_POST['iditer'];
	}else{
		$datoInter = $canc->consCancionInterprete($conex);
		$idi=$datoInter[0][0];
	}
	$NuevosDatos= new Cancion($ID,$nom,'','',$idg,$idi);
	$ok= $NuevosDatos->UpdateCancion($conex);
	if ($ok){
		?>
		<script language="javascript">
			window.alert("Actualizaste los datos de la canción: <?php echo $nom?> exitosamente.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php		
		
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrió un error al modificar los datos de la canción: <?php echo $nom?>.\nVuelva a intentarlo.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php			
	}
	
}elseif($item == "album"){
	
	$anio=$_POST['anio'];
	$fotonueva = $_FILES['foto']['tmp_name'];
	$cuentafoto = count($fotonueva);
	
	if ($nom == "" && $anio == "" && $fotonueva == "" ){
		?>
		<script language="javascript">
			window.alert("No modificaste ningún valor del Álbum seleccionado.\nVuelva a intentarlo");
			location.href="/presentacion/Menu.php";
		</script>
		<?php			
	}
	
	$album= new Album($ID);
	$datosalbum = $album->consultaAlbum($conex);	
	
	if ($nom == ""){
		$nom = $datosalbum[0][1];
	}
		
	if ($anio == ""){
		$formatoanio = DateTime::createFromFormat('Y-m-d', $datosalbum[0][2]);
		$anio = $formatoanio->format('Y');			
	}
	
	if ($fotonueva == ""){
		$foto=$datosalbum[0][3];
		
	}else{
		$arch= $_FILES['foto']['tmp_name'];
		$img = file_get_contents($arch);
		$NombreArchivoClave = GenerarClave(20,false);
		$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/img/";
		$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
		$foto = $NombreArchivoClave . ".jpg";
		
		if($archivo = fopen($NombreArchivo, "a")){
			if(fwrite($archivo, $img)){
			}else{
				?>
				<script language="javascript">
					window.alert("NO se guardo la nueva foto.");
				</script>	
				<?php
			}
			fclose($archivo);
		}		
	}
	
	$nuevoalbum= new Album($ID,$nom,$anio,$foto);
	$ok = $nuevoalbum->UpdateAlbum($conex);
	
	if ($ok){
		?>
		<script language="javascript">
			window.alert("Actualizaste los datos del Álbum: <?php echo $nom ?> exitosamente.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrió un problema al modificar el Álbum: <?php echo $nom ?>.\nIntentelo nuevamente.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php			
	}	
}
?>