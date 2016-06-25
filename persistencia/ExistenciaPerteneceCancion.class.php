<?php

class ExistenciaPerteneceCancion
{

    public function altaPerteneceCancion($param, $conex)
    {


        $idi=$param->getId_Interprete();
        $idc=$param->getId_Cancion();

        $sql = "INSERT INTO Pertenece_Cancion (Id_Interprete, Id_Cancion) VALUES (:interprete, :cancion)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":interprete" => $idi, ":cancion" => $idc));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
	
	public function consultaPCCancion($param, $conex)
	{
		$sql = "SELECT Id_Cancion, Nom_Cancion, Dur_Cancion FROM Cancion WHERE cancion.Id_Cancion NOT IN (SELECT Id_Cancion FROM Pertenece_Cancion)";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	

	public function consultaPCAlbum($param, $conex)
	{
	//	$sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Interprete.Id_Interprete NOT IN (SELECT Id_Interprete FROM Pertenece_Cancion)";
        $sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete";
		$result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	
	
	public function buscaInterpreteCancion($param, $conex)
	{
        $interprete= trim($param->getId_Interprete());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero FROM Cancion c, Genero g, Pertenece_Cancion pc WHERE c.Id_Genero = g.Id_Genero AND c.Id_Cancion = pc.Id_Cancion AND pc.Id_Interprete = :int";
        $result = $conex->prepare($sql);
	    $result->execute(array(":int" => $interprete));
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	
	
/*	
    
	public function consultaAlbum($param, $conex)
	{
		$ida= trim($param->getId_Album());
        $sql = "SELECT * FROM Album WHERE Id_Album=:idalbum";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idalbum" => $ida));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

	public function consultaTodosAlbum($conex)
   {
        $sql = "SELECT * FROM Album";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
		return $resultados;
    }
*/	

}
?>
