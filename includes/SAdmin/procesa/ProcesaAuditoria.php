<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Log_Transacciones.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
<?php

$fechainicio=date_create($_POST['fechaini']);
$feini = date_format($fechainicio, 'd/m/Y');
$fechafin=date_create($_POST['fechafin']);
$fefin = date_format($fechafin, 'd/m/Y');

if ($fechainicio >= $fechafin ){
	?>
	<script language="javascript">
		window.alert("La fecha de inicio debe de ser menor a la final.");
	</script>
	<?php
}else{
	
$log = new Log_Transacciones ($feini,$fefin);
$Reporte = $log->ConsultaAuditoria($conex);
$Cuenta = count($Reporte);

?>	
<div class="row">
	<div class="col-lg-12">	
		<form role="form" method="POST" id="bajaadminid" name="bajaadminid">
			<h4><u>Log Auditoría Transaccional</u></h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Tipo Transacción</th>
								<th>Tabla</th>
								<th>Clave</th>
								<th>Campo</th>
								<th>Valor Original</th>
								<th>Valor Nuevo</th>
								<th>Fecha</th>
								<th>Usuario BD</th>								
							
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$Cuenta;$i++){
						?>
						<tbody>
							<tr>
								<td><?php echo $Reporte[$i][0]?></td>
								<td><?php echo $Reporte[$i][1]?></td>
								<td><?php echo $Reporte[$i][2]?></td>
								<td><?php echo $Reporte[$i][3]?></td>
								<td><?php echo $Reporte[$i][4]?></td>
								<td><?php echo $Reporte[$i][5]?></td>
								<?php
								$formatofecha = DateTime::createFromFormat('Y-m-d H:i:s.u', $Reporte[$i][6]);
								$fecha = $formatofecha->format('d/m/Y H:i:s');
								?>								
								<td><?php echo $fecha?></td>
								<td><?php echo $Reporte[$i][7]?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>
<?php
}