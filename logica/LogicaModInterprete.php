<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();
$idint=$_POST['idint'];
$accion=$_POST['accion'];
$u= new Interprete ($idint);
$nombre=$u->NombreInterprete($conex);

if ($accion == "habilitar"){
	$ok=$u->HabilitaInterprete($conex);
	if ($ok){
		?>
		<script language="javascript">
			window.alert("Activaste el Intérprete: <?php echo $nombre[0][0] ?>.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrió un error al activar el Intérprete: <?php echo $nombre[0][0]?>.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php			
	}
}elseif($accion == "modificar"){
	
	$fotonueva = $_FILES['foto']['tmp_name'];
	$cuentafoto = count($fotonueva);
	
	if ($_POST['nomi'] == "" && !isset($_POST['pais']) && $fotonueva == "" ){
		?>
		<script language="javascript">
			window.alert("No se ingresaron datos para modificar el inérprete.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php			
	}else{
	
		if ($_POST['nomi'] == ""){
			$nomi = $nombre[0][0];
			$noverifico = "S";
		}else{
			$nomi=$_POST['nomi'];
			$noverifico = "N";
		}
		
		if (!isset($_POST['pais'])){
			$pais = $nombre[0][1];		
		}else{
			$pais=$_POST['pais'];
		}
	
		if ($fotonueva == ""){
			$foto=$nombre[0][2];
		
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
						window.alert("NO se guardo el archivo.");
					</script>	
					<?php
				}
				fclose($archivo);
			}		
		}
	
		if($noverifico == "S"){
			$cuentaint = 0;
		}else{
			$bn= new Interprete ('',$nomi);
			$nombreba = $bn->buscaNomInterprete($conex);
			$cuentaint = count ($nombreba);
		}
	
		if ($cuentaint != 0){
			?>
			<script language="javascript">
				window.alert("Ya existe un intérprete con el nombre: <?php echo $nombreba[0][1] ?>.\nPor favor vuelva a intentarlo.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
			
		}else{
			$m= new Interprete ($idint,$nomi,$foto,$pais);
			$ok=$m->ActualizaInterprete($conex);
		
			if ($ok){
			
				?>
				<script language="javascript">
					window.alert("Actualizaste los datos del intérprete: <?php echo $nomi ?> exitosamente.");
					location.href="/presentacion/Menu.php";
				</script>
				<?php
			}else{
				?>
				<script language="javascript">
					window.alert("Ocurrió un problema al modificar el inérprete: <?php echo $nomi ?>.\nIntentelo nuevamente.");
					location.href="/presentacion/Menu.php";
				</script>
				<?php			
			}
		}
	}
}
?>