<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
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

$u= new Admin ('','',$_SESSION["mai"]);

$Tipo=$u->consultaTipoAdmin($conex);
$rol = $Tipo[0][0];
$nombre = $Tipo[0][1];



if (isset($_SESSION["LAST_ACTIVITY"])) {
    if (time() - $_SESSION["LAST_ACTIVITY"] > 50) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
		?>
	<script language="javascript">
		window.alert("Tiempo de espera excedido.");
		location.href="/presentacion/indice.php";
	</script>
	<?php
    } else if (time() - $_SESSION["LAST_ACTIVITY"] > 1) {
        $_SESSION["LAST_ACTIVITY"] = time(); // update last activity time stamp
    }
}

//////////SHOW y HIDE de los diferentes Menú//////////////////

include $_SERVER['DOCUMENT_ROOT'] . "/presentacion/Show.php";

?>


<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EggplantMusic - Administración">
    <meta name="author" content="EggplantMusic">

    <title>EggplantMusic - Admin</title>
	<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
    <link href="../estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilos/css/sb-admin.css" rel="stylesheet">
    <link href="../estilos/css/plugins/morris.css" rel="stylesheet">
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
                <a class="navbar-brand" href="../presentacion/Menu.php">EggplantMusic // Administración</a>
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
                            <a href="../presentacion/logout.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>

	        <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li id="menumusicadashboard">
                        <a href="#" id="musicdash"><i class="fa fa-fw fa-dashboard"></i> Music Dashboard</a>
                    </li>
                    <li id="menusuperdashboard">
                        <a href="#" id="sadmindash"><i class="fa fa-fw fa-dashboard"></i> Super Admin Dashboard</a>
                    </li>					
                    <li id="menuplaylistdashboard">
                        <a href="#" id="playlistdash"><i class="fa fa-fw fa-dashboard"></i> Playlist Dashboard</a>
                    </li>
                    <li id="menuticketdashboard">
                        <a href="#" id="ticketdash"><i class="fa fa-fw fa-dashboard"></i> Ticket Dashboard</a>
                    </li>
					
                    <li id="menusadmin">
                        <a href="javascript:;" data-toggle="collapse" data-target="#sadmin"><i class="fa fa-fw fa-arrows-v"></i> Administradores <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="sadmin" class="collapse">
							<li>
								<a href="#" id="altaadmin"><i class="fa fa-fw fa-edit"></i> Alta Admin</a>
							</li>
							<li>
								<a href="#" id="bajaadmin"><i class="fa fa-fw fa-edit"></i> Baja Admin</a>
							</li>
                        </ul>
                    </li>					
					
					
                    <li id="menumusica">
                        <a href="javascript:;" data-toggle="collapse" data-target="#musica"><i class="fa fa-fw fa-arrows-v"></i> Canciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="musica" class="collapse">
							<li>
								<a href="#" id="altamusica"><i class="fa fa-fw fa-edit"></i> Alta Musica</a>
							</li>
							<li>
								<a href="#" id="bajamusica"><i class="fa fa-fw fa-edit"></i> Baja Musica</a>
							</li>
                        </ul>
                    </li>

                    <li id="menualbum">
                        <a href="javascript:;" data-toggle="collapse" data-target="#album"><i class="fa fa-fw fa-arrows-v"></i> Álbums <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="album" class="collapse">
							<li>
								<a href="#" id="altaalbum"><i class="fa fa-fw fa-table"></i> Alta Álbum</a>
							</li>
							<li>
								<a href="#" id="bajaalbum"><i class="fa fa-fw fa-edit"></i> Baja Álbum</a>
							</li>
                        </ul>
                    </li>					

                    <li id="menugenero">
                        <a href="javascript:;" data-toggle="collapse" data-target="#genero"><i class="fa fa-fw fa-arrows-v"></i> Géneros <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="genero" class="collapse">
							<li>
								<a href="#" id="altagenero"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Género</a>
							</li>
							<li>
								<a href="#" id="bajagenero"><i class="fa fa-fw fa-edit"></i> Baja Género</a>
							</li>
                        </ul>
                    </li>

					
                    <li id="menuinterprete">
                        <a href="javascript:;" data-toggle="collapse" data-target="#interprete"><i class="fa fa-fw fa-arrows-v"></i> Intérpretes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="interprete" class="collapse">
							<li>
								<a href="#" id="altainterprete"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Intérprete</a>
							</li>
							<li>
								<a href="#" id="bajainterprete"><i class="fa fa-fw fa-edit"></i> Baja Intérprete</a>
							</li>
                        </ul>
                    </li>					
					
					
                    <li id="menuasocia">
                        <a href="javascript:;" data-toggle="collapse" data-target="#asocia"><i class="fa fa-fw fa-arrows-v"></i> Asociaciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="asocia" class="collapse">
							<li>
								<a href="#" id="asociainterprete"><i class="fa fa-fw fa-bar-chart-o"></i> Canción - Interprete</a>
							</li>
							<li>
								<a href="#" id="asociaalbum"><i class="fa fa-fw fa-edit"></i> Canción - Álbum</a>
							</li>
                        </ul>
                    </li>
					
					
                    <li id="menuplaylist">
                        <a href="javascript:;" data-toggle="collapse" data-target="#playlist"><i class="fa fa-fw fa-arrows-v"></i> Playlists <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="playlist" class="collapse">
							<li>
								<a href="#" id="altaplaylist"><i class="fa fa-fw fa-bar-chart-o"></i> Alta Playlist</a>
							</li>
							<li>
								<a href="#" id="bajaplaylist"><i class="fa fa-fw fa-edit"></i>Baja Playlist</a>
							</li>
							<li>
								<a href="#" id="modificaplaylist"><i class="fa fa-fw fa-bar-chart-o"></i>Modifica Playlist</a>
							</li>
							<li>
								<a href="#" id="estadisticas"><i class="fa fa-fw fa-edit"></i>Estadisticas</a>
							</li>
                        </ul>
                    </li>					
					
                    <li id="menuticket">
                        <a href="javascript:;" data-toggle="collapse" data-target="#ticket"><i class="fa fa-fw fa-arrows-v"></i> Tickets <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ticket" class="collapse">
							<li>
								<a href="#" id="respticket"><i class="fa fa-fw fa-bar-chart-o"></i>Responder Ticket</a>
							</li>
							<li>
								<a href="#" id="bajaticket"><i class="fa fa-fw fa-edit"></i>Eliminar Ticket</a>
							</li>
                        </ul>
                    </li>							
					
					
					
					
 <!--                   <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
					
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>

                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
					
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
					
-->	
	
                </ul>
            </div>	
        </nav>

<div id="DASH">	
</div>

	<script src="../estilos/js/jsmenu.js"></script>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris-data.js"></script>

</body>
