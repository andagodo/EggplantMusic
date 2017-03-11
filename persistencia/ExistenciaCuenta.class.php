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
		$feactivo = $param->getFech_Activo();
		$sql = "UPDATE Cuenta SET Activo = 'N', Fech_Activo = :feactivo WHERE Id_Cuenta = :idcu";
		$result = $conex->prepare($sql);
		$result->execute(array(":idcu" => $idcu,":feactivo" => $feactivo));
		return $result;
	}			
	
	public function HabilitaCuenta($param, $conex)
	{
		$idcu = trim($param->getId_Cuenta());
		$feactivo = $param->getFech_Activo();
		$sql = "UPDATE Cuenta SET Activo = 'S', Fech_Activo = :feactivo WHERE Id_Cuenta = :idcu";
		$result = $conex->prepare($sql);
		$result->execute(array(":idcu" => $idcu,":feactivo" => $feactivo));
		return $result;
	}		

	public function ActualizaCuenta($param, $conex)
	{
		$idcu = trim($param->getId_Cuenta());
		$tipo = trim($param->getTipo());
		$play = trim($param->getCant_Playlist());
		$precio = trim($param->getPrecio());
		$feactivo = $param->getFech_Activo();
		$sql = "UPDATE Cuenta SET Tipo = :tipo, Cant_Playlist = :play, Precio = :precio, Fech_Activo = :feactivo WHERE Id_Cuenta = :idcu";
		$result = $conex->prepare($sql);
		$result->execute(array(":idcu" => $idcu, ":tipo" => $tipo, ":play" => $play, ":precio" => $precio,":feactivo" => $feactivo));
		return $result;
	}	
	
	public function consultaCuentas($param,$conex)
	{

        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio, Activo FROM Cuenta";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function consultaCuentasHab($param,$conex)
	{

        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio, Activo FROM Cuenta WHERE Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }

	public function consultaCuentasDeshab($param,$conex)
	{

        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio, Activo FROM Cuenta WHERE Activo = 'N'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function buscaTipoCuentaNoAct($param, $conex)
	{
        $tipo= trim($param->getTipo());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Tipo LIKE :tipo AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$tipo = "%".$tipo."%";
	    $result->execute(array(":tipo" => $tipo));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaTipoCuenta($param, $conex)
	{
        $tipo= trim($param->getTipo());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Tipo LIKE :tipo AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$tipo = "%".$tipo."%";
	    $result->execute(array(":tipo" => $tipo));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaPlayCuentaNoAct($param, $conex)
	{
        $play= $param->getCant_Playlist();
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Cant_Playlist = :play AND Activo = 'N'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":play" => $play));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaPlayCuenta($param, $conex)
	{
        $play= trim($param->getCant_Playlist());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Cant_Playlist = :play AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":play" => $play));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	

	public function buscaPrecioCuentaNoAct($param, $conex)
	{
        $precio= trim($param->getPrecio());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Precio = :precio AND Activo = 'N'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":precio" => $precio));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaPrecioCuenta($param, $conex)
	{
        $precio= trim($param->getPrecio());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Precio = :precio AND Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":precio" => $precio));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	
	public function buscaTipoCuentaTodos($param, $conex)
	{
        $tipo= trim($param->getTipo());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Tipo LIKE :tipo";
        $result = $conex->prepare($sql);
		$tipo = "%".$tipo."%";
	    $result->execute(array(":tipo" => $tipo));
		$resultados=$result->fetchAll();

       return $resultados;
    }


	public function buscaPlayCuentaTodos($param, $conex)
	{
        $play= trim($param->getCant_Playlist());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Cant_Playlist = :play";
        $result = $conex->prepare($sql);
	    $result->execute(array(':play' => $play));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaPrecioCuentaTodos($param, $conex)
	{
        $precio= trim($param->getPrecio());   
        $sql = "SELECT Id_Cuenta, Tipo, Cant_Playlist, Precio FROM Cuenta WHERE Precio = :precio";
        $result = $conex->prepare($sql);
	    $result->execute(array(":precio" => $precio));
		$resultados=$result->fetchAll();

       return $resultados;
    }


}
?>
