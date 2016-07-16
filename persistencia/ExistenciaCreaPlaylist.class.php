<?php 
class ExistenciaCreaPlaylist
{
	public function altaPlaylist($param, $conex)
	{
		$idc=$param->getId_Crea_Playlist();
		$idu=$param->getId_Usuario();
		$idp=$param->getId_Playlist();

		$sql = "INSERT INTO CreaPlayList ( Id_Usuario, Id_Playlist) VALUES ( :idusuario, :idplaylist)";

		$result = $conex->prepare($sql);
		$result->execute(array(":idusuario" => $idu, ":idplaylist" => $idp));
               

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
}
	
 ?>