<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
$conex = conectar();
?>
		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Canciones
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/cargaMenu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Canciones
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
                <div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaMusica.php' method="POST">
						<?php
						$i = new Interprete();
						$datos_i=$i->consultaTodosInterprete($conex);
						$Cuenta=count($datos_i);
						?>
                        <div class="form-group">
                            <label>Seleccione Artista:</label>
                            <select class="form-control" name='idi'>
								<option value="00">Artista</option>
									<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
									?>
									<option value="<?php echo $datos_i[$i][0]?>"  ><?php echo $datos_i[$i][1]?></option>
								<?php
								}
						?>		
							</select>							
							
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>
				
				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaMusica.php' method="POST">
						<?php
						$g = new Genero();
						$datos_g=$g->consultaTodosGenero($conex);
						$Cuenta=count($datos_g);
						?>
                        <div class="form-group">
                            <label>Seleccione Género:</label>
                            <select class="form-control" name='idg'>
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
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>
				
				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaMusica.php' method="POST">

                        <div class="form-group">
                            <label>Nombre de Canción:</label>
							<input class="form-control" name='nom' required/>
                        </div>				
						
						<button type="submit" class="btn btn-default">Consultar</button>
					</form>
				</div>				
			</div>
			
                        		
			
			<div class="row">
                <div class="col-lg-10">
			<?php
				if (isset($_POST['idi'])){
					$idi=trim($_POST['idi']);
					$ba = new PerteneceCancion('',$idi);
					$datos_ba=$ba->buscaInterpreteCancion($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['idg'])){
					
					$idg=trim($_POST['idg']);
					$ba = new Cancion('','','','','','',$idg);
					$datos_ba=$ba->consultaCancionGenero($conex);
					$Cuenta=count($datos_ba);
					
				}elseif (isset($_POST['nom'])){
					
					$nom=trim($_POST['nom']);
					$ba = new Cancion('',$nom);
					$datos_ba=$ba->buscaNombreCancion($conex);
					$Cuenta=count($datos_ba);
					
				}else{
					$Cuenta = 0;
				}
			?>		
					<form role="form" action='/logica/EliminaCancion.php' method="POST">
                        <h4>Canciones:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
										<th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Duración</th>
                                        <th>Género</th>
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
													<input type="radio" name="idc" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
												</label>
											</div>
										</td>
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