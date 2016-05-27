<?php

class ExistenciaUsuario
{
        //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function altaUsuario($param, $conex)
    {
        //Obtiene los datos del objeto $param
//        $idp=$param->getIDpersona();

		$idu=$param->getId_Usuario();
        $nom=$param->getNombre();
        $ape=$param->getApellido();
        $fnac=$param->getFecha_Nac();
        $tel=$param->getTelefono();
		$mai=$param->getMail();
        $pass=$param->getPassword();
		$tipo=$param->getTipo();
        $sex=$param->getSexo();
//        $tlo = $param->getTipoLogin();
//        $tpe = $param->getTipoPersona();	
		
		//Encripto la password uso un salt y un hash
		
		$salt = '34a@$#aA9823$';
		//$pass= hash('sha512', $salt . $pass);
        
        //Genera la sentencia a ejecutar
		//La sql ES UN EJEMPLO LE FALTA todos los campos, depende de sus atributos
        $sql = "INSERT INTO Usuario (Id_Usuario, Nombre, Apellido, Fecha_Nac, Telefono, Mail, Password, Tipo,Sexo) VALUES (:idusuario, :nombre, :apellido, :fnac, :tel, :mail, :password, :tipo, :sexo)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":idusuario" => $idu, ":nombre" => $nom, ":apellido" => $ape, ":fnac" => $fnac, ":tel" => $tel, ":mail" => $mai, ":password" => $pass, ":tipo" => $tipo, ":sexo" => $sex));
        
        
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
}
?>
