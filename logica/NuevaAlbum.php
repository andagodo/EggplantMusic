<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$nom=trim($_POST['nom']);
$anio=trim($_POST['anio']);
$arch= $_FILES['foto']['tmp_name'];
$activ="S";
$feactivo=date("Y-m-d");
$img = file_get_contents($arch);

$NombreArchivoClave = GenerarClave(20,false);
$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/img/";
$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
$NombreArchivoBD = $NombreArchivoClave . ".jpg";

$a = new Album ('',$nom);
$ea=$a->buscaAlbum($conex);
$cuenta = count($ea);

if ($cuenta != 0){

	if ($ea[0][2] == 'S'){
		?>
		<script language="javascript">
			window.alert("El Álbum ya existe, y está habilitado.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("El Álbum está deshabilitado \nPuede activarlo en Álbums -> Modifica Álbum.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
	
}else{
	
	$a= new Album ('',$nom,$anio,$NombreArchivoBD,$activ,$feactivo);
	$ok=$a->altaAlbum($conex);
	if ($ok){
		
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
			window.alert("Alta de Álbum exitosa.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrió un problema al dar de Alta el Álbum.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
}
?>