<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
session_start();
$conex = conectar();

if(! isset($_SESSION["mai"])){
	?>
	<script language="javascript">
		window.alert("Debes de estar logeado para ingresar a esta página.");
		location.href="/presentacion/indice.php";
	</script>
	<?php
}
///////////////////////////////////////////TIMEOUT//////////////////////////////////////////////////
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
      session_unset();
      session_destroy();
    ?>
    <script language="javascript">
      window.alert("Tiempo de espera excedido.");
      location.href="/";
    </script>
    <?php
  }else{
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  }
 ///////////////////////////////////////////TIMEOUT//////////////////////////////////////////////////
?>
<script src="/estilos/js/jsfunciones.js"></script>

<script>
	(function() {
		var barra = $('.barra');
		var porcentaje = $('.porcentaje');
		var respuesta = $('#respuesta');
	$('form').ajaxForm({
		beforeSend: function() {
			respuesta.empty();
			var ValorPorcentaje = 'Proceso de Archivos: 0%';
			var porcentajeBarra = '0%';
			barra.width(porcentajeBarra)
			porcentaje.html(ValorPorcentaje);
		},
		uploadProgress: function(event, position, total, percentComplete) {
			var ValorPorcentaje = 'Proceso de Archivos: ' + percentComplete + '%';
			var porcentajeBarra = percentComplete + '%';
			barra.width(porcentajeBarra)
			porcentaje.html(ValorPorcentaje);
		},
		success: function() {
			var ValorPorcentaje = 'Proceso de Archivos: 100%';
			var porcentajeBarra = '100%';
			barra.width(porcentajeBarra)
			porcentaje.html(ValorPorcentaje);
		},
		complete: function(xhr) {
			respuesta.html(xhr.responseText);
		}
	}); 
	})();
	
$(function(){
    $("input[type='submit']").click(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length)>20){
			alert("Puedes subir como máximo 20 archivos.");
			$("#DASH").load('/includes/MusicAdmin/AltaMusica.php');
			return;
        }
		
		var input = document.getElementById('ArchivoSubido');
		var tamtotal = 0;
		for (i=0; i < input.files.length ; i++){
			var tamtotal = input.files[i].size + tamtotal;
		}
        if ( tamtotal > 209715200 ){
			alert("Puedes subir como máximo 200MB en total.");
			$("#DASH").load('/includes/MusicAdmin/AltaMusica.php');
			return;
        }		

		for (g=0; g < input.files.length ; g++){
			if ( input.files[g].size > 33554432 ){
				alert("No se puede cargar un archivo de mas de 32MB.");
				$("#DASH").load('/includes/MusicAdmin/AltaMusica.php');
			}
		}		
		
    });    
});
</script>

<style>
.progresocarga { background-color: white; position:relative; width:400px; border: 1px solid #ddd; padding: 6px; border-radius: 3px;}
.porcentaje { position:absolute; display:inline-block; top:5px; left:25%; }
.barra { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; } 
</style>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Alta de Canciones / Álbums
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Alta de Canciones / Álbums
					</li>
				</ol>
			</div>
		</div>
	</div>
	<form action="/includes/MusicAdmin/procesa/ProcesaAltaMusica.php" method="post" enctype="multipart/form-data" >
		<label>Cargar Canciones:</label>
		<input name="ArchivoSubido[]" multiple="true" type="file" id="ArchivoSubido" accept=".mp3" required/></br>
		<div class="form-group">
			<div class="col-lg-2">
				<input type="submit" class="btn btn-default" value="Cargar archivos"/>
			</div>
			<div class="col-lg-2">
				<div class="progresocarga">
					<div class="barra"></div >
					<div class="porcentaje">Proceso de Archivos: 0%</div >
				</div>		
			</div>
		</div>
		</br>
	</form>
	<div id="respuesta"></div>
</div>