<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
$conex = conectar();

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


<div class="row">
    <div class="col-lg-10">
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
							<tbody>
								<?php
								for ($i=0;$i<$Cuenta;$i++)
								{
								?>                           
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
						</div>				
		</form>
								
                    </table>
                </div>
    </div>
</div>