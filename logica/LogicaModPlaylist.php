<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/presentacion/Menu.php';
$conex = conectar();

$nombre=trim($_POST['nombre']);
$tags=trim($_POST['tags']);
$activo=trim($_POST['activo']);
$fecha=date("Y-m-d H:i:s");
$idpl=trim($_POST['idpl']);

$PL= new Playlist ($idpl,$nombre,'',$activo,$fecha,$tags);
$mismonombre=$PL->ConsultoNombrePL($conex);
$AhoraNo="0";

if ($nombre != $mismonombre[0][0]){
	
	$existeNombre=$PL->BuscoNombrePlaylist($conex);
	if($existeNombre){
		?>
		<script language="javascript">
			window.alert("El nombre de Playlist que ingresó ya existe.\nPor favor, ingrese otro nombre.");
			$("#DASH").load('/includes/PlaylistAdmin/ModificaPlaylist.php');
		</script>
		<?php
		$AhoraNo="NO";
		}else{
		$AhoraNo="SI";
	}
	
}else{
	$AhoraNo="SI";
}

if($AhoraNo === "SI"){
	$ok=$PL->UpdatePlaylist($conex);
	
	if (isset ($_POST['idca'])){
		$idcaArray=$_POST['idca'];
	
		foreach($idcaArray as $idca){
			$tp=new TienePlaylist($idpl,$idca);
			$okTP=$tp->EliminaCancionPL($conex);
		}
		
		if($ok && $okTP){
			?>
			<script language="javascript">
				window.alert("Se modificó la playlist: <?php echo $nombre?> exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
		}else{
			?>
			<script language="javascript">
				window.alert("Ocurrió un problema con la asignación de las canciones a la playlist.\nPor favor, intente nuevamente.");
				$("#DASH").load('/includes/PlaylistAdmin/ModificaPlaylist.php');
			</script>
			<?php
		}
	}else{
		
		if($ok){
			?>
			<script language="javascript">
				window.alert("Se modificó la playlist: <?php echo $nombre?> exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
		}else{
			?>
			<script language="javascript">
				window.alert("Ocurrió un problema al modificar los datos de la playlist.\nPor favor, intente nuevamente.");
				$("#DASH").load('/includes/PlaylistAdmin/ModificaPlaylist.php');
			</script>
			<?php
		}
		
	}
}
?>