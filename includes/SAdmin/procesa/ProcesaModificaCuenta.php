<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cuenta.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				$accion=trim($_POST['accion']);
				
				if ($accion == "habilitar"){
					
					if ($_POST['campo'] == "todos"){					
						
						$ba = new Cuenta();
						$datos_ba=$ba->consultaCuentasDeshab($conex);
						$Cuenta=count($datos_ba);					
					
					}elseif ($_POST['campo'] == "Tipo"){
						$tipo=trim($_POST['texto']);
						$ba = new Cuenta('',$tipo);
						$datos_ba=$ba->buscaTipoCuentaNoAct($conex);
						$Cuenta=count($datos_ba);
							
					}elseif ($_POST['campo'] == "Cant_Playlist"){
						$play=trim($_POST['texto']);
						echo $play;
						$ba = new Cuenta('','',$play);
						$datos_ba=$ba->buscaPlayCuentaNoAct($conex);
						$Cuenta=count($datos_ba);
						
					}elseif ($_POST['campo'] == "Precio"){
						$precio=trim($_POST['texto']);
						$ba = new Cuenta('','','',$precio);
						$datos_ba=$ba->buscaPrecioCuentaNoAct($conex);
						$Cuenta=count($datos_ba);
						
					}else{
						$Cuenta = 0;
					}
					
				}elseif ($accion == "deshabilitar"){
					
					if ($_POST['campo'] == "todos"){
						$ba = new Cuenta();
						$datos_ba=$ba->consultaCuentasHab($conex);
						$Cuenta=count($datos_ba);
					
					}elseif ($_POST['campo'] == "Tipo"){
						$tipo=trim($_POST['texto']);
						$ba = new Cuenta('',$tipo);
						$datos_ba=$ba->buscaTipoCuenta($conex);
						$Cuenta=count($datos_ba);
						
					}elseif ($_POST['campo'] == "Cant_Playlist"){
						$play=trim($_POST['texto']);
						$ba = new Cuenta('','',$play);
						$datos_ba=$ba->buscaPlayCuenta($conex);
						$Cuenta=count($datos_ba);
						
					}elseif ($_POST['campo'] == "Precio"){
						$precio=trim($_POST['texto']);
						$ba = new Cuenta('','','',$precio);
						$datos_ba=$ba->buscaPrecioCuenta($conex);
						$Cuenta=count($datos_ba);
						
					}else{
						$Cuenta = 0;
					}
					
				}elseif ($accion == "modificar"){

					if ($_POST['campo'] == "todos"){
						
						$ba = new Cuenta();
						$datos_ba=$ba->consultaCuentas($conex);
						$Cuenta=count($datos_ba);						
						
					}elseif ($_POST['campo'] == "Tipo"){
						$tipo=trim($_POST['texto']);
						$ba = new Cuenta('',$tipo);
						$datos_ba=$ba->buscaTipoCuentaTodos($conex);
						$Cuenta=count($datos_ba);
						
					}elseif ($_POST['campo'] == "Cant_Playlist"){
						$play=trim($_POST['texto']);
						$ba = new Cuenta('','',$play);
						$datos_ba=$ba->buscaPlayCuentaTodos($conex);
						$Cuenta=count($datos_ba);
						
					}elseif ($_POST['campo'] == "Precio"){
						$precio=trim($_POST['texto']);
						$ba = new Cuenta('','','',$precio);
						$datos_ba=$ba->buscaPrecioCuentaTodos($conex);
						$Cuenta=count($datos_ba);
						
					}else{
						$Cuenta = 0;
					}
				
				}

				
				
			?>	
<script>			
	function VerificaCampoCuenta(){ 


			document.getElementById('ModificaCuenta').action = "/logica/LogicaModificaCuenta.php";			

	}

	</script>
	
	
					<form role="form" name="ModificaCuenta" method="POST" id="ModificaCuenta" ></br>
                        <h4>Cuentas:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Tipo / Nombre</th>
                                        <th>Cantidad Playlist</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
								<input class="form-control" name='accion' style="display:none;" value="<?php echo $accion?>">
								<?php
									
									for ($i=0;$i<$Cuenta;$i++)
									{
								?>
								
                                <tbody>
                                    <tr>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="cuenta" value="<?php echo $datos_ba[$i][0]?>">
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
                                        <td><?php echo $datos_ba[$i][3]?></td>
									</tr>
									
								<?php
								}
								

								if ($accion == "habilitar"){
								?>	<td><button class="btn btn-default" id="ModificaCuentabtn" onClick="VerificaCampoCuenta()">Habilitar Tipo Cuenta</button></td>
								<?php
								}elseif($accion == "deshabilitar"){ 	
								?>	<td><button class="btn btn-default" id="ModificaCuentabtn" onClick="VerificaCampoCuenta()">Deshabilitar Tipo Cuenta</button></td>
								<?php
								}elseif($accion == "modificar"){ 
								
								?>

								<td>
								</br>
								
									<div class="form-group">
										<label>Nombre / Tipo:</label>
										<input class="form-control" name='tipo' required/>
									</div>	

									<div class="form-group">
										<label>Cantidad Playlist:</label>
										<input class="form-control" name='playlist' type="number" min="1" max="9999" required/>
									</div>	
						
									<div class="form-group">
										<label>Precio:</label>
										<input class="form-control" name='precio' type="number" min="1" max="999" required/>
									</div>	
								
									</br>
									<button class="btn btn-default" id="ModificaCuentabtn" onClick="VerificaCampoCuenta()">Modificar Valores</button>
								</td>
								<?php
								}
								?>
								</form>
								</div>				
							
                            </table>
                        </div>
                </div>
				
			</div>
