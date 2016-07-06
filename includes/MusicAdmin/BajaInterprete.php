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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Intérpretes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Intérpretes
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
			
				<div class="col-lg-3">
					<form role="form" action='/includes/MusicAdmin/BajaInterprete.php' method="POST">

                        <div class="form-group">
                            <label>Nombre de Intérprete:</label>
							<input class="form-control" name='nom' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>	
			

				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaInterprete.php' method="POST">

                        <div class="form-group">
                            <label>País del Intérprete:</label>
							<input class="form-control" name='pais' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>				

				</div>
				
			</div>
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['pais'])){
					$pais=trim($_POST['pais']);
					$ba = new Interprete ('','','',$pais);
					$datos_ba=$ba->buscaPaisInterprete($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['nom'])){
					
					$nom=trim($_POST['nom']);
					$ba = new Interprete ('',$nom);
					$datos_ba=$ba->buscaNombreInterprete($conex);
					$Cuenta=count($datos_ba);
					
				}else{
					$Cuenta = 0;
				}
			?>		
					<form role="form" action='/logica/EliminaInterprete.php' method="POST">
                        <h4>Intérpretes:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
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
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="idi" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
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