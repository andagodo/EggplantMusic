<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/MenuSAdmin.php"; ?>


		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Administradores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Administradores
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
                <div class="col-lg-3">
				
					<form role="form" action='/includes/SAdmin/BajaAdmin.php' method="POST">

                        <div class="form-group">
                            <label>Seleccione Tipo de Administrador:</label>
                            <select class="form-control" name='tus'>
                                <option value="SuperAdmin">Super Administrador</option>
                                <option value="PlaylAdmin">Administrador de Playlists</option>
                                <option value="TicketAdmin">Administrador de Tickets</option>
                                <option value="MusicAdmin">Administrador de Música</option>
                            </select>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>

					
				<form role="form" action='/includes/SAdmin/BajaAdmin.php' method="POST">
				<div class="col-lg-3">
				
					<div class="form-group">
                            <label>Buscador:</label>
                            <select class="form-control" name='campo'>
                                <option value="Nombre_Usr_Sist">Nombre</option>
                                <option value="Mail_Usr_Sist">Mail</option>
                                <option value="Fech_Alta_Usr_Sist">Fecha Alta</option>
                                <option value="Fech_Login_Usr_Sist">Fecha Último Login</option>
                            </select>
                    </div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</div>
				
				<div class="col-lg-3">
					<div class="form-group">
                            <label>Texto</label>
                            <input class="form-control" name='texto' required/>
                    </div>
				</div>
				</form>
			</div>
			
                        		
			
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
						$nomu=trim($_POST['texto']);
						$ba = new Admin('','',$nomu);
						$datos_ba=$ba->buscaMailAdmin($conex);
						$Cuenta=count($datos_ba);
					}
					elseif ($_POST['campo'] == "Fech_Alta_Usr_Sist"){
						$nomu=trim($_POST['texto']);
						$ba = new Admin('','',$nomu);
						$datos_ba=$ba->buscaFAltaAdmin($conex);
						$Cuenta=count($datos_ba);
					}					
					elseif ($_POST['campo'] == "Fech_Login_Usr_Sist"){
						$nomu=trim($_POST['texto']);
						$ba = new Admin('','',$nomu);
						$datos_ba=$ba->buscaFLoginAdmin($conex);
						$Cuenta=count($datos_ba);
					}					
				}else{
					$Cuenta = 0;
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
                                        <th>Fecha Último Login</th>
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

<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>