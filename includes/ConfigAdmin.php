<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
session_start();
$conex = conectar();

if(! isset($_SESSION["mai"])){
?>
<script src="/estilos/js/jsfunciones.js"></script>

<script language="javascript">
	window.alert("Debes de estar logeado para ingresar a esta página.");
	location.href="/presentacion/indice.php";
</script>
<?php
}

$u= new Admin ('','',$_SESSION["mai"]);		// Crea una nueva clase de tipo Admin con el valor de mail almacenado en la sesión actual, ésto lo almacena en $u
$Tipo=$u->consultaTipoAdmin($conex);		// Ejecuta la función consultaTipoAdmin con los valores de $u y la conexión $conex, almacena el resultado en $Tipo
$nombre = $Tipo[0][1];		// Almacena en $nombre el valor devuelto por la función consultaTipoAdmin que se encuentra en la variable $Tipo posición [0][1]
$apellido = $Tipo[0][2];	// Almacena en $apellido el valor devuelto por la función consultaTipoAdmin que se encuentra en la variable $Tipo posición [0][2]

///////////////////////////////////////////TIMEOUT//////////////////////////////////////////////////
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
      session_unset();
      session_destroy();
    ?>
    <script language="javascript">
      window.alert("Tiempo de espera excedido.");
      location.href="/";
    </script>
    <?php
  }else{
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  }
 ///////////////////////////////////////////TIMEOUT//////////////////////////////////////////////////
?>

<!-- Barra superior de página actual -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Configuración de Administrador </h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i>  <a href="/presentacion/Menu.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-edit"></i> Configuración de Administrador
					</li>
				</ol>
			</div>
		</div>
				
	</div>




<script>

 /* Función Javascript que verifica que las dos contraseñas sean iguales, si son iguales ejecuta la acción del formulario, en caso contrario da mensaje de error */

	function CoincidePass(){ 
		npass = document.pass.npass.value 
		npass2 = document.pass.npass2.value 
		if (npass == npass2)

			document.getElementById('passid').action = "/logica/ProcesaConfigAdmin.php";
		else 
			window.alert("Las claves ingresadas no coinciden. \nIntenta nuevamente.")
			$("#DASH").load('/includes/ConfigAdmin.php');
	}

/* Función Javascript que verifica si se escribió algo en por lo menos uno de los campos de Nombre y Apellido, si no se escribió nada da mensaje de error */
/*	Si en uno de los campos se escribió algo, ejecuta la acción del formulario */

	function NombreApellido(){ 
		nomu = document.nomape.nomu.value 
		apeu = document.nomape.apeu.value 
		if (nomu == '' && apeu == '')
			window.alert("Debes de completar un campo por lo menos.")
		else
			document.getElementById('nomapeid').action = "/logica/ProcesaConfigAdmin.php";

	}	
</script> 			
	
	<div class="row">
		<div class="col-lg-6">
			<h3 class="page-header"> Bienvenido  <?php  echo $nombre; ?> <?php  echo $apellido; ?> </h3>
			
			
			<!-- Formulario para editar Nombre y Apellido -->
			
			<h4 class="page-header"> Editar Nombre / Apellido</h4>
			<form role="form" name="nomape" method="POST" id="nomapeid">
			
				<div class="form-group">
					<label>Nombre:</label>
					<input class="form-control" name='nomu' placeholder="<?php  echo $nombre; ?>"/>
				</div>
				
				<div class="form-group">
					<label>Apellido:</label>
					<input class="form-control" name='apeu' placeholder="<?php  echo $apellido; ?>"/>
				</div>	
				
				<button class="btn btn-default" id="NomApe" value="Editar" onClick="NombreApellido()">Editar</button>
			</form></br>

			
			<!-- Formulario para cambiar Password -->
			
			<h4 class="page-header"> Cambiar Password</h4>
			<form role="form" name="pass" method="POST" id="passid">

				<div class="form-group">
					<label for="exampleInputPassword1">Password Actual</label>
					<input type="password" class="form-control" name='pus' required/>
				</div>					
					
				<div class="form-group">
					<label for="exampleInputPassword1">Password Nueva</label>
					<input type="password" class="form-control" name='npass' required/>
				</div>	
				
				<div class="form-group">
					<label for="exampleInputPassword1">Repita Password Nueva</label>
					<input type="password" class="form-control" name='npass2' required/>
				</div>
				
				<p> Requedra que tu clave deberá de contener como mínimo:</P>
				<li>8 caracteres. </li>
				<li>Una minúscula. </li>
				<li>Una mayúscula. </li>
				<li>Un número. </li>
				</br>
				<button class="btn btn-default" id="ConfigAdmin" value="Comprobar si son iguales" onClick="CoincidePass()">Cambio de clave</button>
			
			</form></br>
			
			
			<!-- Formulario para deshabilitar cuenta -->
			
			<h4 class="page-header"> Eliminar Cuenta </h4>
			<form role="form" name="eliminarcuenta" method="POST" Action='/logica/ProcesaConfigAdmin.php'>
			
				<div class="form-group">
					<label for="exampleInputPassword1">Escriba su contraseña</label>
					<input type="password" class="form-control" name='pusEC' required/>
				</div>
			
				<button class="btn btn-default" id="ConfigAdminEliminaCuenta" value="Eliminar Cuenta">Eliminar Cuenta</button>
				
			</form></br>
		</div>
	</div>