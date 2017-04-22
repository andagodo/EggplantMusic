<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
<?php


$fechainicio=date_create($_POST['fechaini']);
$feini = date_format($fechainicio, 'Y-m-d');
$fechafin=date_create($_POST['fechafin']);
$fefin = date_format($fechafin, 'Y-m-d');
$filtroasunto=trim($_POST['filtroasunto']);
$filtrousuario=trim($_POST['filtrousuario']);

if ($fechainicio >= $fechafin ){
	?>
	<script language="javascript">
		window.alert("La fecha de inicio debe de ser menor a la final.");
	</script>
	<?php
}else{
	
$ti = new Ticket ('',$filtrousuario,$feini,$filtroasunto,'','','','',$fefin);
$Tickets = $ti->ResponderTickets($conex);
$Cuenta = count($Tickets);

?>	
<div class="row">
	<div class="col-lg-12">	
		<form role="form" method="POST" action='/logica/RespondeTicket.php'>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Selección</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Mail</th>
								<th>Fecha</th>
								<th>Asunto</th>
								<th>Texto</th>
								<th>Respuesta</th>
								<th>Resuelto</th>
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
								<td>
								<?php
								if ($Tickets[$i][5] == "G" || $Tickets[$i][5] == "P" ){
									?>
									<div class="radio">
										<label>
											<input type="radio" name="idticket" id="optionsRadios1" value="<?php echo $Tickets[$i][0]?>" required>
										</label>
									</div>
									<?php
								}
								?>
								</td>
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
			
			<h4><u>Respuesta de ticket seleccionado:</u></h4>

			<div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						<label>Estado: </label>
						<select class="form-control" name='estadoticket'>
							<option value="P">En Proceso</option>
							<option value="R">Resuelto</option>
						</select>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<textarea class="form-control" rows="3" placeholder="Respuesta del Ticket" name="textoticket" required/>
				</div>
			</div>
			</br>
			<button type="submit" class="btn btn-default" >Responder</button>
			</br></br>
		</form>
	</div>
</div>
<?php
}