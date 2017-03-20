<?php

class ExistenciaInterprete
{

    public function altaInterprete($param, $conex)
    {

    //    $idi = $param->getId_Interprete();
        $nom=$param->getNom_Interprete();
        $fot=$param->getLink_Foto_Inter();
        $pais = $param->getPais_Interprete();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
		$sql = "INSERT INTO Interprete (Nom_Interprete, Link_Foto_Inter, Pais_Interprete, Activo, Fech_Activo) VALUES (:nombre, :foto, :pais, :activ, :feactivo)";
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":foto" => $fot, ":pais" => $pais, ":activ" => $activ, ":feactivo" => $feactivo));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }


	public function eliminaInterprete($param, $conex)
	{
		$idi = trim($param->getId_Interprete());
		$sql = "UPDATE Pertenece_Cancion SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		$sql = "UPDATE Interprete SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		return $result;
	}

	
	public function buscaInterprete($param, $conex)
	{
  
		$nom= trim($param->getNom_Interprete());
        $sql = "SELECT Id_Interprete, Nom_Interprete FROM Interprete WHERE Nom_Interprete=:nom";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":nom" => $nom));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

	
/*    
	public function consultaUnoInterprete($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT * FROM persona WHERE Login=:login";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

*/	
	
	
	public function consultaTodosInterprete($param, $conex)
   {

        $sql = "SELECT * FROM Interprete WHERE Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
		return $resultados;
    }
/*	
	public function consultaPerteneceCancion($param, $conex)
	{
		$sql = "SELECT Id_Cancion, Nom_Cancion, Dur_Cancion FROM Cancion WHERE cancion.Id_Cancion NOT IN (SELECT Id_Cancion FROM Pertenece_Cancion)";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}
	*/
	
	public function buscaNombreInterprete($param, $conex)
	{
        $nombre= trim($param->getNom_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Nom_Interprete LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }			
	

	public function buscaPaisInterprete($param, $conex)
	{
        $pais= trim($param->getPais_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Pais_Interprete LIKE :pais AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$pais = "%".$pais."%";
	    $result->execute(array(":pais" => $pais));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
}
?>
