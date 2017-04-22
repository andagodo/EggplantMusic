<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
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
?>
<script src="/estilos/js/jsmenu.js"></script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Dashboard <small>Resumen de Tickets</small>
				</h1>
				<ol class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i> Dashboard de Administrador de Tickets
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
									<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										<?php				
										$cuenta4 = new Ticket();
										$datos4=$cuenta4->TotalTicket($conex);
										echo $datos4[0][0];
										?>										
									</div>
									<div>Tickets sin Resolver!</div>
								</div>
							</div>
						</div>
						<a href="#" id="respticket2">
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
									<i class="fa fa-tasks fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">Reporte</div>
									<div>Listados de Tickets!</div>
								</div>
							</div>
						</div>
						<a href="#" id="listticket2">
							<div class="panel-footer">
								<span class="pull-left">Generar!</span>
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
									<i class="fa fa-user fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">
										<?php 
										$USR = new Admin('','',$_SESSION["mai"]);
										$IDU = $USR->buscaMailAdmin($conex);
										echo $IDU[0][0];
										?>
									</div>
									<div>Editar mi Usuario</div>
								</div>
							</div>
						</div>
						<a href="#" id="ConfigAdmin2">
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
									<div>Tickets Propios</div>
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