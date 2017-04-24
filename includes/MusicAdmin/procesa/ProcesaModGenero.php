<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
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
		<form role="form" action='/logica/ModificaGenero.php' method="POST">
			<h4>Géneros:</h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Selección</th>
								<th>Nombre</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$Cuenta;$i++){
						?>
						<tbody>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="idg" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>"required>
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
						<div class="col-lg-3">
							<div class="form-group">
								<p>Modificar Nombre: </p>
								<input class="form-control" placeholder="Modificar Nombre" name='nom'/>
							</div>
							<div class="form-group">
								<p>Modificar Descripcción: </p>
								<input class="form-control" placeholder="Modificar Descripcción" name='desc'/>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-default">Modificar</button>
							</div>
						</div>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>