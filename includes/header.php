<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';


$conex = conectar();
$u= new Admin ('','','',$_SESSION["mai"]);

$Tipo=$u->consultaTipoAdmin($conex);
$rol = $Tipo[0][0];
$nombre = $Tipo[0][1];
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
		    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/presentacion/cargaMenu.php">EggplantMusic // Administración</a>
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
                            <a href="/presentacion/logout.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>