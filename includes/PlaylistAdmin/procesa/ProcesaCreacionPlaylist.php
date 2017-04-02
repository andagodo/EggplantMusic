<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/PerteneceCancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/ContieneAlbum.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
session_start();
$conex = conectar();
?>
<script src="/estilos/js/jsfunciones.js"></script>
<?php
$Cuenta = 0;

if (!isset($_POST['idc']) && empty ($_SESSION['playlist'])){
	?>
	<script language="javascript">
		window.alert("No seleccionaste ninguna canción para agregar a la playlist.\nPor favor, selecciona canciones.");
	</script>
 <?php
}else{
	
	if (!isset($_POST['idc'])){
		$Variosidc = 0;
		$cuentoIDC = 0;
	}else{
		$Variosidc=$_POST['idc'];
		$cuentoIDC = count ($Variosidc);
	}
	
	$contador = $_SESSION['contador'];
	for($c=0;$c<$cuentoIDC;$c++){
		$_SESSION['playlist'][$contador] = $Variosidc[$c];
		$contador++;
	}
	$_SESSION['contador'] = $contador;
	$IDCMostrar = $_SESSION['playlist'];
?>
<!-- <form role="form" action='/includes/PlaylistAdmin/procesa/DescartaPlaylist.php'> -->
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<div class="form-group">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Duración</th>
					<th>Interprete</th>
					<th>Género</th>
				</tr>
			</thead>
			<?php
			$c=0;
			foreach($IDCMostrar as $idc){
				$ba = new Cancion($idc);
				$datos_cancion=$ba->consCancionId($conex);
				$Cuenta=count($datos_cancion);
				$idcaARRAY[$c]=$ba->ConsultoIDCA($conex);
				$idca[$c]=$idcaARRAY[$c][0][0];
			
			for ($i=0;$i<$Cuenta;$i++){
				
				$idg = $datos_cancion[$i][4];
				$obtengogenero = new Cancion ('','','','',$idg);
				$genero=$obtengogenero->consultaGeneroCancion($conex);
				$obtengointerprete = new PerteneceCancion ('','',$idc);
				$interprete=$obtengointerprete->ConsInterpreteCancion($conex);
				?>
				<tbody>
					<tr>
						<td><?php echo $datos_cancion[$i][1]?></td>
						<td><?php echo $datos_cancion[$i][2]?></td>
						<td><?php echo $interprete[$i][0]?></td>
						<td><?php echo $genero[$i][0]?></td>
					</tr>
				<?php
			}
			$c++;
			}
			$_SESSION['playlistPronta']=$idca;
			?>
			<!-- <input name="idca[]" id="idca" value="<?php print_r($idca)?>" hidden/> -->
				</tbody>
		</div>	
	</table>
	<button id="descartaplaylistID" class="btn btn-default" >Descartar Playlist</button>
<!-- </form> -->
	<button type="button" class="btn btn-default" onclick="AltaPlaylist();"><b><u>Crear Playlist!</u></b></button>
	
</div>
<?php
}
?>