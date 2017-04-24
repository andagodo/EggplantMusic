<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
$conex = conectar();

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
<div class="row">
	<div class="col-lg-10">			
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
								<th>Canciones asociadas</th>
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$Cuenta;$i++){
							$as = new Interprete ($datos_ba[$i][0]);
							$datos_as=$as->CuentaCancionesAsociadas($conex);
						?>
						<tbody>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="idi" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>" required>
										</label>
									</div>
								</td>
								<td><?php echo $datos_ba[$i][1]?></td>
								<td><?php echo $datos_ba[$i][3]?></td>
								<td><?php echo $datos_as[0][0];?></td>
							</tr>	
						<?php
						}
						?>
						</tbody>
						<label>NOTA:</label><p> Se deshabilitarán las canciones y álbums asociadas al intérprete</p>
						<button type="submit" class="btn btn-default">Eliminar</button>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>