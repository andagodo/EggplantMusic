<?php session_start() ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>EggPlantMusic</title>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
     <link rel="stylesheet" href="../estilos/css/play.css">
     <link rel="stylesheet" href="../estilos/css/audio.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
     <link href="/estilos/css/sb-admin.css" rel="stylesheet">
    <link href="/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
  </head>

  <body>
<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/presentacion/cargaMenu.php">EggplantMusic</a>
            </div>
			<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo "nombre"; ?> <b class="caret"></b></a>
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
                            <a href="/presentacion/logout.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
			</div>
			</div>
			
    
<div class="row affix-row">
<div class="col-sm-4 col-md-3 affix-sidebar">
<div class="sidebar-nav">
  <div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Sidebar menu</span>
    </div>
    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <ul class="nav navbar-nav" id="sidenav01">
        <li class="active">
          <a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
          <h2>
          EggPlantMusic
          <br></h2>
		  <h3>
         Profile 
          </h3>
          </a>
       
        </li>
        <li>
          <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicons glyphicons-albums"></span> Album
          </a>
       
        </li>
        <li class="">
          <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-inbox"></span> Submenu 2 <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo2" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="#">Submenu2.1</a></li>
              <li><a href="#">Submenu2.2</a></li>
              <li><a href="#">Submenu2.3</a></li>
            </ul>
          </div>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
        <li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>
		<audio controls='' id='audio' preload='auto' tabindex='0' type='audio/mpeg'>
		<source src='URL de la primera canción' type='audio/mp3'/>
		Hola, tu navegador no está actualizado y no puede mostrar este contenido.
		</audio>
	  </ul>

      </div><!--/.nav-collapse -->
	  	  <div id='player'>

</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/front_include/album.php"; ?>

<div id="central">hola </div>

 </body>
    
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
	<script src="../estilos/js/play.js"></script>

    
     <script src="/estilos/js/jquery.js"></script>

    <script src="/estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="/estilos/js/plugins/morris/morris.min.js"></script>
    <script src="/estilos/js/plugins/morris/morris-data.js"></script>

</html>
