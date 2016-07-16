<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Playlist.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
 
session_start();
$conex = conectar();
?>

<script src="../estilos/js/jquery.js"></script>
<script src="../estilos/js/jsmenu.js"></script>

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
                            Dashboard <small>Resumen de Estadísticas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard de Super Administrador
                            </li>
                        </ol>
                    </div>
					
					<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Te gusta la Música??</strong> Probalo! <a href="/portada_front/index.html" class="alert-link">EggplantMusic</a> Un Producto de Eggplant Blue
                        </div>
                    </div>
                </div>
                <!-- /.row -->

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
												$cuenta1 = new Admin();
												$datos1=$cuenta1->TotalAdmin($conex);
												echo $datos1[0][0];
											?>										
										
										</div>
                                        <div>Admins Registrados!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="altaadmin2">
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
                                        <div class="huge">
											<?php
												$cuenta2 = new Cancion();
												$datos2=$cuenta2->consultaCancionSinInterprete($conex);
												echo $datos2[0][0];
											?>										
										</div>
                                        <div>Canciones sin Intérprete!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="asociainterprete4">
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
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
											<?php
												$cuenta3 = new Playlist();
												$datos3=$cuenta3->TotalPlaylist($conex);
												echo $datos3[0][0];
											?>											
										</div>
                                        <div>Playlist de Sistema!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="altaplaylist2">
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
												$cuenta4 = new Ticket();
												$datos4=$cuenta4->TotalTicket($conex);
												echo $datos4[0][0];
											?>												
										
										</div>
                                        <div>Tickets de Soporte sin resolver!</div>
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
					</div>
					
					
					
					
                </div>
				
            </div>

		</div>
