<?php

class ExistenciaContieneAlbum
{

    public function altaContieneAlbum($param, $conex)
    {


        $ida=$param->getId_Album();
        $idpc=$param->getId_Pertenece_Cancion();

        $sql = "INSERT INTO Contiene_Album (Id_Album, Id_Pertenece_Cancion) VALUES (:album, :cancion)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":album" => $ida, ":cancion" => $idpc));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
	
	public function consultaCACancion($param, $conex)
	{
		$sql = "SELECT pc.Id_Pertenece_Cancion, c.Nom_Cancion, c.Dur_Cancion FROM Pertenece_Cancion pc, Cancion c WHERE Id_Pertenece_Cancion NOT IN (SELECT Id_Pertenece_Cancion FROM Contiene_Album) AND pc.Id_Cancion = c.Id_Cancion";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	

	public function consultaAlbum($param, $conex)
	{
		$sql = "SELECT Id_Album, Nomb_Album, Anio_Album FROM Album";
        $result = $conex->prepare($sql);
	    $result->execute();
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
