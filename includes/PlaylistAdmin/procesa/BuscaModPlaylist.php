<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
$conex = conectar();

$nompl=trim($_POST['nompl']);
$cancion=trim($_POST['cancion']);
	
if ($cancion == ""){
	$ba = new Playlist ('',$nompl);
	$datos_ba=$ba->BuscoLikeNombrePlaylist($conex);
	$Cuenta=count($datos_ba);

}elseif ($nompl == ""){
	$ba = new Cancion ('',$cancion);
	$datos_ba=$ba->BuscoCancionEnPL($conex);
	$Cuenta=count($datos_ba);

}else{
	$Cuenta = 0;
}


?>
<script src="/estilos/js/jquery.form.js"></script>
<script>
	(function() {
		var respuesta = $('#PROCESAMODPLAYLIST');
	$('form').ajaxForm({
		beforeSend: function() {
			respuesta.empty();
		},
		complete: function(xhr) {
			respuesta.html(xhr.responseText);
		}
	}); 
	})();
</script>

<div class="row">
	<div class="col-lg-4">		
		<form action='/includes/PlaylistAdmin/procesa/ProcesaModPlaylist.php' method="POST" enctype="multipart/form-data">
			<h4><u>Playlists:</u></h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Selección</th>
								<th>Nombre</th>
								<th>Canciones asociadas</th>
							</tr>
						</thead>
						<?php
						for ($i=0;$i<$Cuenta;$i++){
							$as = new Playlist ($datos_ba[$i][0]);
							$datos_as=$as->CuentaCancionesPlaylist($conex);
						?>
						<tbody>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="idpl" id="idpl" value="<?php echo $datos_ba[$i][0]?>"required>
										</label>
									</div>
								</td>
								<td><?php echo $datos_ba[$i][1]?></td>
								<td><?php echo $datos_as[0][0];?></td>
							</tr>	
						<?php
						}
						?>
						</tbody>
						<button type="submit" class="btn btn-default">Modificar Seleccionada</button> 
					</div>	
				</table>
			</div>
		</form>
	</div>
</div>