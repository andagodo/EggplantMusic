<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
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

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alta de Canciones
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alta de Canciones
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			<div class="row">
                <div class="col-lg-6">
					<div class="formaltacancion">

					
					    <div class="form-group">
                            <label>Nombre Canción:</label>
                            <input class="form-control nom" placeholder="Ejemplo: Could You Be Loved." required/>
                        </div>
						
						<?php
							$g = new Genero();
							$datos_g=$g->consultaTodosGenero($conex);
							$Cuenta=count($datos_g);
						?>

						<div class="form-group">
                            <label>Seleccione Género</label>
                            <select class="form-control idg" required>
								<option value="00">Géneros</option>
									<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
									?>
									<option value="<?php echo $datos_g[$i][0]?>"  ><?php echo $datos_g[$i][1]?> // <?php echo $datos_g[$i][2]?></option>
								<?php
								}
						?>
                            </select>
                        </div>				
			            
						<div class="form-group">
							<label>Duración:</label>
								<div class="form-group input-group">
								<input type="time" class="form-control dur" required/>
							</div>
						</div>
						
						<div class="form-group">
							<label>Ruta del Archivo:</label>
								<input type="text" class="form-control ruta" required/>
						</div>
						</br>
						<button class="claseboton btn btn-default">Alta Canción</button>
						
						
						
						</div>
					</div>
					</div>
					
			</div>

<!--		</div>
	</div> -->
	
	

		
		<script language="javascript">

		$(function(){
			$variableboton = $(".claseboton");
			$variableboton.click(function(event) {
		event.preventDefault();
     		$out = "";
				var nom = $(".formaltacancion .nom").val();
				var idg = $(".formaltacancion .idg").val();
				var dur = $(".formaltacancion .dur").val();
				var ruta = $(".formaltacancion .ruta").val();
				
				$.post( "/logica/NuevaCancion.php", {nom, idg, dur, ruta}, "json" )
				
				.done(function( data, textStatus, jqXHR ) {
					// window.alert("Se inserto la cancion: ");
				
					if (data){
					
						window.alert("Se inserto la cancion: ");
						
						}else{
							window.alert("No encaró");
						}
						})
		
				});
				/*
				.fail(function( jqXHR, textStatus, errorThrown ) {
				  	if ( console && console.log ) {console.log( "La solicitud a fallado: " +  textStatus);}
				});   */
		
			});
	//	})(jQuery); 

		</script>