<?php 

	class Tblgeneros_model
	{
		private $bd;
    	private $tblgeneros;

    	public function __construct()
    	{
	        $this->bd = Conexion::getConexion();
	        $this->tblgeneros = array();
    	}

    	public function consultarGeneros()
    	{
    		$consulta = $this->bd->query("SELECT * FROM tblgenero");

	        while($fila=$consulta->fetch_assoc())
	        {
	            $this->tblgeneros[] = $fila;
	        }
	        return $this->tblgeneros;
    	}
	}

?>