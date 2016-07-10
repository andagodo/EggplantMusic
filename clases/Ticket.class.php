<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaTicket.class.php';

class Ticket
{
	private $Id_Ticket;
	private $Id_Usuario;
	private $Fecha_Ticket;
    private $Asunto_Ticket;
	private $Texto_Ticket;
	private $Respuesta_Ticket;
	private $Resuelto_Ticket;
	

    function __construct($idt='',$idu='',$feti='',$asu='',$text='',$resp='',$resu='')
    {
		$this->Id_Ticket= $idt;
        $this->Id_Usuario= $idu;
		$this->Fecha_Ticket= $feti;
		$this->Asunto_Ticket= $asu;
        $this->Texto_Ticket= $text;
		$this->Respuesta_Ticket= $resp;
		$this->Resuelto_Ticket= $resu;
    }
    
    //Métodos set
	
    public function setId_Ticket($idt)
    {
      $this->Id_Ticket= $idt;
    }    
	
    public function setId_Usuario($idu)
    {
      $this->Id_Usuario= $idu;
    }
    
    public function setFecha_Ticket($feti)
    {
      $this->Fecha_Ticket= $feti;
    }
	
    public function setAsunto_Ticket($asu)
    {
      $this->Asunto_Ticket= $asu;
    }    
	
    public function setTexto_Ticket($text)
    {
      $this->Texto_Ticket= $text;
    }
    
    public function setRespuesta_Ticket($resp)
    {
      $this->Respuesta_Ticket= $resp;
    }
 
    public function setResuelto_Ticket($resu)
    {
      $this->Resuelto_Ticket= $resu;
    } 

    //Métodos get
	
    public function getId_Ticket()
    {
      return $this->Id_Ticket;
    }	
    
    public function getId_Usuario()
    {
      return $this->Id_Usuario;
    }
    
    public function getFecha_Ticket()
    {
      return $this->Fecha_Ticket;
    }

    public function getAsunto_Ticket()
    {
      return $this->Asunto_Ticket;
    }	
    
    public function getRespuesta_Ticket()
    {
      return $this->Respuesta_Ticket;
    }
    
    public function getResuelto_Ticket()
    {
      return $this->Resuelto_Ticket;
    }	
	
    //Otros Métodos
    
/*	
    public function altaPlaylist($conex)
    {
        $pu=new ExistenciaAlbum;
        return ($pu->altaPlaylist($this, $conex));
    }    
    
	public function consultaPlaylist($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaPlaylist($this, $conex);
      return $datos;
    }
	
	public function consultaTodosAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaTodosAlbum($conex);
      return $datos;
    }	
	
	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }
*/


	public function TotalTicket($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->TotalTicket($this, $conex);
      return $datos;
    }
	

	
}
?>
