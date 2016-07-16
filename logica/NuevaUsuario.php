<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Usuario.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$nom=trim($_POST['nombre']);
$ape=trim($_POST['apellido']);
$fnac=trim($_POST['nacimiento']);
$tel=trim($_POST['tel']);
$mail=trim($_POST['email']);
$pass=trim($_POST['pass']);
$gen=trim($_POST['genero']);
$nac=trim($_POST['nacionalidad']);
$feal=date("d/m/Y");
$conf="N";
$cla = GenerarClave(20,false); 

$url = "http://localhost:8080/presentacion/Registro.php?id=" . $cla;

$conex = conectar();
//$u= new Persona ('',$login,md5($pass));
$u= new Usuario ('',$nom,$ape,$fnac,$tel,$mail,$pass,$gen,$nac,$feal,$conf,$cla);

$ok=$u->altaUsuario($conex);

if ($ok)

{
	$i= new Usuario('','','','','',$mail);
	$ids=$i->consultaIDUsuario($conex);
	$id = $ids[0][0];
	
	$c= new Usuario($id);
	$okc=$c->UsuarioGratuito($conex);
//	UsuarioGratuito()

	ActivacionMail($mail, $nom, $ape, $url);
	echo "<table  align='center' >";
	echo "<tr height='400'>";
       echo "<td class='leyenda'>";
			echo "Se creo un nuevo Usuario: $nom $ape";
			echo " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
       echo "</td>";
	echo "</tr>";
	echo "</table>";
		?>
	<!--  <script language="javascript">
		location.href="../presentacion/cargaMenu.php";

			</script>  
	-->
	<?php	

}
else
{
   ?>
 <script language="javascript">
 
   window.alert("El Usuario o Password \n no es correcto.");
   location.href="/presentacion/indice.php";
 </script>
  <?php
  
}
// desconectar($conex);
 
?>