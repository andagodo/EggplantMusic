<?php


function conectar()
{
    try {
		
		$sqlserver = "sqlsrv:Server=192.168.3.11;Database=eggplantmusic";
		$conexion = new PDO($sqlserver, "eggplantmusic", "eggplantmusic");
		$conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return($conexion);
		
	} catch (PDOException $e) {
		
		print "<p>Error: No puede conectarse con la base de datos.</p>\n";
		exit();
    }
}

function desconectar($conexion)
{
   sqlsrv_close($conexion);
}

?>
