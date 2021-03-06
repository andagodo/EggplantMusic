<?php

class ExistenciaTienePlaylist
{

    public function altaTienePlaylist($param, $conex)
    {
        $idpl=$param->getId_Playlist();
        $idca=$param->getId_Contiene_Al();
        $sql = "INSERT INTO Tiene_Playlist (Id_Playlist, Id_Contiene_Al) VALUES (:playlist, :contiene)";
		$result = $conex->prepare($sql);
		$result->execute(array(":playlist" => $idpl, ":contiene" => $idca));

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
		$idca= trim($param->getId_Contiene_Al());
		$sql = "SELECT * FROM Tiene_Playlist WHERE Id_Contiene_Al = :idca ";
        $result = $conex->prepare($sql);
        $result->execute(array(":idca" => $idca));
		$resultados=$result->fetchAll();
       return $resultados;
	}	
    
    public function consultaCancionPL($param, $conex)
    {
        $idpl= trim($param->getId_Contiene_Al());
        $sql = "SELECT * FROM Tiene_Playlist WHERE Id_Playlist = :idpl ";
        $result = $conex->prepare($sql);
        $result->execute(array(":idpl" => $idpl));
        $resultados=$result->fetchAll();
       return $resultados;
    }  
	
	
    public function consultaIDContieneAl($param, $conex)
    {
        $idpl= trim($param->getId_Playlist());
        $sql = "SELECT Id_Contiene_Al FROM Tiene_Playlist WHERE Id_Playlist = :idpl ";
        $result = $conex->prepare($sql);
        $result->execute(array(":idpl" => $idpl));
        $resultados=$result->fetchAll();
       return $resultados;
    }   

    public function EliminaCancionPL($param, $conex)
    {
        $idpl= trim($param->getId_Playlist());
		$idca= trim($param->getId_Contiene_Al());
        $sql = "DELETE FROM Tiene_PlayList WHERE Id_PlayList = :idpl AND Id_Contiene_Al = :idca";
        $result = $conex->prepare($sql);
        $result->execute(array(":idpl" => $idpl, ":idca" => $idca));
       return $result;
    }   

    public function ConsultacancionyPL($param, $conex)
    {
        $idpl= trim($param->getId_Playlist());
        $idca= trim($param->getId_Contiene_Al());
        $sql = "SELECT * FROM Tiene_Playlist WHERE Id_Playlist = :idpl AND Id_Contiene_Al = :idca";
        $result = $conex->prepare($sql);
        $result->execute(array(":idpl" => $idpl, ":idca" => $idca));
        $resultados=$result->fetchAll();
        return $resultados;
    }  

    public function EliminaplaylistInTP($param, $conex)
    {
        $idpl= trim($param->getId_Playlist());
        $sql = "DELETE FROM Tiene_PlayList WHERE Id_PlayList = :idpl";
        $result = $conex->prepare($sql);
        $result->execute(array(":idpl" => $idpl));
       return $result;
    } 


}
?>