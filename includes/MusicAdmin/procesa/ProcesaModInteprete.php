<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
$conex = conectar();
?>
<script src="/estilos/js/jquery.js"></script>
<script src="/estilos/js/jsfunciones.js"></script>	
<?php
$accion=trim($_POST['accion']);

if ($accion == "habilitar"){
	
	if ($_POST['campo'] == "todos"){					
		$ba = new Interprete();
		$datos_ba=$ba->consultaInterpreteNoAct($conex);
		$Cuenta=count($datos_ba);
		
	}elseif ($_POST['campo'] == "Nombre_Int"){
		$nomi=trim($_POST['texto']);
		$ba = new Interprete('',$nomi);
		$datos_ba=$ba->buscaNombreInterpreteNoAct($conex);
		$Cuenta=count($datos_ba);
		
	}elseif ($_POST['campo'] == "Pais_Int"){
		$paisi=trim($_POST['texto']);
		$ba = new Interprete('','','',$paisi);
		$datos_ba=$ba->buscaPaisInterpreteNoAct($conex);
		$Cuenta=count($datos_ba);
		
	}else{
		$Cuenta = 0;
	}

}elseif ($accion == "modificar"){

	if ($_POST['campo'] == "todos"){
		$ba = new Interprete();
		$datos_ba=$ba->consultaTodosInterprete($conex);
		$Cuenta=count($datos_ba);						
		
	}elseif ($_POST['campo'] == "Nombre_Int"){
		$nomi=trim($_POST['texto']);
		$ba = new Interprete('',$nomi);
		$datos_ba=$ba->buscaNombreInterprete($conex);
		$Cuenta=count($datos_ba);
		
	}elseif ($_POST['campo'] == "Pais_Int"){
		$paisi=trim($_POST['texto']);
		$ba = new Interprete('','','',$paisi);
		$datos_ba=$ba->buscaPaisInterprete($conex);
		$Cuenta=count($datos_ba);
	
	}else{
		$Cuenta = 0;
	}
	
}
?>	
<script>			
	function VerificaCampoInt(){ 
		document.getElementById('ModificaInterpreteid').action = "/logica/LogicaModInterprete.php";
	}
</script>

<div class="row">
	<form role="form" name="ModificaInterpreteid" enctype="multipart/form-data" method="POST" id="ModificaInterpreteid" ></br>
		<div class="col-lg-10">	
			<h4>Intérpretes:</h4>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<div class="form-group">
						<thead>
							<tr>
								<th>Selección</th>
								<th>Nombre</th>
								<th>Pais</th>
								<th>Canciones asociadas</th>
							</tr>
						</thead>
						<input class="form-control" name='accion' style="display:none;" value="<?php echo $accion?>">
						<?php
						for ($i=0;$i<$Cuenta;$i++){
							$as = new Interprete ($datos_ba[$i][0]);
							if ($accion == "modificar"){
							$datos_as=$as->CuentaCancionesAsociadas($conex);
							}elseif($accion == "habilitar"){
							$datos_as=$as->CuentaCancionesAsociadasTodas($conex);
							}
						?>
							<tbody>
								<tr>
									<td>
										<div class="radio">
											<label>
												<input type="radio" name="idint" value="<?php echo $datos_ba[$i][0]?>"required>
											</label>
										</div>
									</td>
									<td><?php echo $datos_ba[$i][1]?></td>
									<td><?php echo $datos_ba[$i][3]?></td>
									<td><?php echo $datos_as[0][0]?></td>
								</tr>
							</tbody>
						<?php
						}
						?>
					</div>
				</table>
			</div>
		</div>
		<div class="col-lg-3">		
			<?php	
			if ($accion == "habilitar"){
				?>
				<td><button class="btn btn-default" id="ModInterpretebtn" onClick="VerificaCampoInt()">Habilitar Intérprete</button></td>
				<?php
			}elseif($accion == "modificar"){ 
				?>
				<td></br>
					<div class="form-group">
						<label>Nuevo nombre:</label>
						<input class="form-control" name='nomi'/>
					</div>	
					<div class="form-group">
						<label>Nuevo país:</label>
						<select class="form-control" name='pais'>
							<?php
							include $_SERVER['DOCUMENT_ROOT'] . '/includes/selectpais.php';
							?>
						</select>
					</div>	
					<div class="form-group">
						<label>Nueva foto:</label>
						<input type="file" name='foto' accept=".jpg"/>
					</div>
					</br>
					<button class="btn btn-default" id="ModInterpretebtn" onClick="VerificaCampoInt()">Modificar Valores</button>
				</td>
			<?php
			}
			?>
		</div>
	</form>
</div>