<?php

class ExistenciaTicket
{

    public function altaTicket($param, $conex)
    {

        $usu=$param->getId_Usuario();
        $asun=$param->getAsunto_Ticket();
		$tex=$param->getTexto_Ticket();
        $ori=$param->getOrigen_Ticket();
		$res="G";

		$sql = "INSERT INTO Ticket (Id_Usuario, Fecha_Ticket, Asunto_Ticket, Texto_Ticket, Resuelto_Ticket, Origen_Ticket) VALUES (:usu, getdate(), :asun, :tex, :res, :ori)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":usu" => $usu, ":asun" => $asun,":tex" => $tex, ":ori" => $ori,":res" => $res ));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
	
    
	public function consultaTicket($param, $conex)
	{  
		$idu= trim($param->getId_Usuario());
		$feini= $param->getFecha_Ticket();
		$fefin= $param->getFecha_Ticket2();
		$asu = trim($param->getAsunto_Ticket());
		$asu = "%".$asu."%";
        $sql = "SELECT * FROM Ticket WHERE Id_Usuario=:idu AND Asunto_Ticket LIKE :asu AND Fecha_Ticket BETWEEN :feini AND :fefin AND Origen_Ticket = 'B'";
        $result = $conex->prepare($sql);
	    $result->execute(array(":idu" => $idu,":feini" => $feini, ":fefin" => $fefin, ":asu" => $asu));
		$resultados=$result->fetchAll();
		return $resultados;
    }

	public function TotalTicket($param,$conex)
	{

        $sql = "SELECT COUNT(Id_Ticket) FROM Ticket WHERE Resuelto_Ticket = 'N'";
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }	
	
	public function FinalizaTicket($param,$conex)
	{
		$idt= trim($param->getId_Ticket());
        $sql = "UPDATE Ticket SET Resuelto_Ticket = 'R' WHERE Id_Ticket = :idt";
        $result = $conex->prepare($sql);
		$result->execute(array(":idt" => $idt));
       return $result;
    }
	
	public function ResponderTickets($param,$conex)
	{
		$mai= trim($param->getId_Usuario());
		$feini= $param->getFecha_Ticket();
		$fefin= $param->getFecha_Ticket2();
		$asu = trim($param->getAsunto_Ticket());
		$asu = "%".$asu."%";
		$mai = "%".$mai."%";
		
        $sql = "SELECT t.Id_Ticket, t.Fecha_Ticket, t.Asunto_Ticket, t.Texto_Ticket, t.Respuesta_Ticket, t.Resuelto_Ticket, a.Nombre_Usr_Sist, a.Apellido_Usr_Sist, a.Mail_Usr_Sist
				FROM Ticket t, Usr_Sistema a 
				WHERE t.Asunto_Ticket LIKE :asu AND t.Fecha_Ticket BETWEEN :feini AND :fefin AND t.Origen_Ticket = 'B' 
				AND t.Id_Usuario = a.Id_Usr_Sistema AND a.Mail_Usr_Sist LIKE :mai ";
        $result = $conex->prepare($sql);
		$result->execute(array(":feini" => $feini, ":fefin" => $fefin, ":asu" => $asu, ":mai" => $mai));
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	
	public function ActualizaTicket($param,$conex)
	{
		$idt= trim($param->getId_Ticket());
		$resp=trim($param->getRespuesta_Ticket());
		$res= trim($param->getResuelto_Ticket());
        $sql = "UPDATE Ticket SET Resuelto_Ticket = :res, Respuesta_Ticket = :resp WHERE Id_Ticket = :idt";
        $result = $conex->prepare($sql);
		$result->execute(array(":idt" => $idt, ":resp" => $resp, ":res" => $res, ));
       return $result;
    }
	
	public function ListaTickets($param,$conex)
	{
		$mai= trim($param->getId_Usuario());
		$feini= $param->getFecha_Ticket();
		$fefin= $param->getFecha_Ticket2();
		$asu = trim($param->getAsunto_Ticket());
		$estado= $param->getResuelto_Ticket();
		$asu = "%".$asu."%";
		$mai = "%".$mai."%";
		if ($estado == ''){
			$sql = "SELECT t.Id_Ticket, t.Fecha_Ticket, t.Asunto_Ticket, t.Texto_Ticket, t.Respuesta_Ticket, t.Resuelto_Ticket, a.Nombre_Usr_Sist, a.Apellido_Usr_Sist, a.Mail_Usr_Sist
					FROM Ticket t, Usr_Sistema a 
					WHERE t.Asunto_Ticket LIKE :asu AND t.Fecha_Ticket BETWEEN :feini AND :fefin AND t.Origen_Ticket = 'B'
					AND t.Id_Usuario = a.Id_Usr_Sistema AND a.Mail_Usr_Sist LIKE :mai ";			
		}else{
			$sql = "SELECT t.Id_Ticket, t.Fecha_Ticket, t.Asunto_Ticket, t.Texto_Ticket, t.Respuesta_Ticket, t.Resuelto_Ticket, a.Nombre_Usr_Sist, a.Apellido_Usr_Sist, a.Mail_Usr_Sist
					FROM Ticket t, Usr_Sistema a 
					WHERE t.Asunto_Ticket LIKE :asu AND t.Fecha_Ticket BETWEEN :feini AND :fefin AND t.Origen_Ticket = 'B' AND t.Resuelto_Ticket = :estado
					AND t.Id_Usuario = a.Id_Usr_Sistema AND a.Mail_Usr_Sist LIKE :mai ";
		}
        $result = $conex->prepare($sql);
		if ($estado == ''){
			$result->execute(array(":feini" => $feini, ":fefin" => $fefin, ":asu" => $asu, ":mai" => $mai));
		}else{
			$result->execute(array(":feini" => $feini, ":fefin" => $fefin, ":asu" => $asu, ":mai" => $mai, ":estado" => $estado));
		}
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
}
?>
