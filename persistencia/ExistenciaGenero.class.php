<?php

class ExistenciaGenero
{

	
    public function altaGenero($param, $conex)
    {

        $nomg=$param->getNom_Genero();
        $desc=$param->getDesc_Genero();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
        $sql = "INSERT INTO Genero (Nom_Genero,Desc_Genero, Activo, Fech_Activo) VALUES (:nombre, :descripcion, :activ, :feactivo)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nomg, ":descripcion" => $desc, ":activ" => $activ, ":feactivo" => $feactivo));
        
        
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
		$sql = "UPDATE Genero SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Genero = :idg";
		$result = $conex->prepare($sql);
		$result->execute(array(":idg" => $idg));
		return $result;
	}			
	
	
    /*
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
	
		public function consultaTodosGenero($param,$conex)
	{

        $sql = "SELECT Id_Genero, Nom_Genero, Desc_Genero FROM Genero WHERE Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
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
