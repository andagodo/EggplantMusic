<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
$conex = conectar();
?>                      		
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['tus'])){
					$tus=trim($_POST['tus']);
					$ba = new Admin($tus);
					$datos_ba=$ba->consultaAdmin($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['texto'])){
					
					if ($_POST['campo'] == "Nombre_Usr_Sist"){
						$nomu=trim($_POST['texto']);
						$ba = new Admin('','',$nomu);
						$datos_ba=$ba->buscaNombreAdmin($conex);
						$Cuenta=count($datos_ba);
					}
					elseif ($_POST['campo'] == "Mail_Usr_Sist"){
						$mai=trim($_POST['texto']);
						$ba = new Admin('','','',$mai);
						$datos_ba=$ba->buscaMailAdmin($conex);
						$Cuenta=count($datos_ba);
					}
					elseif ($_POST['campo'] == "Fech_Alta_Usr_Sist"){
						$fal=trim($_POST['texto']);
						$ba = new Admin('','','','','',$fal);
						$datos_ba=$ba->buscaFAltaAdmin($conex);
						$Cuenta=count($datos_ba);
					}else{
					$Cuenta = 0;
					}
				}
			?>		
					<form role="form" action='/logica/EliminaAdmin.php' method="POST">
                        <h4>Administradores:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Mail</th>
                                        <th>Fecha Alta</th>
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
													<input type="radio" name="mus" id="optionsRadios1" value="<?php echo $datos_ba[$i][1]?>">
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ba[$i][0]?></td>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
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