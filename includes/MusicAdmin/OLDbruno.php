<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/clases/Cancion.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';
?>
<?php
	


$ok=BrunitoPesadito($conex);
print_r ($ok);
	

$val = 5;
$sql = "REPLACE table (column) VALUES (:val)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':val', $val, PDO::PARAM_INT);
$stmt->execute();
$lastId = $dbh->lastInsertId();


?>