<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaAlbum.class.php';

class Album
{
    private $Nom_Album;
	private $Anio_Album;
    private $Link_Foto_Album;


    function __construct($nom='',$anio='', $link='')
    {
        $this->Nom_Album= $nom;
		$this->Anio_Album= $anio;
        $this->Link_Foto_Album= $link;

    }
    
    //Métodos set
    
    public function setNom_Album($nom)
    {
      $this->Nom_Album= $nom;
    }
    
    public function setAnio_Album($anio)
    {
      $this->Anio_Album= $anio;
    }
    
    public function setLink_Foto_Album($link)
    {
      $this->Link_Foto_Album= $link;
    }
    
    //Métodos get
    
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
 
	
    //Otros Métodos
    
	
    public function altaAlbum($conex)
    {
        $pu=new ExistenciaAlbum;
        return ($pu->altaAlbum($this, $conex));
    }    
    
	public function consultaAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaAlbum($this, $conex);
      return $datos;
    }
	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }
}
?>
