<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaInterprete.class.php';

class Interprete
{
    private $Id_Interprete;
	private $Nom_Interprete;
    private $Link_Foto_Inter;
    private $Pais_Interprete;
	private $Activo;
	private $Fech_Activo;

    function __construct($idi='',$nom='', $fot='', $pais='', $activ='', $feactivo='')
    {
        $this->Id_Interprete= $idi;
		$this->Nom_Interprete= $nom;
        $this->Link_Foto_Inter= $fot;
        $this->Pais_Interprete= $pais;
		$this->Activo=$activ;
		$this->Fech_Activo=$feactivo;

    }
    
    //Métodos set
    
    public function setId_Interprete($idi)
    {
      $this->Id_Interprete= $idi;
    }
    
    public function setNom_Interprete($nom)
    {
      $this->Nom_Interprete= $nom;
    }
    
    public function setLink_Foto_Inter($fot)
    {
      $this->Link_Foto_Inter= $fot;
    }
    
	public function setPais_Interprete($pais)
    {
      $this->Pais_Interprete= $pais;
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
    
    public function getId_Interprete()
    {
      return $this->Id_Interprete;
    }
    
    public function getNom_Interprete()
    {
      return $this->Nom_Interprete;
    }
    
    public function getLink_Foto_Inter()
    {
      return $this->Link_Foto_Inter;
    }
    
	public function getPais_Interprete()
    {
      return $this->Pais_Interprete;
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
    
	
    public function altaInterprete($conex)
    {
        $pu=new ExistenciaInterprete;
        return ($pu->altaInterprete($this, $conex));
    }   
	
    public function buscaInterprete($conex)
    {
        $pu=new ExistenciaInterprete;
        return ($pu->buscaInterprete($this, $conex));
    }  	
    
	public function consultaTodosInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->consultaTodosInterprete($this, $conex);
      return $datos;
    }
	
	public function buscaNombreInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaNombreInterprete($this, $conex);
      return $datos;
    }

	public function buscaPaisInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaPaisInterprete($this, $conex);
      return $datos;
    }			
	
	// public function consultaEstado($conex)
	// {
      // $pu= new ExistenciaEstado;
      // return $pu->consultaEstado($this, $conex);
	  
    // }
	
	public function eliminaInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->eliminaInterprete($this, $conex);
      return $datos;
    }

	public function HabilitaInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->HabilitaInterprete($this, $conex);
      return $datos;
    }
	
	public function buscaExisteInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaExisteInterprete($this, $conex);
      return $datos;
    }

	public function CuentaCancionesAsociadas($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->CuentaCancionesAsociadas($this, $conex);
      return $datos;
    }
	
	public function NombreInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->NombreInterprete($this, $conex);
      return $datos;
    }
	
	public function consultaInterpreteNoAct($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->consultaInterpreteNoAct($this, $conex);
      return $datos;
    }
	
	public function buscaNombreInterpreteNoAct($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaNombreInterpreteNoAct($this, $conex);
      return $datos;
    }
	
	public function buscaPaisInterpreteNoAct($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaPaisInterpreteNoAct($this, $conex);
      return $datos;
    }
	
	public function ActualizaInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->ActualizaInterprete($this, $conex);
      return $datos;
    }
	
	public function buscaNomInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaNomInterprete($this, $conex);
      return $datos;
    }

	public function CuentaCancionesAsociadasTodas($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->CuentaCancionesAsociadasTodas($this, $conex);
      return $datos;
    }

	public function buscaIDInterpreteNoAct($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->buscaIDInterpreteNoAct($this, $conex);
      return $datos;
    }	
	
}
?>
