<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
$conex = conectar();

$idpl=trim($_POST['idpl']);
?>

<div id="page-wrapper">
	<h3 class="page-header">
		Canciones a Agregar
	</h3>
	<div class="row">
		<div class="col-lg-8">
			<div id="CANCIONESNUEVASPLAYLIST"></div>
		</div>
	</div>
	<div class="page-header"></div>
	<h4><u>Buscador de Canciones</u></h4>
	
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
			<button type="button" class="btn btn-default" onclick="AgregaCancionPlaylist();">Buscar</button>
		</div>
	</div>

	<div id="AGREGACANCIONDIV"></div>
</div>