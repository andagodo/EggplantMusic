<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Ticket.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

$conex = conectar();

$idt=trim($_POST['idt']);
$t= new Ticket ($idt);
$ok=$t->FinalizaTicket($conex);

if ($ok){
	?>
	<script language="javascript">
		window.alert("Se dió por finalizado el Ticket.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}else{
	?>
	<script language="javascript">
		window.alert("No se pudo finalizar el ticket.");
		location.href="/presentacion/Menu.php";
	</script>
	<?php
}
?>