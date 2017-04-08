<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/logout.php';
$_SESSION['LAST_ACTIVITY'] = time();
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
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Auditoría de sistema
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Auditoría de sistema
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label>Rango de Fechas:</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1">
			<label>Desde:</label>
		</div>	
		<div class="col-lg-3">
			<input type="date" class="form-control" id='fechaini' required/>
		</div>
		<div class="col-lg-1">
			<label>Hasta:</label>
		</div>
		<div class="col-lg-3">
			<input type="date" class="form-control" id='fechafin' required/>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				</br>
				<button type="button" class="btn btn-default" onclick="GeneraAuditoria();">Generar</button>
			</div>
		</div>
	</div>
	<div id="GENERARAUDITORIA"></div>
</div>