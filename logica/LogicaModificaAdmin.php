<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Admin.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$mus=$_POST['mus'];
$accion=$_POST['accion'];
if ($accion == "habilitar"){
	try {
		$conex = conectar();
		$u= new Admin ('','',$mus);
		$ok=$u->ActivaAdmin($conex);
		if ($ok){
			?>
			<script language="javascript">
				window.alert("Activaste el Administrador exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
			<?php
		}
	}catch (PDOException $e) {
		print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
		print " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
	}
}elseif($accion == "reiniciar"){
	try {
		$cla = GenerarClave(20,false); 
		$conex = conectar();
		$u= new Admin('','',$mus,'','','','','',$cla);
		$ok=$u->SetClaveNueva($conex);
		if ($ok){
			$url = "http://eggplantblue.com/presentacion/RegistroBackEnd.php?id=" . $cla;
			MailReinicioPass($mus, $url);
			?>
			<script language="javascript">
				window.alert("Se Reinició la clave del Administrador exitosamente");
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
	}catch (PDOException $e) {
		print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
		print " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
	}
}elseif($accion == "cambiatipo"){
		$conex = conectar();
		$tipo=$_POST['cambiatipo'];
		$u= new Admin ($tipo,'',$mus);
		$ok=$u->CambiaTipo($conex);
		if ($ok){
			?>
			<script language="javascript">
				window.alert("Cambiaste el tipo de Administrador exitosamente.");
				location.href="/presentacion/Menu.php";
			</script>
		<?php
		}else{
			?>
			<script language="javascript">
				window.alert("Ocurrió un problema al cambiar el tipo de Administrador.\nIntentelo nuevamente.");
			</script>
		<?php			
			
		}
}
?>