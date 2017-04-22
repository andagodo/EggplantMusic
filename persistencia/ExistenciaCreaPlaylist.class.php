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
#		$sql = "INSERT INTO Crea_Playlist ( Id_Usuario, Id_Playlist, Activo, Fech_Activo) VALUES ( :idusuario, :idplaylist, :activo, :fechactivo, :usu)";
#Comento esta linea ya que con :usu parece no funcionar
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
}
	
 ?>