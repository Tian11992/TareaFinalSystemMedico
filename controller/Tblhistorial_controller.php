<?php

	require_once('model/Tbldoctores_model.php');
	require_once('model/Tblpacientes_model.php');
	require_once('model/Tblhistorial_model.php');

	class Tblhistorial_controller
	{
		private $model_doctores;
		private $model_pacientes;
		private $model_historial;

		public function __construct()
		{
			$this->model_doctores = new Tbldoctores_model();
			$this->model_pacientes = new Tblpacientes_model();
			$this->model_historial = new Tblhistorial_model();
		}

		public function menuHistorial()
		{
			$consultaDoctores = $this->model_doctores->consultarDoctores(true);
			$consultarPacientes = $this->model_pacientes->consultarPacientes(true);
			$consultaHistorial = $this->model_historial->consultarHistorial();

       		require_once 'view/menuHistorial.php';
		}

		public function insertarHistoria()
    	{
	        $dato['paciente'] = $_POST["selpaciente"];
	        $dato['medico'] = $_POST["selmedico"];
	        $dato['observacion'] = $_POST['txtobservacion'];

	        $this->model_historial->insertarHistoria($dato);
	        $this->menuHistorial();
    	}

    	public function verHistorial()
    	{
    		$idhistoria = $_REQUEST['id'];

    		$consultaHistorial = $this->model_historial->consultarHistorialPaciente($idhistoria);

    		require_once('view/verHistorial.php');
    	}

    	public function eliminarHistorial()
    	{
    		$idhistoria = $_REQUEST['id'];

    		$this->model_historial->eliminarHistorial($idhistoria);

    		$this->menuHistorial();
    	}
	}

?>