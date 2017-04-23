<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Interprete.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
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
<script src="/estilos/js/jsmenu.js"></script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Dashboard <small>Resumen de Estadísticas</small>
				</h1>
				<ol class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i> Dashboard Administrador de Música
					</li>
				</ol>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="fa fa-info-circle"></i>  <strong>Te gusta la Música??</strong> Probalo! <a href="http://eggplantmusic.com" class="alert-link">EggplantMusic</a> Un Producto de Eggplant Blue
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-tasks fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										<?php
										$cuenta1 = new Album();
										$datos1=$cuenta1->consultaTodosAlbum($conex);
										$datos1=count($datos1);
										echo $datos1;
										?>
									</div>
									<div>Álbum activos!</div>
								</div>
							</div>
						</div>
						<a href="#" id="altainterprete2">
							<div class="panel-footer">
								<span class="pull-left">Ver Detalles</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-user fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										<?php
										$cuenta2 = new Interprete();
										$datos2=$cuenta2->consultaTodosInterprete($conex);
										$datos2=count($datos2);
										echo $datos2;
										?>
									</div>
									<div>Intérpretes registrados!</div>
								</div>
							</div>
						</div>
						<a href="#" id="asociaalbum2">
							<div class="panel-footer">
								<span class="pull-left">Ver Detalles</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-music fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										<?php
										$cuenta3 = new Cancion();
										$datos3=$cuenta3->ListaCancionActivas($conex);
										$datos3 = count ($datos3);
										echo $datos3;
										?>
									</div>
									<div>Canciones habilitadas!</div>
								</div>
							</div>
						</div>
						<a href="#" id="altamusica2">
							<div class="panel-footer">
								<span class="pull-left">Ver Detalles</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-support fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										<?php
										$USR = new Admin('','',$_SESSION["mai"]);
										$IDU = $USR->buscaMailAdmin($conex);				
										$cuenta4 = new Ticket('',$IDU[0][3]);
										$datos4=$cuenta4->TotalTicketUsuario($conex);
										echo $datos4[0][0];
										?>
									</div>
									<div>Tickets de Soporte!</div>
								</div>
							</div>
						</div>
						<a href="#" id="Tickets2">
							<div class="panel-footer">
								<span class="pull-left">Ver Detalles</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>				
	</div>
</div>					