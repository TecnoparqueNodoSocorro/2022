<?php
require_once "../../controllers/variables_controller.php";
require_once "../../models/variables_model.php";


class VariablesAjax
{
    public $controlador;
    //agregar variables a un lote
    static public function PostVariable($data)
    {
        $datos = ControladorVariables::ctrPostVariable($data);
        /*   $respuesta = ($datos);
        echo json_encode($respuesta); */
        echo $datos;
    }
    //get datos de lotes que esten en f1 para vista de administrador
    static public function GetDatosFer1($data)
    {
        $datos = ControladorVariables::ctrGetDatosFer1($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
        //  return $datos;
    }
    //se reciben los datos para la grafica
    static public function DatosGrafica($data)
    {
        $datos = ControladorVariables::ctrDatosGrafica($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
        //  return $datos;
    }
}
//CREAR LOTE
if (isset($_POST['variables'])) {
    $postData = new VariablesAjax();
    $data = $_POST['variables'];
    $postData->PostVariable($data);
}

//get datos de lotes que esten en f1 para vista de administrador
if (isset($_POST['GetRegistrosPorFerm'])) {
    $postData = new VariablesAjax();
    $data = $_POST['GetRegistrosPorFerm'];
    $postData->GetDatosFer1($data);
}

//se reciben los datos para la grafica
if (isset($_POST['DatosGrafica'])) {
    $postData = new VariablesAjax();
    $data = $_POST['DatosGrafica'];
    $postData->DatosGrafica($data);
}
