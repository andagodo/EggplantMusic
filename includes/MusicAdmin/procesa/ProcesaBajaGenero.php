<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
$conex = conectar();

if (isset($_POST['desc'])){
	$desc=trim($_POST['desc']);
	$ba = new Genero ('','',$desc);
	$datos_ba=$ba->buscaDescGenero($conex);
	$Cuenta=count($datos_ba);
}elseif (isset($_POST['nom'])){
	$nom=trim($_POST['nom']);
	$ba = new Genero ('',$nom);
	$datos_ba=$ba->buscaNombreGenero($conex);
	$Cuenta=count($datos_ba);
}else{
	$Cuenta = 0;
}
?>
<div class="row">
	<div class="col-lg-10">			
		<form role="form" action='/logica/EliminaGenero.php' method="POST">
			<h4>Géneros:</h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Selección</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Canciones con Género asociado</th>
								<th>Nuevo Género asociado</th>
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$Cuenta;$i++){
							$cg= new Cancion ('','','','',$datos_ba[$i][0]);
							$canciones=$cg->CuentaCancionGenero($conex);
						?>
						<tbody>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="idg" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>" required>
										</label>
									</div>
								</td>
								<td><?php echo $datos_ba[$i][1]?></td>
								<td><?php echo $datos_ba[$i][2]?></td>
								<td><?php echo $canciones[0][0]?></td>
								<td>
									<select class="form-control" name='idgnu'>
										<?php
										$gen = new Genero($datos_ba[$i][0]);
										$resultGen = $gen->consultaGeneroSinUno($conex);
										$Cuenta2 = count($resultGen);
										?>
										<option value="" disabled selected>Seleccione género</option>
										<?php
										for ($g=0;$g<$Cuenta2;$g++){
											$valor = $resultGen[$g][0];
										?>
											<option value="<?php echo $valor;?>"><?php echo $resultGen[$g][1];?></option>
										<?php
										}
										?>
									</select>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<button type="submit" class="btn btn-default">Eliminar</button>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>