<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/MenuMusicAdmin.php'; ?>


		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alta de Canciónes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alta de Canciónes
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<div class="row">
                <div class="col-lg-6">
					<form role="form" action='/logica/NuevaCancion.php' method="POST">

					
					    <div class="form-group">
                            <label>Nombre Canción:</label>
                            <input class="form-control" placeholder="Ejemplo: Could You Be Loved." name='nom' required/>
                        </div>
						
						<?php
							$g = new Genero();
							$datos_g=$g->consultaTodosGenero($conex);
							$Cuenta=count($datos_g);
						?>

						<div class="form-group">
                            <label>Seleccione Género</label>
                            <select class="form-control" name='idg' required>
								<option value="00">Géneros</option>
									<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
									?>
									<option value="<?php echo $datos_g[$i][0]?>"  ><?php echo $datos_g[$i][1]?> // <?php echo $datos_g[$i][2]?></option>
								<?php
								}
						?>
                            </select>
                        </div>				
			            
						<div class="form-group">
							<label>Duración:</label>
								<div class="form-group input-group">
								<input type="time" class="form-control" name='dur' required/>
							</div>
						</div>
						
						<div class="form-group">
							<label>Ruta del Archivo:</label>
								<input type="text" class="form-control" name='ruta' required/>
						</div>
						</br>
						<button type="submit" class="btn btn-default">Alta Canción</button>
						
						</div>

					</form>
			
			</div>

		</div>
	</div>


 <?php include  $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>