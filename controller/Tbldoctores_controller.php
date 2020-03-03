<?php

	require_once('model/Tbldoctores_model.php');
	require_once('model/Tbltipodocumento_model.php');

	class Tbldoctores_controller
	{
		private $model_doctores;
		private $model_tipodocumento;

		public function __construct()
		{
			$this->model_doctores = new Tbldoctores_model();
			$this->model_tipodocumento = new Tbltipodocumento_model;
		}

		public function menuDoctores()
		{
			$consultaDoctores = $this->model_doctores->consultarDoctores();
			$consultarTipoDocumento = $this->model_tipodocumento->consultarTipoDocumento();
       		require_once 'view/menuDoctores.php';
		}

		public function insertarDoctores()
    	{
	        $dato['nombre'] = $_POST["txtnombre"];
	        $dato['tipodoc'] = $_POST["seltipodoc"];
	        $dato['numerodocumento'] = $_POST['txtnumerodocumento'];

	        $this->model_doctores->insertDoctores($dato);
	        $this->menuDoctores();
    	}

    	public function modificarDoctor()
    	{
	        $documento = $_REQUEST['documento'];

	        $consultarTipoDocumento = $this->model_tipodocumento->consultarTipoDocumento($documento);
	        $consultaDoctor = $this->model_doctores->consultarDoctorPorId($documento);

	        require_once ('view/tbldoctor_modificar.php');
    	}

    	public function guardarCambiosDoctor()
	    {
	        $dato['nombre'] = $_POST["txtnombre"];      
	        $dato['tipodoc'] = $_POST["seltipodoc"];
	        $dato['numerodocumento'] = $_POST['txtnumerodocumento'];

	        $this->model_doctores->actualizarDoctor($dato);
	        $this->menuDoctores();
	    }
	}

?>