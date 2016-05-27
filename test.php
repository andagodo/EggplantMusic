<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/logica/funciones.php';

	function consultaTextoAdmin($texto, $campo, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$texto= trim($texto);
		$campo= trim($campo);
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Fech_Login_Usr_Sist FROM Usr_Sistema WHERE :campo='%:texto%'";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":texto" => $texto,":campo" => $campo ));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }	
	
?>







