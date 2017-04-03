<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cuenta.class.php';
session_start();
$conex = conectar();

/*
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


*/
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
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Alta de Cuentas de FrontEnd
				</h1>
				<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-edit"></i> Alta de Cuentas de FrontEnd
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form role="form" action='/logica/NuevaCuenta.php' method="POST">
				<div class="form-group">
					<label>Nombre / Tipo:</label>
					<input class="form-control" name='tipo' required/>
				</div>
				<div class="form-group">
					<label>Cantidad Playlist:</label>
					<input class="form-control" name='playlist' type="number" min="1" max="9999" required/>
				</div>
				<div class="form-group">
					<label>Precio:</label>
					<input class="form-control" name='precio' type="number" min="1" max="999" required/>
				</div>
				<div class="form-group">
					<label>Tipo de Administrador</label>
					<select class="form-control" name='activo'>
						<option value="S">Habilitado</option>
						<option value="N">Deshabilitado</option>
					</select>
				</div>
				<button type="submit" class="btn btn-default">Alta Cuenta</button>
			</form>
		</div>
	</div>
</div>