<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaLog_Transacciones.class.php';

class Log_Transacciones
{
	private $Fecha_Ini;
	private $Fecha_Fin;
	private $Usuario;
    
    function __construct($feini='',$fefin='',$usr='')
    {
		$this->Fecha_Ini=$feini;		
		$this->Fecha_Fin=$fefin;
		$this->Usuario=$usr;
	}
      

	public function getFecha_Ini()
    {
      return $this->Fecha_Ini;
    }
	
	public function getFecha_Fin()
    {
      return $this->Fecha_Fin;
    }
    
	public function getUsuario()
    {
      return $this->Usuario;
    }
    
    
    public function ConsultaAuditoria($conex)
    {
        $pu= new ExistenciaLog_Transacciones;
		return $pu->ConsultaAuditoria($this, $conex);   
    }
	
}
?>