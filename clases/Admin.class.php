<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaAdmin.class.php';

class Admin
{
	private $Tipo_Usr_Sist;
    private $Fech_Alta_Usr_Sist;
	private $Nombre_Usr_Sist;
    private $Mail_Usr_Sist;
    private $Pass_Usr_Sist;
	private $Activo;
	private $Fech_Activo;
	private $Apellido_Usr_Sist;
	private $Clave;
    
    function __construct($tus='', $nomu='', $mus='', $pus='', $feal='', $activ='', $feactivo='', $apell='', $cla='')
    {
        $this->Tipo_Usr_Sist= $tus;
        $this->Nombre_Usr_Sist= $nomu;
        $this->Mail_Usr_Sist= $mus;
        $this->Pass_Usr_Sist= $pus;
		$this->Fech_Alta_Usr_Sist= $feal;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
		$this->Apellido_Usr_Sist=$apell;
		$this->Clave=$cla;
    }
	
/*
    public function setTipo_Usr_Sist($tus)
    {
      $this->Tipo_Usr_Sist= $tus;
    }
	
	public function setFech_Alta_Usr_Sist($feal)
    {
      $this->Fech_Alta_Usr_Sist= $feal;
    }
    
    public function setNombre_Usr_Sist($nomu)
    {
      $this->Nombre_Usr_Sist= $nomu;
    }
    
	public function setMail_Usr_Sist($mus)
    {
      $this->Mail_Usr_Sist= $mus;
    }
    
     public function setPass_Usr_Sist($pus)
    {
      $this->Pass_Usr_Sist= $pus;
    }

	public function setActivo($activ)
    {
      $this->Activo= $activ;
    }
    
    public function setFech_Activo($feactivo)
    {
      $this->Fech_Activo= $feactivo;
    }	

    public function setApellido_Usr_Sist($apell)
    {
      $this->Apellido_Usr_Sist= $apell;
    }	

    public function setClave($cla)
    {
      $this->Clave= $cla;
    }		
*/   
    public function getTipo_Usr_Sist()
    {
      return $this->Tipo_Usr_Sist;
    }

    public function getFech_Alta_Usr_Sist()
    {
      return $this->Fech_Alta_Usr_Sist;
    }	
    
    public function getNombre_Usr_Sist()
    {
      return $this->Nombre_Usr_Sist;
    }
    
	public function getMail_Usr_Sist()
    {
      return $this->Mail_Usr_Sist;
    }
    
    public function getPass_Usr_Sist()
    {
      return $this->Pass_Usr_Sist;
    }

	public function getActivo()
    {
      return $this->Activo;
    }
	
    public function getFech_Activo()
    {
      return $this->Fech_Activo;
    }   	
	
    public function getApellido_Usr_Sist()
    {
      return $this->Apellido_Usr_Sist;
    }   	

    public function getClave()
    {
      return $this->Clave;
    } 

    
    public function coincideLoginAdmin($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->coincideLoginAdmin($this, $conex);   
    }

    public function altaAdmin($conex)
    {
        $pu=new ExistenciaAdmin;
        return ($pu->altaAdmin($this, $conex));
    }    
    
	public function consultaAdmin($conex)
    {
      $pu= new ExistenciaAdmin;
      $datos= $pu->consultaAdmin($this, $conex);
      return $datos;
    }
	
	public function buscaNombreAdmin($conex)
    {
      $pu= new ExistenciaAdmin;
      $datos= $pu->buscaNombreAdmin($this, $conex);
      return $datos;
    }
	
	public function buscaMailAdmin($conex)
    {
      $pu= new ExistenciaAdmin;
      $datos= $pu->buscaMailAdmin($this, $conex);
      return $datos;
    }

	public function buscaFAltaAdmin($conex)
    {
      $pu= new ExistenciaAdmin;
      $datos= $pu->buscaFAltaAdmin($this, $conex);
      return $datos;
    }

	public function buscaFLoginAdmin($conex)
    {
      $pu= new ExistenciaAdmin;
      $datos= $pu->buscaFLoginAdmin($this, $conex);
      return $datos;
    }
	
	public function consultaTodos($conex)
    {
      $pu= new ExistenciaUsuario;
      $datos= $pu->consultaTodos($this, $conex);
      return $datos;
    }
	
	public function consultaIDrol($conex)
	{
      $pu= new ExistenciaUsuario;
      return $pu->consultaIDrol($this, $conex);
    }
	
	public function consultaTipoAdmin($conex)
	{
      $pu= new ExistenciaAdmin;
      return $pu->consultaTipoAdmin($this, $conex);
    }	

	public function eliminaAdmin($conex)
	{
      $pu= new ExistenciaAdmin;
      return $pu->eliminaAdmin($this, $conex);
    }	
	
	public function TotalAdmin($conex)
    {
      $pu= new ExistenciaAdmin;
      $datos= $pu->TotalAdmin($this, $conex);
      return $datos;
    }
	
    public function ActualizarPass($conex,$npass)
    {
        $pu= new ExistenciaAdmin;
		return $pu->ActualizarPass($this, $conex,$npass);
    }
	
    public function eliminaAdminConPass($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->eliminaAdminConPass($this, $conex);
    }	
	
    public function ActualizaNomApe($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->ActualizaNomApe($this, $conex);
    }

    public function ConsultoExisteAdmin($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->ConsultoExisteAdmin($this, $conex);
    }		

    public function ConfirmaMail($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->ConfirmaMail($this, $conex);
    }	

    public function SetNullClave($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->SetNullClave($this, $conex);
    }	
	
    public function ConsultaClave($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->ConsultaClave($this, $conex);
    }		

    public function EstablecePass($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->EstablecePass($this, $conex);
    }	

    public function ActivaAdmin($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->ActivaAdmin($this, $conex);
    }	

    public function consultaAdminNoAct($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->consultaAdminNoAct($this, $conex);
    }	

    public function buscaNombreAdminNoAct($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->buscaNombreAdminNoAct($this, $conex);
    }	

    public function buscaMailAdminNoAct($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->buscaMailAdminNoAct($this, $conex);
    }
	
    public function buscaFAltaAdminNoAct($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->buscaFAltaAdminNoAct($this, $conex);
    }

    public function SetClaveNueva($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->SetClaveNueva($this, $conex);
    }
	
    public function CambiaTipo($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->CambiaTipo($this, $conex);
    }	

    public function consultaTodosAdmin($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->consultaTodosAdmin($this, $conex);
    }
	
    public function consultaAdminTodosNoAct($conex)
    {
        $pu= new ExistenciaAdmin;
		return $pu->consultaAdminTodosNoAct($this, $conex);
    }	
	
}
?>