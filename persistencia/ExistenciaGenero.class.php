<?php

class ExistenciaGenero
{
	
    public function altaGenero($param, $conex)
    {

        $nomg=$param->getNom_Genero();
        $desc=$param->getDesc_Genero();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
        $sql = "INSERT INTO Genero (Nom_Genero,Desc_Genero, Activo, Fech_Activo, Usuario) VALUES (:nombre, :descripcion, :activ, :feactivo, :usu)";
      
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nomg, ":descripcion" => $desc, ":activ" => $activ, ":feactivo" => $feactivo, ":usu" => $_SESSION["mai"]));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

	public function eliminaGenero($param, $conex)
	{
		$idg = trim($param->getId_Genero());
		$sql = "UPDATE Genero SET Activo = 'N', Fech_Activo = getdate(), Usuario = :usu WHERE Id_Genero = :idg";
		$result = $conex->prepare($sql);
		$result->execute(array(":idg" => $idg, ":usu" => $_SESSION["mai"]));
		return $result;
	}			

	public function UpdateGenero($param, $conex)
	{
		$idg = trim($param->getId_Genero());
		$nom = trim($param->getNom_Genero());
		$desc = trim($param->getDesc_Genero());
		$sql = "UPDATE Genero SET Nom_Genero = :nom, Desc_Genero = :desc, Usuario = :usu WHERE Id_Genero = :idg";
		$result = $conex->prepare($sql);
		$result->execute(array(":idg" => $idg,":nom" => $nom, ":desc" => $desc, ":usu" => $_SESSION["mai"]));
		return $result;
	}	
	
	public function consultaTodosGenero($param,$conex)
	{

        $sql = "SELECT Id_Genero, Nom_Genero, Desc_Genero FROM Genero WHERE Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function consultaGeneroSinUno($param,$conex)
	{
		$idg= trim($param->getId_Genero()); 
        $sql = "SELECT Id_Genero, Nom_Genero, Desc_Genero FROM Genero WHERE Activo = 'S' AND Id_Genero != :idg";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":idg" => $idg));
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function ConsultaGenero($param,$conex)
	{
		$idg= trim($param->getId_Genero()); 
        $sql = "SELECT Nom_Genero, Desc_Genero FROM Genero WHERE Id_Genero = :idg";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":idg" => $idg));
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function buscaNombreGenero($param, $conex)
	{
        $nombre= trim($param->getNom_Genero());   
        $sql = "SELECT Id_Genero, Nom_Genero, Desc_Genero FROM Genero WHERE Nom_Genero LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaGenero($param, $conex)
	{
        $nombre= trim($param->getNom_Genero());   
        $sql = "SELECT Id_Genero, Nom_Genero FROM Genero WHERE Nom_Genero = :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();
		
		return $resultados;
		
    }
	
	public function buscaLikeGenero($param, $conex)
	{
        $nombre= trim($param->getNom_Genero());   
        $sql = "SELECT Id_Genero, Nom_Genero FROM Genero WHERE Nom_Genero LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();
		
		return $resultados;
		
    }	
	
	public function buscaDescGenero($param, $conex)
	{
        $nombre= trim($param->getDesc_Genero());   
        $sql = "SELECT Id_Genero, Nom_Genero, Desc_Genero FROM Genero WHERE Desc_Genero LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }		

}
?>