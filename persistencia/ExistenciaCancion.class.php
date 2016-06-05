<?php

class ExistenciaCancion
{

    public function altaCancion($param, $conex)
    {

    //    $idc = $param->getId_Cancion();
        $nom=$param->getNom_Cancion();
        $dur=$param->getDur_Cancion();
        $ruta = $param->getRuta_Arch_Cancion();
        $cvp = "0";
        $crep = "0";
		$idg = $param->getId_Genero();

        $sql = "INSERT INTO Cancion ( Nom_Cancion, Dur_Cancion, Ruta_Arch_Cancion, Cant_V_Playlist, Cant_Repr, Id_Genero) VALUES ( :nombre, :duracancion, :rutaarch, :cantplay, :cantrepr, :idgenero)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":duracancion" => $dur, ":rutaarch" => $ruta, ":cantplay" => $cvp, ":cantrepr" => $crep, ":idgenero" => $idg));
        
        
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
}
?>
