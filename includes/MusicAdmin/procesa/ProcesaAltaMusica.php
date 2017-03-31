<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/getid3/getid3.php';
session_start();

$conex = conectar();
$i=0;
echo "</br><b><u>ADVERTENCIAS:</u></b></br>";

// Almaceno en $arch cada archivo subido y repito la siguiente secuencia para cada uno de ellos.
foreach ($_FILES['ArchivoSubido']['tmp_name'] as $arch ){
	
	//Guardo el contenido del archivo en una variable y lo encodeo con Base64, y genero la ruta y nombre del archivo con una función.
	$archivo1 = file_get_contents($arch);
	$archivoEncoded = base64_encode($archivo1);
	$NombreArchivoClave = GenerarClave(20,false);
	$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/audio/testBack/";
	$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave;

	// Si el nombre del archivo ya existe, creo otro.
	if(file_exists($NombreArchivo)){
		$NombreArchivoClave = GenerarClave(20,false);
		$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/audio/testBack/";
		$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave;
	}

	// Creo el archivo físico y lo guardo en el servidor con el nombre que generé, si no puedo guardar algún archivo: mensaje de error y salgo al menú.
	if($archivo = fopen($NombreArchivo, "a")){
		if(fwrite($archivo, $archivoEncoded)){
			$RutasCancion[] = $NombreArchivoClave;
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
	
	// Creo un elemento de tipo getID3 para analizar los archivos que cargué al servidor.
	$getID3 = new getID3;
	$mixinfo = $getID3->analyze($arch);
	getid3_lib::CopyTagsToComments($mixinfo);
	$NomArch = $RutasCancion[$i];
	
	// Si no tengo el titulo de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable titulo.
	if (!isset ($mixinfo['tags']['id3v2']['title'][0])){
		$interprete = $mixinfo['comments_html']['artist'][0];
		if (!isset ($mixinfo['comments_html']['artist'][0])){
			$interprete = "-SIN INTERPRETE-";
		}
		echo "- Una de las canciones del interprete '".$interprete;
		echo "' no tiene asignado el título en los metadatos";
		echo "</br>";
		$titulo = "";
	}else{
		$titulo = $mixinfo['tags']['id3v2']['title'][0];
	}

	// Si no tengo el interprete de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable interprete.
	if (!isset ($mixinfo['comments_html']['artist'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el interprete en los metadatos";
		echo "</br>";
		$interprete = "";
	}else{
		$interprete = $mixinfo['comments_html']['artist'][0];
	}
	
	// Si no tengo el album de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable album.
	if (!isset ($mixinfo['comments']['album'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el álbum en los metadatos";
		echo "</br>";
		$album = "";
	}else{
		$album = $mixinfo['comments']['album'][0];
	}

	// Si no tengo el género de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable genero.
	if (!isset ($mixinfo['comments']['genre'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el género en los metadatos";
		echo "</br>";
		$genero = 0;
	}else{
		$genero = $mixinfo['comments']['genre'][0];
	}	

	// Si no tengo la duración de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable duracion.
	if (!isset ($mixinfo['playtime_string'])){
		echo "No se pudo calcular la duración de la canción: '".$titulo;
		echo "'. </br>";
		$duracion = 0;
	}else{
		$duracion = $mixinfo['playtime_string'];
	}		
	
	// Si no tengo el año de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable anio.
	if (!isset ($mixinfo['comments_html']['year'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el año en los metadatos";
		echo "</br>";
		$anio = "";
	}else{
		$anio = $mixinfo['comments_html']['year'][0];
	}

	// Si no tengo el track de la canción muestro un mensaje en pantalla y si lo tengo lo almaceno en la variable track.
	if (!isset ($mixinfo['comments']['track'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el track en los metadatos";
		echo "</br>";
		$track = "0";
	}else{
		$track = $mixinfo['comments']['track'][0];
	}	
	
	// Recolecto los datos de todas las canciones y las almaceno en el array Canciones.
	$Canciones[$i] = ['nomarch' => $NomArch, 'titulo' => $titulo, 'interprete' => $interprete, 'album' => $album, 'genero'=> $genero, 'duracion' => $duracion, 'anio' => $anio, 'track' => $track ];
	$i ++;
}

// Si no me falta ningún dato de los metadatos muesto el mensaje "N/A" debajo de Advertencias.
if (isset ($mixinfo['tags']['id3v2']['title'][0]) && isset ($mixinfo['comments_html']['artist'][0]) && isset ($mixinfo['comments']['album'][0]) && isset ($mixinfo['comments']['genre'][0]) && isset ($mixinfo['playtime_string']) && isset ($mixinfo['comments_html']['year'][0]) && isset ($mixinfo['comments']['track'][0])){
	echo "<b>- N/A</b></br>";
}

$o = 0;
echo "</br><b><u>NOTAS:</u></b></br>";

foreach ($Canciones as $tema){
	
	$int = new Interprete('',$tema['interprete']);
	$resultadoInt = $int->buscaInterprete($conex);
	if ($resultadoInt){
		if ($resultadoInt[0][2] == "S" ){
			$AltaInterprete = "0";
		}elseif($resultadoInt[0][2] == "N" ){
			$AltaInterprete = "0N";
			//	El interprete existe pero está deshabilitado.
		}
		$GrabaM[$o]['interprete']= $resultadoInt[0][0];
	}else{
		// Si no encuentro en la BD el interprete, cargo el interprete que vienen de los metadatos del archivo para mostrarlos en pantalla o guardarlos en la BD.
		$resultadoInt[0][1] = $tema['interprete'];
		$AltaInterprete2[$o] = $tema['interprete'];
		$AltaInterprete = "1";
		$GrabaM[$o]['interprete']= $tema['interprete'] . "EggplantMusicC19fog7oU3HiK";
	}										

	$alb = new Album('',$tema['album']);
	$resultadoAlb = $alb->buscaAlbum($conex);
	if ($resultadoAlb){
		if ($resultadoAlb[0][2] == "S" ){
			$AltaAlbum = "0";
		}elseif($resultadoAlb[0][2] == "N" ){
			$AltaAlbum = "0N";
			//	el album existe pero está deshabilitado
		}
		$GrabaM[$o]['album']= $resultadoAlb[0][0];
	}else{
		// Si no encuentro en la BD el Album, cargo el album que vienen de los metadatos del archivo para mostrarlos en pantalla o guardarlos en la BD.
		$resultadoAlb[0][1] = $tema['album'];
		$AltaAlbum = "1";
		$GrabaM[$o]['album']= $tema['album'] . "EggplantMusicC19fog7oU3HiK";;
	}

	$gen = new Genero('',$tema['genero']);
	$resultadoGen = $gen->buscaGenero($conex);
	if ($resultadoGen){
		$AltaGenero = "0";		
	}else{
		// Si no encuentro en la BD el género, cargo el género que vienen de los metadatos del archivo para mostrarlos en pantalla o guardarlos en la BD.
		$resultadoGen[0][1] = $tema['genero'];
		$AltaGenero = "1";
	}
	
	if ($AltaInterprete != "0" || $AltaAlbum != "0" || $AltaGenero != "0"){
		echo "</br><b>Canción:</b> ";
		echo $tema['titulo'];
		echo "</br>";
		if ($AltaInterprete === "1" ){
			echo "- No existe Interprete: \"" .  $tema['interprete'] ."\" en base de datos, utilice el formulario a continuación para dar de alta.";
			echo "</br>";
		}
		if ($AltaInterprete === "0N" ){
			echo "- Existe el Interprete: \"" .  $tema['interprete'] ."\" en base de datos, pero se encuentra deshabilitado, se habilitará.";
			echo "</br>";
		}
		
		if($AltaAlbum === "1"){
			echo "- No existe Álbum: \"" . $tema['album'] . "\" en base de datos, utilice el formulario a continuación para dar de alta.";
			echo "</br>";
		}
		if($AltaAlbum === "0N"){
			echo "- Existe Álbum: \"" . $tema['album'] . "\" en base de datos, pero se encuentra deshabilitado, se habilitará.";
			echo "</br>";
		}
	
		if($AltaGenero == "1"){
		echo "- No existe Género: \"" . $tema['genero'] . "\" en base de datos, seleccione el que corresponda en el listado de canciones.";
		echo "</br>";
		}
	}

//	Generar un array con los datos de todos los temas para Mostrar en página.
$MuestraMusica[$o] = ['nomarch' => $tema['nomarch'], 'titulo' => $tema['titulo'], 'interprete' => $resultadoInt[0][1], 'album'=> $resultadoAlb[0][1], 'genero'=> $resultadoGen[0][1], 'duracion' => $tema['duracion'], 'anio' => $tema['anio'], 'track' => $tema['track'] ];
$o++;
}

// Si tengo en base de datos el Intérprete, Álbum y Género de todas las canciones muesto el mensaje "N/A" debajo de Notas.
if ($AltaInterprete == "0" && $AltaAlbum == "0" && $AltaGenero == "0"){
	echo "<b>- N/A</b>";
}
?>
<div class="page-header"></div>
<form role="form" action='/logica/ProcesaGrabaMusica.php' enctype="multipart/form-data" method="POST">
<?php

if (isset ($AltaInterprete2) && $AltaInterprete2 != "0"){
	
	// Utilizo array_unique para no dar de alta dos veces el mismo interprete.
	$ArrayInterpretes = array_unique($AltaInterprete2);
foreach ($ArrayInterpretes as $AltaInterp){
	?>
	</br><label>Datos del nuevo Intérprete:</label></br>
	<div class="row">
		<div class="col-lg-2">
			<p>Nombre:</p>
			<input class="form-control" value="<?php echo $AltaInterp;?>" name="nombreinterprete[]" required></input>
		</div>
		<div class="col-lg-2">
			<p>País:</p>
			<select class="form-control" name='paisinterprete[]' required>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/includes/selectpais.php';
			?>
			</select>
		</div>
		<div class="col-lg-2">
			<p>Foto Intérprete:</p>
			<input type="file" name='fotointerprete[]' accept=".jpg" required/>
		</div>
	</div>
	<?php
	}
}

if ($AltaAlbum == "1"){
	?>
	</br><label>Datos del nuevo Álbum:</label></br>
	<div class="row">
		<div class="col-lg-2">
			<p>Nombre:</p>
			<input class="form-control" value="<?php echo $tema['album'];?>" name="nombrealbum[]" required></input>
		</div>	
		<div class="col-lg-2">
			<p>Año:</p>
			<input class="form-control" value="<?php echo $tema['anio'];?>" maxlength="4" min="1900" max="2100" type="number" size="25" name='anioalbum[]' placeholder="Año Álbum" requiered></input>
		</div>
		<div class="col-lg-2">
			<p>Foto Álbum:</p>
			<input type="file" name='fotoalbum[]' accept=".jpg" required/>
		</div>
	</div>
	<?php
}
?>
<div class="page-header"></div>
<div class="row">
	<div class="col-lg-10">
		</br><h4><u>Canciones:</u></h4>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<div class="form-group">
					<thead>
						<tr>
							<th>Título</th>
							<th>Interprete</th>
							<th>Álbum</th>
							<th>Género</th>
							<th>Duración</th>
							<th>Año</th>
							<th>Track</th>
						</tr>
					</thead>
					<?php
					$gm=0;
					foreach ($MuestraMusica as $muestraM){
						?>
						<tbody>
							<tr>
								<input class="form-control" type="hidden" id="nomarch[]" name="nomarch[]" value="<?php echo $muestraM['nomarch']; ?>" />
								<?php $muestraMtit = substr($muestraM['titulo'], 0,30);?>
								<td><input class="form-control" size="15" id="titulo[]" name="titulo[]" maxlength="30" value="<?php echo $muestraMtit;?>" required/></td>
								<td><?php echo $muestraM['interprete'];?></td>
								<input type="hidden" name="interprete[]" value="<?php echo $GrabaM[$gm]['interprete'];?>" />
								<td><?php echo $muestraM['album'];?></td>
								<input type="hidden" name="album[]" value="<?php echo $GrabaM[$gm]['album'];?>"/>
								<?php
								$gen = new Genero('',$muestraM['genero']);
								$resultadoGen = $gen->buscaGenero($conex);
								if ($resultadoGen){
									?>	
									<td>
										<select class="form-control" name='idg[]'>
											<option value="<?php echo $resultadoGen[0][0];?>" selected required><?php echo $muestraM['genero'];?></option>
											<?php
											$gen = new Genero();
											$resultGen = $gen->consultaTodosGenero($conex);
											$CuentaG=count($resultGen);
											for ($g=0;$g<$CuentaG;$g++){
												?>
												<option value="<?php echo $resultGen[$g][0];?>"><?php echo $resultGen[$g][1];?></option>
												<?php
											}
											?>
										</select>
									</td>
									<?php
								}else{
									$gen = new Genero();
									$resultGen = $gen->consultaTodosGenero($conex);
									$CuentaG=count($resultGen);
									?>
									<td>
										<select class="form-control" name='idg[]' required>
											<option value="00" disabled>Seleccione Género</option>
											<?php
											for ($g=0;$g<$CuentaG;$g++){
												?>
												<option value="<?php echo $resultGen[$g][0];?>"><?php echo $resultGen[$g][1];?></option>
												<?php
											}
											?>
										</select>
									</td>
									<?php
									$gm++;
								}
								?>
								<td><?php echo $muestraM['duracion'];?></td>
								<input type="hidden" name="duracion[]" value="<?php echo $muestraM['duracion'];?>" /> 
								<td><?php echo $muestraM['anio'];?></td>
								<td><input class="form-control" size="3" name="track[]" value="<?php echo $muestraM['track'];?>" required/></td>
							</tr>
								<?php
								}
								?>
						</tbody>
						<div class="col-lg-3">
							<p>Estado de Canciones:</p>
						</div>
						<div class="col-lg-3">
							<select class="form-control" name='accion' required>
								<option value="A">Para Aprobar</option>
								<option value="S">Habilitada</option>
							</select>
						</div>
						<div class="col-lg-3">
							<button type="submit" class="btn btn-default"><b><u>Alta Canciones</u></b></button>
						</div>
					</br></br></br>
				</div>	
			</table>
		</div>
	</div>
</div>
</form>
<?php