<?php

require_once('../persistencia/ExistenciaUsuario.class.php');

class Usuario
{
    private $Id_Usuario;
	private $Nombre;
    private $Apellido;
    private $Fecha_Nac;
	private $Telefono;
    private $Mail;
    private $Password;
    private $Sexo;
//	private $Fecha_Alta;
	private $Nacionalidad;
	private $Confirmo;
    
    function __construct($idu='',$nom='', $ape='', $fnac='', $tel='', $mai='', $pass='',$sex='',$nac='',$conf='')
    {
        $this->Id_Usuario= $idu;
		$this->Nombre= $nom;
        $this->Apellido= $ape;
        $this->Fecha_Nac= $fnac;
        $this->Telefono= $tel;
        $this->Mail= $mai;
        $this->Password= $pass;
        $this->Sexo= $sex;
    //    $this->TipoPersona= $tpe;
		$this->Nacionalidad= $nac;
		$this->Confirmo= $conf;
    }
    
    //M�todos set
    
    public function setId_Usuario($idu)
    {
      $this->Id_Usuario= $idu;
    }
    
    public function setNombre($nom)
    {
      $this->Nombre= $nom;
    }
    
    public function setApellido($ape)
    {
      $this->Apellido= $ape;
    }
    
	public function setFecha_Nac($fnac)
    {
      $this->Fecha_Nac= $fnac;
    }
    
     public function setTelefono($tel)
    {
      $this->Telefono= $tel;
    }

    public function setMail($mai)
    {
      $this->Mail= $mai;
    }
    
    public function setPassword($pass)
    {
      $this->Password= $pass;
    }

	
	public function setSexo($sex)
    {
      $this->Sexo= $sex;
    }
	
	
    public function setNacionalidad($nac)
    {
      $this->Nacionalidad= $nac;
    }
	
	public function setConfirmo($conf)
    {
      $this->Confirmo= $conf;
    }
	
/*
 	public function setTipoLogin($tlo)
    {
      $this->TipoLogin= $tlo;
    }
*/

    // la profesora habia puesto una funcion del tipo set que era "habilitado"
    
    //M�todos get
    
    public function getId_Usuario()
    {
      return $this->Id_Usuario;
    }
    
    public function getNombre()
    {
      return $this->Nombre;
    }
    
    public function getApellido()
    {
      return $this->Apellido;
    }
    
	public function getFecha_Nac()
    {
      return $this->Fecha_Nac;
    }
    
    public function getTelefono()
    {
      return $this->Telefono;
    }

    public function getMail()
    {
      return $this->Mail;
    }
    
    public function getPassword()
    {
      return $this->Password;
    }
    
    
	public function getSexo()
    {
      return $this->Sexo;
    }
	
	
 	public function getNacionalidad()
    {
      return $this->Nacionalidad;
    }
    
	public function getConfirmo()
    {
      return $this->Confirmo;
    }	
	
/*	
	
	public function getIDrol()
    {
      return $this->IDrol;
    }
 */   
    //Otros M�todos
    
    //Devuelve true si el Login y el Password coinciden
    
    public function coincideLoginPassword($conex)
    {

        $pu= new ExistenciaUsuario;
		return $pu->coincideLoginPassword($this, $conex);
        
    }
	    //Otros M�todos
    public function altaUsuario($conex)
    {
        $pu=new ExistenciaUsuario;
        return ($pu->altausuario($this, $conex));
    }    
    
     
	public function consultaUno($conex)
    {
      $pu= new ExistenciaUsuario;
      $datos= $pu->consultaUno($this, $conex);
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
	
	public function consultaTipo($conex)
	{
      $pu= new ExistenciaUsuario;
      return $pu->consultaTipo($this, $conex);
    }	
	
}

?>
