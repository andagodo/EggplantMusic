<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
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
///////////////////////////////////////////TIMEOUT//////////////////////////////////////////////////
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
      session_unset();
      session_destroy();
    ?>
    <script language="javascript">
      window.alert("Tiempo de espera excedido.");
      location.href="/";
    </script>
    <?php
  }else{
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  }
 ///////////////////////////////////////////TIMEOUT//////////////////////////////////////////////////
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
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
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