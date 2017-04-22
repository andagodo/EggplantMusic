<?php

class ExistenciaUsuario
{
        //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function altaUsuario($param, $conex)
    {
        //Obtiene los datos del objeto $param
//        $idp=$param->getIDpersona();

//		$idu=$param->getId_Usuario();
        $nom=$param->getNombre();
        $ape=$param->getApellido();
        $fnac=$param->getFecha_Nac();
        $tel=$param->getTelefono();
		$mai=$param->getMail();
        $pass=$param->getPassword();
        $sex=$param->getSexo();
		$nac=$param->getNacionalidad();
		$feal=$param->getFecha_Alta();
        $conf=$param->getConfirmo();
        $cla = $param->getClave();
//        $tpe = $param->getTipoPersona();	
		
		//Encripto la password uso un salt y un hash
		
		$salt = '34a@$#aA9823$';
		//$pass= hash('sha512', $salt . $pass);
        
        //Genera la sentencia a ejecutar
		//La sql ES UN EJEMPLO LE FALTA todos los campos, depende de sus atributos
        $sql = "INSERT INTO Usuario (Nombre, Apellido, Fecha_Nac, Telefono, Mail, Password, Sexo, Nacionalidad, Fecha_Alta, Confirmo, Clave) VALUES (:nombre, :apellido, :fnac, :tel, :mail, :password, :sexo, :nacional, :fealta, :confirma, :clave)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":apellido" => $ape, ":fnac" => $fnac, ":tel" => $tel, ":mail" => $mai, ":password" => $pass, ":sexo" => $sex, ":nacional" => $nac, ":fealta" => $feal, ":confirma" => $conf, ":clave" => $cla));
        
		
		
        
        //Para saber si ocurrió un error
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
   public function coincideLoginPassword($param, $conex)
   {
        //Obtiene los datos del objeto $param
        $mail= trim($param->getMail());
        $pass= trim($param->getPassword());

		//Vuelvo a encriptar la clave incluyendo el salt
		
		$salt = '34a@$#aA9823$';
//		$pass= hash('sha512', $salt . $pass);
		
        $sql = "SELECT * FROM Usuario WHERE Mail=:mail AND Password=:password";

        $result = $conex->prepare($sql);
		$result->execute(array(':mail' => $mail, ':password' => $pass));
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
		$mai= trim($param->getMail());
        $sql = "SELECT * FROM Usuario WHERE Mail=:mail";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":mail" => $mai));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

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
	

		public function consultaIDPersona($param, $conex)
	{ 
		$login= trim($param->getLogin());
		$sql = "SELECT IDpersona FROM persona WHERE Login=:login";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $login));
		$resultados= $result->fetchAll();
		return $resultados;
	}	
	
	public function consultaTipo($param, $conex)
	{
		$mai= trim($param->getMail());
		$sql = "SELECT Tipo FROM Usuario WHERE Mail=:mail";
		$result = $conex->prepare($sql);
		$result->execute(array(":mail" => $mai));
		return $result->fetchAll();
	}	
	
	
	
	public function consultaIDrol($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
		$sql = "SELECT IDrol FROM persona WHERE Login=:login";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $log));
		return $result->fetchAll();
	}
	
	public function ConfirmaMail($param, $conex)
	{
		$cla= trim($param->getClave());
		$sql = "UPDATE Usuario SET Confirmo = 'S' WHERE Clave=:clave";
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

	
	public function consultaIDUsuario($param, $conex)
	{ 
		$mail= trim($param->getMail());
		$sql = "SELECT Id_Usuario FROM Usuario WHERE Mail=:mail";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":mail" => $mail));
		$resultados= $result->fetchAll();
		return $resultados;
	}	
	
	
	public function UsuarioGratuito($param, $conex)
	{
		$idu= trim($param->getId_Usuario());
		$feini=date("Y-m-d");
		$fefin = strtotime ( '+1 year' , strtotime ( $feini ) ) ;
		$fefin = date ( "Y-m-d" , $fefin );
		
		$sql = "INSERT INTO Tiene_Cuenta (FK_Id_Usuario, FK_Id_Cuenta, Fecha_Ini_Cuenta, Fecha_Fin_Cuenta) VALUES (:idu, 1, :feini, :fefin)";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu,":feini" => $feini,":fefin" => $fefin));
		
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
