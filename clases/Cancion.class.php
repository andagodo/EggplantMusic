<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaCancion.class.php';

class Cancion
{
	private $Id_Cancion;
	private $Nom_Cancion;
	private $Dur_Cancion;
	private $Ruta_Arch_Cancion;
	private $Id_Genero;
	private $Activo;
	private $Fech_Activo;

    function __construct($idc='',$nom='', $dur='', $ruta='', $idg='', $activ='', $feactivo='')
    {
        $this->Id_Cancion= $idc;
		$this->Nom_Cancion= $nom;
        $this->Dur_Cancion= $dur;
        $this->Ruta_Arch_Cancion= $ruta;
		$this->Id_Genero= $idg;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
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
    
	
    public function setId_Genero($idg)
    {
      $this->Id_Genero= $idg;
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
    
	
    public function getId_Genero()
    {
      return $this->Id_Genero;
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
	
	public function buscaCancionHabilitar($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaCancionHabilitar($this, $conex);
      return $datos;
    }
	
	public function buscaCancionAprobar($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaCancionAprobar($this, $conex);
      return $datos;
    }
	
	public function buscaCancionDeshabilitar($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaCancionDeshabilitar($this, $conex);
      return $datos;
    }
	
	public function ExisteCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->ExisteCancion($this, $conex);
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
  public function consCancionId($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consCancionId($this, $conex);
      return $datos;
    }

	
	
	public function consultaCancionSinInterprete($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consultaCancionSinInterprete($this, $conex);
      return $datos;
    }
	
	public function consultaCancionSinAlbum($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consultaCancionSinAlbum($this, $conex);
      return $datos;
    }	

	public function consultaAlbumSinCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consultaAlbumSinCancion($this, $conex);
      return $datos;
    }	

	public function consultaInterpreteSinCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consultaInterpreteSinCancion($this, $conex);
      return $datos;
    }


	public function consultaGeneroCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consultaGeneroCancion($this, $conex);
      return $datos;
    }	

	public function ActivaCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->ActivaCancion($this, $conex);
      return $datos;
    }
	
	public function CuentaCancionGenero($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->CuentaCancionGenero($this, $conex);
      return $datos;
    }	

	public function ActualizaGenero($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->ActualizaGenero($this, $conex);
      return $datos;
    }

	public function ListaCancionActivas($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->ListaCancionActivas($conex);
      return $datos;
    }

	public function consCancionInterprete($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->consCancionInterprete($this,$conex);
      return $datos;
    }

	public function UpdateCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->UpdateCancion($this,$conex);
      return $datos;
    }

	public function buscaNombreCancionGenero($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaNombreCancionGenero($this,$conex);
      return $datos;
    }
	
	public function buscaInterpreteCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaInterpreteCancion($this,$conex);
      return $datos;
    }

	public function buscaInterpreteCancionGenero($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaInterpreteCancionGenero($this,$conex);
      return $datos;
    }
	
	public function buscaAlbumCancion($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaAlbumCancion($this,$conex);
      return $datos;
    }

	public function buscaAlbumCancionGenero($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->buscaAlbumCancionGenero($this,$conex);
      return $datos;
    }

	public function ConsultoIDCA($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->ConsultoIDCA($this,$conex);
      return $datos;
    }
	
	public function BuscoCancionEnPL($conex)
    {
      $pu= new ExistenciaCancion;
      $datos= $pu->BuscoCancionEnPL($this,$conex);
      return $datos;
    }	
	
}
?>

