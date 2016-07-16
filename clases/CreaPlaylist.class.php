<?php 

	require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaCreaPlaylist.class.php';

	class CreaPlaylist
	{
		private $Id_Crea_Playlist;
	    private $Id_Usuario;
		private $Id_Playlist;

	    function __construct($idc='',$idu='',$idp='')
	    {
			$this->Id_Crea_Playlist= $idc;
	        $this->Id_Usuario= $idu;
			$this->Id_Playlist= $idp;
	    }		

	    //Métodos set

	    public function setId_Crea_Playlist($idc)
	    {
	      $this->Id_Crea_Playlist= $idc;
	    }    
		
	    public function setId_Usuario($idu)
	    {
	      $this->Id_Usuario= $idu;
	    }
	    
	    public function setId_Playlist($idp)
	    {
	      $this->Id_Playlist= $idp;
	    }

	     //Métodos get

	    public function getId_Crea_Playlist()
	    {
	      return $this->Id_Crea_Playlist;
	    }	
	    
	    public function getId_Usuario()
	    {
	      return $this->Id_Usuario;
	    }
	    
	    public function getId_Playlist()
	    {
	      return $this->Id_Playlist;
	    }

	    //Otros Métodos

	    public function consultaplayusr($conex)
    	{
        $pu=new ExistenciaCreaPlaylist;
        return ($pu->consultaplayusr($this, $conex));
    	}   
}
?>