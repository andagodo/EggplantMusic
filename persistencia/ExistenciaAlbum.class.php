<?php

class ExistenciaAlbum
{

    public function altaAlbum($param, $conex)
    {


        $nom=$param->getNom_Album();
        $anio=$param->getAnio_Album();
        $link = $param->getLink_Foto_Album();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();

        $sql = "INSERT INTO Album ( Nomb_Album, Anio_Album, Link_Foto_Album, Activo, Fech_Activo) VALUES ( :nombre, :anioalbum, :linkalbum, :activ, :feactivo)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":anioalbum" => $anio, ":linkalbum" => $link, ":activ" => $activ, ":feactivo" => $feactivo));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
	
	
	public function eliminaAlbum($param, $conex)
	{
		$ida= trim($param->getId_Album());
		
		$sql = "UPDATE Contiene_Album SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Album = :ida";
		$result = $conex->prepare($sql);
		$result->execute(array(":ida" => $ida));
		$sql = "UPDATE Album SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Album = :ida";
		$result = $conex->prepare($sql);
		$result->execute(array(":ida" => $ida));
		return $result;
	}		
	
    
	public function consultaAlbum($param, $conex)
	{
		$ida= trim($param->getId_Album());
        $sql = "SELECT * FROM Album WHERE Id_Album=:idalbum AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idalbum" => $ida));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	public function buscaAlbum($param, $conex)
	{
		$nom= trim($param->getNom_Album());
        $sql = "SELECT Id_Album, Nomb_Album FROM Album WHERE Nomb_Album=:noma AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":noma" => $nom));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

	public function consultaTodosAlbum($conex)
   {
        $sql = "SELECT * FROM Album WHERE Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function buscaNombreAlbum($param, $conex)
	{
        $nombre= trim($param->getNom_Album());   
        $sql = "SELECT Id_Album, Nomb_Album, Anio_Album FROM Album WHERE Nomb_Album LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }	

	public function buscaAlbumHabilitar($param, $conex)
	{
        $nombre= trim($param->getNom_Album());   
        $sql = "SELECT Id_Album, Nomb_Album, Anio_Album FROM Album WHERE Nomb_Album LIKE :nom AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	
	public function buscaAlbumAprobar($param, $conex)
	{
        $nombre= trim($param->getNom_Album());   
        $sql = "SELECT Id_Album, Nomb_Album, Anio_Album FROM Album WHERE Nomb_Album LIKE :nom AND Activo = 'A'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function buscaAnioAlbum($param, $conex)
	{
        $anio= trim($param->getAnio_Album());
        $sql = "SELECT Id_Album, Nomb_Album, Anio_Album FROM Album WHERE Anio_Album = :anio AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":anio" => $anio));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function ActivaAlbum($param, $conex)
	{
		$ida= trim($param->getId_Album());
		
		$sql = "UPDATE Contiene_Album SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Album = :ida";
		$result = $conex->prepare($sql);
		$result->execute(array(":ida" => $ida));
		$sql = "UPDATE Album SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Album = :ida";
		$result = $conex->prepare($sql);
		$result->execute(array(":ida" => $ida));
		return $result;
	}		

}
?>
