<?php 
class ExistenciaCreaPlaylist
{
	public function altaCreaPlaylist($param, $conex)
	{
		$idu=$param->getId_Usuario();
		$idp=$param->getId_Playlist();
		$act="S";
        $fecha=date("Y-m-d H:i:s");

        $sql = "INSERT INTO Crea_Playlist (Id_Usuario, Id_Playlist, Activo, Fech_Activo) VALUES ( :idusuario, :idplaylist, :activo, :fechactivo)";
		$result = $conex->prepare($sql);
		$result->execute(array(":idusuario" => $idu, ":idplaylist" => $idp, ":activo" => $act, ":fechactivo" => $fecha));

        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
	}	

	public function consultaplayusr($param, $conex)
	{
        $idu= trim($param->getId_Usuario());
        $sql = "SELECT Id_Playlist FROM Crea_Playlist WHERE Id_Usuario = :idusr";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idusr" => $idu));
		$resultados=$result->fetchAll();

       return $resultados;
    }	

    public function ConsultaIdPlaylistSist($param, $conex)
    {
        $sql = "SELECT Id_Playlist FROM Crea_Playlist WHERE Id_Usuario = '1087' AND Activo = 'S'";
        $result = $conex->prepare($sql);
        $result->execute();
        $resultados=$result->fetchAll();
       return $resultados;
    }   

    public function EliminaplaylistInCP($param, $conex)
    {
        $idpl= trim($param->getId_Playlist());
        $sql = "DELETE FROM Crea_Playlist WHERE Id_PlayList = :idpl";
        $result = $conex->prepare($sql);
        $result->execute(array(":idpl" => $idpl));
       return $result;
    } 
}
	
 ?>