<?php
//////////////////////// MENU DE SUPER ADMINISTRADOR////////////////////////
if ($rol == "SuperAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').show();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').show();
			$('#menumusica').show();
			$('#menualbum').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuasocia').show();
			$('#menuplaylist').show();
			$('#menuticket').show();
			$("#DASH").load('/includes/SAdmin/dashSAdmin.php');			
	});
</script>
<?php

/////////////////////// MENU DE MUSIC ADMIN /////////////////////////////
}elseif ($rol == "MusicAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').show();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menumusica').show();
			$('#menualbum').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuasocia').show();
			$('#menuplaylist').hide();
			$('#menuticket').hide();
			$("#DASH").load('/includes/MusicAdmin/dashMusicAdmin.php');
	});
</script>
<?php

/////////////////////// MENU DE PLAYLIST ADMIN /////////////////////////////
}elseif ($rol == "PlaylAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').show();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menumusica').hide();
			$('#menualbum').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuasocia').hide();
			$('#menuplaylist').show();
			$('#menuticket').hide();
			$("#DASH").load('/includes/PlaylistAdmin/dashPlaylistAdmin.php');
	});
</script>
<?php

/////////////////////// MENU DE TICKET ADMIN /////////////////////////////
}elseif ($rol == "TicketAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').show();
			$('#menusadmin').hide();
			$('#menumusica').hide();
			$('#menualbum').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuasocia').hide();
			$('#menuplaylist').hide();
			$('#menuticket').show();
			$("#DASH").load('/includes/TicketAdmin/dashTicketAdmin.php');
	});
</script>
<?php

/////////////////////// OCULTAR TODOS LOS LI /////////////////////////////
}else{
?>
	<script language="javascript"> 
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menumusica').hide();
			$('#menualbum').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuasocia').hide();
			$('#menuplaylist').hide();
			$('#menuticket').hide();
	});
	</script>
<?php
}
?>