<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
session_start();
$conex = conectar();
?>
<script src="/estilos/js/jsfunciones.js"></script>
<?php

$contenido=trim($_POST['contenido']);
$idg=trim($_POST['idg']);
$texto=trim($_POST['texto']);
$idpl=trim($_POST['idpl']);

if (empty ($_SESSION['playlistAgregoC'])){
	$_SESSION['playlistAgregoC'] = "";
	$playlist = "";
}
if (empty ($_SESSION['contadorAgregoC'])){
	$_SESSION['contadorAgregoC'] = 0;
}

if ($contenido == "cancion"){
	
	if($idg == "0"){
		$ba = new Cancion('',$texto);
		$datos_ba=$ba->buscaNombreCancion($conex);
		$Cuenta=count($datos_ba);
	}else{
		$ba = new Cancion('',$texto,'','',$idg);
		$datos_ba=$ba->buscaNombreCancionGenero($conex);
		$Cuenta=count($datos_ba);
	}
}elseif($contenido == "album"){
	
	if($idg == "0"){
		$ba = new Cancion('',$texto);
		$datos_ba=$ba->buscaAlbumCancion($conex);
		$Cuenta=count($datos_ba);
	}else{
		$ba = new Cancion('',$texto,'','',$idg);
		$datos_ba=$ba->buscaAlbumCancionGenero($conex);
		$Cuenta=count($datos_ba);
	}
	
}elseif($contenido == "interprete"){
	
	if($idg == "0"){
		$ba = new Cancion('',$texto);
		$datos_ba=$ba->buscaInterpreteCancion($conex);
		$Cuenta=count($datos_ba);
	}else{
		$ba = new Cancion('',$texto,'','',$idg);
		$datos_ba=$ba->buscaInterpreteCancionGenero($conex);
		$Cuenta=count($datos_ba);
	}
	
}else{
	$Cuenta = 0;
}	
?>
<script src="/estilos/js/jquery.form.js"></script>
<script>
	(function() {
		var respuesta = $('#CANCIONESNUEVASPLAYLIST');
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
	<div class="col-lg-10">	
	<form action='/includes/PlaylistAdmin/procesa/ProcesaAgregaCancionPlaylist.php' method="POST" enctype="multipart/form-data">
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<div class="form-group">
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
					for ($i=0;$i<$Cuenta;$i++){
					?>
					<tbody>
						<tr>
							<td>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="idc[]" id="idc" value="<?php echo $datos_ba[$i][0]?>">
									</label>
								</div>
							</td>
							<td><?php echo $datos_ba[$i][1]?></td>
							<?php
							$t = microtime(true);
							$d = new DateTime( date('Y-m-d'.$datos_ba[$i][2], $t) );
							$dur = $d->format("H:i");
							?>
							<td><?php echo $dur?></td>
							<td><?php echo $datos_ba[0][4]?></td>								
							<td><?php echo $datos_ba[$i][3]?></td>
						</tr>
						<input class="form-control" type="hidden" name='idpl' value="<?php echo $idpl;?>" />
						<?php
						}
						?>
					</tbody>
					<input type="submit" class="btn btn-default" value="Listar canciones para agregar"/>
				</form>
				</div>	
			</table>
		</div>
	</div>
</div>
<?php