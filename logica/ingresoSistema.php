<?php
session_start();	// Inicia una nueva sesión
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';		// Requiere la clase Admin
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';		// Requiere la logica de funciones (Aquí conecta a la base)
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" /> <!-- Levanta la hora de estilos estilos.css -->
<?php

$mai=trim($_POST['NomUsuario']);	// Levanta por POS la información de mail de /presentacion/indice.php y la almacena en la variable $mai
$pass=trim($_POST['PassUsuario']);	// Levanta por POS la información de contraseña de /presentacion/indice.php y la almacena en la variable $pass
$_SESSION["mai"] = $mai;			// Almacena en Sesiión la información de la variable $mai

$salt = '34a@$#aA9823$';				// Variable $salt con código para luego encriptar la contraseña
$pass= hash('sha512', $salt . $pass);	// Encripta la contraseña de la variable $pass con SHA512 y el código de $salt y lo almacena nuevamente en $pass

$conex = conectar();				// Almacela la función "conectar" que se encuentra en '/logica/funciones.php' en la variable $conex
$u= new Admin ('','',$mai,$pass);	// Crea un nuevo objeto de tipo "Admin" con los datos de la variables $mai y $pass y lo almacena en la variable $u

$ok=$u->coincideLoginAdmin($conex); // Ejecuta la función coincideLoginAdmin con los valores de $u y la conexión $conex, almacena el resultado en $ok

if ($ok == 1) {			// Si $ok devuelve 1, accede a esta condición y se ejecuta un comando JavaScript que nos lleva a /presentacion/Menu.php

?>
	<script language="javascript">
		location.href="/presentacion/Menu.php";
	</script>  
<?php

}elseif ($ok == 2){		// Si $ok nos devuelve 2, nos muestra un mensaje de Usuario o Password incorrecto y nos devuelve a /presentacion/indice.php

?>
	<script language="javascript">
		window.alert("El Usuario o Password no es correcto.");
		location.href="/presentacion/indice.php";
	</script>
<?php

}elseif ($ok == 3){		// Si $ok nos devuelve 3, nos muestra un mensaje de Usuario deshabilitado y nos devuelve a /presentacion/indice.php
?>
	<script language="javascript">
		window.alert("Su usuario está deshabilitado, por favor contáctenos: \nadmin@eggplantblue.com.uy.");
		location.href="/presentacion/indice.php";
	</script>
<?php

	
}

desconectar($conex);
?>