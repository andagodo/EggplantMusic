<?php

  session_start();


  require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Usuario.class.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';

  $conex = conectar();
  $u= new Usuario ('','','','','',$_SESSION["mai"]);
  $Tipo=$u->consultaUno($conex);
  $nombre = $Tipo[0][1];
  $_SESSION['IdUsr'] = $Tipo[0][0];

  echo "<script type='text/javascript'> IdUsr = ".json_encode($_SESSION['IdUsr'])."</script>";

  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
      session_unset();
      session_destroy();
    ?>
    <script language="javascript">
      window.alert("Tiempo de espera excedido.");
      location.href="/portada_front/index.html";
    </script>
    <?php
  }else{
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
   
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>EggPlantMusic</title>
        

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      
      <link rel="stylesheet" href="../estilos/css/play.css">
      <link rel="stylesheet" href="../estilos/css/audio.css">
      <link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
      <link href="../estilos/css/sb-admin.css" rel="stylesheet">
      <link href="../estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
          <?php  echo $nombre; ?>
            </h3>
            </a>
         
          </li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
            <span class="glyphicon glyphicon-music"></span> Album
            </a>
         
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-list"></span> Playlist</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-globe"></span> Explorar </a></li>
          <li><a href=""><span class="glyphicon glyphicon-cog"></span> Cuenta</a></li>
  	  </ul>
      </div><!--/.nav-collapse -->
      
      </div>
      </div>
      </div>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/front_include/album.php"; ?>

      <div id="central"></div>
        <div id="reproductor">
          <div class="col-sm-2 col-md-3 navbar-right">
               <audio controls='' id='audio' preload='auto' tabindex='0' type='audio/mpeg'>
                  <source src='' type='audio/wav'/>
                  Hola, tu navegador no está actualizado y no puede mostrar este contenido.
              </audio>
         
            <div id='player'>
              <ul id='playerul'>
                <li><div class="addplaylist"><span class="glyphicon glyphicon-plus"></span></div></li>
              </ul>
            </div>
          </div>
        </div>
      <div id="menu1">
        <ul>
          <li>Menu cancion</li>
          <li><a class="add-btn" href="#">Añadir a cola de reproduccion</a></li>
        </ul>
      </div>
      <div id="menu2">
        <ul>
          <li>Agregar cancion</li>
          <li><a class="add-btn" href="#">Añadir a cola de reproduccion</a></li>
        </ul>
      </div>

      <script src="../estilos/js/play.js"></script>
      <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
      <script src="../estilos/js/plugins/morris/morris.min.js"></script>
      <script src="../estilos/js/plugins/morris/morris-data.js"></script>

      </body>
    <footer>
    </footer>
  </html>
<?php } ?>