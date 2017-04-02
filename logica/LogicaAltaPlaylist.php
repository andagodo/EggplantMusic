<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$conex = conectar();

$nompl=trim($_POST['nompl']);
$tags=trim($_POST['tags']);
$fecha=date("d/m/Y H:i:s");
$activa=trim($_POST['activa']);
$idcaString=$_SESSION['playlistPronta'];
$idcaArray = $idcaString;
$idu="1";

$pl= new Playlist ('',$nompl,$fecha,$activa,$fecha,$tags);
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
?>