<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Usuario.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php


$nom=trim($_POST['nombre']);
$ape=trim($_POST['apellido']);
$fnac=trim($_POST['nacimiento']);
$tel=trim($_POST['tel']);
$mail=trim($_POST['email']);
$pass=trim($_POST['pass']);
$gen=trim($_POST['genero']);
$nac=trim($_POST['nacionalidad']);
$feal=date("Y-m-d");
$conf="N";
$cla = GenerarClave(20,false); 

$url = "http://localhost:8080/presentacion/Registro.php?id=" . $cla;

$conex = conectar();
$u= new Usuario ('',$nom,$ape,$fnac,$tel,$mail,$pass,$gen,$nac,$feal,$conf,$cla);
$ok=$u->altaUsuario($conex);

if ($ok){
	
	$i= new Usuario('','','','','',$mail);
	$ids=$i->consultaIDUsuario($conex);
	$id = $ids[0][0];

	$c= new Usuario($id);
	$okc=$c->UsuarioGratuito($conex);

	ActivacionMail($mail, $nom, $ape, $url);
	?>
	<script language="javascript">
		window.alert("Gracias por registrarte.\nPor favor, inicie sesión.");
		location.href="/index.php";
	</script>
	<?php
	
}else{
	?>
	<script language="javascript">
		window.alert("El Usuario o Password \n no es correcto.");
		location.href="/presentacion/indice.php";
	</script>
	<?php
}
?>