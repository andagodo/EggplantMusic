<?php

class ExistenciaPerteneceCancion
{

    public function altaPerteneceCancion($param, $conex)
    {


        $idi=$param->getId_Interprete();
        $idc=$param->getId_Cancion();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
        $sql = "INSERT INTO Pertenece_Cancion (Id_Interprete, Id_Cancion, Activo, Fech_Activo, Usuario) VALUES (:interprete, :cancion, :activ, :feactivo, :usu)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":interprete" => $idi, ":cancion" => $idc, ":activ" => $activ, ":feactivo" => $feactivo, ":usu" => $_SESSION["mai"]));
        
		$lastId = $conex->lastInsertId('Pertenece_Cancion');
		
        if($result)
        {
          return($lastId);
        }
        else
        {
          return(false);
        }

		
    }
	
	public function consultaPCCancion($param, $conex)
	{
		$sql = "SELECT Id_Cancion, Nom_Cancion, Dur_Cancion FROM Cancion WHERE cancion.Id_Cancion NOT IN (SELECT Id_Cancion FROM Pertenece_Cancion) AND cancion.Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	

	public function consultaPCAlbum($param, $conex)
	{
	//	$sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Interprete.Id_Interprete NOT IN (SELECT Id_Interprete FROM Pertenece_Cancion)";
        $sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Activo = 'S'";
		$result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}	
	
	public function buscaInterpreteCancion($param, $conex)
	{
        $interprete= trim($param->getId_Interprete());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero FROM Cancion c, Genero g, Pertenece_Cancion pc WHERE c.Id_Genero = g.Id_Genero AND c.Id_Cancion = pc.Id_Cancion AND pc.Id_Interprete = :int AND c.Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":int" => $interprete));
		$resultados=$result->fetchAll();

       return $resultados;
    }	


	public function ConsInterpreteCancion($param, $conex)
	{
        $cancion= trim($param->getId_Cancion());   
        $sql = "SELECT i.Nom_Interprete FROM Cancion c, Pertenece_Cancion pc, Interprete i WHERE c.Id_Cancion = pc.Id_Cancion AND pc.Id_Interprete = i.Id_Interprete AND c.Id_Cancion =:idc";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idc" => $cancion));
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	
/*	
    
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
*/

	public function DatosCancionPC($param, $conex)
	{
        $idpc= trim($param->getId_Pertenece_Cancion());   
        $sql = "SELECT c.Nom_Cancion, c.Dur_Cancion, i.Nom_Interprete, g.Nom_Genero, c.Ruta_Arch_Cancion FROM Cancion c, Interprete i, Genero g, Pertenece_Cancion pc WHERE pc.Id_Pertenece_Cancion = :idpc AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND c.Id_Genero = g.Id_Genero";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idpc" => $idpc));
		$resultados=$result->fetchAll();

       return $resultados;
    }

}
?>
