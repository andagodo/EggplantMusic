<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
$conex = conectar();

if (isset($_POST['nomint'])){
	$nom=trim($_POST['nomint']);
	$ba = new Interprete ('',$nom);
	$datos_ba=$ba->buscaNombreInterprete($conex);
	$Cuenta=count($datos_ba);
}else{
	$Cuenta = 0;
}
?>
<label>Seleccione un ntérprete:</label>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Selección</th>
					<th>Nombre</th>
					<th>Pais</th>
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
								<input type="radio" name="iditer" id="optionsRadios1" value="<?php echo $datos_ba[$i][0]?>">
							</label>
						</div>
					</td>
					<td><?php echo $datos_ba[$i][1]?></td>
					<td><?php echo $datos_ba[$i][3]?></td>
				</tr>	
			<?php
			}
			?>
			</tbody>
	</table>
</div>