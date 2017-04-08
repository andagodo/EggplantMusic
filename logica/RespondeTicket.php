<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();

$idt=trim($_POST['idticket']);
$res=trim($_POST['estadoticket']);
$tex=trim($_POST['textoticket']);
$t= new Ticket ($idt,'','','','',$tex,$res);
$ok=$t->ActualizaTicket($conex);

if ($ok){
	?>
	<script language="javascript">
		window.alert("Se respondió el ticket exitosamente.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}else{
	?>
	<script language="javascript">
		window.alert("No se pudo responder el ticket.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}
?>