<?php

class ExistenciaContieneAlbum
{

    public function altaContieneAlbum($param, $conex)
    {


        $ida=$param->getId_Album();
        $idpc=$param->getId_Pertenece_Cancion();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
		
        $sql = "INSERT INTO Contiene_Album (Id_Album, Id_Pertenece_Cancion, Activo, Fech_Activo) VALUES (:album, :cancion, :activ, :feactivo)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":album" => $ida, ":cancion" => $idpc, ":activ" => $activ, ":feactivo" => $feactivo));
        
        
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
		$sql = "SELECT pc.Id_Pertenece_Cancion, c.Nom_Cancion, c.Dur_Cancion FROM Pertenece_Cancion pc, Cancion c WHERE Id_Pertenece_Cancion NOT IN (SELECT Id_Pertenece_Cancion FROM Contiene_Album) AND pc.Id_Cancion = c.Id_Cancion AND c.Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	

	public function consultaAlbum($param, $conex)
	{
		$sql = "SELECT Id_Album, Nomb_Album, Anio_Album FROM Album WHERE Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	


	public function consultaCancionA($param, $conex) /*Consultar cancion que pertenece a un album*/
	{
		$ida= trim($param->getId_Album());
        $sql = "SELECT * FROM cancion WHERE id_cancion IN (SELECT id_cancion FROM pertenece_cancion WHERE id_pertenece_cancion IN (SELECT id_pertenece_cancion FROM contiene_album WHERE id_album =:idalbum)) AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idalbum" => $ida));
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
