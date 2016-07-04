<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
$conex = conectar();
?>
		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Asocia Canción - Intérprete
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Asocia Canción - Intérprete
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<?php
			$ac = new PerteneceCancion();
			$datos_ac=$ac->consultaPCCancion($conex);
			$Cuenta=count($datos_ac);
			?>
			
			
			<div class="row">
                <div class="col-lg-6">
					<h4>Canciones sin Intérprete:</h4>
					<form role="form" action='/logica/CancionInterprete.php' method="POST">
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
													<input type="radio" name="idc" id="optionsRadios1" value="<?php echo $datos_ac[$i][0]?>" required>
												</label>
											</div>
										</td>
                                        <td><?php echo $datos_ac[$i][1]?></td>
                                        <td><?php echo $datos_ac[$i][2]?></td>
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
					$album = new PerteneceCancion();
					$datos_al=$album->consultaPCAlbum($conex);
					$Cuenta=count($datos_al);
					?>
					
					<select class="form-control" name='idi'>
						<option value="00" required>Interpretes</option>
						<?php
						for ($i=0;$i<$Cuenta;$i++)
						{
						?>
							<option value="<?php echo $datos_al[$i][0]?>"><?php echo $datos_al[$i][1]?> // <?php echo $datos_al[$i][2]?></option>
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