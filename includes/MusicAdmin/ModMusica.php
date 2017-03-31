<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';

session_start();
$conex = conectar();
?>
<!--<script src="/estilos/js/jquery.js"></script> -->
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Baja de Canciones
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Baja de Canciones
                            </li>
                        </ol>
                    </div>
                </div>
				
            </div>
			
			
			<div class="row">
                <div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaMusica.php' method="POST">
						<?php
						$i = new Interprete();
						$datos_i=$i->consultaTodosInterprete($conex);
						$Cuenta=count($datos_i);
						?>
                        <div class="form-group">
                            <label>Seleccione Artista:</label>
                            <select class="form-control" id='idi'>
								<option value="00">Artista</option>
									<?php
									for ($i=0;$i<$Cuenta;$i++)
									{
									?>
									<option value="<?php echo $datos_i[$i][0]?>"  ><?php echo $datos_i[$i][1]?></option>
								<?php
								}
						?>		
							</select>							
							
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ConsultaMusicaArtista();">Consultar</button>
					</form>
				</div>
				
				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaMusica.php' method="POST">
						<?php
						$g = new Genero();
						$datos_g=$g->consultaTodosGenero($conex);
						$Cuenta=count($datos_g);
						?>
                        <div class="form-group">
                            <label>Seleccione Género:</label>
                            <select class="form-control" id='idg'>
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
						
						<button type="button" class="btn btn-default" onclick="ConsultaMusicaGenero();">Consultar</button>
					</form>
				</div>
				
				<div class="col-lg-3">
				
					<form role="form" action='/includes/MusicAdmin/BajaMusica.php' method="POST">

                        <div class="form-group">
                            <label>Nombre de Canción:</label>
							<input class="form-control" id='nom' required/>
                        </div>				
						
						<button type="button" class="btn btn-default" onclick="ConsultaNomMusica();">Consultar</button>
					</form>
				</div>				
			</div>
			<div id="BAJAMUSICADIV"></div>			