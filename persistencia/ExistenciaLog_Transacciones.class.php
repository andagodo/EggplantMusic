<?php

class ExistenciaLog_Transacciones
{
	public function ConsultaAuditoria($param, $conex){
		$feini= trim($param->getFecha_Ini());
		$fefin= trim($param->getFecha_Fin());		
		$usu= trim($param->getUsuario());
		$sql="SELECT * FROM log_Transacciones WHERE FechaTrn BETWEEN :feini AND :fefin";
		$result = $conex->prepare($sql);
		$result->execute(array(":feini" => $feini, ":fefin" => $fefin));
		//$result->execute(array(":usuario" => $usu, ":feini" => $feini, ":fefin" => $fefin));
		$resultados=$result->fetchAll();
       return $resultados;
	}

}
?>