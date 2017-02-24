<html>

	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"> <!-- Especifica que el contenido es de tipo HTML y que utiliza la serie de caracteres unicode UTF-8-->
		<title>Eggplant Music</title>
		<script src="/estilos/js/jquery.js"></script>
		<link rel="stylesheet" type ="text/css" href="/estilos/css/bootstrap.css" />	<!-- Levanta hoja de estilos CSS de bootstrap-->
		<script src="/estilos/js/bootstrap.js"></script> <!-- Levanta la hoja de JavaScript de bootstrap-->
		<link href="/estilos/css/signin.css" rel="stylesheet">	<!-- Levanta hoja de estilos CSS de bootstrap-->
	</head>

	<body>
		<center><img src="/img/backend.png" alt="Eggplant Music"> </center>
		<div class="container">

			<?php
			if(! isset($_GET["id"])){
			?>
		
				<h1 class="form-signin-heading" p align="center"><u>Administraci&#243;n</u></h1>
				<form action="/logica/ingresoSistema.php" method="POST" id="FrmIngreso"enctype="application/x-www-form-urlencoded" class="form-signin"> <!-- Formulario de inicio de sesión apuntando a "/logica/ingresoSistema.php" -->
					<h2 class="form-signin-heading">Iniciar sesi&#243;n</h2>
					<label name="NomUsuario" for="inputEmail" class="sr-only">Email</label>		<!-- Etiqueta de Email-->
					<input name="NomUsuario" id="NomUsuario" class="form-control" placeholder="Direcci&#243;n de Email" required="" autofocus="" type="email">	<!-- Campo par escribir email y almacenada en NomUsuario-->
					<label name="PassUsuario" for="inputPassword" class="sr-only">Password</label>		<!-- Etiqueta de Contraseña-->
					<input name="PassUsuario" id="PassUsuario" class="form-control" placeholder="Contrase&ntilde;a" required="" type="password"> </br>	<!-- Campo par escribir contrasela y almacenada en PassUsuario-->
					<input  class="btn btn-lg btn-primary btn-block" type="submit" value="Ingresar"  title="Ingresar a la aplicación" />    <!-- Boton de ingresar, toma acción del formulario-->
				</form>	

			<?php
			}else{
				$clave = $_GET["id"];
				?>
				
				<script>
				
					function CoincidePass(){ 
						npass = document.pass.npass.value 
						npass2 = document.pass.npass2.value 
							if (npass == npass2)
								document.getElementById('passid').action = "/presentacion/RegistroBackEnd.php"; 
							else 
						window.alert("Las claves ingresadas no coinciden. \nIntenta nuevamente.")
					}
				</script>	
				
				<h1 class="form-signin-heading" p align="center"><u>Administraci&#243;n</u></h1>
				<form method="POST" name="pass" id="passid" enctype="application/x-www-form-urlencoded" class="form-signin">
					<h2 class="form-signin-heading">Bienvenido!</h2>
					<h3 class="form-signin-heading">Establezca su clave:</h3>
					<input id="clave" name="clave" style="visibility:hidden" value="<?php echo $clave ?> "> </input> 
					<input id="npass" name="npass" class="form-control" placeholder="Contrase&ntilde;a" required="" autofocus="" type="password"></input>
					<input id="npass2" name="npass2" class="form-control" placeholder="Repita Contrase&ntilde;a" required="" type="password"></input></br>
				<button class="btn btn-lg btn-primary btn-block" id="ConfigAdmin" onClick="CoincidePass()" />Establecer</button>
				</form>					
				
				
			<?php
			}
			?>
			
		</div>
	</body>
	
</html>