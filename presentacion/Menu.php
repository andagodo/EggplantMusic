<?php
session_start();	// Reanuda la sesión de /logica/ingresoSistema.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';		// Requiere la clase Admin
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php'; 		// Requiere la logica de funciones (Aquí conecta a la base)
$conex = conectar(); // Almacela la función "conectar" que se encuentra en '/logica/funciones.php' en la variable $conex

?>
<!-- 
<script src="http://malsup.github.com/jquery.form.js"></script>

-->
<script src="/estilos/js/jquery.min.js"></script>
<script src="/estilos/js/jquery.form.js"></script> 
<!-- <script src="/estilos/js/jquery.js"></script>	 Llama al archivo de JavaScript externo jquery.js que contiene información de Bootstrap -->
<!-- <script src="/estilos/js/plugins/morris/morris.min.js"></script> -->

<!-- <script src="/estilos/js/jsmenu.js"></script>	--> <!-- Llama al archivo de JavaScript externo jsmenu.js que contiene funciones para la visualizacion de diferentes funcionalidades de los Administradores -->

<?php
if(! isset($_SESSION["mai"])){	// Si no está presente el valor del mail almacenada en la sesión del sistema, se ejecuta un javascript que muestre alerta y te lleve al indice del BackEnd.
?>

	<script language="javascript">
		window.alert("Debes de estar logeado para ingresar a esta página.");
		location.href="/presentacion/indice.php";
	</script>

<?php
}

$u= new Admin ('','',$_SESSION["mai"]);		// Crea una nueva clase de tipo Admin con el valor de mail almacenado en la sesión actual, ésto lo almacena en $u
$Tipo=$u->consultaTipoAdmin($conex);		// Ejecuta la función consultaTipoAdmin con los valores de $u y la conexión $conex, almacena el resultado en $Tipo
$rol = $Tipo[0][0];			// Almacena en $rol el valor devuelto por la función consultaTipoAdmin que se encuentra en la variable $Tipo posición [0][0]
$nombre = $Tipo[0][1];		// Almacena en $nombre el valor devuelto por la función consultaTipoAdmin que se encuentra en la variable $Tipo posición [0][1]
$apellido = $Tipo[0][2];

////////////////////////////// ARREGLAR SECCIÓN DE TIMEOUT ///////////////////////////////
	// Almacena la última actividad del usuario

if (isset($_SESSION['LAST_ACTIVITY'])) {

  if (time() - $_SESSION['LAST_ACTIVITY'] > 5) {

     // session timed out
     session_unset();     // unset $_SESSION variable for the run-time 
     session_destroy();   // destroy session data in storage
  } elseif (time() - $_SESSION['LAST_ACTIVITY'] > 1) {
	  
	$_SESSION['LAST_ACTIVITY'] = time();
    // session ok

 }
}

//////////////////////////////////////////////////////////////////////////////////////////


//////////Incluye porción de código que contiene todos los SHOW y HIDE de los diferentes Menú////////////

include $_SERVER['DOCUMENT_ROOT'] . "/presentacion/Show.php";

/////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EggplantMusic - Administración">
    <meta name="author" content="EggplantMusic">

    <title>EggplantMusic - Admin</title>
	<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
    <link href="/estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="/estilos/css/sb-admin.css" rel="stylesheet">
    <link href="/estilos/css/plugins/morris.css" rel="stylesheet">
    <link href="/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>


<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		
		<!------------------------------------------- INICIO Barra superior -------------------------------------------->
		
		    <div class="navbar-header">				<!-- Barra superior izquierza -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/presentacion/Menu.php">EggplantMusic // Administración</a>
            </div>
			
			<ul class="nav navbar-right top-nav">		<!-- Barra superior derecha con nombre y menú de opciones de usuario. -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $nombre; ?> <?php  echo $apellido; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Mensajes</a>
                        </li>
                        <li>
                            <a href="#" id="ConfigAdmin"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/presentacion/logout.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
			<!------------------------------------------- FIN Barra superior -------------------------------------------->
			
	        <div class="collapse navbar-collapse navbar-ex1-collapse">
			<!-------------------------------------- 	INICIO Barra lateral izquierda -------------------------------------------->
			<!-- Barra lateral izquierda con todas las posibilidades del BackEnd, se activan o desactivan según el rol del Administrador.
				Se cargan referencias con el "#" e "id" para levantar el menú que corresponda, se ocultan o activan en /presentacion/Show.php.
				Incialmente se carga la página Dashoard en el div #DASH, luego cambia según la funcionalidad que se haga click.
				Aquí se encuentran los items con los dropdown de cada -->
			
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
							<li>
								<a href="#" id="modificaadmin"><i class="fa fa-fw fa-edit"></i> Mofificar Admin</a>
							</li>
                        </ul>
                    </li>					

                    <li id="menucuenta">
                        <a href="javascript:;" data-toggle="collapse" data-target="#cuenta"><i class="fa fa-fw fa-arrows-v"></i> Cuentas FrontEnd <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cuenta" class="collapse">
							<li>
								<a href="#" id="altacuenta"><i class="fa fa-fw fa-edit"></i> Alta Cuenta</a>
							</li>
							<li>
								<a href="#" id="modificacuenta"><i class="fa fa-fw fa-edit"></i> Mofificar Cuenta</a>
							</li>
                        </ul>
                    </li>
					
					
                    <li id="menumusica">
                        <a href="javascript:;" data-toggle="collapse" data-target="#musica"><i class="fa fa-fw fa-arrows-v"></i> Música <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="musica" class="collapse">
							<li>
								<a href="#" id="altamusica"><i class="fa fa-fw fa-edit"></i> Alta Música</a>
							</li>
							<li>
								<a href="#" id="bajamusica"><i class="fa fa-fw fa-edit"></i> Baja Música</a>
							</li>
							<li>
								<a href="#" id="altaalbum"><i class="fa fa-fw fa-table"></i> Alta Álbum s/ Música</a>
							</li>
							<li>
								<a href="#" id="habilitamusica"><i class="fa fa-fw fa-edit"></i> Hab / Deshab Música</a>
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
							<li>
								<a href="#" id="modgenero"><i class="fa fa-fw fa-edit"></i> Modificar Género</a>
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
			<!-------------------------------------- 	FIN Barra lateral izquierda -------------------------------------------->			
        </nav>

		
<div id="DASH">
<!-- El div #DASH es el utilizado para cargar la página cental del sistema, puede ser el dashboard del Administrador o algúna página de una funcionalidad.
	Visualmente se carga en este punto, y se ejecuta cuando se hace click en uno de las funcionalidades.
	El que ejecuta la acción es un archivo .js que contiene funciones javaScript, "/estilos/js/jsmenu.js". a este archivo se hace referencia al principio
	y al final del archivo Menu.php-->
</div>


	<!-- Carga de archivos .js propios de bootstrap y del menú -->
	<script src="/estilos/js/jsmenu.js"></script>
    <script src="/estilos/js/bootstrap.min.js"></script>
    <script src="/estilos/js/plugins/morris/raphael.min.js"></script>
   <!--  <script src="/estilos/js/plugins/morris/morris.min.js"></script> 
    <script src="/estilos/js/plugins/morris/morris-data.js"></script>	-->

</body>