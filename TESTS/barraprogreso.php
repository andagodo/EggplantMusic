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

?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
		<div class="form-group">
			<label>Cargar Canciones:</label>
			<input name="ArchivoSubido[]" multiple="true" type="file" accept=".mp3" required/></br>
			<input type="submit" class="btn btn-default" value="Cargar archivos"/>
		</div>
    </form>
    
    <div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>
    
    <div id="respuesta"></div>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

<script>
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var respuesta = $('#respuesta');
   
$('form').ajaxForm({
    beforeSend: function() {
        respuesta.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
		//console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		respuesta.html(xhr.responseText);
	}
}); 

})();     
</script>