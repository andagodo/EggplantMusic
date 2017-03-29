<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$tus=trim($_POST['tus']);
$nomu=trim($_POST['nomu']);
$mus=trim($_POST['mus']);
// $pus=trim($_POST['pus']);
$pus="0";
$feal=date("d/m/Y");
$activ="N";
$feactivo=date("d/m/Y");
$apell=trim($_POST['apeu']);
$cla = GenerarClave(20,false); 
$url = "http://localhost:8080/presentacion/RegistroBackEnd.php?id=" . $cla;


$conex = conectar();
$u= new Admin ($tus,$nomu,$mus,$pus,$feal,$activ,$feactivo,$apell,$cla);
$m= new Admin ('','',$mus,'','','','','');


$ok=$m->ConsultoExisteAdmin($conex);

if ($ok == false){
	
	?>
	<script language="javascript">
		window.alert("El correo que ingresó ya se encuentra registrado.\nPor favor ingrese otro.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
	
}elseif ($ok == true){
	
	$ok=$u->altaAdmin($conex);
	if ($ok){
		
		ActivacionMail($mus, $nomu, $apell, $url);
		
		?>
		<script language="javascript">
			window.alert("Se creo un nuevo Administrador: <?php echo $nomu?> <?php echo $apell ?>");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}else{
		?>
		<script language="javascript">
			window.alert("Ocurrio un error.\n Vuelva a intentarlo.");
			location.href="/presentacion/Menu.php";
		</script>
		<?php
	}
// desconectar($conex);
}
?>
