<?php
class ExistenciaPlaylist
{

    public function altaPlaylist($param, $conex)
    {
        $nom=$param->getNom_PlayList();
        $fech=$param->getFech_Creacion();
		$pltags=$param->getPlaylist_Tags();
        $fecha=$param->getFech_Activo();
		$act=$param->getActivo();

        $sql = "INSERT INTO PlayList ( Nom_Playlist, Fech_Creacion, Activo, Fech_Activo, Playlist_Tags) VALUES ( :nombre, :fechacreacion, :activo, :fechactivo, :pltags)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":fechacreacion" => $fech, ":activo" => $act, ":fechactivo" => $fecha, ":pltags" => $pltags));
        
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

	public function TotalPlaylist($param,$conex)
	{

        $sql = "SELECT COUNT(Id_Playlist) FROM Crea_Playlist WHERE Id_Usuario = '1' AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	

	public function BuscoNombrePlaylist($param, $conex)
	{  
		$nom= trim($param->getNom_PlayList());
        $sql = "SELECT p.* FROM PlayList p, Crea_Playlist cp WHERE p.Nom_PlayList=:nom AND cp.Id_Usuario = 1 AND p.Id_PlayList = cp.Id_PlayList";
        $result = $conex->prepare($sql);
	    $result->execute(array(":nom" => $nom));
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function BuscoLikeNombrePlaylist($param, $conex)
	{  
		$nom= trim($param->getNom_PlayList());
        $sql = "SELECT * FROM PlayList WHERE Nom_PlayList LIKE :nom";
        $result = $conex->prepare($sql);
		$nom = "%".$nom."%";
	    $result->execute(array(":nom" => $nom));
		$resultados=$result->fetchAll();
		return $resultados;
    }

	public function CuentaCancionesPlaylist($param,$conex)
	{
		$idpl= trim($param->getId_Playlist());
        $sql = "SELECT COUNT(Id_Playlist) FROM Tiene_Playlist WHERE Id_Playlist = :idpl";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":idpl" => $idpl));
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function ConsultoNombrePL($param,$conex)
	{
		$idpl= trim($param->getId_Playlist());
        $sql = "SELECT Nom_PlayList FROM PlayList WHERE Id_Playlist = :idpl";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":idpl" => $idpl));
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function UpdatePlaylist($param,$conex)
	{
		$idpl= trim($param->getId_Playlist());
		$nom= trim($param->getNom_PlayList());
		$act=trim($param->getActivo());
		$fecha=trim($param->getFech_Activo());
		$pltags=trim($param->getPlaylist_Tags());
        $sql = "UPDATE PlayList SET Nom_PlayList = :nom, Activo = :act, Fech_Activo = :fecha, Playlist_Tags = :pltags WHERE Id_PlayList = :idpl";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idpl" => $idpl, ":nom" => $nom, ":act" => $act, ":fecha" =>$fecha, ":pltags" =>$pltags));
       return $result;
    }	
	
	public function TotalPlaylistNoAct($param,$conex)
	{
        $sql = "SELECT COUNT(Id_Playlist) FROM Crea_Playlist WHERE Id_Usuario = '1' AND Activo = 'N'";	
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	
	
		public function EliminaPlaylistUsr($param,$conex)
	{
		$idpl= trim($param->getId_Playlist());
        $sql = "DELETE FROM PlayList WHERE Id_PlayList = :idpl";	
        $result = $conex->prepare($sql);
	    $result->execute(array(":idpl" => $idpl));
       	return $result;
    }
}
?>
