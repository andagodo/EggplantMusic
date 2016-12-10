<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaUsuario.class.php';

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
	private $Nacionalidad;
	private $Fecha_Alta;
	private $Confirmo;
	private $Clave;
    
    function __construct($idu='',$nom='', $ape='', $fnac='', $tel='', $mai='', $pass='',$sex='',$nac='',$feal='',$conf='',$cla='')
    {
        $this->Id_Usuario= $idu;
		$this->Nombre= $nom;
        $this->Apellido= $ape;
        $this->Fecha_Nac= $fnac;
        $this->Telefono= $tel;
        $this->Mail= $mai;
        $this->Password= $pass;
        $this->Sexo= $sex;
		$this->Nacionalidad= $nac;
		$this->Fecha_Alta= $feal;
		$this->Confirmo= $conf;
		$this->Clave= $cla;
    }
    
    //Métodos set
  
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

 	public function setFecha_Alta($feal)
    {
      $this->Fecha_Alta= $feal;
    }
	
	public function setConfirmo($conf)
    {
      $this->Confirmo= $conf;
    }
	
	public function setClave($cla)
    {
      $this->Clave= $cla;
    }


    // la profesora habia puesto una funcion del tipo set que era "habilitado"
    
    //Métodos get
   
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
 
	public function getFecha_Alta()
    {
      return $this->Fecha_Alta;
    }
 
	public function getConfirmo()
    {
      return $this->Confirmo;
    }	

	
	public function getClave()
    {
      return $this->Clave;
    }	

   
    //Otros Métodos
    
    //Devuelve true si el Login y el Password coinciden
    
    public function coincideLoginPassword($conex)
    {

        $pu= new ExistenciaUsuario;
		return $pu->coincideLoginPassword($this, $conex);
        
    }
	    //Otros Métodos
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
	
	
	public function ConfirmaMail($conex)
	{
      $pu= new ExistenciaUsuario;
      return $pu->ConfirmaMail($this, $conex);
    }	

	public function consultaIDUsuario($conex)
	{
      $pu= new ExistenciaUsuario;
      return $pu->consultaIDUsuario($this, $conex);
    }
	
	public function UsuarioGratuito($conex)
	{
      $pu= new ExistenciaUsuario;
      return $pu->UsuarioGratuito($this, $conex);
    }	
	
	
}

?>
