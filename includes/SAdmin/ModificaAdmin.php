<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
session_start();
$conex = conectar();

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

		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modificación de Administradores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modificación de Administradores
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<h3>Que desea hacer?:</h3>
			<div class="row">
				<div class="col-lg-3">
                    <select class="form-control" id='accion'>
                        <option value="habilitar">Habilitar Administrador</option>
                        <option value="reiniciar">Reiniciar Password a Administrador</option>
						<option value="cambiatipo">Cambiar Tipo de Administrador</option>
                    </select>

				</div>
			</div></br>
<!--
			<input type="radio" name='op' id="habilitar" value="habilitar" checked="checked"> Habilitar un Administrador Desactivado</input></br>
			<input type="radio" name='op' id="reiniciar" value="reiniciar"> Reiniciar Contraseña a un Administrador</input></br></br>
-->			

			

			<div class="row">
                <div class="col-lg-3">
				
					<form role="form" action='/includes/SAdmin/ModificaAdmin.php' method="POST">

                        <div class="form-group">
                            <label>Seleccione Tipo de Administrador:</label>
                            <select class="form-control" id='tus'>
								<option value="todos">Todos</option>
                                <option value="SuperAdmin">Super Administrador</option>
                                <option value="PlaylAdmin">Administrador de Playlists</option>
                                <option value="TicketAdmin">Administrador de Tickets</option>
                                <option value="MusicAdmin">Administrador de Música</option>
                            </select>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ConsultaTipoAdminModifica();">Consultar</button>
					</form>
				</div>

					
				<form role="form" action='/includes/SAdmin/ModificaAdmin.php' method="POST">
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
				
				<div class="col-lg-3">
					<div class="form-group">
                            <label>Texto</label>
                            <input class="form-control" id='texto' required/>
                    </div>
				</div>
				</form>

			</div>

			<div id="MODIFICAADMIN"></div>