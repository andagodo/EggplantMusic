<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaLog_Musica.class.php';

class Log_Musica
{
	private $Id_Log_Musica;
    private $Fech_Log_Musica;
	private $Id_Usuario;
    private $Id_Item;
    private $Item_Log;
	private $Accion_Log;
	private $Cantidad;
	private $Fecha_Ini;
	private $Fecha_Fin;
	private $Texto;
    
    function __construct($idlm='', $felm='', $idu='', $item='', $itemlog='', $accion='',$cant='',$feini='',$fefin='',$tex='')
    {
        $this->Id_Log_Musica= $idlm;
        $this->Fech_Log_Musica= $felm;
        $this->Id_Usuario= $idu;
        $this->Id_Item= $item;
		$this->Item_Log= $itemlog;
		$this->Accion_Log=$accion;
		$this->Cantidad=$cant;
		$this->Fecha_Ini=$feini;		
		$this->Fecha_Fin=$fefin;
		$this->Texto=$tex;
	}
    
/*
    
    public function setId_Log_Musica($idlm)
    {
      $this->Id_Log_Musica= $idlm;
    }
	
	public function setFech_Log_Musica($felm)
    {
      $this->Fech_Log_Musica= $felm;
    }
    
    
    public function setId_Usuario($idu)
    {
      $this->Id_Usuario= $idu;
    }
    
	public function setId_Item($item)
    {
      $this->Id_Item= $item;
    }
    
     public function setItem_Log($itemlog)
    {
      $this->Item_Log= $itemlog;
    }

	public function setAccion_Log($accion)
    {
      $this->Accion_Log= $accion;
    }
    
	public function setCantidad($cant)
    {
      $this->Cantidad= $cant;
    }

	public function setFecha_Ini($feini)
    {
      $this->Fecha_Ini= $feini;
    }
    
	public function setFecha_Fin($fefin)
    {
      $this->Fecha_Fin= $fefin;
    }
	
	public function setTexto($tex)
    {
      $this->Texto= $tex;
    }
	
    
*/
    
    public function getId_Log_Musica()
    {
      return $this->Id_Log_Musica;
    }

    public function getFech_Log_Musica()
    {
      return $this->Fech_Log_Musica;
    }	
    
    public function getId_Usuario()
    {
      return $this->Id_Usuario;
    }
    
	public function getId_Item()
    {
      return $this->Id_Item;
    }
    
    public function getItem_Log()
    {
      return $this->Item_Log;
    }

	public function getAccion_Log()
    {
      return $this->Accion_Log;
    }
	
	public function getCantidad()
    {
      return $this->Cantidad;
    }
	
	public function getFecha_Ini()
    {
      return $this->Fecha_Ini;
    }
	
	public function getFecha_Fin()
    {
      return $this->Fecha_Fin;
    }
    
	public function getTexto()
    {
      return $this->Texto;
    }
        
    
    public function altaLog_Musica($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->altaLog_Musica($this, $conex);   
    }
	
    public function consultaLog_Musica($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->consultaLog_Musica($this, $conex);   
    }
	
    public function Log_MusicaCancion($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->Log_MusicaCancion($this, $conex);   
    }
	
    public function Log_MusicaInterprete($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->Log_MusicaInterprete($this, $conex);   
    }

    public function Log_MusicaAlbum($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->Log_MusicaAlbum($this, $conex);   
    }
	
    public function Log_MusicaPlaylist($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->Log_MusicaPlaylist($this, $conex);   
    }
	
    public function LogBusquedaCancion($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogBusquedaCancion($this, $conex);   
    }
	
    public function LogReproduceCancion($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogReproduceCancion($this, $conex);   
    }
	
    public function LogBusquedaPlaylist($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogBusquedaPlaylist($this, $conex);   
    }
	
    public function LogReproducePlaylist($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogReproducePlaylist($this, $conex);   
    }
	
    public function LogBusquedaAlbum($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogBusquedaAlbum($this, $conex);   
    }
	
    public function LogReproduceAlbum($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogReproduceAlbum($this, $conex);   
    }
	
    public function LogBusquedaInterprete($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogBusquedaInterprete($this, $conex);   
    }
	
    public function LogReproduceInterprete($conex)
    {
        $pu= new ExistenciaLog_Musica;
		return $pu->LogReproduceInterprete($this, $conex);   
    }
	
}
?>