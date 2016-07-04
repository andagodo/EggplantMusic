<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
$conex = conectar();
?>

		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Álbumes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Álbumes
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
			
				<div class="col-lg-3">
					<form role="form" action='/includes/MusicAdmin/BajaAlbum.php' method="POST">

                        <div class="form-group">
                            <label>Nombre de Álbum:</label>
							<input class="form-control" name='nom' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>	
			

				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaAlbum.php' method="POST">

                        <div class="form-group">
                            <label>Año del Álbum:</label>
							<input class="form-control" name='anio' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>				

				</div>
				
			</div>
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['anio'])){
					$anio=trim($_POST['anio']);
					$ba = new Album ('','',$anio);
					$datos_ba=$ba->buscaAnioAlbum($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['nom'])){
					
					$nom=trim($_POST['nom']);
					$ba = new Album ('',$nom);
					$datos_ba=$ba->buscaNombreAlbum($conex);
					$Cuenta=count($datos_ba);
					
				}else{
					$Cuenta = 0;
				}
			?>		
					<form role="form" action='/logica/EliminaAlbum.php' method="POST">
                        <h4>Álbumes:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Año</th>
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
													<input type="radio" name="ida" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
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