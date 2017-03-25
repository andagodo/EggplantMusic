<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				$conex = conectar();
				$accion=trim($_POST['accion']);
				$contenido = trim($_POST['contenido']);
				$texto=trim($_POST['texto']);
				
				if ($accion == "habilitar"){
					if ($contenido == "cancion"){
						$c= new Cancion ('',$texto);
						$datos_ba=$c->buscaCancionHabilitar($conex);
						$Cuenta = Count ($datos_ba);
					}elseif ($contenido == "album"){
						$a= new Album ('',$texto);
						$datos_ba=$a->buscaAlbumHabilitar($conex);
						$Cuenta = Count ($datos_ba);					
					}
				}elseif ($accion == "aprobar"){
					if ($contenido == "cancion"){	
						$c= new Cancion ('',$texto);
						$datos_ba=$c->buscaCancionAprobar($conex);
						$Cuenta = Count ($datos_ba);
					}elseif ($contenido == "album"){
						$a= new Album ('',$texto);
						$datos_ba=$a->buscaAlbumAprobar($conex);
						$Cuenta = Count ($datos_ba);					
					}	
				}elseif ($accion == "deshabilitar"){
					if ($contenido == "cancion"){
						$c= new Cancion ('',$texto);
						$datos_ba=$c->buscaCancionDeshabilitar($conex);
						$Cuenta = Count ($datos_ba);				
					}elseif ($contenido == "album"){
						$a= new Album ('',$texto);
						$datos_ba =$a->buscaNombreAlbum($conex);
						$Cuenta = Count ($datos_ba);
					}
				}
			?>	
<script>			
	function VerificaCampo(){ 


			document.getElementById('habilitamusicaid').action = "/logica/LogicaHabilitaMusica.php";			

	}
</script>

					<form role="form" name="habilitamusica" method="POST" id="habilitamusicaid" >
						<?php
						if ($contenido == "cancion"){
						?>
                        <h4>Canciones:</h4>
						<?php
						}elseif ($contenido == "album"){
						?>
						<h4>Álbums:</h4>
						<?php
						}
						?>						
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
									<?php
									if ($contenido == "cancion"){
									?>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Genero</th>
                                        <th>Interprete</th>
									<?php
									}elseif ($contenido == "album"){
									?>	
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Año</th>
									<?php
									}
									?>
                                    </tr>
                                </thead>
								<input class="form-control" name='accion' style="display:none;" value="<?php echo $accion?>">
								<input class="form-control" name='contenido' style="display:none;" value="<?php echo $contenido?>">
								<?php
									
									for ($i=0;$i<$Cuenta;$i++)
									{
								?>
								
                                <tbody>
                                    <tr>
										<td>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="ID[]" value="<?php echo $datos_ba[$i][0]?>">
												</label>
											</div>
										</td>
										<?php
										if ($contenido == "cancion"){
										?>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
                                        <td><?php echo $datos_ba[$i][3]?></td>
										<?php
										}elseif ($contenido == "album"){
										?>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
										<?php
										}
										?>										
									</tr>
									
								<?php
								}
								

								if ($accion == "habilitar"){
								?>	<td><button class="btn btn-default" id="habilitamusica" Value="Habilitar" onClick="VerificaCampo()">Habilitar</button></td>
								<?php
								}elseif($accion == "deshabilitar"){ 	
								?>	<td><button class="btn btn-default" id="habilitamusica" Value="Desabilitar" onClick="VerificaCampo()">Deshabilitar</button></td>
								<?php
								}elseif($accion == "aprobar"){ 
								?><td><button class="btn btn-default" id="habilitamusica" Value="Aprobar" onClick="VerificaCampo()">Aprobar</button></td>
								<?php
								}
								?>
								</form>
								</div>				
							
                            </table>
                        </div>
                </div>
				
			</div>
