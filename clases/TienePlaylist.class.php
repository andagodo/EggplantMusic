<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaTienePlaylist.class.php';

class TienePlaylist
{
  private $Id_Playlist;
	private $Id_Contiene_Al;

    function __construct($idpl='',$idca='')
    {
    $this->Id_Playlist= $idpl;  
		$this->Id_Contiene_Al= $idca;
    }
    

    public function getId_Playlist()
    {
      return $this->Id_Playlist;
    } 

    public function getId_Contiene_Al()
    {
      return $this->Id_Contiene_Al;
    }	
	    
	
    public function altaTienePlaylist($conex)
    {
        $pu=new ExistenciaTienePlaylist;
        return ($pu->altaTienePlaylist($this, $conex));
    }   

	public function consultaPCCancion($conex)
	{
      $pu= new ExistenciaTienePlaylist;
      return $pu->consultaPCCancion($this, $conex);
    }

	public function consultaCancionPL($conex)
	{
      $pu= new ExistenciaTienePlaylist;
      return $pu->consultaCancionPL($this, $conex);
    }	


	public function consultaIDContieneAl($conex)
	{
      $pu= new ExistenciaTienePlaylist;
      return $pu->consultaIDContieneAl($this, $conex);
    }
	
	public function EliminaCancionPL($conex)
	{
      $pu= new ExistenciaTienePlaylist;
      return $pu->EliminaCancionPL($this, $conex);
    }
	
	public function ConsultacancionyPL($conex)
	{
      $pu= new ExistenciaTienePlaylist;
      return $pu->ConsultacancionyPL($this, $conex);
    }
  public function EliminaplaylistInTP($conex)
  {
      $pu= new ExistenciaTienePlaylist;
      return $pu->EliminaplaylistInTP($this, $conex);
    }


}
?>