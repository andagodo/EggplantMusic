<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
$conex = conectar();
session_start();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>
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
                            Modificación de Géneros
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modificación de Géneros
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
			
				<div class="col-lg-3">
					<form role="form" action='/includes/MusicAdmin/ModificaGenero.php' method="POST">

                        <div class="form-group">
                            <label>Nombre de Género:</label>
							<input class="form-control" id='nom' required/>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ModificaNomGenero();">Consultar</button>
					</form>
				</div>	
			

				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/ModificaGenero.php' method="POST">

                        <div class="form-group">
                            <label>Descripción del Género:</label>
							<input class="form-control" id='desc' required/>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ModificaDescGenero();">Consultar</button>
					</form>				

				</div>
				
			</div>

			<div id="MODGENERO"></div>