<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaCancion.class.php';

class Cancion
{
    private $Id_Cancion;
	private $Nom_Cancion;
    private $Dur_Cancion;
    private $Ruta_Arch_Cancion;
	private $Cant_V_Playlist;
    private $Cant_Repr;
	private $Id_Genero;

    function __construct($idc='',$nom='', $dur='', $ruta='', $cvp='', $crep='', $idg='')
    {
        $this->Id_Cancion= $idc;
		$this->Nom_Cancion= $nom;
        $this->Dur_Cancion= $dur;
        $this->Ruta_Arch_Cancion= $ruta;
        $this->Cant_V_Playlist= $cvp;
        $this->Cant_Repr= $crep;
		$this->Id_Genero= $idg;
    }
    
    //Métodos set
    
    public function setId_Cancion($idc)
    {
      $this->Id_Cancion= $idc;
    }
    
    public function setNom_Cancion($nom)
    {
      $this->Nom_Cancion= $nom;
    }
    
    public function setDur_Cancion($dur)
    {
      $this->Dur_Cancion= $dur;
    }
    
	public function setRuta_Arch_Cancion($ruta)
    {
      $this->Ruta_Arch_Cancion= $ruta;
    }
    
     public function setCant_V_Playlist($cvp)
    {
      $this->Cant_V_Playlist= $cvp;
    }

    public function setCant_Repr($crep)
    {
      $this->Cant_Repr= $crep;
    }
	
    public function setId_Genero($idg)
    {
      $this->Id_Genero= $idg;
    }	
    
    //Métodos get
    
    public function getId_Cancion()
    {
      return $this->Id_Cancion;
    }
    
    public function getNom_Cancion()
    {
      return $this->Nom_Cancion;
    }
    
    public function getDur_Cancion()
    {
      return $this->Dur_Cancion;
    }
    
	public function getRuta_Arch_Cancion()
    {
      return $this->Ruta_Arch_Cancion;
    }
    
    public function getCant_V_Playlist()
    {
      return $this->Cant_V_Playlist;
    }

    public function getCant_Repr()
    {
      return $this->Cant_Repr;
    }
	
    public function getId_Genero()
    {
      return $this->Id_Genero;
    }    

	
    //Otros Métodos
    
	
    public function altaCancion($conex)
    {
        $pu=new ExistenciaCancion;
        return ($pu->altaCancion($this, $conex));
    }    
    
	public function consultaTodos($conex)
    {
      $pu= new ExistenciaIncidente;
      $datos= $pu->consultaIncidente($this, $conex);
      return $datos;
    }

	public function consultaCancionGenero($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consultaCancionGenero($this, $conex);
      return $datos;
    }
	
	public function buscaNombreCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaNombreCancion($this, $conex);
      return $datos;
    }	
	

	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }
	
	public function eliminaCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->eliminaCancion($this, $conex);
      return $datos;
    }		
	
}
?>
