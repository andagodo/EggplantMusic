<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsmenu.js"></script>	
			
<div class="row">
<div class="col-lg-10">
<?php

$mus=$_POST['mus'];
$Cuenta=count($mus);
$ba = new Admin('','',$mai);
$datos_ba=$ba->consultaTipoAdmin($conex);
$Cuenta=count($datos_ba);

?>	

				<form role="form" method="POST" id="bajaadminid" name="bajaadminid" action="/logica/EliminaAdmin.php">
                        <h4>Administradores A Eliminar:</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
							<div class="form-group">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Mail</th>
                                        <th>Fecha Alta</th>
                                    </tr>
                                </thead>
								<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
								?>
								
                                <tbody>
                                    <tr>
                                        <td><?php echo $datos_ba[$i][0]?></td>
                                        <td><?php echo $datos_ba[$i][1]?></td>
                                        <td><?php echo $datos_ba[$i][2]?></td>
									</tr>
									
								<?php
								}
								?>
			
								</tbody>

								<td><button class="btn btn-default" onClick="VerificaCampo()">Eliminar Listado</button></td>
								<td><button class="btn btn-default">Agregar Selección</button></td>

								</form>
							</div>	
                            </table>
                        </div>
                </div>
				
			</div>