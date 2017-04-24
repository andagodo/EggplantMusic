<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaAlbum.class.php';

class Album
{
	private $Id_Album;
    private $Nom_Album;
	private $Anio_Album;
    private $Link_Foto_Album;
	private $Activo;
	private $Fech_Activo;

    function __construct($ida='',$nom='',$anio='', $link='', $activ='', $feactivo='')
    {
		$this->Id_Album= $ida;
        $this->Nom_Album= $nom;
		$this->Anio_Album= $anio;
        $this->Link_Foto_Album= $link;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
    }
	
    public function getId_Album()
    {
      return $this->Id_Album;
    }	
    
    public function getNom_Album()
    {
      return $this->Nom_Album;
    }
    
    public function getAnio_Album()
    {
      return $this->Anio_Album;
    }
    
    public function getLink_Foto_Album()
    {
      return $this->Link_Foto_Album;
    }
 
	public function getActivo()
    {
      return $this->Activo;
    }
    
    public function getFech_Activo()
    {
      return $this->Fech_Activo;
    }   

	
    public function altaAlbum($conex)
    {
        $pu=new ExistenciaAlbum;
        return ($pu->altaAlbum($this, $conex));
    }    
    
	public function eliminaAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->eliminaAlbum($this, $conex);
      return $datos;
    }	
	
	public function consultaAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaAlbum($this, $conex);
      return $datos;
    }
    
	public function buscaAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->buscaAlbum($this, $conex);
      return $datos;
    }
	
	public function consultaTodosAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaTodosAlbum($conex);
      return $datos;
    }	

	public function buscaNombreAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->buscaNombreAlbum($this, $conex);
      return $datos;
    }		

	public function buscaAlbumHabilitar($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->buscaAlbumHabilitar($this, $conex);
      return $datos;
    }	

	public function buscaAlbumAprobar($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->buscaAlbumAprobar($this, $conex);
      return $datos;
    }	
	
	public function buscaAnioAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->buscaAnioAlbum($this, $conex);
      return $datos;
    }	

	public function ActivaAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->ActivaAlbum($this, $conex);
      return $datos;
    }

	public function buscaIdAlbumNoAct($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->buscaIdAlbumNoAct($this, $conex);
      return $datos;
    }

	public function UpdateAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->UpdateAlbum($this, $conex);
      return $datos;
    }
	
	public function DeshabAlbumPorInterprete($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->DeshabAlbumPorInterprete($this, $conex);
      return $datos;
    }	

}
?>