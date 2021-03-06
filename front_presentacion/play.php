<?php
	session_name('eggplantmusic');
	session_start();
	
	if(! isset($_SESSION["mai"])){
	?>
    <script language="javascript">
        window.alert("Debes de estar logeado para ingresar a esta página.");
        location.href="/";
	</script>
    <?php
	}
	
	require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Usuario.class.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
	
	$conex = conectar();
	$u= new Usuario ('','','','','',$_SESSION["mai"]);
	$Tipo=$u->consultaUno($conex);
	$nombre = $Tipo[0][1];
	$_SESSION['IdUsr'] = $Tipo[0][0];
	
	echo "<script type='text/javascript'> IdUsr = ".json_encode($_SESSION['IdUsr'])."</script>";
	
?>
<!DOCTYPE html>
<html lang="en">
    
	<meta charset="UTF-8">
	
	
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
	
	<link rel="stylesheet" href="/estilos/css/play.css">
	<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
	
	<link href="/estilos/css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="/estilos/css/plugins/morris.css">
	<link href="/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <head>
		<title>EggPlantMusic</title>
	</head>
	
    <body>
		<div id="wrapper">
      		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      		    <div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/front_presentacion/play.php">EggplantMusic</a>
				</div>
				
      			<ul class="nav navbar-right top-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $nombre; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-envelope"></i> Mensajes</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="/front_presentacion/logout_front.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
							</li>
						</ul>
					</li>
				</ul>
				<!------------------------------------------- FIN Barra superior -------------------------------------------->
				
				<div class="sidebar-nav">
					
					<div class="navbar-collapse collapse sidebar-navbar-collapse">
						
						<ul class="nav navbar-nav side-nav" id="sidenav01">
							<li>
								<a href="#" id="malbum" data-toggle="collapse" data-parent="#sidenav01" class="collapsed">
									<span class="glyphicon glyphicon-music"></span> Album
								</a>
							</li>
							<li><a id="mmplaylist" href="#" ><span class="glyphicon glyphicon-list"></span> Playlist </a></li>
							<li><a href="#"><span class="glyphicon glyphicon-globe"></span> Explorar </a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Cuenta </a></li>
						</ul>
					</div>
					
				</div>
			</nav>
			<div class="page-wrapper">
				<div class="row affix-row">
					
					
					<div id="izquierda"></div>
					<div id="central"></div>
					<div id="reproductor">
						<div class="col-sm-2 col-md-3 navbar-right affix-content">
							<audio controls='' id='audio' preload='metadata' tabindex='0' autobuffer="autobuffer" content-type='audio/mpeg'>
								<source src='' />
								Hola, tu navegador no está actualizado y no puede mostrar este contenido.
							</audio>
							
							<div id='player'>
								<div class="botonespl">
									<div class="addplaylist"><span class="glyphicon glyphicon-plus"></span></div>
								</div>
								<ul id='playerul'>
									
								</ul>
							</div>
							
						</div>
					</div>
					
					<div id="menu1">
						<ul>
							<li><div class="contmenu1"><a class="add-btn" href="#">Añadir a cola de reproduccion</a></div></li>
							<li class="divider"></li>
							<li><div class="titmenu1">Agregar a Playlist..</div></li>
							<div id="menu1pl"></div>
						</ul>
					</div>
					
					<div id="menu2">
						<ul>
							<li><div class="titmenu2">Agregar canciones</div></li>
							<li class="divider"></li>
							<li><div class="menu2selector"><a id="mventana1" data-toggle="" >Crear Playlist..</a></div></li>
						</ul>
					</div>
					
					<div id="menu3">
						<ul>
							<li><div class="contmenu3"><a class="rm-btn" href="#"> Quitar </a></div></li>
						</ul>
					</div>
					
					<div class="modal fade" id="ventana1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Ingrese el nombre de la Playlist</h4>
								</div>
								<div class="modal-body">
									<div class="input-group input-group">
										<input type="text" class="form-control" placeholder="Playlist" aria-describedby="sizing-addon2">
										<span class="help-block modal_red" style="display: none">Debe ingresar un nombre para la Playlist</span>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<button class="tonewpl btn btn-primary">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
        <script src="/estilos/js/plugins/morris/raphael.min.js"></script>
        <script src="/estilos/js/plugins/morris/morris.min.js"></script>
        <script src="/estilos/js/plugins/morris/morris-data.js"></script>
        <script src="/estilos/js/play.js"></script>
	</body>
	
</html>