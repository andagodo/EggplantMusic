<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
$conex = conectar();
?>
		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alta de Género
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alta de Género
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<?php
			$ge = new Genero('','','');
			$datos_ge=$ge->consultaTodosGenero($conex);
			$Cuenta=count($datos_ge);
			?>
			
			
			<div class="row">
                <div class="col-lg-6">
						<h4>Géneros:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Género</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
								<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
								?>
								
                                <tbody>
                                    <tr>
                                        <td><?php echo $datos_ge[$i][1]?></td>
                                        <td><?php echo $datos_ge[$i][2]?></td>
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
					<h4>Alta de Géneros:</h4></br>
					<form role="form" action='/logica/NuevaGenero.php' method="POST">
					    <div class="form-group">
                            <label>Nombre Género:</label>
                            <input class="form-control" placeholder="Ejemplo: Reggae." name='nomg' required/>
                        </div>

						<div class="form-group">
							<label>Descripción:</label>
								<input type="text" class="form-control" name='desc' required/>
						</div>
						</br>
						<button type="submit" class="btn btn-default">Alta Género</button>
						
						</div>

					</form>

			</div>

		</div>
	</div>