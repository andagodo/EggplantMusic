<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsmenu.js"></script>	
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['tus'])){
					$tus=trim($_POST['tus']);
					$ba = new Admin($tus);
					$datos_ba=$ba->consultaAdminNoAct($conex);
					$Cuenta=count($datos_ba);
					
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
			?>	
<script>			
	function VerificaCampo1(){ 


			document.getElementById('modificaadminid').action = "/logica/LogicaModificaAdmin.php";			

	}
	
	function VerificaCampo2(){ 


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
										<th>Activo</th>
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
													<input type="radio" name="mus" value="<?php echo $datos_ba[$i][1]?>">
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ba[$i][0]?></td>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
										<td><?php echo $datos_ba[$i][3]?></td>
									</tr>
									
								<?php
								}
								?>
			
								</tbody>

								<td><button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo1()">Habilitar Admin</button></td>
								<td><button class="btn btn-default" id="ModificaAdmin" Value="Habilitar Admin" onClick="VerificaCampo2()">Habilitar Admin</button></td>

								</form>
								
							</div>	
                            </table>
                        </div>
                </div>
				
			</div>
			
<div id="BAJAADMIN2"></div>