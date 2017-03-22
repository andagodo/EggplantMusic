<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/getid3/getid3.php';
session_start();

$conex = conectar();

$i=0;

foreach ($_FILES['ArchivoSubido']['tmp_name'] as $arch ){

	$archivo1 = file_get_contents($arch);
	$archivoEncoded = base64_encode($archivo1);
	$NombreArchivoClave = GenerarClave(20,false);
	$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/audio/test/";
	$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave;

	if(file_exists($NombreArchivo)){
		
		$NombreArchivoClave = GenerarClave(20,false);
		$NombreArchivo1 = $_SERVER['DOCUMENT_ROOT'] . "/audio/test/";
		$NombreArchivo = $NombreArchivo1 . $NombreArchivoClave;

	}

	if($archivo = fopen($NombreArchivo, "a")){
		if(fwrite($archivo, $archivoEncoded)){
			$RutasCancion[] = $NombreArchivoClave;
		}else{
			?>
			<script language="javascript">
				window.alert("NO se guardo el archivo.");
			</script>	
			<?php
		}
		fclose($archivo);
	}
	
	$getID3 = new getID3;
	$mixinfo = $getID3->analyze($arch);
	getid3_lib::CopyTagsToComments($mixinfo);
	
	$NomArch = $RutasCancion[$i];
	
	if (!isset ($mixinfo['tags']['id3v2']['title'][0]) || !isset ($mixinfo['comments_html']['artist'][0]) || !isset ($mixinfo['comments']['album'][0]) || !isset ($mixinfo['comments']['genre'][0]) || !isset ($mixinfo['playtime_string']) || !isset ($mixinfo['comments_html']['year'][0]) || !isset ($mixinfo['comments']['track'][0])){
		
		echo "<b><u>ADVERTENCIA:</u></b></br>";
		
	}
	
	if (!isset ($mixinfo['tags']['id3v2']['title'][0])){
		echo "- Una de las canciones del interprete '".$interprete;
		echo "' no tiene asignado el título en los metadatos";
		echo "</br>";
		$titulo = "";
	}else{
		$titulo = $mixinfo['tags']['id3v2']['title'][0];
	}

	if (!isset ($mixinfo['comments_html']['artist'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el interprete en los metadatos";
		echo "</br>";
		$interprete = "";
	}else{
		$interprete = $mixinfo['comments_html']['artist'][0];
	}
	
	if (!isset ($mixinfo['comments']['album'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el álbum en los metadatos";
		echo "</br>";
		$album = "";
	}else{
		$album = $mixinfo['comments']['album'][0];
	}

	if (!isset ($mixinfo['comments']['genre'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el género en los metadatos";
		echo "</br>";
		$genero = 0;
	}else{
		$genero = $mixinfo['comments']['genre'][0];
	}	

	if (!isset ($mixinfo['playtime_string'])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignada la duración en los metadatos";
		echo "</br>";
		$duracion = 0;
	}else{
		$duracion = $mixinfo['playtime_string'];
	}		
	
	if (!isset ($mixinfo['comments_html']['year'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el año en los metadatos";
		echo "</br>";
		$anio = "";
	}else{
		$anio = $mixinfo['comments_html']['year'][0];
	}

	if (!isset ($mixinfo['comments']['track'][0])){
		echo "- La canción '".$titulo;
		echo "' no tiene asignado el track en los metadatos";
		echo "</br>";
		$track = "";
	}else{
		$track = $mixinfo['comments']['track'][0];
	}	
	

	$Canciones[$i] = ['nomarch' => $NomArch, 'titulo' => $titulo, 'interprete' => $interprete, 'album' => $album, 'genero'=> $genero, 'duracion' => $duracion, 'anio' => $anio, 'track' => $track ];		
	
	$i ++;
}

									$o = 0;
									
									echo "</br><b><u>NOTAS:</u></b></br>";
									
									foreach ($Canciones as $tema)
									{
										
									$int = new Interprete('',$tema['interprete']);
									$resultadoInt = $int->buscaInterprete($conex);
									if ($resultadoInt){
										echo "- Existe Interprete en BD - ";
										echo $resultadoInt[0][1]; //$o define la posisión de la canción, 0 es el ID de Interprete y 1 es nombre del Interprete
										echo "</br>";		
									}else{
										echo "- No existe Interprete en BD, será dado de Alta: ";
										echo $tema['interprete'];
										echo "</br>";	
									}										
									
									$alb = new Album('',$tema['album']);
									$resultadoAlb = $alb->buscaAlbum($conex);
									if ($resultadoAlb){
										echo "- Existe Álbum en BD - ";
										echo $resultadoAlb[0][1]; //$o define la posisión de la canción, 0 es el ID de álbum y 1 es nombre del álbum
										echo "</br>";		
									}else{
										echo "- No existe Álbum en BD, será dado de Alta: ";
										echo $tema['album'];
										echo "</br>";	
									}
									
									$gen = new Genero('',$tema['genero']);
									$resultadoGen = $gen->buscaGenero($conex);
									if ($resultadoGen){
										echo "- Existe Género en BD - ";
										echo $resultadoGen[0][1]; //$o define la posisión de la canción, 0 es el ID de género y 1 es nombre del género
										echo "</br>";		
									}else{
										echo "- No existe Género en BD, será dado de Alta: ";
										echo $tema['genero'];
										echo "</br>";	
									}
									
//	Generar un array con los datos de todos los temas
										$GrabaMusica[$o]= ['nomarch' => $tema['nomarch'], 'titulo' => $tema['titulo'], 'interprete' => $resultadoInt[0][0], 'album'=> $resultadoAlb[0][0], 'genero'=> $resultadoGen[0][0], 'duracion' => $tema['duracion'], 'anio' => $tema['anio'], 'track' => $tema['track'] ];
										?>
										

<div class="row">
                <div class="col-lg-10">
				
					<form role="form" action='/includes/MusicAdmin/procesa/ProcesaGrabaMusica.php' method="POST">
                        <h4><u>Canciones:</u></h4>
						<div class="table-responsive">
							
                        

                            <table class="table table-hover table-striped">
							<div class="form-group">
								
                                <thead>
								
                                    <tr>
										<th>Selección</th>
										<th>Título</th>
                                        <th>Interprete</th>
										<th>Álbum</th>
                                        <th>Género</th>
                                        <th>Duración</th>
										<th>Año</th>
										<th>Track</th>
                                    </tr>
                                </thead>
								
						
                                <tbody>
                                    <tr>
										<td>
											<div class="checkbox">
												<label>
					<!--							<input type="checkbox" name="nombrearch[]" id="optionsRadios1" value="<?php// echo $tema['nomarch']?>"> -->
												</label>
											</div>
										</td>
                                        <td><input size="15" value="<?php echo $tema['titulo']?>"/></td>
					<!--				<input type="hidden" name="titulo[]" value="<?php// echo $tema['titulo']?>" /> 	-->
                                        <td><input size="15" value="<?php echo $tema['interprete'] ?>"/></td>
					<!--				<input type="hidden" name="interprete[]" value="<?php// echo $tema['interprete']?>" /> 	-->
										<td><input size="15" value="<?php echo $tema['album']?>"/></td>
                                        <td><input size="7" value="<?php echo $tema['genero']?>"/></td>
					<!--				<input type="hidden" name="genero" value="<?php// echo $resultadoGen ?>" /> 	-->
										<td><input size="3" value="<?php echo $tema['duracion']?>"/></td>
					<!--				<input type="hidden" name="duracion[]" value="<?php// echo $tema['duracion']?>" /> 	-->
                                        <td><input size="3" maxlength="4" value="<?php echo $tema['anio'] ?>"/></td>
					<!--				<input type="hidden" name="anio[]" value="<?php// echo $tema['anio']?>" /> 	-->
                                        <td><input size="3" value="<?php echo $tema['track']?>"/></td>
					<!--				<input type="hidden" name="track[]" value="<?php// echo $tema['track']?>" /> -->
									</tr>
									
								<?php
								$o++;
								}
								/*
								echo $GrabaMusica[0]['titulo'];
								echo "</br>";
								echo $GrabaMusica[1]['titulo'];
								echo "</br>";
								var_dump($serialized);
								echo "</br>";
								*/
								
								$serialized = serialize($GrabaMusica);
								$serialized = ereg_replace("\"", "'", $serialized);  
								?>
								<!-- Envia el array $grabamusica[] que contiene todos los datos de las cacnciones	-->
								<input type="hidden" name="GrabaMusica" value="<?php echo $serialized;?>" />
								
								</tbody>
								<div class="col-lg-3">
								<select class="form-control" name='accion'>
									<option value="A">Para Aprobar</option>
									<option value="S">Habilitada</option>
								</select>
							</div>
								<button type="submit" class="btn btn-default">Alta Canciones</button>
								
								</form>
							</div>	
                            </table>
                        </div>
                </div>
				
			</div>
	