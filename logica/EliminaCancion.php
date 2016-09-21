<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$idc=trim($_POST['idc']);


try {
$conex = conectar();
$u= new Cancion ($idc);
$ok=$u->eliminaCancion($conex);

	if ($ok){
		echo "<table  align='center' >";
		echo "<tr height='400'>";
			echo "<td class='leyenda'>";
				echo "Se eliminó la Canción";
				echo " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";
			echo "</td>";
		echo "</tr>";
		echo "</table>";

	}
}
catch (PDOException $e) {
    print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
	print " </br><a href=\"\presentacion\Menu.php\" style='color: black'>Volver</a>";

}
// desconectar($conex);
 
?>
