<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Album.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$ida=trim($_POST['ida']);

try {
$conex = conectar();
$u= new Album ($ida);
$ok=$u->eliminaAlbum($conex);

	if ($ok){
		echo "<table  align='center' >";
		echo "<tr height='400'>";
			echo "<td class='leyenda'>";
				echo "Se eliminó el Álbum";
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
