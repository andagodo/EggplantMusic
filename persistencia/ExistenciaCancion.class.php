<?php

class ExistenciaCancion
{

    public function altaCancion($param, $conex)
    {

    //    $idc = $param->getId_Cancion();
        $nom=$param->getNom_Cancion();
        $dur=$param->getDur_Cancion();
        $ruta = $param->getRuta_Arch_Cancion();
		$idg = $param->getId_Genero();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();

        $sql = "INSERT INTO Cancion ( Nom_Cancion, Dur_Cancion, Ruta_Arch_Cancion, Id_Genero, Activo, Fech_Activo) VALUES ( :nombre, :duracancion, :rutaarch, :idgenero, :activ, :feactivo)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":duracancion" => $dur, ":rutaarch" => $ruta, ":idgenero" => $idg, ":activ" => $activ, ":feactivo" => $feactivo));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

     

/*
   //Devuelve true si el login coincide con la password
   public function coincideLoginPassword($param, $conex)
   {
        //Obtiene los datos del objeto $param
        $log= trim($param->getLogin());
        $pass= trim($param->getPassword());
		//Vuelvo a encriptar la clave incluyendo el salt
		
		$salt = '34a@$#aA9823$';
//		$pass= hash('sha512', $salt . $pass);
		
        $sql = "SELECT * FROM persona WHERE Login=:login AND Password=:password";
		
        $result = $conex->prepare($sql);
		$result->execute(array(":login" => $log, ":password" => $pass));
        //Obtiene el registro de la tabla Usuario 

        if($result->rowCount()==0)
        {
       		
			return false;
        }
        else
        {
        	
          	return true;
        }
    }
   
	public function consultaUno($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT * FROM persona WHERE Login=:login";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
*/


	public function consultaCancionGenero($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$idg= trim($param->getId_Genero());
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero FROM Cancion c, Genero g WHERE c.Id_Genero=:genero AND c.Id_Genero = g.Id_Genero AND c.Activo = 'S'";

        $result = $conex->prepare($sql);
	    $result->execute(array(":genero" => $idg));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }	

	public function buscaNombreCancion($param, $conex)
	{
        $nombre= trim($param->getNom_Cancion());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero FROM Cancion c, Genero g WHERE Nom_Cancion LIKE :nom AND c.Id_Genero = g.Id_Genero AND c.Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }	

/*	
	public function consultaTodos($param, $conex)
   {
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT Nombre, Apellido, Login, IDrol FROM persona";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
*/
	
	public function eliminaCancion($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		
		$sql = "UPDATE Pertenece_Cancion SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Cancion =:idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$sql = "UPDATE Cancion SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Cancion =:idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		return $result;
	}	

	public function consCancionId($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		$sql = "SELECT * FROM Cancion WHERE Id_Cancion =:idc AND Activo = 'S'";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$resultados=$result->fetchAll();
		return $resultados;
	}				
	
/*	
	public function consultaPerteneceCancion($param, $conex)
	{
		$sql = "SELECT Id_Cancion, Nom_Cancion, Dur_Cancion FROM Cancion WHERE cancion.Id_Cancion NOT IN (SELECT Id_Cancion FROM Pertenece_Cancion)";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
	}
	*/
	
	public function consultaCancionSinInterprete($param,$conex)
	{

        $sql = "SELECT COUNT (Id_Cancion) FROM Cancion WHERE Id_Cancion NOT IN (SELECT Id_Cancion FROM Pertenece_Cancion) AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	
	public function consultaCancionSinAlbum($param,$conex)
	{

        $sql = "SELECT COUNT (Id_Cancion) FROM Cancion WHERE Id_Cancion IN (SELECT Id_Cancion FROM Pertenece_Cancion WHERE Id_Pertenece_Cancion NOT IN (SELECT Id_Pertenece_Cancion FROM Contiene_Album)) AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function consultaAlbumSinCancion($param,$conex)
	{

        $sql = "SELECT count(Id_Album) FROM Album WHERE Id_Album NOT IN (SELECT Id_Album FROM Contiene_Album) AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function consultaInterpreteSinCancion($param,$conex)
	{

        $sql = "SELECT count(Id_Interprete) FROM Interprete WHERE Id_Interprete NOT IN (SELECT Id_Interprete FROM Pertenece_Cancion) AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	
	

	public function consultaGeneroCancion($param, $conex)
	{
		$idg= trim($param->getId_Genero());
		$sql = "SELECT Nom_Genero FROM Genero WHERE Id_Genero =:idg  AND Activo = 'S'";
		$result = $conex->prepare($sql);
		$result->execute(array(":idg" => $idg));
		$resultados=$result->fetchAll();
		return $resultados;
	}	

}
?>
