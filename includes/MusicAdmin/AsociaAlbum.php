<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
$conex = conectar();
?>
		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Asocia Canción - Album
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Asocia Canción - Album
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<?php
			$ca = new ContieneAlbum();
			$datos_ca=$ca->consultaCACancion($conex);
			$Cuenta=count($datos_ca);
			?>
			
			<p><b>NOTA: </b>Sólo se muestran canciones que tengan asociado un intérprete.</p>
			<div class="row">
                <div class="col-lg-6">
					<h4>Canciones sin Álbum:</h4>
					<form role="form" action='/logica/CancionAlbum.php' method="POST">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Nombre</th>
                                        <th>Duración</th>
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
													<input type="radio" name="idpc" id="optionsRadios1" value="<?php echo $datos_ca[$i][0]?>" required>
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ca[$i][1]?></td>
                                        <td><?php echo $datos_ca[$i][2]?></td>
									</tr>
									
								<?php
								}
								?>
			
								</tbody>
							</div>	
                            </table>
                        </div>
				</div>
				<div class="col-lg-6">
					<h4>Asociación:</h4></br>
					
					<?php
					$album = new ContieneAlbum();
					$datos_al=$album->consultaAlbum($conex);
					$Cuenta=count($datos_al);
					?>
					
					<select class="form-control" name='ida' required>
						<option value="00">Álbum</option>
						<?php
						for ($i=0;$i<$Cuenta;$i++)
						{
						?>
							<option value="<?php echo $datos_al[$i][0]?>"  ><?php echo $datos_al[$i][1]?> // <?php echo $datos_al[$i][2]?></option>
						<?php
						}
						?>
                    </select></br>
					
					<button type="submit" class="btn btn-default">Aplicar Asociación</button>
						
				</div>

				</form>

			</div>

		</div>
	</div>