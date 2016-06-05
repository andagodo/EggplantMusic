<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaPerteneceCancion.class.php';

class PerteneceCancion
{
	private $Id_Pertenece_Cancion;
    private $Id_Interprete;
	private $Id_Cancion;


    function __construct($idpc='',$idi='',$idc='')
    {
		$this->Id_Pertenece_Cancion= $idpc;
        $this->Id_Interprete= $idi;
		$this->Id_Cancion= $idc;

    }
    
    //Métodos set
	
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
    
    //Métodos get
	
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
    
	
    //Otros Métodos
    
	
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

}
?>
