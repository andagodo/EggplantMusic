<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaPlaylist.class.php';

class Playlist
{
	private $Id_Playlist;
  private $Nom_PlayList;
	private $Fech_Creacion;
  private $Activo;
  private $Fech_Activo;


    function __construct($idp='',$nom='',$fech='',$act='',$fecha='')
    {
		$this->Id_Playlist= $idp;
    $this->Nom_PlayList= $nom;
		$this->Fech_Creacion= $fech;
    $this->Activo= $act;
    $this->Fech_Activo= $fecha;

    }
    
    //Métodos set
	
    public function setId_Playlist($idp)
    {
      $this->Id_Playlist= $idp;
    }    
	
    public function setNom_PlayList($nom)
    {
      $this->Nom_PlayList= $nom;
    }
    
    public function setFech_Creacion($fech)
    {
      $this->Fech_Creacion= $fech;
    }
    
    public function setActivo($act)
    {
      $this->Activo= $act;
    }

    public function setFech_Activo($fecha)
    {
      $this->Fech_Activo= $fecha;
    }

    //Métodos get
	
    public function getId_Playlist()
    {
      return $this->Id_Playlist;
    }	
    
    public function getNom_PlayList()
    {
      return $this->Nom_PlayList;
    }
    
    public function getFech_Creacion()
    {
      return $this->Fech_Creacion;
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
    
	
    public function altaPlaylist($conex)
    {
        $pu=new ExistenciaPlaylist;
        return ($pu->altaPlaylist($this, $conex));
    }    
    
  	public function consultaPlaylist($conex)
      {
        $pu= new ExistenciaPlaylist;
        $datos= $pu->consultaPlaylist($this, $conex);
        return $datos;
      }
     /*	
  	 public function consultaTodosAlbum($conex)
      {
        $pu= new ExistenciaAlbum;
        $datos= $pu->consultaTodosAlbum($conex);
        return $datos;
      }	
	
	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }

*/

	public function TotalPlaylist($conex)
    {
      $pu= new ExistenciaPlaylist;
      $datos= $pu->TotalPlaylist($this, $conex);
      return $datos;
    }
	
	
}
?>
