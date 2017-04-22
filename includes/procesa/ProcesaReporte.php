<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Log_Musica.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
<?php

$objeto=trim($_POST['objeto']);
	$accion=trim($_POST['accion']);
$texto=trim($_POST['texto']);
$cantidad=trim($_POST['cantidad']);
$fechainicio=date_create($_POST['fechaini']);
$feini = date_format($fechainicio, 'Y-m-d');
$fechafin=date_create($_POST['fechafin']);
$fefin = date_format($fechafin, 'Y-m-d');

if ($fechainicio >= $fechafin){
	?>
	<script language="javascript">
		window.alert("La fecha de inicio debe de ser menor a la final.");
	</script>
	<?php
}else{

$rep = new Log_Musica ('','','','','',$accion,'',$feini,$fefin,$texto);

if($objeto == "cancion"){
	$Reporte = $rep->Log_MusicaCancion($conex);
}elseif($objeto == "playlist"){
	$Reporte = $rep->Log_MusicaPlaylist($conex);
}elseif($objeto == "album"){
	$Reporte = $rep->Log_MusicaAlbum($conex);
}elseif($objeto == "interprete"){
	$Reporte = $rep->Log_MusicaInterprete($conex);
}

$cuenta = count($Reporte);
if ($cantidad > $cuenta){
	$cantidad = $cuenta;
}

?>	
<div class="row">
	<div class="col-lg-10">	
		<form role="form" method="POST" id="bajaadminid" name="bajaadminid">
			<h4><u>Reporte generado</u></h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Posición</th>
								<th>Cantidad</th>
							<?php
							if($objeto == "cancion"){
								?>
								<th>Canción</th>
								<th>Intérprete</th>
								<th>Duración</th>
								<th>Género</th>
								<th>Álbum</th>
								<th>Activa</th>								
								<?php
							}elseif($objeto == "playlist"){
								?>
								<th>Playlist</th>
								<th>Fecha Alta</th>
								<th>Activo</th>
								<?php
							}elseif($objeto == "album"){
								?>
								<th>Álbum</th>
								<th>Año</th>
								<th>Activo</th>
								<?php
							}elseif($objeto == "interprete"){
								?>
								<th>Intérprete</th>	
								<th>País</th>
								<th>Activo</th>
								<?php
							}
							?>								
							</tr>
						</thead>
						<?php
						$c=1;
						for ($i=0;$i<$cantidad;$i++){
						?>
						<tbody>
							<tr>
								<td><?php echo $c?></td>
								<td><?php echo $Reporte[$i][0]?></td>
								<?php
								if($objeto == "cancion"){
									?>
									<td><?php echo $Reporte[$i][1]?></td>
									<td><?php echo $Reporte[$i][2]?></td>
									<?php
									$t = microtime(true);
									$d = new DateTime( date('Y-m-d'.$Reporte[$i][3], $t));
									$dur = $d->format("H:i");
									?>
									<td><?php echo $dur?></td>
									<td><?php echo $Reporte[$i][4]?></td>
									<td><?php echo $Reporte[$i][5]?></td>
									<td><?php echo $Reporte[$i][6]?></td>									
									<?php
								}elseif($objeto == "playlist"){
									?>
									<td><?php echo $Reporte[$i][1]?></td>
									<?php
									$formatofecha = DateTime::createFromFormat('Y-m-d H:i:s.u', $Reporte[$i][2]);
									$fecha = $formatofecha->format('d-m-Y');
									?>
									<td><?php echo $fecha?></td>
									<td><?php echo $Reporte[$i][3]?></td>
									<?php
								}elseif($objeto == "album"){
									?>
									<td><?php echo $Reporte[$i][1]?></td>
									<?php
									$formatofecha = DateTime::createFromFormat('Y-m-d', $Reporte[$i][2]);
									$fecha = $formatofecha->format('Y');
									?>
									<td><?php echo $fecha?></td>
									<td><?php echo $Reporte[$i][3]?></td>
									<?php
								}elseif($objeto == "interprete"){
									?>
									<td><?php echo $Reporte[$i][1]?></td>
									<td><?php echo $Reporte[$i][2]?></td>
									<td><?php echo $Reporte[$i][3]?></td>
									<?php
								}
									?>									
							</tr>
							<?php
							$c++;
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