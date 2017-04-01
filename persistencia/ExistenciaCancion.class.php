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
        $lastId = $conex->lastInsertId('Cancion');
		
        if($result)
        {
          return($lastId);
        }
        else
        {
          return(false);
        }
    }


	public function consultaCancionGenero($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$idg= trim($param->getId_Genero());
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero, c.Id_Genero FROM Cancion c, Genero g WHERE c.Id_Genero=:genero AND c.Id_Genero = g.Id_Genero AND c.Activo = 'S'";

        $result = $conex->prepare($sql);
	    $result->execute(array(":genero" => $idg));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }	

	public function buscaNombreCancion($param, $conex)
	{
        $nombre= trim($param->getNom_Cancion());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero, i.Nom_Interprete, g.Id_Genero FROM Cancion c, Genero g, Interprete i, Pertenece_Cancion pc WHERE c.Nom_Cancion LIKE :nom AND c.Id_Genero = g.Id_Genero AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND c.Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }	

	public function buscaCancionHabilitar($param, $conex)
	{
        $nombre= trim($param->getNom_Cancion());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, g.Nom_Genero, i.Nom_Interprete  FROM Cancion c, genero g, Interprete i, Pertenece_Cancion pc WHERE c.Nom_Cancion LIKE :nom AND c.Id_Genero = g.Id_Genero AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND c.Activo = 'N'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaCancionAprobar($param, $conex)
	{
        $nombre= trim($param->getNom_Cancion());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, g.Nom_Genero, i.Nom_Interprete  FROM Cancion c, genero g, Interprete i, Pertenece_Cancion pc WHERE c.Nom_Cancion LIKE :nom AND c.Id_Genero = g.Id_Genero AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND c.Activo = 'A'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function buscaCancionDeshabilitar($param, $conex)
	{
        $nombre= trim($param->getNom_Cancion());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, g.Nom_Genero, i.Nom_Interprete  FROM Cancion c, genero g, Interprete i, Pertenece_Cancion pc WHERE c.Nom_Cancion LIKE :nom AND c.Id_Genero = g.Id_Genero AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND c.Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	
	public function ExisteCancion($param, $conex)
	{
		$nomc= trim($param->getNom_Cancion());
		$duracion= trim($param->getDur_Cancion());
		$interprete = trim($param->getId_Genero());
		$sql = "SELECT c.id_Cancion FROM Cancion c, Pertenece_Cancion pc  WHERE c.Nom_Cancion = :nom AND c.Dur_Cancion = :dur AND pc.Id_Interprete = :idi AND c.Id_Cancion = pc.Id_Cancion";
	//	$sql = "SELECT id_Cancion FROM Cancion WHERE Nom_Cancion = :nom AND Dur_Cancion = :dur";
		$result = $conex->prepare($sql);
		$result->execute(array(":nom" => $nomc, ":dur" => $duracion, ":idi" => $interprete));
		if($result->rowCount()==0){
       		return false;
        }else{
			return true;
        }
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
		$sql = "SELECT Id_Pertenece_Cancion FROM Pertenece_Cancion WHERE Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$resultados=$result->fetchAll();
		$idpc=$resultados[0][0];
		$sql = "UPDATE Contiene_Album SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Pertenece_Cancion = :idpc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idpc" => $idpc));
		
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

/*	
	public function ActivaCancion($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		$sql = "UPDATE Cancion SET Activo = 'S' WHERE Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$resultados=$result->fetchAll();
		return $resultados;
	}
*/
	
	public function ActivaCancion($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		$sql = "UPDATE Pertenece_Cancion SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Cancion =:idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));		
		$sql = "UPDATE Cancion SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$sql = "SELECT Id_Pertenece_Cancion FROM Pertenece_Cancion WHERE Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$resultados=$result->fetchAll();
		$idpc=$resultados[0][0];
		$sql = "UPDATE Contiene_Album SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Pertenece_Cancion = :idpc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idpc" => $idpc));
		
		return $result;
	}
	
		
	public function CuentaCancionGenero($param, $conex)
	{
		$idg= trim($param->getId_Genero());
		$sql = "SELECT COUNT(*) FROM Cancion WHERE Id_Genero = :idg";
		$result = $conex->prepare($sql);
		$result->execute(array(":idg" => $idg));
		$resultados=$result->fetchAll();
		return $resultados;
	}

	
	public function ActualizaGenero($param, $conex)
	{
		$idg= trim($param->getActivo());
		$idgnu=trim($param->getId_Genero());
		$sql = "UPDATE Cancion SET Id_Genero = :idgnu WHERE Id_Genero = :idg";
		$result = $conex->prepare($sql);
		$result->execute(array(":idg" => $idg, ":idgnu" => $idgnu));
		//$resultados=$result->fetchAll();
		return $result;
	}
	
	public function ListaCancionActivas( $conex)
	{
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero, i.Nom_Interprete, g.Id_Genero FROM Cancion c, Genero g, Interprete i, Pertenece_Cancion pc WHERE c.Id_Genero = g.Id_Genero AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND c.Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function consCancionInterprete($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		$sql = "SELECT pc.Id_Interprete FROM Pertenece_Cancion pc, Cancion c WHERE c.Id_Cancion = pc.Id_Cancion AND c.Activo = 'S' AND c.Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$resultados=$result->fetchAll();
		return $resultados;
	}
	
	public function UpdateCancion($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		$idg= trim($param->getId_Genero());
		$nom= trim($param->getNom_Cancion());
		$idi= trim($param->getActivo());
		$sql = "UPDATE Cancion SET Nom_Cancion = :nom,Id_Genero = :idg WHERE Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc,":idg" => $idg, ":nom" => $nom));
		$sql = "UPDATE Pertenece_Cancion SET Id_Interprete = :idi WHERE Id_Cancion = :idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc,":idi" => $idi));

		return $result;
	}	
}
?>
