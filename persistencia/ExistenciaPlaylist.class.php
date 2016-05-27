<?php

class ExistenciaPlaylist
{

    public function altaPlaylist($param, $conex)
    {


        $nom=$param->getNom_PlayList();
        $fech=$param->getFech_Creacion();


        $sql = "INSERT INTO PlayList ( Nom_Playlist, Fech_Creacion) VALUES ( :nombre, :fechacreacion)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":fechacreacion" => $fech));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
    
	public function consultaPlaylist($param, $conex)
	{  
		$idp= trim($param->getLogin());
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
}
?>
