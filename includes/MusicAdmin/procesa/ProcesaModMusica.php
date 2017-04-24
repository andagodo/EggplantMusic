<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
<?php
$item=trim($_POST['item']);

if ($item == "cancion"){
	
	if ($_POST['campo'] == "todos"){					
		$ba = new Cancion();
		$datos_ba=$ba->ListaCancionActivas($conex);
		$Cuenta=count($datos_ba);
		
	}elseif ($_POST['campo'] == "nombre"){
		$nomc=trim($_POST['texto']);
		$ba = new Cancion('',$nomc);
		$datos_ba=$ba->buscaNombreCancion($conex);
		$Cuenta=count($datos_ba);
		
	}else{
		$Cuenta = 0;
	}

}elseif ($item == "album"){

	if ($_POST['campo'] == "todos"){
		$ba = new Album();
		$datos_ba=$ba->consultaTodosAlbum($conex);
		$Cuenta=count($datos_ba);						
		
	}elseif ($_POST['campo'] == "nombre"){
		$noma=trim($_POST['texto']);
		$ba = new Album('',$noma);
		$datos_ba=$ba->buscaAlbum($conex);
		$Cuenta=count($datos_ba);
		
	}else{
		$Cuenta = 0;
	}
	
}
?>	
<script>			
	function VerificaCampoInt(){ 
		document.getElementById('ModificaMusicaid').action = "/logica/LogicaModMusica.php";
	}
</script>

<div class="row">
	<form role="form" name="ModificaMusicaid" enctype="multipart/form-data" method="POST" id="ModificaMusicaid" ></br>
		<div class="col-lg-10">
			<?php
			if ($item == "cancion"){
				?>
				<h4>Canciones:</h4>
				<?php
			}elseif ($item == "album"){
				?>
				<h4>Álbums:</h4>
				<?php
			}
			?>			
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<?php
								if ($item == "cancion"){
									?>
									<th>Selección</th>
									<th>Nombre</th>
									<th>Género</th>
									<th>Intérprete</th>
									<?php
								}elseif ($item == "album"){
									?>
									<th>Selección</th>
									<th>Nombre</th>
									<th>Año</th>
									<?php
								}
								?>
							</tr>
						</thead>
						<input class="form-control" name='item' style="display:none;" value="<?php echo $item?>">
						<?php
						for ($i=0;$i<$Cuenta;$i++){
						?>
						<tbody>
							<tr>
								<td>
									<div class="radio">
										<label>				
											<input type="radio" name="ID" value="<?php echo $datos_ba[$i][0]?>"required>
										</label>
									</div>
								</td>
								<?php
								if ($item == "cancion"){
									?>
									<td><?php echo $datos_ba[$i][1]?></td>
									<td><?php echo $datos_ba[$i][3]?></td>
									<td><?php echo $datos_ba[$i][4]?></td>
									<?php
								}elseif($item == "album"){
									$formatoanio = DateTime::createFromFormat('Y-m-d', $datos_ba[$i][3]);
									$anio = $formatoanio->format('Y');
									?>							
									<td><?php echo $datos_ba[$i][1]?></td>
									<td><?php echo $anio?></td>
									<?php
								}
						}
								?>
							</tr>
						</tbody>
					</div>
				</table>
			</div>
		</div>
		<div class="col-lg-3">		
			<?php	
			if ($item == "cancion"){
				?>
				<td>
					<div class="form-group">
						<label>Nuevo nombre:</label>
						<input class="form-control" name='nom'/>
					</div>
					<div class="form-group">
						<label>Nuevo género:</label>
						<select class="form-control" name='idg'>
							<option selected value="" required>Géneros: </option>
							<?php
							$gen = new Genero();
							$resultGen = $gen->consultaTodosGenero($conex);
							$CuentaG=count($resultGen);
							for ($g=0;$g<$CuentaG;$g++){
								?>
								<option value="<?php echo $resultGen[$g][0];?>"><?php echo $resultGen[$g][1];?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Nombre del nuevo Intérprete:</label>
						<div role="form" action='/includes/MusicAdmin/logica/ProcesaModMusica.php' method="POST">
							<input class="form-control" id='nomint' placeholder="Escriba texto a buscar"/>
							<button type="button" class="btn btn-default" onclick="ConsultaNomInterpreteCancion();">Buscar</button>
						</div>
					</div>
					<button class="btn btn-default" id="ModInterpretebtn" onClick="VerificaCampoInt()"><b>Modificar Canción</b></button>
				</td>
				<?php
			}elseif($item == "album"){ 
				?>
				<td></br>
					<div class="form-group">
						<label>Nuevo nombre:</label>
						<input class="form-control" name='nom'/>
					</div>	
					<div class="form-group">
						<label>Año:</label>
						<div class="form-group input-group">
							<input class="form-control" maxlength="4" min="1900" max="2100" type="number" size="25" name='anio' required></input>
						</div>
					</div>	
					<div class="form-group">
						<label>Nueva foto:</label>
						<input type="file" name='foto' accept=".jpg"/>
					</div>
					</br>
					<button class="btn btn-default" id="ModInterpretebtn" onClick="VerificaCampoInt()">Modificar Álbum</button>
				</td>
			<?php
			}
			?>
		</div>
		<div class="col-lg-4">
			<div id="NUEVOINTECANCION"></div>
		</div>
	</form>
</div>