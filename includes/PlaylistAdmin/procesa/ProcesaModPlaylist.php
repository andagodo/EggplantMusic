<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';

$conex = conectar();

$idpl=trim($_POST['idpl']);

$ba = new Playlist ($idpl);
$datos_ba=$ba->consultaPlaylist($conex);
$Cuenta=count($datos_ba);

$TP = new TienePlaylist ($idpl);
$idCA =$TP->consultaIDContieneAl($conex);
$CuentaidCA=count($idCA);

for ($i=0;$i<$CuentaidCA;$i++){
	$CA = new ContieneAlbum($idCA[$i][0]);
	$idPC[$i] = $CA->ConsultaIDPerteneceC($conex);
}
$CuentaidPC=count($idPC);

for($c=0;$c<$CuentaidPC;$c++){
	$PC = new PerteneceCancion($idPC[$c][0][0]);
	$idC[$c] = $PC->DatosCancionPC($conex);
}

?>
</br>
<form action='/logica/LogicaModPlaylist.php' method="POST" enctype="multipart/form-data">
<div class="row">
	<div class="col-lg-4">
		<label>Modificar Nombre:</label>
		<input class="form-control" name='nombre' value="<?php echo $datos_ba[0][1]?>" required/>
	</div>
	<div class="col-lg-4">
		<label>Modificar Tags:</label>
		<input class="form-control" name='tags' value="<?php echo $datos_ba[0][5]?>" required/>
	</div>
	<div class="col-lg-1">
		<label>Playlist Activa?</label>
		<select class="form-control" name='activo'>
			<option value="S" selected>Si</option>
			<option value="N">No</option>
		</select>
	</div>
	<input class="form-control" type="hidden" name='idpl' id='idpl' value="<?php echo $idpl;?>" />
</div>
</br>
<div class="row">
	<div class="col-lg-8">
			<h4><u>Canciones Actuales:</u></h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
					<label> Si desea eliminar canciones, márquelas:</label>
						<thead>
							<tr>
								<th>Selección</th>
								<th>Nombre</th>
								<th>Duración</th>
								<th>Intérprete</th>
								<th>Género</th>
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$CuentaidCA;$i++){
						?>
						<tbody>
							<tr>
								<td>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="idca[]" id="idca" value="<?php echo $idCA[$i][0]?>">
										</label>
									</div>
								</td>
								<td><?php echo $idC[$i][0][0]?></td>
								<?php
								$t = microtime(true);
								$d = new DateTime( date('Y-m-d'.$idC[$i][0][1], $t) );
								$dur = $d->format("H:i");
								?>		
								<td><?php echo $dur;?></td>
								<td><?php echo $idC[$i][0][2]?></td>
								<td><?php echo $idC[$i][0][3];?></td>
							</tr>	
						<?php
						}
						?>
						</tbody>
						<button type="submit" class="btn btn-default"><b>Modificar Playlist</b></button>
						</br>
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>
<div class="page-header"></div>
<label><u>Agregar Canciones</u></label></br></br>
<button type="button" class="btn btn-default" onclick="AgregarCancionesPlaylist();">Agregar Canciones</button>
<div id="AGREGACANCIONPLAYLIST"></div>