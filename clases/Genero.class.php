<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaGenero.class.php';

class Genero
{
    private $Id_Genero;
	private $Nom_Genero;
    private $Desc_Genero;


    function __construct($idg='',$nomg='', $desc='')
    {
        $this->IDequipo= $idg;
		$this->Nom_Genero= $nomg;
        $this->Desc_Genero= $desc;
    }
    
    //Métodos set
    
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
    
    //Métodos get
    
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
    
	
    //Otros Métodos
    
	public function consultaTodosGenero($conex)
    {
      $pu= new ExistenciaGenero;
      $datos= $pu->consultaTodosGenero($this, $conex);
      return $datos;
    }
	
	
	/*
    public function altaIncidente($conex)
    {
        $pu=new ExistenciaIncidente;
        return ($pu->altaIncidente($this, $conex));
    }    
    
	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }

	*/
}
?>
