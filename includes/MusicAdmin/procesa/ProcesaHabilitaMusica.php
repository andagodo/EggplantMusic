<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsmenu.js"></script>	
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				$accion=trim($_POST['accion']);
				$contenido = trim($_POST['contenido']);
				$texto=trim($_POST['texto']);
				
				if ($accion == "habilitar"){
				
					if ($contenido == "cancion"){
						

					}elseif ($contenido == "album"){
					

					}
					
				}elseif ($accion == "deshabilitar"){
				
					if ($contenido == "cancion"){
						

					}elseif ($contenido == "album"){
					

					}
				}
				
				
				
			?>	
<script>			
	function VerificaCampo(){ 


			document.getElementById('modificaadminid').action = "/logica/LogicaModificaAdmin.php";			

	}

	</script>
	
	
					<form role="form" name="modificaadmin" method="POST" id="modificaadminid" >
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
													<input type="radio" name="mus" value="<?php echo $datos_ba[$i][1]?>">
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ba[$i][0]?></td>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
									</tr>
									
								<?php
								}
								

								if ($accion == "habilitar"){
								?>	<td><button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo()">Habilitar</button></td>
								<?php
								}elseif($accion == "deshabilitar"){ 	
								?>	<td><button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo()">Deshabilitar</button></td>
								<?php
								}
								?>
								</form>
								</div>				
							
                            </table>
                        </div>
                </div>
				
			</div>
