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
    
/*
  
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
	
*/
	
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
 

    public function altaCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->altaCuenta($this, $conex));
    }    
    
    public function eliminaCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->eliminaCuenta($this, $conex));
    } 
	
    public function HabilitaCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->HabilitaCuenta($this, $conex));
    }  
	
    public function ActualizaCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->ActualizaCuenta($this, $conex));
    }  
	
    public function consultaCuentas($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->consultaCuentas($this, $conex));
    }  
	
    public function consultaCuentasHab($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->consultaCuentasHab($this, $conex));
    }  
	
    public function consultaCuentasDeshab($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->consultaCuentasDeshab($this, $conex));
    }
	
    public function buscaTipoCuentaNoAct($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuentaNoAct($this, $conex));
    } 
	
    public function buscaTipoCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuenta($this, $conex));
    } 
	
    public function buscaPlayCuentaNoAct($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuentaNoAct($this, $conex));
    } 
	
    public function buscaPlayCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuenta($this, $conex));
    } 
	
    public function buscaPrecioCuentaNoAct($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuentaNoAct($this, $conex));
    } 
	
    public function buscaPrecioCuenta($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuenta($this, $conex));
    }
	
    public function buscaTipoCuentaTodos($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuentaTodos($this, $conex));
    }	

    public function buscaPlayCuentaTodos($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuentaTodos($this, $conex));
    }
	
    public function buscaPrecioCuentaTodos($conex)
    {
        $pu=new ExistenciaCuenta;
        return ($pu->buscaTipoCuentaTodos($this, $conex));
    }
	
}
?>
