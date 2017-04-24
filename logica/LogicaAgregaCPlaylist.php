<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/CreaPlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/TienePlaylist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/presentacion/Menu.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$conex = conectar();

$idcaString=$_SESSION['playlistProntaAgregoC'];
$idcaArray = $idcaString;
$IDPL=trim($_POST['idpl']);

foreach($idcaArray as $idca){
	$tp=new TienePlaylist($IDPL,$idca);
	$okTP=$tp->altaTienePlaylist($conex);
}
if($okTP){
	unset ($_SESSION['playlistAgregoC']);
	unset ($_SESSION['contadorAgregoC']);
	unset ($_SESSION['playlistProntaAgregoC']);
	?>
	<script language="javascript">
		window.alert("Se agregaron canciones a la playlist exitosamente.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}else{
	unset ($_SESSION['playlistAgregoC']);
	unset ($_SESSION['contadorAgregoC']);
	unset ($_SESSION['playlistProntaAgregoC']);
	?>
	<script language="javascript">
		window.alert("Ocurrió un problema al agregar canciones a la playlist.\nIntente nuevamente.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}
?>