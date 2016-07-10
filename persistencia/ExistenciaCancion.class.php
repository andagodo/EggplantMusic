<?php

class ExistenciaCancion
{

    public function altaCancion($param, $conex)
    {

    //    $idc = $param->getId_Cancion();
        $nom=$param->getNom_Cancion();
        $dur=$param->getDur_Cancion();
        $ruta = $param->getRuta_Arch_Cancion();
		$idg = $param->getId_Genero();

        $sql = "INSERT INTO Cancion ( Nom_Cancion, Dur_Cancion, Ruta_Arch_Cancion, Id_Genero) VALUES ( :nombre, :duracancion, :rutaarch, :idgenero)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":duracancion" => $dur, ":rutaarch" => $ruta, ":idgenero" => $idg));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

     
/*
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
*/

    
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

	public function consultaCancionGenero($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$idg= trim($param->getId_Genero());
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero FROM Cancion c, Genero g WHERE c.Id_Genero=:genero AND c.Id_Genero = g.Id_Genero";

        $result = $conex->prepare($sql);
	    $result->execute(array(":genero" => $idg));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }	

	public function buscaNombreCancion($param, $conex)
	{
        $nombre= trim($param->getNom_Cancion());   
        $sql = "SELECT c.Id_Cancion, c.Nom_Cancion, c.Dur_Cancion, g.Nom_Genero FROM Cancion c, Genero g WHERE Nom_Cancion LIKE :nom AND c.Id_Genero = g.Id_Genero";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
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
	
	
	public function eliminaCancion($param, $conex)
	{
		$idc= trim($param->getId_Cancion());
		
		$sql = "DELETE FROM Pertenece_Cancion WHERE Id_Cancion =:idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		$sql = "DELETE FROM Cancion WHERE Id_Cancion =:idc";
		$result = $conex->prepare($sql);
		$result->execute(array(":idc" => $idc));
		return $result;
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
