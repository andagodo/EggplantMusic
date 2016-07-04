<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/MenuMusicAdmin.php";

if ($rol == "SuperAdmin" ){	
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/SAdmin/dashSAdmin.php";

}elseif ($rol == "MusicAdmin" ){
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/MusicAdmin/dashMusicAdmin.php";

}elseif ($rol == "PlaylAdmin" ){	
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/PlaylistAdmin/dashPlaylistAdmin.php";

}elseif ($rol == "TicketAdmin" ){
	include $_SERVER['DOCUMENT_ROOT'] . "/includes/TicketAdmin/dashTicketAdmin.php";
}

include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; 

?>