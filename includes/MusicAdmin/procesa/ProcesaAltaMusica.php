<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
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
	$titulo = $mixinfo['tags']['id3v2']['title'][0];
	$artista = $mixinfo['comments_html']['artist'][0];
	$genero = $mixinfo['comments']['genre'][0];
	$duracion = $mixinfo['playtime_string'];
	$anio = $mixinfo['comments_html']['year'][0];
	$track = $mixinfo['comments']['track'][0];		
	$i ++;
	
	$Canciones[] = array('nomarch' => $NomArch, 'titulo' => $titulo, 'artista' => $artista, 'genero'=> $genero, 'duracion' => $duracion, 'anio' => $anio, 'track' => $track);		
	
}

echo json_encode($Canciones);
		
?>
			<div class="row">
                <div class="col-lg-10">

<?php			
/*				if (isset($_POST['idi'])){
					$idi=trim($_POST['idi']);
					$ba = new PerteneceCancion('',$idi);
					$datos_ba=$ba->buscaInterpreteCancion($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['idg'])){
					
					$idg=trim($_POST['idg']);
					$ba = new Cancion('','','','',$idg);
					$datos_ba=$ba->consultaCancionGenero($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['nom'])){
					
					$nom=trim($_POST['nom']);
					$ba = new Cancion('',$nom);
					$datos_ba=$ba->buscaNombreCancion($conex);
					$Cuenta=count($datos_ba);

				}else{
					$Cuenta = 0;
				}
			?>		
					<form role="form" action='/logica/EliminaCancion.php' method="POST">
                        <h4>Canciones:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Duración</th>
                                        <th>Género</th>
                                    </tr>
                                </thead>
								<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
								?>
								
                                <tbody>
                                    <tr>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="idc" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2] ?></td>
                                        <td><?php echo $datos_ba[$i][3]?></td>
									</tr>
									
								<?php
								}
								?>
			
								</tbody>
								<button type="submit" class="btn btn-default">Eliminar</button>
								
								</form>
							</div>	
                            </table>
                        </div>
                </div>
				
			</div>
*/
?>