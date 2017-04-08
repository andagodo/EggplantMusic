<?php

class ExistenciaInterprete
{

    public function altaInterprete($param, $conex)
    {

    //    $idi = $param->getId_Interprete();
        $nom=$param->getNom_Interprete();
        $fot=$param->getLink_Foto_Inter();
        $pais = $param->getPais_Interprete();
		$activ = $param->getActivo();
		$feactivo = $param->getFech_Activo();
		
		$sql = "INSERT INTO Interprete (Nom_Interprete, Link_Foto_Inter, Pais_Interprete, Activo, Fech_Activo, Usuario) VALUES (:nombre, :foto, :pais, :activ, :feactivo, :usu)";
		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nom, ":foto" => $fot, ":pais" => $pais, ":activ" => $activ, ":feactivo" => $feactivo, ":usu" => $_SESSION["mai"]));
        
        $lastId = $conex->lastInsertId('Interprete');
		
        if($result)
        {
          return($lastId);
        }
        else
        {
          return(false);
        }
    }


	public function eliminaInterprete($param, $conex)
	{
		$idi = trim($param->getId_Interprete());
		$sql = "UPDATE Pertenece_Cancion SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		$sql = "UPDATE Interprete SET Activo = 'N', Fech_Activo = getdate() WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		return $result;
	}

	public function HabilitaInterprete($param, $conex)
	{
		$idi = trim($param->getId_Interprete());
		$sql = "UPDATE Pertenece_Cancion SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		$sql = "UPDATE Interprete SET Activo = 'S', Fech_Activo = getdate() WHERE Id_Interprete = :idi";
		$result = $conex->prepare($sql);
		$result->execute(array(":idi" => $idi));
		return $result;
	}

	
	public function buscaInterprete($param, $conex)
	{
  
		$nom= trim($param->getNom_Interprete());
        $sql = "SELECT Id_Interprete, Nom_Interprete, Activo FROM Interprete WHERE Nom_Interprete LIKE :nom COLLATE Modern_Spanish_CI_AI";
		
        $result = $conex->prepare($sql);
		$nom = "%".$nom."%";
	    $result->execute(array(":nom" => $nom));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	public function buscaNomInterprete($param, $conex)
	{
  
		$nom= trim($param->getNom_Interprete());
        $sql = "SELECT Id_Interprete, Nom_Interprete FROM Interprete WHERE Activo = 'S' AND Nom_Interprete LIKE :nom COLLATE Modern_Spanish_CI_AI";
        $result = $conex->prepare($sql);
	    $result->execute(array(":nom" => $nom));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
/*    
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

*/	
	
	
	public function consultaTodosInterprete($param, $conex)
   {

        $sql = "SELECT * FROM Interprete WHERE Activo = 'S'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
		return $resultados;
    }

	public function consultaInterpreteNoAct($param, $conex)
   {

        $sql = "SELECT * FROM Interprete WHERE Activo = 'N'";
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
        $sql = "SELECT Id_Interprete, Nom_Interprete, Link_Foto_Inter, Pais_Interprete FROM Interprete WHERE Nom_Interprete LIKE :nom AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }			
	

	public function buscaPaisInterprete($param, $conex)
	{
        $pais= trim($param->getPais_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Link_Foto_Inter, Pais_Interprete FROM Interprete WHERE Pais_Interprete LIKE :pais AND Activo = 'S'";
        $result = $conex->prepare($sql);
		$pais = "%".$pais."%";
	    $result->execute(array(":pais" => $pais));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function buscaNombreInterpreteNoAct($param, $conex)
	{
        $nombre= trim($param->getNom_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Link_Foto_Inter, Pais_Interprete FROM Interprete WHERE Nom_Interprete LIKE :nom AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }			

	public function buscaIDInterpreteNoAct($param, $conex)
	{
        $id= trim($param->getId_Interprete());   
        $sql = "SELECT Id_Interprete FROM Interprete WHERE Id_Interprete = :id AND Activo = 'N'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":id" => $id));
		$resultados=$result->fetchAll();

       return $resultados;
    }		

	public function buscaPaisInterpreteNoAct($param, $conex)
	{
        $pais= trim($param->getPais_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Link_Foto_Inter, Pais_Interprete FROM Interprete WHERE Pais_Interprete LIKE :pais AND Activo = 'N'";
        $result = $conex->prepare($sql);
		$pais = "%".$pais."%";
	    $result->execute(array(":pais" => $pais));
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	

	public function buscaExisteInterprete($param, $conex)
	{
        $nombre= trim($param->getNom_Interprete());   
        $sql = "SELECT Id_Interprete, Nom_Interprete, Activo FROM Interprete WHERE Nom_Interprete LIKE :nom";
        $result = $conex->prepare($sql);
		$nombre = "%".$nombre."%";
	    $result->execute(array(":nom" => $nombre));
		$resultados=$result->fetchAll();

       return $resultados;
    }

	public function CuentaCancionesAsociadas($param, $conex)
   {
		$idi = trim($param->getId_Interprete());
        $sql = "SELECT COUNT(pc.Id_Cancion) FROM Pertenece_Cancion pc, Interprete i WHERE i.Id_Interprete = pc.Id_Interprete AND pc.Activo = 'S' AND i.Id_Interprete = :idi";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idi" => $idi));
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function CuentaCancionesAsociadasTodas($param, $conex)
   {
		$idi = trim($param->getId_Interprete());
        $sql = "SELECT COUNT(pc.Id_Cancion) FROM Pertenece_Cancion pc, Interprete i WHERE i.Id_Interprete = pc.Id_Interprete AND i.Id_Interprete = :idi";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idi" => $idi));
		$resultados=$result->fetchAll();
		return $resultados;
    }		

	public function NombreInterprete($param, $conex)
   {
		$idi = trim($param->getId_Interprete());
        $sql = "SELECT Nom_Interprete, Pais_Interprete, Link_Foto_Inter FROM Interprete WHERE Id_Interprete = :idi";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idi" => $idi));
		$resultados=$result->fetchAll();
		return $resultados;
    }

	public function ActualizaInterprete($param, $conex)
   {
		$idi = trim($param->getId_Interprete());
		$nomi = trim($param->getNom_Interprete());
		$pais = trim($param->getPais_Interprete());
		$foto = trim ($param->getLink_Foto_Inter());
        $sql = "UPDATE Interprete SET Nom_Interprete = :nomi, Pais_Interprete = :pais, Link_Foto_Inter = :foto WHERE Id_Interprete = :idi";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idi" => $idi,":nomi" => $nomi, ":pais" => $pais, ":foto" => $foto));
		return $result;
    }	
		
	
}
?>
