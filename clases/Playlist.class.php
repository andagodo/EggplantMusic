<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaPlaylist.class.php';

class Playlist
{
	private $Id_Playlist;
    private $Nom_PlayList;
	private $Fech_Creacion;


    function __construct($idp='',$nom='',$fech='')
    {
		$this->Id_Playlist= $idp;
        $this->Nom_PlayList= $nom;
		$this->Fech_Creacion= $fech;

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

	
    //Otros Métodos
    
	
    public function altaPlaylist($conex)
    {
        $pu=new ExistenciaAlbum;
        return ($pu->altaPlaylist($this, $conex));
    }    
    
	public function consultaPlaylist($conex)
    {
      $pu= new ExistenciaAlbum;
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
