<?php

class ExistenciaGenero
{

	
    public function altaGenero($param, $conex)
    {

        $nomg=$param->getNom_Genero();
        $desc=$param->getDesc_Genero();

        $sql = "INSERT INTO Genero (Nom_Genero,Desc_Genero) VALUES (:nombre, :descripcion)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":nombre" => $nomg, ":descripcion" => $desc));
        
        
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

	*/
	
		public function consultaTodosGenero($param,$conex)
	{

        $sql = "SELECT Nom_Genero, Desc_Genero FROM Genero";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	

}
?>
