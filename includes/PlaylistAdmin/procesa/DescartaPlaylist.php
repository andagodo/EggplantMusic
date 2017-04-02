<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/presentacion/Menu.php';
//session_start();
unset ($_SESSION['playlist']);
unset ($_SESSION['contador']);
unset ($_SESSION['playlistPronta']);
?>
<script language="javascript">
	$(document).ready(function() {
		$("#DASH").load('/includes/PlaylistAdmin/AltaPlaylist.php');
	});
</script>