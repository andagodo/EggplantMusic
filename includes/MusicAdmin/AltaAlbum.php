<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
session_start();
$conex = conectar();

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
	<div class="row">
		<div class="container-fluid">
			<div class="col-lg-12">
				<h1 class="page-header">
					Alta de Álbum
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Alta de Álbum
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form role="form" action='/logica/NuevaAlbum.php' enctype="multipart/form-data" method="POST">
				<div class="form-group">
					<label>Nombre Álbum:</label>
					<input class="form-control" placeholder="Ejemplo: Exodus." name='nom' required/>
				</div>
				<div class="form-group">
					<label>Año:</label>
					<div class="form-group input-group">
					<input class="form-control" maxlength="4" min="1900" max="2100" type="number" size="25" name='anio' required></input>
				</div>
				</div>
				<div class="form-group">
					<label>Cargar Imágen:</label>
					<input type="file" name='foto' accept=".jpg" required/>
				</div>
				</br>
				<button type="submit" class="btn btn-default">Alta Álbum</button>
			</form>
		</div>
	</div>
</div>