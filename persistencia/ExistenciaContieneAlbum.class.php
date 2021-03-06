<?php

class ExistenciaContieneAlbum
{

    public function altaContieneAlbum($param, $conex)
    {
        $ida=$param->getId_Album();
        $idpc=$param->getId_Pertenece_Cancion();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
        $sql = "INSERT INTO Contiene_Album (Id_Album, Id_Pertenece_Cancion, Activo, Fech_Activo, Usuario) VALUES (:album, :cancion, :activ, :feactivo, :usu)";
		$result = $conex->prepare($sql);
		$result->execute(array(":album" => $ida, ":cancion" => $idpc, ":activ" => $activ, ":feactivo" => $feactivo, ":usu" => $_SESSION["mai"]));
        
        
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
        $sql = "SELECT cancion.Id_Cancion, cancion.Nom_Cancion, Contiene_Album.Id_Contiene_Al from cancion inner join pertenece_cancion on cancion.id_cancion = pertenece_cancion.id_cancion inner join contiene_album on pertenece_cancion.id_pertenece_cancion = contiene_album.id_pertenece_cancion where contiene_album.id_album = :idalbum and cancion.activo = 'S' ";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idalbum" => $ida));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	

	public function ConsultaIDPerteneceC($param, $conex)
	{
		$idca= trim($param->getId_Contiene_Al());
        $sql = "SELECT Id_Pertenece_Cancion FROM Contiene_Album WHERE Id_Contiene_Al = :idca";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idca" => $idca));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	public function deshabilitaCAPorIDPC($param, $conex)
	{
        $idpc= trim($param->getId_Pertenece_Cancion());   
        $sql = "UPDATE Contiene_Album SET Activo = 'N' WHERE Id_Pertenece_Cancion = :idpc";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idpc" => $idpc));
		$sql = "SELECT Id_Album FROM Contiene_Album WHERE Id_Pertenece_Cancion = :idpc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idpc" => $idpc));
		
		$resultados=$result->fetchAll();

       return $resultados;
    }

}
?>