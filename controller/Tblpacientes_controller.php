<?php 

require_once('model/Tblpacientes_model.php');
require_once('model/Tblgeneros_model.php');
require_once('model/Tbltipodocumento_model.php');


class Tblpacientes_controller{

    private $model_pacientes;

    public function __construct()
    {
        $this->model_pacientes = new Tblpacientes_model();
        $this->model_generos = new Tblgeneros_model();
        $this->model_tipodocumento = new Tbltipodocumento_model();
    }

    public function menuPacientes(){
        $consultaPacientes = $this->model_pacientes->consultarPacientes();
        require_once 'view/menuPacientes.php';
    }

    public function mostrarInserccion()
    {
        $consultarGeneros = $this->model_generos->consultarGeneros();
        $consultarTipoDocumento = $this->model_tipodocumento->consultarTipoDocumento();
        require_once('view/insertarPacientes.php');
    }

    public function insertarPacientes()
    {
        $dato['nombre'] = $_POST["txtnombre"];
        $dato['apellidos'] = $_POST["txtapellidos"];
        $dato['tipodoc'] = $_POST["seltipodoc"];
        $dato['numerodocumento'] = $_POST['txtnumerodocumento'];
        $dato['genero'] = $_POST['selgenero'];
        $dato['edad'] = $_POST['txtedad'];

        $this->model_pacientes->insertPacientes($dato);
        $this->mostrarInserccion();
    }

    public function modificarPaciente(){
        $documento = $_REQUEST['documento'];

        $consultarGeneros = $this->model_generos->consultarGeneros();
        $consultarTipoDocumento = $this->model_tipodocumento->consultarTipoDocumento($documento);
        $consultaPaciente = $this->model_pacientes->consultarPacientePorId($documento);

        require_once ('view/tblpaciente_modificar.php');
    }

    public function guardarCambiosPaciente()
    {
        $dato['nombre'] = $_POST["txtnombre"];
        $dato['apellidos'] = $_POST["txtapellidos"];
        $dato['tipodoc'] = $_POST["seltipodoc"];
        $dato['numerodocumento'] = $_POST['txtnumerodocumento'];
        $dato['genero'] = $_POST['selgenero'];
        $dato['edad'] = $_POST['txtedad'];

        $this->model_pacientes->actualizarPaciente($dato);
        $this->menuPacientes();
    }

}

?>