<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaCuenta.class.php';

class Cuenta
{
	private $Id_Cuenta;
    private $Tipo;
	private $Cant_Playlist;
    private $Precio;
	private $Activo;
	private $Fech_Activo;

    function __construct($idcu='',$tipo='',$play='', $precio='', $activ='', $feactivo='')
    {
		$this->Id_Cuenta=$idcu;
        $this->Tipo= $tipo;
		$this->Cant_Playlist= $play;
        $this->Precio= $precio;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
    }
    
    //Métodos set
  
    public function setId_Cuenta($idcu)
    {
      $this->Id_Cuenta= $idcu;
    }
	
    public function setTipo($tipo)
    {
      $this->Tipo= $tipo;
    }
    
    public function setCant_Playlist($play)
    {
      $this->Cant_Playlist= $play;
    }
    
    public function setPrecio($precio)
    {
      $this->Precio= $precio;
    }
	
	public function setActivo($activ)
    {
      $this->Activo= $activ;
    }
    
	public function setFech_Activo($feactivo)
    {
      $this->Fech_Activo= $feactivo;
    }	
	
    //Métodos get
	
    public function getId_Cuenta()
    {
      return $this->Id_Cuenta;
    }
	
    public function getTipo()
    {
      return $this->Tipo;
    }
    
    public function getCant_Playlist()
    {
      return $this->Cant_Playlist;
    }
    
    public function getPrecio()
    {
      return $this->Precio;
    }
 
 
	public function getActivo()
    {
      return $this->Activo;
    }
	
 	public function getFech_Activo()
    {
      return $this->Fech_Activo;
    }     
 
	
    //Otros Métodos
    	
	
    public function altaCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->altaCuenta($this, $conex));
    }    
    

	
}
?>
