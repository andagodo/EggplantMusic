/*
////////////////////////////////////// INICIO DE FUNCIONES CLICK PARA MOSTRAR EN #DASH de Menu.php//////////////////////////////////////////

// Cuando finalice de cargar la página ejecuta las funciones que correspondan al hacer click, Ejemplo: si en el menú se hace click en el item
// "Alta Administrador" se ejecuta la función para que en #DASH de /presentacion/Menu.php se muestre /includes/SAdmin/AltaAdmin.php 
*/
    $(document).ready(function() {
            $('#ConfigAdmin').click(function(){
                $("#DASH").load('/includes/ConfigAdmin.php');

            });
        });

    $(document).ready(function() {
            $('#dashSAdmin').click(function(){
                $("#DASH").load('/includes/SAdmin/dashSAdmin.php');

            });
        });
		
		$(document).ready(function() {
            $('#dashMusicAdmin').click(function(){
                $("#DASH").load('/includes/MusicAdmin/dashMusicAdmin.php');

            });
        });

        $(document).ready(function() {
            $('#dashPlaylistAdmin').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/dashPlaylistAdmin.php');

            });
        });
		
		$(document).ready(function() {
            $('#dashTicketAdmin').click(function(){
                $("#DASH").load('/includes/TicketAdmin/dashTicketAdmin.php');

            });
        });




        $(document).ready(function() {
            $('#altaadmin').click(function(){
                $("#DASH").load('/includes/SAdmin/AltaAdmin.php');

            });
        });
	
        $(document).ready(function() {
            $('#altaadmin2').click(function(){
                $("#DASH").load('/includes/SAdmin/AltaAdmin.php');

            });
        });		
	
		$(document).ready(function() {
            $('#bajaadmin').click(function(){
                $("#DASH").load('/includes/SAdmin/BajaAdmin.php');

            });
        });
	
	
		$(document).ready(function() {
            $('#modificaadmin').click(function(){
                $("#DASH").load('/includes/SAdmin/ModificaAdmin.php');

            });
        });	

        $(document).ready(function() {
            $('#altacuenta').click(function(){
                $("#DASH").load('/includes/SAdmin/AltaCuenta.php');

            });
        });		
		
		
		$(document).ready(function() {
            $('#modificacuenta').click(function(){
                $("#DASH").load('/includes/SAdmin/MantCuenta.php');

            });
        });			

        $(document).ready(function() {
            $('#musicdash').click(function(){
                $("#DASH").load('/includes/MusicAdmin/dashMusicAdmin.php');

            });
        });
		
		$(document).ready(function() {
            $('#sadmindash').click(function(){
                $("#DASH").load('/includes/SAdmin/dashSAdmin.php');

            });
        });

		$(document).ready(function() {
            $('#playlistdash').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/dashPlaylistAdmin.php');

            });
        });
		
		$(document).ready(function() {
            $('#ticketdash').click(function(){
                $("#DASH").load('/includes/TicketAdmin/dashTicketAdmin.php');

            });
        });		
		
		$(document).ready(function() {
            $('#altamusica').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaMusica.php');

            });
        });
		
		
		$(document).ready(function() {
            $('#altamusica2').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaMusica.php');

            });
        });
		
		
		$(document).ready(function() {
            $('#modmusica').click(function(){
                $("#DASH").load('/includes/MusicAdmin/ModMusica.php');

            });
        });
		
		$(document).ready(function() {
            $('#habilitamusica').click(function(){
                $("#DASH").load('/includes/MusicAdmin/HabilitaMusica.php');

            });
        });		

		$(document).ready(function() {
            $('#altaalbum').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaAlbum.php');

            });
        });

/*
Lo usaba cuando tenia el formulario de baja Album en Menú

		$(document).ready(function() {
            $('#bajaalbum').click(function(){
                $("#DASH").load('/includes/MusicAdmin/BajaAlbum.php');

            });
        });
*/		
		
		$(document).ready(function() {
            $('#altagenero').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaGenero.php');

            });
        });

		$(document).ready(function() {
            $('#bajagenero').click(function(){
                $("#DASH").load('/includes/MusicAdmin/BajaGenero.php');

            });
        });
		
		$(document).ready(function() {
            $('#modgenero').click(function(){
                $("#DASH").load('/includes/MusicAdmin/ModificaGenero.php');

            });
        });

		$(document).ready(function() {
            $('#altainterprete').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaInterprete.php');

            });
        });
		
		$(document).ready(function() {
            $('#modinterprete').click(function(){
                $("#DASH").load('/includes/MusicAdmin/ModInterprete.php');

            });
        });
		
		$(document).ready(function() {
            $('#bajainterprete').click(function(){
                $("#DASH").load('/includes/MusicAdmin/BajaInterprete.php');

            });
        });
		
        $(document).ready(function() {
            $('#altaplaylist').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/AltaPlaylist.php');

            });
        });
		
        $(document).ready(function() {
            $('#altaplaylist2').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/AltaPlaylist.php');

            });
        });		
		

        $(document).ready(function() {
            $('#modificaplaylist').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/ModificaPlaylist.php');

            });
        });
		
		$(document).ready(function() {
            $('#estadisticas').click(function(){
                $("#DASH").load('/includes/Estadistica.php');

            });
        });
		
		$(document).ready(function() {
            $('#auditoria').click(function(){
                $("#DASH").load('/includes/SAdmin/Auditoria.php');

            });
        });
		
        $(document).ready(function() {
            $('#Tickets').click(function(){
                $("#DASH").load('/includes/Tickets.php');

            });
        });
		

        $(document).ready(function() {
            $('#respticket').click(function(){
                $("#DASH").load('/includes/TicketAdmin/RespondeTickets.php');

            });
        });
		
        $(document).ready(function() {
            $('#listticket').click(function(){
                $("#DASH").load('/includes/TicketAdmin/ListaTickets.php');

            });
        });
		
/*				
        $(document).ready(function() {
            $('#respticket2').click(function(){
                $("#DASH").load('/includes/TicketAdmin/RespondeTicket.php');

            });
        });		

/*
////////////////////////////////////// FIN DE FUNCIONES CLICK PARA MOSTRAR EN #DASH de Menu.php //////////////////////////////////////////
*/