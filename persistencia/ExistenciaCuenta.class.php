<?php

class ExistenciaCuenta
{

	
    public function altaCuenta($param, $conex)
    {

        $tipo=$param->getTipo();
        $play=$param->getCant_Playlist();
		$precio = $param->getPrecio();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
        $sql = "INSERT INTO Cuenta (Tipo,Cant_Playlist, Precio, Activo, Fech_Activo) VALUES (:tipo, :playlist, :precio, :activo, :feactivo)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":tipo" => $tipo, ":playlist" => $play, ":precio" => $precio, ":activo" => $activ, ":feactivo" => $feactivo));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

	
	public function eliminaCuenta($param, $conex)
	{
		$idcu = trim($param->getId_Cuenta());
		$sql = "UPDATE Cuenta SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Cuenta = :idcu";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idcu));
		return $result;
	}			
	
/*	
	
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

*/	

}
?>
