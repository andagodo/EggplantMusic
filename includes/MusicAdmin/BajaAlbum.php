<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
$conex = conectar();
session_start();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsmenu.js"></script>
 <?php
if(! isset($_SESSION["mai"])){
	?>
 <script language="javascript">
   window.alert("Debes de estar logeado para ingresar a esta página.");
   location.href="/presentacion/indice.php";
 </script>
 <?php
}

?>



		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Álbumes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Álbumes
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
			
				<div class="col-lg-3">
					<form role="form" action="/includes/MusicAdmin/BajaAlbum.php" method="POST">

                        <div class="form-group">
                            <label>Nombre de Álbum:</label>
							<input class="form-control" id='nom' required/>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ConsultaNomAlbum();">Consultar</button>
					</form>
				</div>	
			

				<div class="col-lg-3">
				
					<form role="form" action="/includes/MusicAdmin/BajaAlbum.php" method="POST">

                        <div class="form-group">
                            <label>Año del Álbum:</label>
							<input class="form-control" id='anio' required/>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ConsultaAnioAlbum();">Consultar</button>
					</form>				

				</div>
				
			</div>
			
			<div id="BAJAALBUM"></div>