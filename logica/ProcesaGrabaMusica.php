<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/getid3/getid3.php';

session_start();
$conex = conectar();
$activ="S";
$feactivo=date("d/m/Y");

// DOY DE ALTA LOS INTERPRETES QUE NO ESTABAN EN BASE DE DATOS Y GUARDO SU ID EN $IDI
if (isset ($_POST['nombreinterprete'])){
	$nombreinterprete = $_POST['nombreinterprete'];
	$paisinterprete= $_POST['paisinterprete'];
	$fotointerprete= $_FILES['fotointerprete']['tmp_name'];
	$i=0;
	
	foreach($nombreinterprete as $AltaInterprete){
		$img = file_get_contents($fotointerprete[$i]);
		$NombreArchivoClave = GenerarClave(20,false);
		$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/img/test/";
		$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave . ".jpg";
		$NombreArchivoBD = $NombreArchivoClave . ".jpg";
		
		$a= new Interprete ('',$AltaInterprete,$NombreArchivoBD,$paisinterprete[$i],$activ,$feactivo);
		$idi[$i]=$a->altaInterprete($conex);
		if ($idi){
			if($archivo = fopen($NombreArchivo, "a")){
				if(fwrite($archivo, $img)){
				}else{
					?>
					<script language="javascript">
						window.alert("No pudieron guardar los archivos.\nIntente Nuevamente");
						location.href="/presentacion/Menu.php";
					</script>	
					<?php
				}
				fclose($archivo);
			}
		}
	$i++;
	}
}

// DOY DE ALTA LOS ALBUMS QUE NO ESTABAN EN BASE DE DATOS Y GUARDO SU ID EN $IDA
if (isset ($_POST['nombrealbum'])){
	$nombrealbum= $_POST['nombrealbum'];
	$anioalbum= $_POST['anioalbum'];
	$fotoalbum= $_FILES['fotoalbum']['tmp_name'];
	$a=0;
	
	foreach($nombrealbum as $AltaAlbum){
		$imgAl = file_get_contents($fotoalbum[$a]);
		$NombreArchivoClaveAl = GenerarClave(20,false);
		$NombreArchivo1Al = $_SERVER['DOCUMENT_ROOT'] . "/img/test/";
		$NombreArchivoAl = $NombreArchivo1Al . $NombreArchivoClaveAl . ".jpg";
		$NombreArchivoBDAl = $NombreArchivoClaveAl . ".jpg";		

		$al= new Album ('',$AltaAlbum,$anioalbum[$a],$NombreArchivoBDAl,$activ,$feactivo);
		$ida[$a]=$al->altaAlbum($conex);
		if ($ida){
		
			if($archivoAl = fopen($NombreArchivoAl, "a")){
				if(fwrite($archivoAl, $imgAl)){
				}else{
					?>
					<script language="javascript">
						window.alert("No pudieron guardar los archivos.\nIntente Nuevamente");
						location.href="/presentacion/Menu.php";
					</script>	
					<?php
				}
				fclose($archivoAl);
			}
			$album[$a] = $ida;
		}
	$a++;
	}
}

// ESTOS SON LOS DATOS DE LOS ARCHIVOS QUE SUBIERON
$nomarch = $_POST['nomarch'];
$titulo = $_POST['titulo'];
$interprete = $_POST['interprete'];
$album = $_POST['album'];
$genero = $_POST['idg'];
$duracion = $_POST['duracion'];
$track = $_POST['track'];

// ESTA ES LA ACCIÓN DE LAS CANCIONES SUBIDAS A = PARA APROBAR / S = HABILITADA
$accion = $_POST['accion'];

$cuenta=count($nomarch);

for ($i=0;$i<$cuenta;$i++){

	if (strpos($interprete[$i],"EggplantMusicC19fog7oU3HiK") !== false){
		$interprete[$i] = str_replace("EggplantMusicC19fog7oU3HiK", "", $interprete[$i]);
		$int = new Interprete('',$interprete[$i]);
		$resultadoInt = $int->buscaInterprete($conex);
		$interprete[$i] = $resultadoInt[0][0];
	}
	
	if (strpos($album[$i],"EggplantMusicC19fog7oU3HiK") !== false){
		$album[$i] = str_replace("EggplantMusicC19fog7oU3HiK", "", $album[$i]);
		$alb = new Album('',$album[$i]);
		$resultadoAlb = $alb->buscaAlbum($conex);
		$album[$i] = $resultadoAlb[0][0];
	}
	
	$inte = new Interprete($interprete[$i]);
	$datos_int=$inte->buscaIDInterpreteNoAct($conex);
	$CuentaInt=count($datos_int);
	if ($CuentaInt != 0){
		$inOK=$inte->HabilitaInterprete($conex);
		if($inOK == false){
			?>
			<script language="javascript">
				window.alert("Falló habilitar el Intérprete que se encuentra deshabilitado.\nIntente Nuevamente");
				location.href="/presentacion/Menu.php";
			</script>	
			<?php				
		}
	}
	
	$albu = new Album($album[$i]);
	$datos_alb=$albu->buscaIdAlbumNoAct($conex);
	$CuentaAlb=count($datos_alb);
	if ($CuentaAlb != 0){
		$alOK=$albu->ActivaAlbum($conex);
		if($alOK == false){
			?>
			<script language="javascript">
				window.alert("Falló habilitar el Álbum que se encuentra deshabilitado.\nIntente Nuevamente");
				location.href="/presentacion/Menu.php";
			</script>	
			<?php				
		}
	}
	
	$ec = new Cancion ('',$titulo[$i],$duracion[$i],'',$interprete[$i]);
	$ExisteCancion = $ec->ExisteCancion($conex);

	if ($ExisteCancion == false){
		$c= new Cancion ('',$titulo[$i],$duracion[$i],$nomarch[$i],$genero[$i],$accion,$feactivo);
		$idCancion=$c->altaCancion($conex);
		
		if ($idCancion){
			$pc = new PerteneceCancion ('',$interprete[$i],$idCancion,$activ,$feactivo);
			$idPerteneceCancion = $pc->altaPerteneceCancion($conex);
			
			if($idPerteneceCancion){
				$ca = new ContieneAlbum ('',$album[$i],$idPerteneceCancion,$activ,$feactivo);
				$okContieneAlbum = $ca->altaContieneAlbum($conex);
				
				if($okContieneAlbum){
					
					echo "Di de alta OK";
				
				}else{
					?>
					<script language="javascript">
						window.alert("Falló el alta en la tabla 'ContieneAlbum'.\nIntente Nuevamente");
						location.href="/presentacion/Menu.php";
					</script>	
					<?php					
				}
			}else{
				?>
				<script language="javascript">
					window.alert("Falló el alta en la tabla 'PerteneceCancion'.\nIntente Nuevamente");
					location.href="/presentacion/Menu.php";
				</script>	
				<?php					
			}
		}else{
			?>
			<script language="javascript">
				window.alert("Falló el alta en la tabla 'Cancion'.\nIntente Nuevamente");
				location.href="/presentacion/Menu.php";
			</script>	
			<?php				
		}
	}else{
		
		// guardo las canciones que existen de a una para luego mostrar un window.alert con el listado de canciones que ya existen en la base de datos
		$CancionesQueExisten[$i] = $titulo[$i];
	}
}

echo "</br>";
echo "</br>";
echo "Canciones que existen en BD";
var_dump($CancionesQueExisten);


?>