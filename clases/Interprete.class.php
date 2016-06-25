<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaInterprete.class.php';

class Interprete
{
    private $Id_Interprete;
	private $Nom_Interprete;
    private $Link_Foto_Inter;
    private $Pais_Interprete;


    function __construct($idi='',$nom='', $fot='', $pais='')
    {
        $this->Id_Interprete= $idi;
		$this->Nom_Interprete= $nom;
        $this->Link_Foto_Inter= $fot;
        $this->Pais_Interprete= $pais;

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
 
	
    //Otros Métodos
    
	
    public function altaInterprete($conex)
    {
        $pu=new ExistenciaInterprete;
        return ($pu->altaInterprete($this, $conex));
    }    
    
	public function consultaTodosInterprete($conex)
    {
      $pu= new ExistenciaInterprete;
      $datos= $pu->consultaTodosInterprete($this, $conex);
      return $datos;
    }
	
	// public function consultaEstado($conex)
	// {
      // $pu= new ExistenciaEstado;
      // return $pu->consultaEstado($this, $conex);
	  
    // }
	
}
?>
