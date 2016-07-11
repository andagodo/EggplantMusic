<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
session_start();
$conex = conectar();
?>

			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['idi'])){
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