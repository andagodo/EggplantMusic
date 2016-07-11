<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
$conex = conectar();
?>

			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['pais'])){
					$pais=trim($_POST['pais']);
					$ba = new Interprete ('','','',$pais);
					$datos_ba=$ba->buscaPaisInterprete($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['nom'])){
					
					$nom=trim($_POST['nom']);
					$ba = new Interprete ('',$nom);
					$datos_ba=$ba->buscaNombreInterprete($conex);
					$Cuenta=count($datos_ba);
					
				}else{
					$Cuenta = 0;
				}
			?>		
					<form role="form" action='/logica/EliminaInterprete.php' method="POST">
                        <h4>Intérpretes:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Pais</th>
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
													<input type="radio" name="idi" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
												</label>
											</div>
										</td>
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