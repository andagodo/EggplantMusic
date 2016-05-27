<?php

class ExistenciaAlbum
{

    public function altaAlbum($param, $conex)
    {


        $nom=$param->getNom_Album();
        $anio=$param->getAnio_Album();
        $link = $param->getLink_Foto_Album();


        $sql = "INSERT INTO Album ( Nomb_Album, Anio_Album, Link_Foto_Album) VALUES ( :nombre, :anioalbum, :linkalbum)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":anioalbum" => $anio, ":linkalbum" => $link));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
    
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
	

}
?>
