<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
session_start();
$conex = conectar();
?>
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
					Modificación de Canciones / Álbums
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Modificación de Canciones / Álbums
					</li>
				</ol>
			</div>
		</div>
	</div>
	<form role="form" action='/includes/SAdmin/ModMusica.php' method="POST">
	<h3>Que desea hacer?:</h3>
	<div class="row">
		<div class="col-lg-3">
			<select class="form-control" id='item'>
				<option value="cancion">Modificar Canción</option>
				<option value="album">Modificar Álbum</option>
			</select>
		</div>
	</div></br>
	<div class="row">
			<div class="col-lg-3">
				<div class="form-group">
					<label>Buscador:</label>
					<select class="form-control" id='campo'>
						<option value="todos">Todos</option>
						<option value="nombre">Nombre</option>
					</select>
				</div>
				<button type="button" class="btn btn-default" onclick="ModificaMusica();">Buscar</button>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Texto:</label>
					<input class="form-control" id='texto' required/>
				</div>
			</div>
		</form>
	</div>
	<div id="MODMUSICA"></div>
</div>		