<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Genero.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<link rel="stylesheet" type ="text/css" href="/estilos/estilos.css" />
<?php
$idg=trim($_POST['idg']);

try {
	echo $idg;
$conex = conectar();
$u= new Genero ($idg);
$ok=$u->eliminaGenero($conex);

	if ($ok){
		echo "<table  align='center' >";
		echo "<tr height='400'>";
			echo "<td class='leyenda'>";
				echo "Se eliminó el Género correctamente";
				echo " </br><a href=\"\presentacion\cargaMenu.php\.\" style='color: black'>Volver</a>";
			echo "</td>";
		echo "</tr>";
		echo "</table>";

	}
}
catch (PDOException $e) {
    print "Error en la base de datos!: " . "<br/>" . $e->getMessage() . "<br/>";
	print " </br><a href=\"\presentacion\cargaMenu.php\.\" style='color: black'>Volver</a>";

}
// desconectar($conex);
 
?>
