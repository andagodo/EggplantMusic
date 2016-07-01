<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/MenuMusicAdmin.php"; ?>


		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Géneros
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Géneros
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
			
				<div class="col-lg-3">
					<form role="form" action='/includes/MusicAdmin/BajaGenero.php' method="POST">

                        <div class="form-group">
                            <label>Nombre de Género:</label>
							<input class="form-control" name='nom' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>	
			

				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaGenero.php' method="POST">

                        <div class="form-group">
                            <label>Descripción del Género:</label>
							<input class="form-control" name='desc' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>				

				</div>
				
			</div>
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['desc'])){
					$desc=trim($_POST['desc']);
					$ba = new Genero ('','',$desc);
					$datos_ba=$ba->buscaDescGenero($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['nom'])){
					
					$nom=trim($_POST['nom']);
					$ba = new Genero ('',$nom);
					$datos_ba=$ba->buscaNombreGenero($conex);
					$Cuenta=count($datos_ba);
					
				}else{
					$Cuenta = 0;
				}
			?>		
					<form role="form" action='/logica/EliminaGenero.php' method="POST">
                        <h4>Géneros:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
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
													<input type="radio" name="idg" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
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

<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>