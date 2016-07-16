<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
session_start();
$conex = conectar();

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 150)) {
    session_unset();
    session_destroy();
	?>
	<script language="javascript">
		window.alert("Tiempo de espera excedido.");
		location.href="/presentacion/indice.php";
	</script>
	<?php
}

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
                            Alta de Administradores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alta de Administradores
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<div class="row">
                <div class="col-lg-6">
					<form role="form" action='/logica/NuevaAdmin.php' method="POST">

                        <div class="form-group">
                            <label>Tipo de Administrador</label>
                            <select class="form-control" name='tus'>
                                <option value="SuperAdmin">Super Administrador</option>
                                <option value="PlaylAdmin">Administrador de Playlists</option>
                                <option value="TicketAdmin">Administrador de Tickets</option>
                                <option value="MusicAdmin">Administrador de Música</option>
                            </select>
                        </div>				

                    
                        <div class="form-group">
                            <label>Nombre completo:</label>
                            <input class="form-control" name='nomu' required/>
 <!--                           <p class="help-block">Example block-level help text here.</p>	-->
                        </div>	
						
			            
						<div class="form-group">
							<label>Mail:</label>
								<div class="form-group input-group">
								<span class="input-group-addon">@</span>
								<input type="email" class="form-control" name='mus' required/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" name='pus' required/>
						</div>		
						
					<button type="submit" class="btn btn-default">Alta Admin</button>
			
					</form>
			
			</div>

		</div>