<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
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
					Responder Tickets
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Responder Tickets
					</li>
				</ol>
			</div>
		</div>
	</div>

	<h4>Buscar Tickets</h4>	

	<div class="row">
		<div class="col-lg-3">
			<label>Rango de Fechas:</label>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2">
		<label>Desde:</label>
			<input type="date" class="form-control" id='fechaini'/>
		</div>
		<div class="col-lg-2">
		<label>Hasta:</label>
			<input type="date" class="form-control" id='fechafin'/>
		</div>
		<div class="col-lg-3">
			<label>Asunto</label>
			<input class="form-control" id='filtroasunto' placeholder="Filtrar por asunto de Ticket"/>
		</div>
		<div class="col-lg-3">
			<label>Mail Usuario</label>
			<input class="form-control" id='filtrousuario' placeholder="Filtrar tickets por Usuario"/>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				</br>
				<button type="button" class="btn btn-default" onclick="RespTickets();">Buscar</button>
			</div>
		</div>
	</div>
	
	<div id="RESPTICKETS"></div>
	
</div>