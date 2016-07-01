<?php

class ExistenciaInterprete
{

    public function altaInterprete($param, $conex)
    {

    //    $idi = $param->getId_Interprete();
        $nom=$param->getNom_Interprete();
        $fot=$param->getLink_Foto_Inter();
        $pais = $param->getPais_Interprete();

		$sql = "INSERT INTO Interprete (Nom_Interprete, Link_Foto_Inter, Pais_Interprete) VALUES (:nombre, :foto, :pais)";
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":foto" => $fot, ":pais" => $pais));
        
        
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

	public function eliminaInterprete($param, $conex)
	{
		$idi = trim($param->getId_Interprete());
		$sql = "DELETE FROM Pertenece_Cancion WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		$sql = "DELETE FROM Interprete WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		return $result;
	}
    
	public function consultaUnoInterprete($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT * FROM persona WHERE Login=:login";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

	public function consultaTodosInterprete($param, $conex)
   {

        $sql = "SELECT * FROM Interprete";
        $result = $conex->prepare($sql);
	    $result->execute();
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
	
	public function buscaNombreInterprete($param, $conex)
	{
        $nombre= trim($param->getNom_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Nom_Interprete LIKE :nom";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }			
	

	public function buscaPaisInterprete($param, $conex)
	{
        $pais= trim($param->getPais_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Pais_Interprete FROM Interprete WHERE Pais_Interprete LIKE :pais";
        $result = $conex->prepare($sql);
		$pais = "%".$pais."%";
	    $result->execute(array(":pais" => $pais));
		$resultados=$result->fetchAll();

       return $resultados;
    }
	
}
?>
