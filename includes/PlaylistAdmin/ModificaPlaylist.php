<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
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
					Modificación de Playlist
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Modificación de Playlist
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
				<div class="form-group">
					<label>Nombre de Playlist:</label>
					<input class="form-control" id='nompl' required/>
				</div>				
				<button type="button" class="btn btn-default" onclick="ConsultaModPlaylist();">Buscar</button>
		</div>	
		<div class="col-lg-3">
			<div class="form-group">
				<label>Canción en playlist:</label>
				<input class="form-control" id='cancion' required/>
			</div>		
		</div>
	</div>
	<div class="page-header"></div>
	<div id="PROCESAMODPLAYLIST"></div>
</div>