<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="/estilos/portada/js/jquery.min.js"></script>
<script type="text/javascript" src="/estilos/portada/js/jquery-ui.min.js"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EggplantMusic">
    <meta name="author" content="EggplantBlue">
    <title>EggplantMusic - Let's rolling</title>
    <link href="/estilos/portada/css/bootstrap.min.css" rel="stylesheet">
    <link href="/estilos/portada/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='/estilos/portada/fonts/italicGoogle.css' stylesheet' type='text/css'>
    <link href='/estilos/portada/fonts/MerriweatherGoogle.css' rel='stylesheet' type='text/css'>
    <link href="/estilos/portada/css/creative.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Eggplant Music</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#pruebalo">Pruébalo</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#registro">Registro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#caracteristicas">Características</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#musica">Música</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contacto">Contacto</a>
                    </li>
					<li>                  
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Acceder <b class="caret"></b></a>			
					<ul class="dropdown-menu">
						<form action="/front_logica/ingresoSistema.php" method="POST" id="FrmIngreso"enctype="application/x-www-form-urlencoded" class="form-signin">
						<li>
                            <i class="fa fa-fw fa-envelope"></i> Mail:
                        </li>
						<li>
							<input name="NomUsuario" id="NomUsuario" class="form-control" placeholder="Direcci&#243;n de Email" required="" autofocus="" type="email">
						</li>
						</br>
						<li>
                            <i class="fa fa-fw fa-user"></i> Contraseña:
                        </li>
						<li>
							<input name="PassUsuario" id="PassUsuario" class="form-control" placeholder="Contrase&ntilde;a" required="" type="password">
                        </li>
						<li class="divider"></li>
                        <li>
							<a><center><input class="btn" type="submit" value="Ingresar"  title="Ingresar a la aplicación" /></center></a>
                        </li>
						</form>
					</ul>
					</li>
                
				</ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
			<img src="/img/portada/LOGO.png" class="img-responsive" alt="">
				<h2 id="homeHeading"><font color=#330000">Una nueva forma de escuchar música</font color></h2>
                <hr>
                <p><font color=#550022">Inicia sesión en <b>Eggplant Music</b> para disfrutar del catálogo mas grande de música online! Podrás disfrutar de música gratuitamente y utilizar el servicio donde quieras que estés!</font color></p>
                <a href="#registro" class="btn btn-primary btn-xl page-scroll">Pruébalo!</a>

            </div>
        </div>
    </header>

    <section class="bg-primary" id="pruebalo">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Toda la música que puedas escuchar!</h2>
                    <hr class="light">
                    <p class="text-faded">Con Eggplant Music podrás escuchar una extensa biblioteca de música con Playlist preparadas por nuestros expertos, además de crear las tuyas con una cuenta gratuita.</p>
                    <a href="#registro" class="page-scroll btn btn-default btn-xl sr-button">Regístrate!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="registro">	
		<aside class="bg-dark">
			<div class="container text-center">
				<div class="call-to-action">
					<h2>Registro</h2>
					<hr class="light">
					</br>
					
<!-- /////////////////////COMIENZO FORMULARIOOOO///////////////////////////////// -->

<div class="row">
<div class="col-lg-8">

<form class="form-horizontal" role="form" action='/logica/NuevaUsuario.php' method="POST">

  <div class="form-group">
    <label for="ejemplo_nombre_3" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
    </div>
  </div>
  
   <div class="form-group">
    <label for="ejemplo_apellido_3" class="col-lg-2 control-label">Apellido</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
    </div>
  </div>
  
    <div class="form-group">
	    <label for="ejemplo_apellido_3" class="col-lg-2 control-label">F. Nacimiento</label>
		<div class="col-lg-8">
			<input type="date" class="form-control" name="nacimiento" step="1" min="1900-01-01" max="2016-12-31" placeholder="Día(DD) / Mes(MM) / Año(AAA)" required>
		</div>
	</div>  
  
   <div class="form-group">
    <label for="ejemplo_apellido_3" class="col-lg-2 control-label">Teléfono</label>
    <div class="col-lg-8">
      <input type="tel" class="form-control" name="tel" placeholder="Teléfono" required>
    </div>
  </div>  
  
  <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-8">
      <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Contraseña</label>
    <div class="col-lg-8">
      <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
    </div>
  </div>

   <div class="form-group">
		<label for="ejemplo_password_3" class="col-lg-2 control-label">Género</label>
       <div class="col-xs-2">
           <label class="radio-inline">
               <input type="radio" name="genero" value="M" required> Maculino
           </label>
       </div>
       <div class="col-xs-2">
           <label class="radio-inline">
               <input type="radio" name="genero" value="F" required> Femenino
           </label>
       </div>
   </div>
   
 
   <div class="form-group">
    <label for="ejemplo_apellido_3" class="col-lg-2 control-label">Nacionalidad</label>
    <div class="col-lg-8">
		<select class="form-control" name='nacionalidad' required>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/includes/selectpais.php';
			?>
		</select>
	</div>			
  </div>
 
    <div class="form-group">
        <div class="col-lg-8">
            <label class="checkbox-inline">
                <input type="checkbox" value="agree" required>  Accepto <a href="#">Terminos y condiciones</a>.
            </label>
        </div>
    </div>
    <br>  
   
   
    <button type="submit" class="btn btn-default btn-xl sr-button">Registrarse!</button>


</form>
</div>

<div class="col-lg-4">
<h2>Bienvenido al registro a Eggplant Music!</h2></br>
<p>Regístrese para acceder a nuestra aplicación Web de Música en Streaming, su cuenta inicialmente será gratuira, pero luego podrá hacer un upgrade de su cuenta a la modalidad Premium, o VIP!.</p>
<p>Con su cuenta gratuita podrá escuchar todo el catálogo de música y crear hasta tres Playlist personalizadas, si se actualiza a Premium podrá crear hasta 10 Playlist y no tendrá publicidad en su cuenta, y si desea cuenta VIP! podrá crear Playlists ilimitadas y sin publicidad!</p>
</div>
</div>

<!-- /////////////////////TERMINO FORMULARIOOOO///////////////////////////////// -->

				</div>
			</div>
		</aside>	
	</section>
	
	
    <section id="caracteristicas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Características</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Tipos de Cuenta</h3>
                        <p class="text-muted">Selecciona entre los diferentes tipos de cuenta disponibles, Free, Premium o VIP!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Tickets de Soporte</h3>
                        <p class="text-muted">Podrás enviarnos tu ticket de siporte si te encuentras con algún problema.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Siempre Actualizados</h3>
                        <p class="text-muted">Mantenemos nuestra biblioteca de música siempre con las últimas tendencias mundiales.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Expertos en Música</h3>
                        <p class="text-muted">Escucha las Playlist creadas por expertos en Música, o crea Playlist personales para escuchar cuando desees!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="musica">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="/img/portada/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                </div>
                                <div class="project-name">
                                    Metal
                                </div>
                            </div>
                        </div>
					</a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="/img/portada/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                </div>
                                <div class="project-name">
                                    POP
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="/img/portada/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                </div>
                                <div class="project-name">
                                    Relax
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="/img/portada/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                </div>
                                <div class="project-name">
                                    Rock Alternativo
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="/img/portada/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                </div>
                                <div class="project-name">
                                    Electrónica
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="/img/portada/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                </div>
                                <div class="project-name">
                                    Soul
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contáctenos!</h2>
                    <hr class="primary">
                    <p>Puedes comunicarte con nosotros por cualquier de los siguientes métodos. Ya sea por consultas, soporte de nuestro servicio o información, escríbenos y nos comunicaremos contigo a la brevedad!</p>
                </div>
                <div class="col-lg-3 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>+598 2480 1234</p>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:contacto@eggplantblue.com.uy">contacto@eggplantblue.com.uy</a></p>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fa fa-question fa-3x sr-contact"></i>
                    <p><a href="/front_presentacion/ayudafaq.php">Ayuda / FAQ</a></p>
                </div>
            </div>
        </div>
    </section>

    <script src="/estilos/portada/jquery/jquery.min.js"></script>
    <script src="/estilos/portada/js/bootstrap.min.js"></script>
    <script src="/estilos/portada/jquery/jquery.easing.min.js"></script>
    <script src="/estilos/portada/js/scrollreveal.min.js"></script>
    <script src="/estilos/portada/js/jquery.magnific-popup.min.js"></script>
    <script src="/estilos/portada/js/creative.min.js"></script>

</body>

</html>