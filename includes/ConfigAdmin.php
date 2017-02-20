<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
session_start();
$conex = conectar();

if(! isset($_SESSION["mai"])){
?>
<script src="/estilos/js/jsmenu.js"></script>
 <script language="javascript">
   window.alert("Debes de estar logeado para ingresar a esta página.");
   location.href="/presentacion/indice.php";
 </script>
<?php
}

$u= new Admin ('','',$_SESSION["mai"]);		// Crea una nueva clase de tipo Admin con el valor de mail almacenado en la sesión actual, ésto lo almacena en $u
$Tipo=$u->consultaTipoAdmin($conex);		// Ejecuta la función consultaTipoAdmin con los valores de $u y la conexión $conex, almacena el resultado en $Tipo
$nombre = $Tipo[0][1];		// Almacena en $nombre el valor devuelto por la función consultaTipoAdmin que se encuentra en la variable $Tipo posición [0][1]
$apellido = $Tipo[0][2];

?>




		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Configuración de Administrador
                        </h1>
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


		
function CoincidePass(){ 
   	npass = document.pass.npass.value 
   	npass2 = document.pass.npass2.value 

   	if (npass == npass2)
		
		document.getElementById('passid').action = "/logica/ProcesaConfigAdmin.php";
		
   	else 
		window.alert("Las claves ingresadas no coinciden. \nIntenta nuevamente.")
		$("#DASH").load('/includes/ConfigAdmin.php');
		
}

</script> 			
	
			<div class="row">
			    
                <div class="col-lg-6">
				<h3 class="page-header"> Bienvenido  <?php  echo $nombre; ?> <?php  echo $apellido; ?> </h3>
				<h4 class="page-header"> Cambiar Password </h4>
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
					
					<h4 class="page-header"> Eliminar Cuenta </h4>
					<form role="form" name="eliminarcuenta" method="POST" Action='/logica/ProcesaConfigAdmin.php'>
					
						<div class="form-group">
							<label for="exampleInputPassword1">Escriba su contraseña</label>
							<input type="password" class="form-control" name='pusEC' required/>
						</div>
						
						<button class="btn btn-default" id="ConfigAdminEliminaCuenta" value="Eliminar Cuenta" onClick="CoincidePass()">Eliminar Cuenta</button>
						
					</form></br>
			</div>

		</div>

<!--

		
public function checkPassword($pwd, &$errors) {
    $errors_init = $errors;

    if (strlen($pwd) < 8) {
        $errors[] = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors[] = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors[] = "Password must include at least one letter!";
    }     

    return ($errors == $errors_init);
}

