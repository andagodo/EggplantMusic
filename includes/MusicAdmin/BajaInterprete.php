<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
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
					Baja de Intérpretes
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Baja de Intérpretes
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<form role="form" action='/includes/MusicAdmin/BajaInterprete.php' method="POST">
				<div class="form-group">
					<label>Nombre de Intérprete:</label>
					<input class="form-control" id='nom' required/>
				</div>				
				<button type="button" class="btn btn-default" onclick="ConsultaNomInterprete();">Consultar</button>
			</form>
		</div>	
		<div class="col-lg-3">
			<form role="form" action='/includes/MusicAdmin/BajaInterprete.php' method="POST">
				<div class="form-group">
					<label>País del Intérprete:</label>
					<input class="form-control" id='pais' required/>
				</div>		
				<button type="button" class="btn btn-default" onclick="ConsultaPaisInterprete();">Consultar</button>
			</form>
		</div>
	</div>
	<div id="BAJAINTERPRETE"></div>
</div>