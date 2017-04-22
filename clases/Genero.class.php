<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaGenero.class.php';

class Genero
{
    private $Id_Genero;
	private $Nom_Genero;
    private $Desc_Genero;
	private $Activo;
	private $Fech_Activo;

    function __construct($idg='',$nomg='', $desc='', $activ='', $feactivo='')
    {
        $this->Id_Genero= $idg;
		$this->Nom_Genero= $nomg;
        $this->Desc_Genero= $desc;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;
    }
    
/*
    
    public function setId_Genero($idg)
    {
      $this->Id_Genero= $idg;
    }
    
    public function setNom_Genero($nomg)
    {
      $this->Nom_Genero= $nomg;
    }
    
    public function setDesc_Genero($desc)
    {
      $this->Desc_Genero= $desc;
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
    
    public function getId_Genero()
    {
      return $this->Id_Genero;
    }
    
    public function getNom_Genero()
    {
      return $this->Nom_Genero;
    }
    
    public function getDesc_Genero()
    {
      return $this->Desc_Genero;
    }
 
	public function getActivo()
    {
      return $this->Activo;
    }
	
    public function getFech_Activo()
    {
      return $this->Fech_Activo;
    }   
 
    
	public function consultaTodosGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->consultaTodosGenero($this, $conex);
      return $datos;
    }
	
	
    public function altaGenero($conex)
    {
        $pu=new ExistenciaGenero;
        return ($pu->altaGenero($this, $conex));
    }    
    
	
	public function eliminaGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->eliminaGenero($this, $conex);
      return $datos;
    }
	
	public function UpdateGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->UpdateGenero($this, $conex);
      return $datos;
    }		
	
/*	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }

*/
	
	public function buscaNombreGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->buscaNombreGenero($this, $conex);
      return $datos;
    }		

	public function ConsultaGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->ConsultaGenero($this, $conex);
      return $datos;
    }			
	
	public function buscaDescGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->buscaDescGenero($this, $conex);
      return $datos;
    }
	
	public function buscaGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->buscaGenero($this, $conex);
      return $datos;
    }	

	public function buscaLikeGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->buscaLikeGenero($this, $conex);
      return $datos;
    }
	
	public function consultaGeneroSinUno($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->consultaGeneroSinUno($this, $conex);
      return $datos;
    }
	
}
?>