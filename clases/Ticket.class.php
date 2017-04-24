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
	private $Origen_Ticket;
	private $Fecha_Ticket2;
	

    function __construct($idt='',$idu='',$feti='',$asu='',$text='',$resp='',$resu='',$orig='',$feti2='')
    {
		$this->Id_Ticket= $idt;
        $this->Id_Usuario= $idu;
		$this->Fecha_Ticket= $feti;
		$this->Asunto_Ticket= $asu;
        $this->Texto_Ticket= $text;
		$this->Respuesta_Ticket= $resp;
		$this->Resuelto_Ticket= $resu;
		$this->Origen_Ticket= $orig;
		$this->Fecha_Ticket2= $feti2;
    }
    
	
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
	
    public function getTexto_Ticket()
    {
      return $this->Texto_Ticket;
    }	
    
    public function getRespuesta_Ticket()
    {
      return $this->Respuesta_Ticket;
    }
    
    public function getResuelto_Ticket()
    {
      return $this->Resuelto_Ticket;
    }	
	
    public function getOrigen_Ticket()
    {
      return $this->Origen_Ticket;
    }	
	
    public function getFecha_Ticket2()
    {
      return $this->Fecha_Ticket2;
    }
	  

	public function TotalTicket($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->TotalTicket($this, $conex);
      return $datos;
    }
	
	public function altaTicket($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->altaTicket($this, $conex);
      return $datos;
    }
	
	public function consultaTicket($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->consultaTicket($this, $conex);
      return $datos;
    }
	
	public function FinalizaTicket($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->FinalizaTicket($this, $conex);
      return $datos;
    }
	
	public function ResponderTickets($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->ResponderTickets($this, $conex);
      return $datos;
    }
	
	public function ActualizaTicket($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->ActualizaTicket($this, $conex);
      return $datos;
    }
	
	public function ListaTickets($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->ListaTickets($this, $conex);
      return $datos;
    }
	
	public function TotalTicketUsuario($conex)
    {
      $pu= new ExistenciaTicket;
      $datos= $pu->TotalTicketUsuario($this, $conex);
      return $datos;
    }
	
}
?>