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
					$datos_ba=$ba->consultaAdmin($conex);
					$Cuenta=count($datos_ba);
					
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
			?>	
<script>			
	function VerificaCampo(){ 


		if (document.bajaadminid.mus.value != null)
			
			document.getElementById('bajaadminid').action = "/logica/EliminaAdmin.php";

		else
			
			window.alert('Debes de seleccionar al menos un administrador para dar de baja.'  + document.bajaadminid.mus.value );
<!--		$('body').jAlert('Welcome to jAlert Demo Page', "success"); -->

			
	}
	</script>
	
	
					<form role="form" method="POST" id="bajaadminid" name="bajaadminid">
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
											<div class="checkbox">
												<label>
													<input type="checkbox" id="mus" name="mus[]" value="<?php echo $datos_ba[$i][1]?>">
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

								<td><button class="btn btn-default" onClick="VerificaCampo()">Eliminar Listado</button></td>

								</form>
								
							</div>	
                            </table>
                        </div>
                </div>
				
			</div>
			
<div id="BAJAADMIN2"></div>