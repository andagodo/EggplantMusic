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
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Alta de Playlist
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Alta de Playlist
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<label>Nombre de Playlist:</label>
			<input class="form-control" id='nompl' required/>
		</div>
		<div class="col-lg-4">
			<label>Tags de Playlist:</label>
			<input class="form-control" id='tags' placeholder="Separados con un numeral Ej: Rock#PerlJam#Coldplay" required/>
		</div>
		<div class="col-lg-1">
			<label>Playlist Activa?:</label>
			<select class="form-control" id='activa'>
				<option value="S" selected>Si</option>
				<option value="N">No</option>
			</select>			
		</div>
	</div>
	<h3 class="page-header">
		Canciones en Playlist
	</h3>
	<div class="row">
		<div class="col-lg-8">
		<?php
		if (empty ($_SESSION['playlist'])){
			?>
			<div id="CREACIONPLAYLISTDIV"></div>
			<?php
		}else{
			?>
			<script>
				$(document).ready(function() {
					$("#CREACIONPLAYLISTDIV").load('/includes/PlaylistAdmin/procesa/ProcesaCreacionPlaylist.php');
				});
			</script>
			<div id="CREACIONPLAYLISTDIV"></div>
			<?php
		}
		?>
		</div>
	</div>
	<div class="page-header"></div>
	<h3 class="page-header">
		Buscador de Canciones
	</h3>
	
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label>Filtrar por:</label>
				<select class="form-control" id='contenido'>
					<option value="cancion">Canciones</option>
					<option value="album">Álbums</option>
					<option value="interprete">Intérprete</option>
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label>Nombre: </label>
				<input class="form-control" id='texto' required/>
			</div>
		</div>

	<?php
	$g = new Genero();
	$datos_g=$g->consultaTodosGenero($conex);
	$Cuenta=count($datos_g);
	?>
		<div class="col-lg-3">
			<div class="form-group">
				<label>Filtrar por Género:</label>
				<select class="form-control" id='idg'>
					<option value="0">Todos</option>
					<?php
					for ($i=0;$i<$Cuenta;$i++){
					?>
					<option value="<?php echo $datos_g[$i][0]?>"  ><?php echo $datos_g[$i][1]?>  // <?php echo $datos_g[$i][2]?></option>
					<?php
					}
					?>		
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1">
			<button type="button" class="btn btn-default" onclick="ProcesaMusicaPlaylist();">Buscar</button>
		</div>
	</div>

	<div id="ALTAPLAYLISTDIV"></div>
</div>