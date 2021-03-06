<?php 

	require_once $_SERVER['DOCUMENT_ROOT'] . '/persistencia/ExistenciaCreaPlaylist.class.php';

	class CreaPlaylist
	{
		private $Id_Crea_Playlist;
	    private $Id_Usuario;
		private $Id_Playlist;
		private $Activo;
  		private $Fech_Activo;
  		private $Usuario;

	    function __construct($idc='',$idu='',$idp='',$act='',$fecha='',$usr='')
	    {
			$this->Id_Crea_Playlist= $idc;
	        $this->Id_Usuario= $idu;
			$this->Id_Playlist= $idp;
			$this->Activo= $act;
    		$this->Fech_Activo= $fecha;
    		$this->Usuario= $usr;
	    }		

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

	    public function getActivo()
	    {
	      return $this->Activo;
	    }

	    public function getFech_Activo()
	    {
	      return $this->Fech_Activo;
	    }
		
	    public function getUsuario()
	    {
	      return $this->Usuario;
	    }
	    
	    public function ConsultaIdPlaylistSist($conex)
    	{
        $pu=new ExistenciaCreaPlaylist;
        return ($pu->ConsultaIdPlaylistSist($this, $conex));
    	}   		

	    public function consultaplayusr($conex)
    	{
        $pu=new ExistenciaCreaPlaylist;
        return ($pu->consultaplayusr($this, $conex));
    	}   

    	public function altaCreaPlaylist($conex)
    	{
        $pu=new ExistenciaCreaPlaylist;
        return ($pu->altaCreaPlaylist($this, $conex));
    	}    
    	public function EliminaplaylistInCP($conex)
    	{
        $pu=new ExistenciaCreaPlaylist;
        return ($pu->EliminaplaylistInCP($this, $conex));
    	}    
}
?>