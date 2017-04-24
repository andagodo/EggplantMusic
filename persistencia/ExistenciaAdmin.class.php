<?php

class ExistenciaAdmin
{
    public function altaAdmin($param, $conex)
    {
		$tus=$param->getTipo_Usr_Sist();
		$feal=$param->getFech_Alta_Usr_Sist();
        $nomu=$param->getNombre_Usr_Sist();
        $mus=$param->getMail_Usr_Sist();
        $pass=$param->getPass_Usr_Sist();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		$apell = $param->getApellido_Usr_Sist();
		$cla = $param->getClave();
		
        $sql = "INSERT INTO Usr_Sistema (Tipo_Usr_Sist, Nombre_Usr_Sist, Mail_Usr_Sist, Pass_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Fech_Activo, Apellido_Usr_Sist, Clave, Usuario) VALUES (:tipousr, :nombre, :mail, :pass, :fechaalta, :activ, :feactivo, :apell, :cla, :usu)";  
		
		$result = $conex->prepare($sql);
		$result->execute(array(":tipousr" => $tus, ":nombre" => $nomu, ":mail" => $mus, ":pass" => $pass, ":fechaalta" => $feal, ":activ" => $activ, ":feactivo" => $feactivo, ":apell" => $apell, ":cla" => $cla, ":usu" => $_SESSION["mai"]));
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }


   //Devuelve true si el login coincide con la password
   public function coincideLoginAdmin($param, $conex)
   {
        //Obtiene los datos del objeto $param
        $mail= trim($param->getMail_Usr_Sist());
        $pass= trim($param->getPass_Usr_Sist());
		//Vuelvo a encriptar la clave incluyendo el salt
		$salt = '34a@$#aA9823$';
		
        $sql = "SELECT * FROM Usr_Sistema WHERE Mail_Usr_Sist=:Mail_Usr_Sist AND Pass_Usr_Sist=:Pass_Usr_Sist AND Activo = 'S'";

        $result = $conex->prepare($sql);
		$result->execute(array(':Mail_Usr_Sist' => $mail, ':Pass_Usr_Sist' => $pass));
        //Obtiene el registro de la tabla Usuario 
        if($result->rowCount()==0)
        {
       		$sql2 = "SELECT * FROM Usr_Sistema WHERE Mail_Usr_Sist=:Mail_Usr_Sist AND Activo = 'N'";
			$result2 = $conex->prepare($sql2);
			$result2->execute(array(":Mail_Usr_Sist" => $mail));
			
			if($result2->rowCount()==0){
				return 2;
			}else{
				return 3;
			}
        }
        else
        {
        	
          	return 1;
        }
    }

    
	public function consultaAdmin($param, $conex)
	{
		$tus= trim($param->getTipo_Usr_Sist());
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Tipo_Usr_Sist FROM Usr_Sistema WHERE Tipo_Usr_Sist=:tipo AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":tipo" => $tus));
		$resultados=$result->fetchAll();
       
       return $resultados;
    }
	
	public function consultaAdminNoAct($param, $conex)
	{
		$tus= trim($param->getTipo_Usr_Sist());
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Tipo_Usr_Sist FROM Usr_Sistema WHERE Tipo_Usr_Sist=:tipo AND Activo = 'N'";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":tipo" => $tus));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function consultaTodosAdmin($param, $conex)
	{
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Tipo_Usr_Sist FROM Usr_Sistema WHERE Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       
       return $resultados;
    }
	
	public function consultaAdminTodosNoAct($param, $conex)
	{
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Tipo_Usr_Sist FROM Usr_Sistema WHERE Activo = 'N'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	
	public function buscaNombreAdmin($param, $conex)
	{
        $nombre= trim($param->getNombre_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Tipo_Usr_Sist FROM Usr_Sistema WHERE Nombre_Usr_Sist LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }		

	public function buscaNombreAdminNoAct($param, $conex)
	{
        $nombre= trim($param->getNombre_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Tipo_Usr_Sist FROM Usr_Sistema WHERE Nombre_Usr_Sist LIKE :nom AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }		

	public function ConsultoExisteAdmin($param, $conex)
	{
        $mail= trim($param->getMail_Usr_Sist());   
        $sql = "SELECT Mail_Usr_Sist FROM Usr_Sistema WHERE Mail_Usr_Sist = :mai";
        $result = $conex->prepare($sql);
	    $result->execute(array(":mai" => $mail));
		
		if($result->rowCount()==0){
			return true;
        }else{
			return false;
        }
    }	

	public function buscaMailAdmin($param, $conex)
	{
        $mail= trim($param->getMail_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Id_Usr_Sistema, Tipo_Usr_Sist FROM Usr_Sistema WHERE Mail_Usr_Sist LIKE :mai AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$mail = "%".$mail."%";
	    $result->execute(array(":mai" => $mail));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function buscaMailAdminNoAct($param, $conex)
	{
        $mail= trim($param->getMail_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Tipo_Usr_Sist FROM Usr_Sistema WHERE Mail_Usr_Sist LIKE :mai AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$mail = "%".$mail."%";
	    $result->execute(array(":mai" => $mail));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function buscaFAltaAdmin($param, $conex)
	{
        $falta= trim($param->getFech_Alta_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Tipo_Usr_Sist FROM Usr_Sistema WHERE Fech_Alta_Usr_Sist LIKE :fa AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$falta = "%".$falta."%";
	    $result->execute(array(":fa" => $falta));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
	public function buscaFAltaAdminNoAct($param, $conex)
	{
        $falta= trim($param->getFech_Alta_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Tipo_Usr_Sist FROM Usr_Sistema WHERE Fech_Alta_Usr_Sist LIKE :fa AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$falta = "%".$falta."%";
	    $result->execute(array(":fa" => $falta));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function consultaTipoAdmin($param, $conex)
	{
		$mai= trim($param->getMail_Usr_Sist());
		$sql = "SELECT Tipo_Usr_Sist, Nombre_Usr_Sist, Apellido_Usr_Sist, Id_Usr_Sistema FROM Usr_Sistema WHERE Mail_Usr_Sist=:mail AND Activo = 'S'";
		$result = $conex->prepare($sql);
		$result->execute(array(":mail" => $mai));
		return $result->fetchAll();
	}	
	
	public function eliminaAdmin($param, $conex)
	{
		$mus= trim($param->getMail_Usr_Sist());
		$sql = "UPDATE Usr_Sistema SET Activo = 'N', Fech_Activo = getdate() WHERE Mail_Usr_Sist =:mail";
		$result = $conex->prepare($sql);
		$result->execute(array(":mail" => $mus));
		return $result;
	}		

	public function SetNullClave($param, $conex)
	{
		$clave= trim($param->getClave());
		$sql = "UPDATE Usr_Sistema SET Clave = NULL WHERE Clave =:clave";
		$result = $conex->prepare($sql);
		$result->execute(array(":clave" => $clave));
		return $result;
	}

	public function SetClaveNueva($param, $conex)
	{
		$clave= trim($param->getClave());
		$mail= trim($param->getMail_Usr_Sist());
		
		$sql = "UPDATE Usr_Sistema SET Clave = :clave WHERE Mail_Usr_Sist = :mus";
		$result = $conex->prepare($sql);
		$result->execute(array(":clave" => $clave, ":mus" => $mail));
		return $result;
	}
	
	
	public function ActualizaNomApe($param, $conex)
	{
		$mail= trim($param->getMail_Usr_Sist());
		$nom= trim($param->getNombre_Usr_Sist());
		$ape= trim($param->getApellido_Usr_Sist());
		
		$sql = "UPDATE Usr_Sistema SET Nombre_Usr_Sist =:nombre, Apellido_Usr_Sist =:apellido WHERE Mail_Usr_Sist =:mail";
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":apellido" => $ape, ":mail" => $mail));
		return $result;
	}
	
	
	public function ActualizarPass($param, $conex, $npass)
	{
		$mail= trim($param->getMail_Usr_Sist());
        $pass= trim($param->getPass_Usr_Sist());
		
		$salt = '34a@$#aA9823$';
		$pass= hash('sha512', $salt . $pass);
		
		$sql = "SELECT * FROM Usr_Sistema WHERE Mail_Usr_Sist=:Mail_Usr_Sist AND Pass_Usr_Sist=:Pass_Usr_Sist AND Activo = 'S'";
		
		$result = $conex->prepare($sql);
		$result->execute(array(':Mail_Usr_Sist' => $mail, ':Pass_Usr_Sist' => $pass));
        //Obtiene el registro de la tabla Usuario 
        if($result->rowCount()==0)
        {
       		
			return false;
        }
        else
        {
        	$npass= hash('sha512', $salt . $npass);
			$sql = "UPDATE Usr_Sistema SET Pass_Usr_Sist = :npass WHERE Mail_Usr_Sist = :mus";
			$result = $conex->prepare($sql);
			$result->execute(array(":mus" => $mail, ":npass" => $npass));
			return $result;
        }

	}			

	
	public function eliminaAdminConPass($param, $conex)
	{
		$mail= trim($param->getMail_Usr_Sist());
        $pass= trim($param->getPass_Usr_Sist());
		
		$salt = '34a@$#aA9823$';
		$pass= hash('sha512', $salt . $pass);
		
		$sql = "SELECT * FROM Usr_Sistema WHERE Mail_Usr_Sist=:Mail_Usr_Sist AND Pass_Usr_Sist=:Pass_Usr_Sist AND Activo = 'S'";
		
		$result = $conex->prepare($sql);
		$result->execute(array(':Mail_Usr_Sist' => $mail, ':Pass_Usr_Sist' => $pass));
        //Obtiene el registro de la tabla Usuario 
        if($result->rowCount()==0)
        {
       		
			return false;
        }
        else
        {		
			$sql = "UPDATE Usr_Sistema SET Activo = 'N', Fech_Activo = getdate() WHERE Mail_Usr_Sist =:mail";
			$result = $conex->prepare($sql);
			$result->execute(array(":mail" => $mail));
			return true;
		}		
	}	


	public function TotalAdmin($param,$conex)
	{

        $sql = "SELECT COUNT(Id_Usr_Sistema) FROM Usr_Sistema WHERE Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	
	
	public function ConfirmaMail($param, $conex)
	{
		$cla= trim($param->getClave());
		$sql = "UPDATE Usr_Sistema SET Activo = 'S' WHERE Clave=:clave";
		$result = $conex->prepare($sql);
		$result->execute(array(":clave" => $cla));
		
		if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
	}

	public function ActivaAdmin($param, $conex)
	{
		$mail= trim($param->getMail_Usr_Sist());
		$sql = "UPDATE Usr_Sistema SET Activo = 'S' WHERE Mail_Usr_Sist=:mail";
		$result = $conex->prepare($sql);
		$result->execute(array(":mail" => $mail));
		
		if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
	}	
	
	public function ConsultaClave($param, $conex)
	{
		$cla= trim($param->getClave());
		$sql = "SELECT Clave FROM Usr_Sistema WHERE Clave=:clave";
		$result = $conex->prepare($sql);
		$result->execute(array(":clave" => $cla));
		
		if($result->rowCount()==0)
		{
          return(false);
        }
        else
        {
          return(true);
        }
	}	
	

public function EstablecePass($param, $conex)
	{
		$clave= trim($param->getClave());
        $pass= trim($param->getPass_Usr_Sist());
		
		$salt = '34a@$#aA9823$';
		$pass= hash('sha512', $salt . $pass);
		$sql = "UPDATE Usr_Sistema SET Pass_Usr_Sist = :pass WHERE Clave = :clave";
		$result = $conex->prepare($sql);
		$result->execute(array(':clave' => $clave, ':pass' => $pass));
		
		if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }	
	}

	public function CambiaTipo($param, $conex)
	{
		$mail= trim($param->getMail_Usr_Sist());
		$tipo=trim($param->getTipo_Usr_Sist());
		$sql = "UPDATE Usr_Sistema SET Tipo_Usr_Sist = :tipo WHERE Mail_Usr_Sist=:mai";
		$result = $conex->prepare($sql);
		$result->execute(array(":mai" => $mail, ":tipo" => $tipo));
		
		if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
	}
}
?>