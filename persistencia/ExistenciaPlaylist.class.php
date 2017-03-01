<?php
class ExistenciaPlaylist
{

    public function altaPlaylist($param, $conex)
    {


        $nom=$param->getNom_PlayList();
        $fech=$param->getFech_Creacion();
        $act="S";
        $fecha="14/12/2016 10:00:00";

        $sql = "INSERT INTO PlayList ( Nom_Playlist, Fech_Creacion, Activo, Fech_Activo) VALUES ( :nombre, :fechacreacion, :activo, :fechactivo)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":fechacreacion" => $fech, ":activo" => $act, ":fechactivo" => $fecha));
        
        
      	$lastId = $conex->lastInsertId('PlayList');
		
        if($result)
        {
          return($lastId);
        }
        else
        {
          return(false);
        }

    }
    
	public function consultaPlaylist($param, $conex)
	{  
		$idp= trim($param->getId_Playlist());
        $sql = "SELECT * FROM PlayList WHERE Id_PlayList=:idplay";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idplay" => $idp));
		$resultados=$result->fetchAll();
		return $resultados;
    }
/*
	public function consultaTodosAlbum($conex)
   {
//        $idp= trim($param->getIDpersona());   
//		$log= trim($param->getLogin());
        $sql = "SELECT * FROM Album";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	public function consultaIDrol($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
		$sql = "SELECT IDrol FROM persona WHERE Login=:login";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $log));
		return $result->fetchAll();
	}
	
*/

	public function TotalPlaylist($param,$conex)
	{

        $sql = "SELECT COUNT(Id_Playlist) FROM Crea_Playlist WHERE Id_Usuario = '0'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	
	
}
?>
