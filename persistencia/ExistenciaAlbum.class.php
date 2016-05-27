<?php

class ExistenciaAlbum
{

    public function altaAlbum($param, $conex)
    {


        $nom=$param->getNom_Album();
        $anio=$param->getAnio_Album();
        $link = $param->getLink_Foto_Album();


        $sql = "INSERT INTO Album ( Nomb_Album, Anio_Album, Link_Foto_Album) VALUES ( :nombre, :anioalbum, :linkalbum)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":anioalbum" => $anio, ":linkalbum" => $link));
        
        
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

	public function consultaAlbum($param, $conex)
   {
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT Nombre, Apellido, Login, IDrol FROM persona";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
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
