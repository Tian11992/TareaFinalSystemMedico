<?php 

require_once('conexion/Conexion.php');
require_once('controller/Index_controller.php');
require_once('controller/Tblpacientes_controller.php');
require_once('controller/Tbldoctores_controller.php');
require_once('controller/Tblhistorial_controller.php');


$controller = new Index_controller();
$controller_pacientes = new Tblpacientes_controller();
$controller_doctores = new Tbldoctores_controller();
$controller_historial = new Tblhistorial_controller();

if(!empty($_REQUEST['accion']))
{

    $metodo = $_REQUEST['accion'];

    switch($metodo)
    {

        case method_exists($controller, $metodo):
            $controller->index();
        break;
        case method_exists($controller_pacientes, $metodo):
            $controller_pacientes->$metodo();
        break;

        case method_exists($controller_doctores, $metodo):
            $controller_doctores->$metodo();
        break;

        case method_exists($controller_historial, $metodo):
            $controller_historial->$metodo();
        break;
        
        default:
        $controller->index();

    }

}
else
{
    $controller->index();
}

?>
