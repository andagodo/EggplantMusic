function CargaMusica(){
	var c=document.getElementById("canciones").value
	var url="/includes/MusicAdmin/procesa/ProcesaAltaMusica.php"
	$.ajax({
		type:"post",
		url:url,
		data:{canciones:c},
		success:function(datos){
			$("#ALTAMUSICA").html(datos);
		}
	})
}

function ConsultaTipoAdminBaja(){
	var t=document.getElementById("tus").value
	var url="/includes/SAdmin/procesa/ProcesaBajaAdmin.php"
	$.ajax({
		type:"post",
		url:url,
		data:{tus:t},
		success:function(datos){
			$("#BAJAADMIN").html(datos);
		}
	})
}

function ConsultaAdminBaja(){
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
	})
}

function ConsultaCuenta(){
	var c=document.getElementById("campo").value
	var t=document.getElementById("texto").value
	var a=document.getElementById("accion").value
	var url="/includes/SAdmin/procesa/ProcesaModificaCuenta.php"
	$.ajax({
		type:"post",
		url:url,
		data:{campo:c,texto:t,accion:a},
		success:function(datos){
			$("#MODIFICACUENTA").html(datos);
		}
	})
}

function ConsultaTipoAdminModifica(){
	var t=document.getElementById("tus").value
	var a=document.getElementById("accion").value
	var url="/includes/SAdmin/procesa/ProcesaModificaAdmin.php"
	$.ajax({
		type:"post",
		url:url,
		data:{tus:t,accion:a},
		success:function(datos){
			$("#MODIFICAADMIN").html(datos);
		}
	})
}

function ConsultaAdminModifica(){
	var c=document.getElementById("campo").value
	var t=document.getElementById("texto").value
	var a=document.getElementById("accion").value
	var url="/includes/SAdmin/procesa/ProcesaModificaAdmin.php"
	$.ajax({
		type:"post",
		url:url,
		data:{campo:c,texto:t,accion:a},
		success:function(datos){
			$("#MODIFICAADMIN").html(datos);
		}
	})
}

function ModificaInterprete(){
	var c=document.getElementById("campo").value
	var t=document.getElementById("texto").value
	var a=document.getElementById("accion").value
	var url="/includes/MusicAdmin/procesa/ProcesaModInteprete.php"
	$.ajax({
		type:"post",
		url:url,
		data:{campo:c,texto:t,accion:a},
		success:function(datos){
			$("#MODINTERPRETE").html(datos);
		}
	})
}

function ModificaMusica(){
	var i=document.getElementById("item").value
	var t=document.getElementById("texto").value
	var c=document.getElementById("campo").value
	var url="/includes/MusicAdmin/procesa/ProcesaModMusica.php"
	$.ajax({
		type:"post",
		url:url,
		data:{item:i,texto:t,campo:c},
		success:function(datos){
			$("#MODMUSICA").html(datos);
		}
	})
}

function HabilitaMusica(){
	var c=document.getElementById("contenido").value
	var a=document.getElementById("accion").value
	var t=document.getElementById("texto").value
	var url="/includes/MusicAdmin/procesa/ProcesaHabilitaMusica.php"
	$.ajax({	
		type:"post",
		url:url,
		data:{contenido:c,accion:a,texto:t},
		success:function(datos){
			$("#HABILITAMUSICA").html(datos);
		}
	})
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
	})
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
	})
} 

function ConsultaNomInterpreteCancion(){
	var n=document.getElementById("nomint").value
	var url="/includes/MusicAdmin/procesa/ProcesaInterpreteCancion.php"
	$.ajax({
		type:"post",
		url:url,
		data:{nomint:n},
		success:function(datos){
			$("#NUEVOINTECANCION").html(datos);
		}
	})
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
	})
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
	})
} 

function ModificaNomGenero(){
	var n=document.getElementById("nom").value
	var url="/includes/MusicAdmin/procesa/ProcesaModGenero.php"
	$.ajax({
		type:"post",
		url:url,
		data:{nom:n},
		success:function(datos){
			$("#MODGENERO").html(datos);
		}
	})
}

function ModificaDescGenero(){
	var d=document.getElementById("desc").value
	var url="/includes/MusicAdmin/procesa/ProcesaModGenero.php"
	$.ajax({
		type:"post",
		url:url,
		data:{desc:d},
		success:function(datos){
			$("#MODGENERO").html(datos);
		}
	})
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
	})
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
	})
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
	})
}

function AltaPlaylist(){
	var n=document.getElementById("nompl").value
	var t=document.getElementById("tags").value
	var a=document.getElementById("activa").value	
	var url="/logica/LogicaAltaPlaylist.php"
	$.ajax({
		type:"post",
		url:url,
		data:{nompl:n,tags:t,activa:a},
		success:function(datos){
			$("#DASH").html(datos);
		}
	})
}

function ProcesaMusicaPlaylist(){
	var c=document.getElementById("contenido").value
	var t=document.getElementById("texto").value
	var g=document.getElementById("idg").value
	var url="/includes/PlaylistAdmin/procesa/ProcesaAltaPlaylist.php"
	$.ajax({
		type:"post",
		url:url,
		data:{contenido:c,texto:t,idg:g},
		success:function(datos){
			$("#ALTAPLAYLISTDIV").html(datos);
		}
	})
}

$(document).ready(function() {
	$('#descartaplaylistID').click(function(){
		$("#DASH").load('/includes/PlaylistAdmin/procesa/DescartaPlaylist.php');
    });
});

$(document).ready(function() {
	$('#descartaCancionPlaylistID').click(function(){
		$("#DASH").load('/includes/PlaylistAdmin/procesa/DescartaAgregaCancionPlaylist.php');
    });
});

function ConsultaModPlaylist(){
	var n=document.getElementById("nompl").value
	var c=document.getElementById("cancion").value	
	var url="/includes/PlaylistAdmin/procesa/BuscaModPlaylist.php"
	$.ajax({
		type:"post",
		url:url,
		data:{nompl:n,cancion:c},
		success:function(datos){
			$("#PROCESAMODPLAYLIST").html(datos);
		}
	})
}

function AgregarCancionesPlaylist(){
	var i=document.getElementById("idpl").value
	var url="/includes/PlaylistAdmin/procesa/AgregaCancionPlaylist.php"	
	$.ajax({
		type:"post",
		url:url,
		data:{idpl:i},
		success:function(datos){
			$("#AGREGACANCIONPLAYLIST").html(datos);
		}
	})
}

function AgregaCancionPlaylist(){
	var c=document.getElementById("contenido").value
	var t=document.getElementById("texto").value
	var g=document.getElementById("idg").value
	var i=document.getElementById("idpl").value
	var url="/includes/PlaylistAdmin/procesa/ProcesaAgregaCancion.php"
	$.ajax({
		type:"post",
		url:url,
		data:{contenido:c,texto:t,idg:g,idpl:i},
		success:function(datos){
			$("#AGREGACANCIONDIV").html(datos);
		}
	})
}

function ModCancionPlaylist(){
	var i=document.getElementById("idpl").value
	var url="/logica/LogicaAgregaCPlaylist.php"
	$.ajax({
		type:"post",
		url:url,
		data:{idpl:i},
		success:function(datos){
			$("#DASH").html(datos);
		}
	})
}

function GeneraReporte(){
	var o=document.getElementById("objeto").value
	var a=document.getElementById("accion").value
	var t=document.getElementById("texto").value
	var c=document.getElementById("cantidad").value
	var fi=document.getElementById("fechaini").value
	var ff=document.getElementById("fechafin").value
	var url="/includes/procesa/ProcesaReporte.php"
	$.ajax({
		type:"post",
		url:url,
		data:{objeto:o,accion:a,texto:t,cantidad:c,fechaini:fi,fechafin:ff},
		success:function(datos){
			$("#REPORTE").html(datos);
		}
	})
}

function GeneraAuditoria(){
	var fi=document.getElementById("fechaini").value
	var ff=document.getElementById("fechafin").value
	var url="/includes/SAdmin/procesa/ProcesaAuditoria.php"
	$.ajax({
		type:"post",
		url:url,
		data:{fechaini:fi,fechafin:ff},
		success:function(datos){
			$("#GENERARAUDITORIA").html(datos);
		}
	})
}

function BuscaTickets(){
	var fi=document.getElementById("fechaini").value
	var ff=document.getElementById("fechafin").value
	var fa=document.getElementById("filtroasunto").value
	var url="/includes/procesa/ProcesaTickets.php"
	$.ajax({
		type:"post",
		url:url,
		data:{fechaini:fi,fechafin:ff,filtroasunto:fa},
		success:function(datos){
			$("#TICKETS").html(datos);
		}
	})
}

function RespTickets(){
	var fi=document.getElementById("fechaini").value
	var ff=document.getElementById("fechafin").value
	var fa=document.getElementById("filtroasunto").value
	var fu=document.getElementById("filtrousuario").value
	var url="/includes/TicketAdmin/procesa/ProcesaRespTickets.php"
	$.ajax({
		type:"post",
		url:url,
		data:{fechaini:fi,fechafin:ff,filtroasunto:fa,filtrousuario:fu},
		success:function(datos){
			$("#RESPTICKETS").html(datos);
		}
	})
}

function ListTickets(){
	var fi=document.getElementById("fechaini").value
	var ff=document.getElementById("fechafin").value
	var fa=document.getElementById("filtroasunto").value
	var fu=document.getElementById("filtrousuario").value
	var e=document.getElementById("estado").value
	var url="/includes/TicketAdmin/procesa/ProcesaListaTickets.php"
	$.ajax({
		type:"post",
		url:url,
		data:{fechaini:fi,fechafin:ff,filtroasunto:fa,filtrousuario:fu,estado:e},
		success:function(datos){
			$("#LISTTICKETS").html(datos);
		}
	})
}