<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
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
					Estadísticas de Música
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Estadísticas de Música
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2">
			<div class="form-group">
				<label>Seleccione Objeto:</label>
				<select class="form-control" id='objeto'>
					<option value="cancion">Canción</option>
					<option value="playlist">Playlist</option>
					<option value="album">Álbum</option>
					<option value="interprete">Interprete</option>
				</select>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<label>Seleccione Acción:</label>
				<select class="form-control" id='accion'>
					<option value="reproduccion">Reproducción</option>
					<option value="busqueda">Búsqueda</option>
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label>Texto a buscar:</label>
				<input class="form-control" id='texto' required/>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<label>Cantidad a listar:</label>
				<select class="form-control" id='cantidad'>
					<?php
					for ($i=1;$i<51;$i++){
						?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php
					}
					?>
				</select>
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
				<button type="button" class="btn btn-default" onclick="GeneraReporte();">Generar</button>
			</div>
		</div>
	</div>
	<div id="REPORTE"></div>
</div>