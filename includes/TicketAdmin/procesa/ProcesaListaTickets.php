<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
<?php


$fechainicio=date_create($_POST['fechaini']);
$feini = date_format($fechainicio, 'd/m/Y');
$fechafin=date_create($_POST['fechafin']);
$fefin = date_format($fechafin, 'd/m/Y');
$filtroasunto=trim($_POST['filtroasunto']);
$filtrousuario=trim($_POST['filtrousuario']);
$estado=trim($_POST['estado']);

if ($fechainicio >= $fechafin ){
	?>
	<script language="javascript">
		window.alert("La fecha de inicio debe de ser menor a la final.");
	</script>
	<?php
}else{
	
$ti = new Ticket ('',$filtrousuario,$feini,$filtroasunto,'','',$estado,'',$fefin);
$Tickets = $ti->ListaTickets($conex);
$Cuenta = count($Tickets);

?>	
<div class="row">
	<div class="col-lg-12">	
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<div class="form-group">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Mail</th>
							<th>Fecha</th>
							<th>Asunto</th>
							<th>Texto</th>
							<th>Respuesta</th>
							<th>Estado</th>
						</tr>
					</thead>
					<?php
					for ($i=0;$i<$Cuenta;$i++){
						
						if ($Tickets[$i][5] == "G"){
							$resuelto = "Generado";
						}elseif($Tickets[$i][5] == "P"){
							$resuelto = "En Proceso";
						}elseif($Tickets[$i][5] == "R"){
							$resuelto = "Si";
						}
						
						if ($Tickets[$i][4] == ""){
							$respuesta = "N/A";
						}else{
							$respuesta = $Tickets[$i][4];
						}
					?>
					<tbody>
						<tr>
							<td><?php echo $Tickets[$i][6]?></td>
							<td><?php echo $Tickets[$i][7]?></td>
							<td><?php echo $Tickets[$i][8]?></td>
							<?php
							$formatofecha = DateTime::createFromFormat('Y-m-d', $Tickets[$i][1]);
							$fecha = $formatofecha->format('d/m/Y');
							?>									
							<td><?php echo $fecha?></td>
							<td><?php echo $Tickets[$i][2]?></td>
							<td><?php echo $Tickets[$i][3]?></td>
							<td><?php echo $respuesta?></td>
							<td><?php echo $resuelto?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</div>	
			</table>
		</div>
	</div>
</div>
<?php
}