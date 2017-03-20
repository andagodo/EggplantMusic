<?php
		$sqlserver = "sqlsrv:Server=192.168.3.11;Database=eggplantmusic";
		$con = new PDO($sqlserver, "eggplantmusic", "eggplantmusic");
		$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return($con);
        ?>