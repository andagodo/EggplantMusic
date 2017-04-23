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
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Tickets
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Tickets
					</li>
				</ol>
			</div>
		</div>
	</div>
	<h4><u>Alta de Ticket:</u></h4>
	<form role="form" action='/logica/NuevaTicket.php' method="POST">
		<div class="row">
			<div class="col-lg-3">
				<input class="form-control" placeholder="Asunto" name="asuntoticket" required/>
			</div>
		</div></br>
		<div class="row">
			<div class="col-lg-6">
				<textarea class="form-control" rows="3" placeholder="Texto de Ticket" name="textoticket" required/>
			</div>
		</div>
		</br>
		<button type="submit" class="btn btn-default" >Enviar Ticket</button>
	</form>
	</br></br>
	
	<h4><u>Ver mis Tickets:</u></h4>	
	
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
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				</br>
				<button type="button" class="btn btn-default" onclick="BuscaTickets();">Buscar</button>
			</div>
		</div>
	</div>
	
	<div id="TICKETS"></div>
	
</div>