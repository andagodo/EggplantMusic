<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaAdmin.class.php';

class Admin
{
//    private $Id_Usr_Sistema;
	private $Tipo_Usr_Sist;
    private $Fech_Alta_Usr_Sist;
    private $Fech_Login_Usr_Sist;
	private $Nombre_Usr_Sist;
    private $Mail_Usr_Sist;
    private $Pass_Usr_Sist;

    
    function __construct($tus='', $felo='', $nomu='', $mus='', $pus='', $feal='')
    {
        $this->Tipo_Usr_Sist= $tus;
		$this->Fech_Login_Usr_Sist= $felo;
        $this->Nombre_Usr_Sist= $nomu;
        $this->Mail_Usr_Sist= $mus;
        $this->Pass_Usr_Sist= $pus;
		$this->Fech_Alta_Usr_Sist= $feal;

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
    
    public function setFech_Login_Usr_Sist($felo)
    {
      $this->Fech_Login_Usr_Sist= $felo;
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
    
    public function getFech_Login_Usr_Sist()
    {
      return $this->Fech_Login_Usr_Sist;
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


	
}

?>
