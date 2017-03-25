
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
	}
	
	)
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
	}
	
	)
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
	}
	
	)
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
	}
	
	)
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
	}
	
	)
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
	}
	
	)
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