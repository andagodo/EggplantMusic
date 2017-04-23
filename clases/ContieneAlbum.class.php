<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaContieneAlbum.class.php';

class ContieneAlbum
{
	private $Id_Contiene_Al;
	private $Id_Album;
	private $Id_Pertenece_Cancion;
	private $Activo;
	private $Fech_Activo;

    function __construct($idca='',$ida='',$idpc='', $activ='', $feactivo='')
    {
		$this->Id_Contiene_Al= $idca;
		$this->Id_Album= $ida;
		$this->Id_Pertenece_Cancion= $idpc;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
		
    }
    
/*
	
    public function setId_Contiene_Al($idca)
    {
      $this->Id_Contiene_Al= $idca;
    }    
	
    public function setId_Album($ida)
    {
      $this->Id_Album= $ida;
    }
    
    public function setId_Pertenece_Cancion($idpc)
    {
      $this->Id_Pertenece_Cancion= $idpc;
    }
 
	public function setActivo($activ)
    {
      $this->Activo= $activ;
    }
    
	
    public function setFech_Activo($feactivo)
    {
      $this->Fech_Activo= $feactivo;
    }	
 
*/
	
    public function getId_Contiene_Al()
    {
      return $this->Id_Contiene_Al;
    }	
    
    public function getId_Album()
    {
      return $this->Id_Album;
    }
    
    public function getId_Pertenece_Cancion()
    {
      return $this->Id_Pertenece_Cancion;
    }
 
	public function getActivo()
    {
      return $this->Activo;
    }
    
    public function getFech_Activo()
    {
      return $this->Fech_Activo;
    }   
	
	
    public function altaContieneAlbum($conex)
    {
        $pu=new ExistenciaContieneAlbum;
        return ($pu->altaContieneAlbum($this, $conex));
    }   

	public function consultaCACancion($conex)
	{
      $pu= new ExistenciaContieneAlbum;
      return $pu->consultaCACancion($this, $conex);
    }

	public function consultaAlbum($conex)
	{
      $pu= new ExistenciaContieneAlbum;
      return $pu->consultaAlbum($this, $conex);
    }	

  public function consultaCancionA($conex)
  {
      $pu= new ExistenciaContieneAlbum;
      return $pu->consultaCancionA($this, $conex);
    } 
/*		
    
	public function consultaAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaAlbum($this, $conex);
      return $datos;
    }
	
	public function consultaTodosAlbum($conex)
    {
      $pu= new ExistenciaAlbum;
      $datos= $pu->consultaTodosAlbum($conex);
      return $datos;
    }	
*/

  public function ConsultaIDPerteneceC($conex)
	{
      $pu= new ExistenciaContieneAlbum;
      return $pu->ConsultaIDPerteneceC($this, $conex);
    }
	
  public function deshabilitaCAPorIDPC($conex)
	{
      $pu= new ExistenciaContieneAlbum;
      return $pu->deshabilitaCAPorIDPC($this, $conex);
    } 

}
?>