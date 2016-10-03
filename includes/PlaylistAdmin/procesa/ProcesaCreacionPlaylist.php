<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
session_start();
$conex = conectar();


					$Cuenta = 0;
					$idc=trim($_POST['idc']);
					$ba = new Cancion($idc);
					$datos_cancion=$ba->consCancionId($conex);
					$Cuenta=count($datos_cancion);
					
					$playlist = [0][0];

?>
		
				<!--	<form role="form" action='/logica/AltaPlaylist.php' method="POST">	-->
                       
					   <div class="table-responsive">
					   <label>Listado de Canciones:</label>
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Duración</th>
										<th>Interprete</th>
                                        <th>Género</th>
                                    </tr>
                                </thead>
								<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
										$idg = $datos_cancion[$i][4];
										$obtengogenero = new Cancion ('','','','',$idg);
										$genero=$obtengogenero->consultaGeneroCancion($conex);
										
										$obtengointerprete = new PerteneceCancion ('','',$idc);
										$interprete=$obtengointerprete->ConsInterpreteCancion($conex);
										
								?>
								
                                <tbody>
                                    <tr>
										<td><?php echo $datos_cancion[$i][1]?></td>
                                        <td><?php echo $datos_cancion[$i][2]?></td>
										<td><?php echo $interprete[$i][0]?></td>
                                        <td><?php echo $genero[$i][0]?></td>
									</tr>
									
								<?php
								}
								?>
			
								</tbody>
								
								
						<!--		</form>		-->
							</div>	
                            </table>
							<button type="button" class="btn btn-default" onclick="AgregaCancionPlaylist();">Alta de Playlist!</button>
                        </div>