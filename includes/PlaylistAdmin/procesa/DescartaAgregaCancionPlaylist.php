<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/presentacion/Menu.php';
//session_start();
unset ($_SESSION['playlistAgregoC']);
unset ($_SESSION['contadorAgregoC']);
unset ($_SESSION['playlistProntaAgregoC']);
?>
<script language="javascript">
	$(document).ready(function() {
		$("#DASH").load('/includes/PlaylistAdmin/ModificaPlaylist.php');
	});
</script>