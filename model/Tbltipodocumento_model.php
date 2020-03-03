<?php

	class Tbltipodocumento_model
	{
		private $bd;
    	private $tbltipodocumento;

    	public function __construct()
    	{
	        $this->bd = Conexion::getConexion();
	        $this->tbltipodocumento = array();
    	}

    	public function consultarTipoDocumento()
    	{
    		$consulta = $this->bd->query("SELECT * FROM tbltipodocumento");

	        while($fila=$consulta->fetch_assoc())
	        {
	            $this->tbltipodocumento[] = $fila;
	        }
	        return $this->tbltipodocumento;
    	}
	}

?>