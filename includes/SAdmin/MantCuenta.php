<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cuenta.class.php';
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
                            Modificación de Cuentas FrontEnd
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modificación de Cuentas FrontEnd
                            </li>
                        </ol>
                    </div>
                </div>

            </div>


			<h3>Que desea hacer?:</h3>
			<div class="row">
				<div class="col-lg-3">
                    <select class="form-control" id='accion'>
                        <option value="habilitar">Habilitar Tipo de Cuenta</option>
						<option value="deshabilitar">Deshabilitar Tipo de Cuenta</option>
                        <option value="modificar">Modificar Valores de Cuenta</option>
                    </select>

				</div>
			</div></br>

			<div class="row">

				<form role="form" action='/includes/SAdmin/MantCuenta.php' method="POST">
				<div class="col-lg-3">

					<div class="form-group">
                            <label>Buscador:</label>
                            <select class="form-control" id='campo'>
								<option value="todos">Todos</option>
                                <option value="Tipo">Nombre / Tipo</option>
                                <option value="Cant_Playlist">Playlist</option>
								<option value="Precio">Precio</option>
                            </select>
                    </div>
					<button type="button" class="btn btn-default" onclick="ConsultaCuenta();">Buscar</button>
				</div>

				<div class="col-lg-3">
					<div class="form-group">
                            <label>Texto</label>
                            <input class="form-control" id='texto' required/>
                    </div>
				</div>
				</form>

			</div>

			<div id="MODIFICACUENTA"></div>
