<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaAdmin.class.php';

class Admin
{
//    private $Id_Usr_Sistema;
	private $Tipo_Usr_Sist;
    private $Fech_Alta_Usr_Sist;
	private $Nombre_Usr_Sist;
    private $Mail_Usr_Sist;
    private $Pass_Usr_Sist;
	private $Activo;
	private $Fech_Activo;
    
    function __construct($tus='', $nomu='', $mus='', $pus='', $feal='', $activ='', $feactivo='')
    {
        $this->Tipo_Usr_Sist= $tus;
        $this->Nombre_Usr_Sist= $nomu;
        $this->Mail_Usr_Sist= $mus;
        $this->Pass_Usr_Sist= $pus;
		$this->Fech_Alta_Usr_Sist= $feal;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
    }
    
    //Métodos set
    
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
	
	
    // la profesora habia puesto una funcion del tipo set que era "habilitado"
    
    //Métodos get
    
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
	
/*	
	
	public function getIDrol()
    {
      return $this->IDrol;
    }
 */   
    //Otros Métodos
    
    //Devuelve true si el Login y el Password coinciden
    
    public function coincideLoginAdmin($conex)
    {

        $pu= new ExistenciaAdmin;
		return $pu->coincideLoginAdmin($this, $conex);
        
    }
	    //Otros Métodos
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
	
/*
	public function consultaTextoAdmin($texto,$campo,$conex)
    {
      //$pu= new ExistenciaAdmin;
      $datos=consultaTextoAdmin($texto,$campo,$conex);
      return $datos;
    }	
*/		
	
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

	
}

?>
