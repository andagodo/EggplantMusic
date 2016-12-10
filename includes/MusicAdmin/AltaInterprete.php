<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
session_start();
$conex = conectar();

if(! isset($_SESSION["mai"])){
	?>
 <script language="javascript">
   window.alert("Debes de estar logeado para ingresar a esta página.");
   location.href="/presentacion/indice.php";
 </script>
 <?php
}

?>

		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alta de Intérprete
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alta de Intérprete
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<?php
			$ge = new Interprete();
			$datos_ge=$ge->consultaTodosInterprete($conex);
			$Cuenta=count($datos_ge);
			?>
			
			
			<div class="row">
                <div class="col-lg-6">
						<h4>Intérpretes:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Nombre</th>
                                        <th>Pais</th>
                                    </tr>
                                </thead>
								<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
								?>
								
                                <tbody>
                                    <tr>
                                        <td><?php echo $datos_ge[$i][1]?></td>
                                        <td><?php echo $datos_ge[$i][3]?></td>
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
					<h4>Alta de Intérpretes:</h4></br>
					<form role="form" action='/logica/NuevaInterprete.php' method="POST">
					
					    <div class="form-group">
                            <label>Nombre:</label>
                            <input class="form-control" placeholder="Ejemplo: Bob Marley." name='nomi' required/>
                        </div>
						
					    <div class="form-group">
                            <label>LInk Imágen:</label>
                            <input class="form-control" placeholder="Ejemplo: /images/Bob Marley." name='foto' required/>
                        </div>
						
						<div class="form-group">
							<label>País:</label>
								<input type="text" class="form-control" name='pais' required/>
						</div>
						
						</br>
						<button type="submit" class="btn btn-default">Alta Intérprete</button>
						
						</div>

					</form>

			</div>

		</div>
	</div>