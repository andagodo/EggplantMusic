<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				$accion=trim($_POST['accion']);
				if ($accion == "habilitar"){
				
					if (isset($_POST['tus'])){
						$tus=trim($_POST['tus']);
						$accion=trim($_POST['accion']);	
						$ba = new Admin($tus);
						if ($tus == "todos"){
							$datos_ba=$ba->consultaAdminTodosNoAct($conex);
							$Cuenta=count($datos_ba);								
						}else{
							$datos_ba=$ba->consultaAdminNoAct($conex);
							$Cuenta=count($datos_ba);
						}
					}elseif (isset($_POST['texto'])){
					
						if ($_POST['campo'] == "Nombre_Usr_Sist"){
							$nomu=trim($_POST['texto']);
							$ba = new Admin('',$nomu);
							$datos_ba=$ba->buscaNombreAdminNoAct($conex);
							$Cuenta=count($datos_ba);
						}
						elseif ($_POST['campo'] == "Mail_Usr_Sist"){
							$mai=trim($_POST['texto']);
							$ba = new Admin('','',$mai);
							$datos_ba=$ba->buscaMailAdminNoAct($conex);
							$Cuenta=count($datos_ba);
						}	
						elseif ($_POST['campo'] == "Fech_Alta_Usr_Sist"){
							$fal=trim($_POST['texto']);
							$ba = new Admin('','','','',$fal);
							$datos_ba=$ba->buscaFAltaAdminNoAct($conex);
							$Cuenta=count($datos_ba);
						}else{
							$Cuenta = 0;
						}
					}
				}elseif ($accion == "reiniciar" || $accion == "cambiatipo"){
				
					if (isset($_POST['tus'])){
						$tus=trim($_POST['tus']);
						$accion=trim($_POST['accion']);	
						$ba = new Admin($tus);
						if ($tus == "todos"){
							$datos_ba=$ba->consultaTodosAdmin($conex);
							$Cuenta=count($datos_ba);								
						}else{
							$datos_ba=$ba->consultaAdmin($conex);
							$Cuenta=count($datos_ba);
						}
					}elseif (isset($_POST['texto'])){
					
						if ($_POST['campo'] == "Nombre_Usr_Sist"){
							$nomu=trim($_POST['texto']);
							$ba = new Admin('',$nomu);
							$datos_ba=$ba->buscaNombreAdmin($conex);
							$Cuenta=count($datos_ba);
						}
						elseif ($_POST['campo'] == "Mail_Usr_Sist"){
							$mai=trim($_POST['texto']);
							$ba = new Admin('','',$mai);
							$datos_ba=$ba->buscaMailAdmin($conex);
							$Cuenta=count($datos_ba);
						}	
						elseif ($_POST['campo'] == "Fech_Alta_Usr_Sist"){
							$fal=trim($_POST['texto']);
							$ba = new Admin('','','','',$fal);
							$datos_ba=$ba->buscaFAltaAdmin($conex);
							$Cuenta=count($datos_ba);
						}else{
							$Cuenta = 0;
						}
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
								?>	<td><button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo()">Habilitar Admin</button></td>
								<?php
								}elseif($accion == "reiniciar"){ 	
								?>	<td><button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo()">Reiniciar Contraseña</button></td>
								<?php
								}elseif($accion == "cambiatipo"){ 
								
								?>

								<td>
									<h4>Por cual tipo desea cambiar?:</h4>
									<select class="form-control" name='cambiatipo'>
										<option value="SuperAdmin">Super Administrador</option>
										<option value="PlaylAdmin">Administrador de Playlists</option>
										<option value="TicketAdmin">Administrador de Tickets</option>
										<option value="MusicAdmin">Administrador de Música</option>
									</select>
									</br>
									<button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo()">Cambiar Tipo</button>
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
