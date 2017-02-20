<?php

class ExistenciaAdmin
{
        //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function altaAdmin($param, $conex)
    {
        //Obtiene los datos del objeto $param
//        $idp=$param->getIDpersona();

		$tus=$param->getTipo_Usr_Sist();
		$feal=$param->getFech_Alta_Usr_Sist();
        $nomu=$param->getNombre_Usr_Sist();
        $mus=$param->getMail_Usr_Sist();
        $pus=$param->getPass_Usr_Sist();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		$apell = $param->getApellido_Usr_Sist();
		
		//Encripto la password uso un salt y un hash
		
		$salt = '34a@$#aA9823$';
		$pass= hash('sha512', $salt . $pus);
        
        //Genera la sentencia a ejecutar
		//La sql ES UN EJEMPLO LE FALTA todos los campos, depende de sus atributos
        $sql = "INSERT INTO Usr_Sistema (Tipo_Usr_Sist, Nombre_Usr_Sist, Mail_Usr_Sist, Pass_Usr_Sist, Fech_Alta_Usr_Sist, Activo, Fech_Activo, Apellido_Usr_Sist) VALUES (:tipousr, :nombre, :mail, :pass, :fechaalta, :activ, :feactivo, :apell)";
      
		
		$result = $conex->prepare($sql);
		$result->execute(array(":tipousr" => $tus, ":nombre" => $nomu, ":mail" => $mus, ":pass" => $pass, ":fechaalta" => $feal, ":activ" => $activ, ":feactivo" => $feactivo, ":apell" => $apell));
        
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
   public function coincideLoginAdmin($param, $conex)
   {
        //Obtiene los datos del objeto $param
        $mail= trim($param->getMail_Usr_Sist());
        $pass= trim($param->getPass_Usr_Sist());

		//Vuelvo a encriptar la clave incluyendo el salt
		
		$salt = '34a@$#aA9823$';
//		$pass= hash('sha512', $salt . $pass);
		
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
//        $idp= trim($param->getIDpersona());   
		$tus= trim($param->getTipo_Usr_Sist());
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist FROM Usr_Sistema WHERE Tipo_Usr_Sist=:tipo AND Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":tipo" => $tus));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	
/*	
	public function consultaTextoAdmin($texto, $campo, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$texto= trim($texto);
		$campo= trim($campo);
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist FROM Usr_Sistema WHERE :campo='%:texto%'";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":texto" => $texto,":campo" => $campo ));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }	

*/
	
	public function buscaNombreAdmin($param, $conex)
	{
        $nombre= trim($param->getNombre_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist FROM Usr_Sistema WHERE Nombre_Usr_Sist LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }		


	public function buscaMailAdmin($param, $conex)
	{
        $mail= trim($param->getMail_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist FROM Usr_Sistema WHERE Mail_Usr_Sist LIKE :mai AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$mail = "%".$mail."%";
	    $result->execute(array(":mai" => $mail));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function buscaFAltaAdmin($param, $conex)
	{
        $falta= trim($param->getFech_Alta_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist FROM Usr_Sistema WHERE Fech_Alta_Usr_Sist LIKE :fa AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$falta = "%".$falta."%";
	    $result->execute(array(":fa" => $falta));
		$resultados=$result->fetchAll();

       return $resultados;
    }
/*	
	public function buscaFLoginAdmin($param, $conex)
	{
        $flogin= trim($param->getFech_Login_Usr_Sist());   
        $sql = "SELECT Nombre_Usr_Sist, Mail_Usr_Sist, Fech_Alta_Usr_Sist, Fech_Login_Usr_Sist FROM Usr_Sistema WHERE Fech_Login_Usr_Sist LIKE :flog";
        $result = $conex->prepare($sql);
		$flogin = "%".$flogin."%";
	    $result->execute(array(":flog" => $flogin));
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
*/

	
	public function consultaTipoAdmin($param, $conex)
	{
		$mai= trim($param->getMail_Usr_Sist());
		$sql = "SELECT Tipo_Usr_Sist, Nombre_Usr_Sist, Apellido_Usr_Sist FROM Usr_Sistema WHERE Mail_Usr_Sist=:mail AND Activo = 'S'";
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

	//	$mus= trim($param->getMail_Usr_Sist());
	//	$pus=$param->getPass_Usr_Sist();
	//	
	//	$salt = '34a@$#aA9823$';
	//	$pus= hash('sha512', $salt . $pus);

	//	$sql = "UPDATE Usr_Sistema SET Pass_Usr_Sist = :pass WHERE Mail_Usr_Sist = :mus";
	//	$result = $conex->prepare($sql);
	//	$result->execute(array(":mus" => $mus, ":pass" => $pass));
	//	return $result;
	}	
	
/*	
	
	public function consultaIDrol($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
		$sql = "SELECT IDrol FROM persona WHERE Login=:login";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $log));
		return $result->fetchAll();
	}
*/

	
	public function TotalAdmin($param,$conex)
	{

        $sql = "SELECT COUNT(Id_Usr_Sistema) FROM Usr_Sistema WHERE Activo = 'S'";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	
	
	
}
?>
