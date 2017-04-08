<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();

$asuntoticket=trim($_POST['asuntoticket']);
$textoticket=trim($_POST['textoticket']);
$origen="B";

$u= new Admin ('','',$_SESSION["mai"]);
$DatosU=$u->consultaTipoAdmin($conex);
$IDU=$DatosU[0][3];

$t= new Ticket ('',$IDU,'',$asuntoticket,$textoticket,'','',$origen);
$ok=$t->altaTicket($conex);
if ($ok){
	?>
	<script language="javascript">
		window.alert("Se envió un nuevo Ticket: <?php echo $asuntoticket?>");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}else{
	?>
	<script language="javascript">
		window.alert("No se pudo dar de alta el ticket.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}

?>