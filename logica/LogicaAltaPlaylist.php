<?php
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/presentacion/Menu.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$conex = conectar();

$nompl=trim($_POST['nompl']);
$tags=trim($_POST['tags']);

if ($nompl == ""){
	?>
	<script language="javascript">
		window.alert("No ingresó el nombre de la playlist.\nPor favor, ingrese un nombre.");
		$(document).ready(function() {
			$("#DASH").load('/includes/PlaylistAdmin/AltaPlaylist.php');
        });
	</script>
 <?php
}elseif ($tags == ""){
	?>
	<script language="javascript">
		window.alert("No ingresó los tags de la playlist.\nPor favor, ingrese tags.");
		$(document).ready(function() {
			$("#DASH").load('/includes/PlaylistAdmin/AltaPlaylist.php');
        });
	</script>
 <?php
}else{
	
	$fecha=date("Y-m-d H:i:s");
	$activa=trim($_POST['activa']);
	$idcaString=$_SESSION['playlistPronta'];
	$idcaArray = $idcaString;
	$idu="1087";

	$pl= new Playlist ('',$nompl,$fecha,$activa,$fecha,$tags);
	$existeNombre=$pl->BuscoNombrePlaylist($conex);
	
	if($existeNombre){
		?>
		<script language="javascript">
			window.alert("El nombre de Playlist que ingresó ya existe.\nPor favor, ingrese otro nombre.");
			$(document).ready(function() {
				$("#DASH").load('/includes/PlaylistAdmin/AltaPlaylist.php');
			});
		</script>
	<?php
	}else{
	
		$IDPL=$pl->altaPlaylist($conex);
	
		$cp = new CreaPlaylist ('',$idu,$IDPL);
		$okCP=$cp->altaCreaPlaylist($conex);

		foreach($idcaArray as $idca){
			$tp=new TienePlaylist($IDPL,$idca);
			$okTP=$tp->altaTienePlaylist($conex);
		}

		if($okCP && $okTP && $IDPL != 0){
			unset ($_SESSION['playlist']);
			unset ($_SESSION['contador']);
			unset ($_SESSION['playlistPronta']);
			?>
			<script language="javascript">
				window.alert("Se dio de alta la playlist: <?php echo $nompl?> exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
		}else{
			unset ($_SESSION['playlist']);
			unset ($_SESSION['contador']);
			unset ($_SESSION['playlistPronta']);
			?>
			<script language="javascript">
				window.alert("Ocurrió un problema al dar de alta la playlist: <?php echo $nompl?>.\nIntente nuevamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
		}
	}
}
?>