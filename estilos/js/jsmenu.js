function ConsultaTipoAdmin(){
	var t=document.getElementById("tus").value
	var url="/includes/SAdmin/procesa/ProcesaBajaAdmin.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{tus:t},
		success:function(datos){
			$("#BAJAADMIN").html(datos);
		}
	}
	
	)
}

function ConsultaAdmin(){
	var c=document.getElementById("campo").value
	var t=document.getElementById("texto").value
	var url="/includes/SAdmin/procesa/ProcesaBajaAdmin.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{campo:c,texto:t},
		success:function(datos){
			$("#BAJAADMIN").html(datos);
		}
	}
	
	)
} 



function ConsultaNomInterprete(){
	var n=document.getElementById("nom").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaInterprete.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{nom:n},
		success:function(datos){
			$("#BAJAINTERPRETE").html(datos);
		}
	}
	
	)
}

function ConsultaPaisInterprete(){
	var p=document.getElementById("pais").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaInterprete.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{pais:p},
		success:function(datos){
			$("#BAJAINTERPRETE").html(datos);
		}
	}
	
	)
} 


function ConsultaNomGenero(){
	var n=document.getElementById("nom").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaGenero.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{nom:n},
		success:function(datos){
			$("#BAJAGENERO").html(datos);
		}
	}
	
	)
}

function ConsultaDescGenero(){
	var d=document.getElementById("desc").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaGenero.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{desc:d},
		success:function(datos){
			$("#BAJAGENERO").html(datos);
		}
	}
	
	)
} 

function ConsultaMusicaArtista(){
	var i=document.getElementById("idi").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaMusica.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{idi:i},
		success:function(datos){
			$("#BAJAMUSICADIV").html(datos);
		}
	}
	
	)
}

function ConsultaMusicaGenero(){
	var g=document.getElementById("idg").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaMusica.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{idg:g},
		success:function(datos){
			$("#BAJAMUSICADIV").html(datos);
		}
	}
	
	)
} 

function ConsultaNomMusica(){
	var n=document.getElementById("nom").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaMusica.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{nom:n},
		success:function(datos){
			$("#BAJAMUSICADIV").html(datos);
		}
	}
	
	)
} 


function ConsultaMusicaArtista(){
	var i=document.getElementById("idi").value
	var url="/includes/PlaylistAdmin/procesa/ProcesaAltaPlaylist.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{idi:i},
		success:function(datos){
			$("#ALTAPLAYLISTDIV").html(datos);
		}
	}
	
	)
}

function ConsultaMusicaGenero(){
	var g=document.getElementById("idg").value
	var url="/includes/PlaylistAdmin/procesa/ProcesaAltaPlaylist.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{idg:g},
		success:function(datos){
			$("#ALTAPLAYLISTDIV").html(datos);
		}
	}
	
	)
} 

function ConsultaNomMusica(){
	var n=document.getElementById("nom").value
	var url="/includes/PlaylistAdmin/procesa/ProcesaAltaPlaylist.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{nom:n},
		success:function(datos){
			$("#ALTAPLAYLISTDIV").html(datos);
		}
	}
	
	)
}

function AgregaCancionPlaylist(){
	var i=document.getElementById("idc").value
	var url="/includes/PlaylistAdmin/procesa/ProcesaCreacionPlaylist.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{idc:i},
		success:function(datos){
			$("#CREACIONPLAYLISTDIV").html(datos);
		}
	}
	
	)
}


function ConsultaNomAlbum(){
	var n=document.getElementById("nom").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaAlbum.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{nom:n},
		success:function(datos){
			$("#BAJAALBUM").html(datos);
		}
	}
	
	)
}

function ConsultaAnioAlbum(){
	var a=document.getElementById("anio").value
	var url="/includes/MusicAdmin/procesa/ProcesaBajaAlbum.php"
	
	$.ajax({
		
		type:"post",
		url:url,
		data:{anio:a},
		success:function(datos){
			$("#BAJAALBUM").html(datos);
		}
	}
	
	)
}    

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
            $('#bajamusica').click(function(){
                $("#DASH").load('/includes/MusicAdmin/BajaMusica.php');

            });
        });

		$(document).ready(function() {
            $('#altaalbum').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaAlbum.php');

            });
        });


		$(document).ready(function() {
            $('#bajaalbum').click(function(){
                $("#DASH").load('/includes/MusicAdmin/BajaAlbum.php');

            });
        });
		
		
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
            $('#altainterprete').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AltaInterprete.php');

            });
        });

		$(document).ready(function() {
            $('#bajainterprete').click(function(){
                $("#DASH").load('/includes/MusicAdmin/BajaInterprete.php');

            });
        });

		$(document).ready(function() {
            $('#asociainterprete').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaInterprete.php');

            });
        });
		
		$(document).ready(function() {
            $('#asociainterprete2').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaInterprete.php');

            });
        });

		$(document).ready(function() {
            $('#asociainterprete3').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaInterprete.php');

            });
        });		

		$(document).ready(function() {
            $('#asociainterprete4').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaInterprete.php');

            });
        });			

		$(document).ready(function() {
            $('#asociaalbum').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaAlbum.php');

            });
        });	

		$(document).ready(function() {
            $('#asociaalbum2').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaAlbum.php');

            });
        });	

		$(document).ready(function() {
            $('#asociaalbum3').click(function(){
                $("#DASH").load('/includes/MusicAdmin/AsociaAlbum.php');

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
            $('#bajaplaylist').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/BajaPlaylist.php');

            });
        });

        $(document).ready(function() {
            $('#modificaplaylist').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/ModificaPlaylist.php');

            });
        });
		
		$(document).ready(function() {
            $('#estadisticas').click(function(){
                $("#DASH").load('/includes/PlaylistAdmin/EstadisticaPlaylist.php');

            });
        });
		
        $(document).ready(function() {
            $('#respticket').click(function(){
                $("#DASH").load('/includes/TicketAdmin/RespondeTicket.php');

            });
        });
		
        $(document).ready(function() {
            $('#respticket2').click(function(){
                $("#DASH").load('/includes/TicketAdmin/RespondeTicket.php');

            });
        });		
		
		$(document).ready(function() {
            $('#bajaticket').click(function(){
                $("#DASH").load('/includes/TicketAdmin/BajaTicket.php');

            });
        });		