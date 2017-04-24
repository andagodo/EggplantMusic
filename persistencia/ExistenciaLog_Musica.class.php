<?php

class ExistenciaLog_Musica
{
    public function altaLog_Musica($param, $conex)
    {
		$idlm=$param->getId_Log_Musica();
		$felm=$param->getFech_Log_Musica();
        $idu=$param->getId_Usuario();
        $item=$param->getId_Item();
        $itemlog=$param->getItem_Log();
		$accion = $param->getAccion_Log();
		
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (:felm, :idu, :item, :itemlog, :accion)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":felm" => $felm, ":idu" => $idu, ":item" => $item, ":itemlog" => $itemlog, ":accion" => $accion));
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
	
	public function consultaLog_Musica($param, $conex)
	{
		$itemlog= trim($param->getItem_Log());
		$accion= trim($param->getAccion_Log());
		$feini= trim($param->getFecha_Ini());
		$fefin= trim($param->getFecha_Fin());
        $sql = "SELECT Id_Item, Item_Log, Accion_Log, count(Id_Item) AS Cuenta FROM Log_Musica WHERE Item_Log = :itemlog AND Accion_Log = :accion AND Fech_Log_Musica BETWEEN :feini AND :fefin GROUP BY Id_Item, Item_Log, Accion_Log ORDER BY count(Id_Item) DESC";
		$result = $conex->prepare($sql);
		$result->execute(array(":itemlog" => $itemlog,":accion" => $accion, ":feini" => $feini, ":fefin" => $fefin));
		$resultados=$result->fetchAll();

       return $resultados;
    }	
	

	public function Log_MusicaCancion($param, $conex)
	{
		$itemlog= trim($param->getItem_Log());
		$texto=trim($param->getTexto());
		$accion= trim($param->getAccion_Log());
		$feini= trim($param->getFecha_Ini());
		$fefin= trim($param->getFecha_Fin());
		$sql = "SELECT count(lm.Id_Item) AS Cuenta, c.Nom_Cancion, i.Nom_Interprete, c.Dur_Cancion, g.Nom_Genero, a.Nomb_Album, c.Activo 
				FROM Cancion c, Genero g, Interprete i, Pertenece_Cancion pc, Contiene_Album ca, Album a, Log_Musica lm 
				WHERE lm.Item_Log = 'cancion' AND lm.Accion_Log = :accion AND c.Nom_Cancion LIKE :texto AND c.Id_Genero = g.Id_Genero AND i.Id_Interprete = pc.Id_Interprete AND ca.Id_Pertenece_Cancion = pc.Id_Pertenece_Cancion 
				AND a.Id_Album = ca.Id_Album AND c.Id_Cancion = pc.Id_Cancion AND lm.Id_Item = c.Id_Cancion AND Fech_Log_Musica BETWEEN :feini AND :fefin 
				GROUP BY c.Id_Cancion, c.Nom_Cancion, i.Nom_Interprete, c.Dur_Cancion, g.Nom_Genero, a.Nomb_Album, c.Activo, lm.Id_Item ORDER BY count(lm.Id_Item) DESC";
		$texto = "%".$texto."%";
		$result = $conex->prepare($sql);
		$result->execute(array(":texto" => $texto,":accion" => $accion, ":feini" => $feini, ":fefin" => $fefin));
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function Log_MusicaInterprete($param, $conex)
	{
		$itemlog= trim($param->getItem_Log());
		$texto=trim($param->getTexto());
		$accion= trim($param->getAccion_Log());
		$feini= trim($param->getFecha_Ini());
		$fefin= trim($param->getFecha_Fin());
		if ($accion == "busqueda"){
			$sql = "SELECT count(lm.Id_Item) AS Cuenta, i.Nom_Interprete, i.Pais_Interprete, i.Activo FROM Log_Musica lm, Interprete i
				WHERE lm.Item_Log = 'interprete' AND lm.Accion_Log = :accion AND i.Nom_Interprete LIKE :texto AND i.Id_Interprete = lm.Id_Item AND Fech_Log_Musica BETWEEN :feini AND :fefin 
				GROUP BY lm.Id_Item, i.Nom_Interprete, i.Pais_Interprete, i.Activo ORDER BY count(lm.Id_Item) DESC";
		}elseif($accion == "reproduccion"){
			$sql = "SELECT count(i.Id_Interprete) AS Cuenta, i.Nom_Interprete, i.Pais_Interprete, i.Activo
				FROM Cancion c, Interprete i, Pertenece_Cancion pc, Log_Musica lm 
				WHERE lm.Item_Log = 'cancion' AND lm.Accion_Log = :accion AND i.Nom_Interprete LIKE :texto
				AND i.Id_Interprete = pc.Id_Interprete AND c.Id_Cancion = pc.Id_Cancion AND lm.Id_Item = c.Id_Cancion AND Fech_Log_Musica BETWEEN :feini AND :fefin
				GROUP BY i.Id_Interprete, i.Nom_Interprete, i.Pais_Interprete, i.Activo
				ORDER BY count(i.Id_Interprete) DESC";
		}
		$texto = "%".$texto."%";
		$result = $conex->prepare($sql);
		$result->execute(array(":texto" => $texto,":accion" => $accion, ":feini" => $feini, ":fefin" => $fefin));
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function Log_MusicaAlbum($param, $conex)
	{
		$itemlog= trim($param->getItem_Log());
		$texto=trim($param->getTexto());
		$accion= trim($param->getAccion_Log());
		$feini= trim($param->getFecha_Ini());
		$fefin= trim($param->getFecha_Fin());
		if ($accion == "busqueda"){
			$sql = "SELECT count(lm.Id_Item) AS Cuenta, a.Nomb_Album, a.Anio_Album, a.Activo FROM Log_Musica lm, album a
					WHERE lm.Item_Log = 'album' AND lm.Accion_Log = :accion AND a.Nomb_Album LIKE :texto AND a.Id_Album = lm.Id_Item AND Fech_Log_Musica BETWEEN :feini AND :fefin
					GROUP BY lm.Id_Item, a.Nomb_Album, a.Anio_Album, a.Activo ORDER BY count(lm.Id_Item) DESC";
		}elseif($accion == "reproduccion"){		
			$sql = "SELECT count(a.Id_Album) AS Cuenta, a.Nomb_Album, a.Anio_Album, a.Activo
					FROM Cancion c, Pertenece_Cancion pc, Contiene_Album ca, Log_Musica lm, Album a
					WHERE lm.Item_Log = 'cancion' AND lm.Accion_Log = :accion AND a.Nomb_Album LIKE :texto
					AND a.Id_Album = ca.Id_Album AND ca.Id_Pertenece_Cancion = pc.Id_Pertenece_Cancion AND pc.Id_Cancion = c.Id_Cancion
					AND lm.Id_Item = c.Id_Cancion AND Fech_Log_Musica BETWEEN :feini AND :fefin
					GROUP BY a.Id_Album, a.Nomb_Album, a.Anio_Album, a.Activo
					ORDER BY count(a.Id_Album) DESC";
		}
		$texto = "%".$texto."%";
		$result = $conex->prepare($sql);
		$result->execute(array(":texto" => $texto,":accion" => $accion, ":feini" => $feini, ":fefin" => $fefin));
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function Log_MusicaPlaylist($param, $conex)
	{
		$itemlog= trim($param->getItem_Log());
		$texto=trim($param->getTexto());
		$accion= trim($param->getAccion_Log());
		$feini= trim($param->getFecha_Ini());
		$fefin= trim($param->getFecha_Fin());
		$sql = "SELECT count(lm.Id_Item) AS Cuenta, p.Nom_PlayList, p.Fech_Creacion, p.Activo FROM Log_Musica lm, PlayList p
				WHERE lm.Item_Log = 'playlist' AND lm.Accion_Log = :accion AND p.Nom_PlayList LIKE :texto AND p.Id_PlayList = lm.Id_Item AND Fech_Log_Musica BETWEEN :feini AND :fefin
				GROUP BY lm.Id_Item, p.Nom_PlayList, p.Fech_Creacion, p.Activo ORDER BY count(lm.Id_Item) DESC";
		$texto = "%".$texto."%";
		$result = $conex->prepare($sql);
		$result->execute(array(":texto" => $texto,":accion" => $accion, ":feini" => $feini, ":fefin" => $fefin));
		$resultados=$result->fetchAll();
		return $resultados;
    }
	
	public function LogBusquedaCancion($param, $conex)
	{
		$idu=$param->getId_Usuario();
        $item=$param->getId_Item();	
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (getdate(), :idu, :item, 'cancion', 'busqueda')";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu, ":item" => $item));
        if($result){
			return(true);
        }else{
			return(false);
        }	
	}

	public function LogReproduceCancion($param, $conex)
	{
		$idu=$param->getId_Usuario();
        $item=$param->getId_Item();	
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (getdate(), :idu, :item, 'cancion', 'reproduccion')";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu, ":item" => $item));
        if($result){
			return(true);
        }else{
			return(false);
        }
	}
	
	public function LogBusquedaPlaylist($param, $conex)
	{
		$idu=$param->getId_Usuario();
        $item=$param->getId_Item();	
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (getdate(), :idu, :item, 'playlist', 'busqueda')";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu, ":item" => $item));
        if($result){
			return(true);
        }else{
			return(false);
        }	
	}

	public function LogReproducePlaylist($param, $conex)
	{
		$idu=$param->getId_Usuario();
        $item=$param->getId_Item();	
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (getdate(), :idu, :item, 'playlist', 'reproduccion')";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu, ":item" => $item));
        if($result){
			return(true);
        }else{
			return(false);
        }
	}	
	
	
	public function LogBusquedaAlbum($param, $conex)
	{
		$idu=$param->getId_Usuario();
        $item=$param->getId_Item();	
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (getdate(), :idu, :item, 'album', 'busqueda')";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu, ":item" => $item));
        if($result){
			return(true);
        }else{
			return(false);
        }	
	}
	
	public function LogBusquedaInterprete($param, $conex)
	{
		$idu=$param->getId_Usuario();
        $item=$param->getId_Item();	
		$sql = "INSERT INTO Log_Musica (Fech_Log_Musica, Id_Usuario, Id_Item, Item_Log, Accion_Log) VALUES (getdate(), :idu, :item, 'interprete', 'busqueda')";
		$result = $conex->prepare($sql);
		$result->execute(array(":idu" => $idu, ":item" => $item));
        if($result){
			return(true);
        }else{
			return(false);
        }	
	}

}
?>