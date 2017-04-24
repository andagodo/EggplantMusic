<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaPerteneceCancion.class.php';

class PerteneceCancion
{
	private $Id_Pertenece_Cancion;
    private $Id_Interprete;
	private $Id_Cancion;
	private $Activo;
	private $Fech_Activo;

    function __construct($idpc='',$idi='',$idc='', $activ='', $feactivo='')
    {
		$this->Id_Pertenece_Cancion= $idpc;
        $this->Id_Interprete= $idi;
		$this->Id_Cancion= $idc;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
    }
    
/*
	
    public function setId_Pertenece_Cancion($idpc)
    {
      $this->Id_Pertenece_Cancion= $idpc;
    }    
	
    public function setId_Interprete($idi)
    {
      $this->Id_Interprete= $idi;
    }
    
    public function setId_Cancion($idc)
    {
      $this->Id_Cancion= $idc;
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
	
    public function getId_Pertenece_Cancion()
    {
      return $this->Id_Pertenece_Cancion;
    }	
    
    public function getId_Interprete()
    {
      return $this->Id_Interprete;
    }
    
    public function getId_Cancion()
    {
      return $this->Id_Cancion;
    }

	public function getActivo()
    {
      return $this->Activo;
    }
    
    public function getFech_Activo()
    {
      return $this->Fech_Activo;
    }  
    

	
    public function altaPerteneceCancion($conex)
    {
        $pu=new ExistenciaPerteneceCancion;
        return ($pu->altaPerteneceCancion($this, $conex));
    }   

	public function consultaPCCancion($conex)
	{
      $pu= new ExistenciaPerteneceCancion;
      return $pu->consultaPCCancion($this, $conex);
    }
	
	public function consultaPCAlbum($conex)
	{
      $pu= new ExistenciaPerteneceCancion;
      return $pu->consultaPCAlbum($this, $conex);
    }	
	
	public function buscaInterpreteCancion($conex)
    {
      $pu= new ExistenciaPerteneceCancion;
      $datos= $pu->buscaInterpreteCancion($this, $conex);
      return $datos;
    }	
	
	public function ConsInterpreteCancion($conex)
    {
      $pu= new ExistenciaPerteneceCancion;
      $datos= $pu->ConsInterpreteCancion($this, $conex);
      return $datos;
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

	public function DatosCancionPC($conex)
    {
      $pu= new ExistenciaPerteneceCancion;
      $datos= $pu->DatosCancionPC($this, $conex);
      return $datos;
    }
	
	public function deshabilitaPCPorInterprete($conex)
    {
      $pu= new ExistenciaPerteneceCancion;
      $datos= $pu->deshabilitaPCPorInterprete($this, $conex);
      return $datos;
    }
	
	public function HabilitaInterpretePC($conex)
    {
      $pu= new ExistenciaPerteneceCancion;
      $datos= $pu->HabilitaInterpretePC($this, $conex);
      return $datos;
    }	

}
?>