<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
session_start();
$conex = conectar();
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
                            Habilitar / Deshabilitar Música
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Habilitar / Deshabilitar Música
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<form role="form" action='/includes/MusicAdmin/HabilitaMusica.php' method="POST">
			<h3>Que desea hacer?:</h3>
			<div class="row">
				<div class="col-lg-3">
                    <select class="form-control" id='accion'>
						<option value="aprobar">Aprobar Musica</option>
                        <option value="habilitar">Habilitar Musica</option>
                        <option value="deshabilitar">Deshabilitar Musica</option>
					</select>

				</div>
			</div></br>

			<div class="row">
                <div class="col-lg-3">
				
					

                        <div class="form-group">
                            <label>Seleccione Contenido:</label>
                            <select class="form-control" id='contenido'>
                                <option value="cancion">Canciones</option>
                                <option value="album">Álbums</option>

                            </select>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="HabilitaMusica();">Consultar</button>
<!--				</form>	-->
				</div>

					
<!--				<form role="form" action='/includes/MusicAdmin/HabilitaMusica.php' method="POST">
				<div class="col-lg-3">
				
					<div class="form-group">
                            <label>Buscador:</label>
                            <select class="form-control" id='campo'>
                                <option value="Nombre_Usr_Sist">Nombre</option>
                                <option value="Mail_Usr_Sist">Mail</option>
                                <option value="Fech_Alta_Usr_Sist">Fecha Alta</option>
                            </select>
                    </div>
					<button type="button" class="btn btn-default" onclick="ConsultaAdminModifica();">Buscar</button>
				</div>
-->				
				<div class="col-lg-3">
					<div class="form-group">
                            <label>Nombre: </label>
                            <input class="form-control" id='texto' required/>
                    </div>
				</div>
				
				</form>

			</div>

			<div id="HABILITAMUSICA"></div>