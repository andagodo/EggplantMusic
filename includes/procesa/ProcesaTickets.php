<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
session_start();
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

	
$u= new Admin ('','',$_SESSION["mai"]);
$DatosU=$u->consultaTipoAdmin($conex);
$IDU=$DatosU[0][3];

if ($fechainicio >= $fechafin ){
	?>
	<script language="javascript">
		window.alert("La fecha de inicio debe de ser menor a la final.");
	</script>
	<?php
}else{
	
$ti = new Ticket ('',$IDU,$feini,$filtroasunto,'','','','',$fefin);
$Tickets = $ti->consultaTicket($conex);
$Cuenta = count($Tickets);


?>	
<div class="row">
	<div class="col-lg-12">	
		<form role="form" method="POST" action='/logica/FinalizaTicket.php'>
			<h4><u>Mis Tickets: </u></h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Selección</th>
								<th>Asunto</th>
								<th>Texto</th>
								<th>Fecha</th>
								<th>Respuesta</th>
								<th>Resuelto</th>
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$Cuenta;$i++){
							
							if ($Tickets[$i][6] == "G"){
								$resuelto = "Generado";
							}elseif($Tickets[$i][6] == "P"){
								$resuelto = "En Proceso";
							}elseif($Tickets[$i][6] == "R"){
								$resuelto = "Si";
							}
							
							if ($Tickets[$i][5] == ""){
								$respuesta = "N/A";
							}else{
								$respuesta = $Tickets[$i][5];
							}
						?>
						<tbody>
							<tr>
								<td>
								<?php
								if ($Tickets[$i][6] == "G" || $Tickets[$i][6] == "P" ){
									?>
									<div class="radio">
										<label>
											<input type="radio" name="idt" id="optionsRadios1" value="<?php echo $Tickets[$i][0]?>" required>
										</label>
									</div>
									<?php
								}
								?>
								</td>
								<td><?php echo $Tickets[$i][3]?></td>
								<td><?php echo $Tickets[$i][4]?></td>
								<?php
								$formatofecha = DateTime::createFromFormat('Y-m-d', $Tickets[$i][2]);
								$fecha = $formatofecha->format('d/m/Y');
								?>									
								<td><?php echo $fecha?></td>
								<td><?php echo $respuesta?></td>
								<td><?php echo $resuelto?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
						<button type="submit" class="btn btn-default">Finalizar</button>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>
<?php
}