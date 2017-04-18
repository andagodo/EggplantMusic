<?php
if(! isset($_SESSION["mai"])){	// Si no está presente el valor del mail almacenada en la sesión del sistema, se ejecuta un javascript que muestre alerta y te lleve al indice del BackEnd.
?>

	<script language="javascript">
		window.alert("Debes de estar logeado para ingresar a esta página.");
		location.href="/presentacion/indice.php";
	</script>

<?php
}
//////////////////////// MENU DE SUPER ADMINISTRADOR////////////////////////

// Si el rol del administrador es "SuperAdmin", carga las siguientes funcionalidades y en #DASH carga el Dashboard: /includes/SAdmin/dashSAdmin.php como página principal.

if ($rol == "SuperAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').show();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').show();
			$('#menucuenta').show();
			$('#menumusica').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuplaylist').show();
			$('#menuticket').show();
			$('#menulistticket').show();
			$('#menuestadisticas').show();
			$('#menuauditoria').show();			
			$("#DASH").load('/includes/SAdmin/dashSAdmin.php');			
	});
</script>
<?php
//////////////////////////////////////////////////////////////////////////


/////////////////////// MENU DE MUSIC ADMIN /////////////////////////////

// Si el rol del administrador es "MusicAdmin", carga las siguientes funcionalidades y en #DASH carga el Dashboard: /includes/MusicAdmin/dashMusicAdmin.php como página principal.

}elseif ($rol == "MusicAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').show();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menucuenta').hide();
			$('#menumusica').show();
			$('#menugenero').show();
			$('#menuinterprete').show();
			$('#menuplaylist').hide();
			$('#menuticket').hide();
			$('#menulistticket').hide();
			$('#menuestadisticas').show();
			$('#menuauditoria').hide();
			$("#DASH").load('/includes/MusicAdmin/dashMusicAdmin.php');
	});
</script>
<?php
//////////////////////////////////////////////////////////////////////////


/////////////////////// MENU DE PLAYLIST ADMIN /////////////////////////////

// Si el rol del administrador es "PlaylAdmin", carga las siguientes funcionalidades y en #DASH carga el Dashboard: /includes/PlaylistAdmin/dashPlaylistAdmin.php como página principal.

}elseif ($rol == "PlaylAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').show();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menucuenta').hide();
			$('#menumusica').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuplaylist').show();
			$('#menuticket').hide();
			$('#menulistticket').hide();
			$('#menuestadisticas').hide();
			$('#menuauditoria').hide();
			$("#DASH").load('/includes/PlaylistAdmin/dashPlaylistAdmin.php');
	});
</script>
<?php
//////////////////////////////////////////////////////////////////////////


/////////////////////// MENU DE TICKET ADMIN /////////////////////////////

// Si el rol del administrador es "TicketAdmin", carga las siguientes funcionalidades y en #DASH carga el Dashboard: /includes/TicketAdmin/dashTicketAdmin.php como página principal.

}elseif ($rol == "TicketAdmin" ){
?>
<script language="javascript">
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').show();
			$('#menusadmin').hide();
			$('#menucuenta').hide();
			$('#menumusica').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuplaylist').hide();
			$('#menuticket').show();
			$('#menulistticket').show();
			$('#menuestadisticas').hide();
			$('#menuauditoria').hide();
			$("#DASH").load('/includes/TicketAdmin/dashTicketAdmin.php');
	});
</script>
<?php
//////////////////////////////////////////////////////////////////////////


/////////////////////// OCULTAR TODOS LOS LI /////////////////////////////

// Como método de seguridad de ocultan todas las funcionalidades si no cumple con las condiciones de rol que arriba se describen.

}else{
?>
	<script language="javascript"> 
	$(document).ready(function(){
			$('#menumusicadashboard').hide();
			$('#menusuperdashboard').hide();
			$('#menuplaylistdashboard').hide();
			$('#menuticketdashboard').hide();
			$('#menusadmin').hide();
			$('#menucuenta').hide();
			$('#menumusica').hide();
			$('#menugenero').hide();
			$('#menuinterprete').hide();
			$('#menuplaylist').hide();
			$('#menuticket').hide();
			$('#menulistticket').hide();
			$('#menuestadisticas').hide();
			$('#menuauditoria').hide();
	});
	</script>
<?php
}
//////////////////////////////////////////////////////////////////////////
?>
