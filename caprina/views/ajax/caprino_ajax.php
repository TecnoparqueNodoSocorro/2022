<?php
require_once('../../controllers/caprino_controller.php');
require_once('../../models/caprino_model.php');


class CaprinoAjax
{
    public $controlador;



    public function __construct()
    {
        /*   $this->controlador=new ControladorProductos(); */
    }
    static public function GetCaprino($data)
    {
        $datoscaprino = ControladorCaprino::ctrGetCaprino($data);
        $rta = json_encode($datoscaprino);
        print_r($rta);
    }
    public function PostCaprino($data)
    {

        $datoscaprino = ControladorCaprino::ctrPostCaprino($data);
        echo $datoscaprino;
            /*   $respuesta = array($datoscaprino);
        echo json_encode($respuesta) */;
    }

    static public function GetCaprinoInd($data)
    {
        $datoscaprino = ControladorCaprino::ctrGetCaprinoInd($data);
        $rta = json_encode($datoscaprino);
        print_r($rta);
    }

    public function postTratamiento($descripcion, $id_usuario, $fecha_inicio)
    {

        $RtaCabecera = ControladorCaprino::ctrPostTratamiento($descripcion, $id_usuario, $fecha_inicio);
        $response = array("idTratamiento" => $RtaCabecera);
        echo json_encode($response);
    }


    public function postCaprinosEnTratamiento($idtratamiento, $caprinos)
    {
        $RtaDetallefact = ControladorCaprino::ctrPostCaprinosTratamiento($idtratamiento, $caprinos);
        echo json_encode($RtaDetallefact);
    }
}

if (isset($_POST['nuevoCaprino'])) {
    $postCaprino = new CaprinoAjax();
    $data = $_POST['nuevoCaprino'];

    $postCaprino->PostCaprino($data);
}
if (isset($_POST['controlIndividual'])) {
    $data = $_POST['controlIndividual'];
    $ajax = new CaprinoAjax();
    $ajax->GetCaprino($data);
}
if (isset($_POST['codigo'])) {
    $data = $_POST['codigo'];
    $codigoC = new CaprinoAjax();
    $codigoC->GetCaprinoInd($data);
}

/* --------------------------cabecera---------------------------------- */
if (isset($_POST['datosTratamiento'])) {
    $ajaxCabecera = new CaprinoAjax();
    $data = $_POST['datosTratamiento'];
    $id_usuario = $data['id_usuario'];
    $descripcion = $data['descripcion'];
    $fecha_inicio = $data['fecha_inicio'];
    $ajaxCabecera->postTratamiento($id_usuario, $descripcion, $fecha_inicio);
}/*  else {
    return ("nada de dato cabecera!!!");
} */

/* ---------------------------------detalle------ */


if (isset($_POST['idtratatamiento']) && isset($_POST['caprinos'])) {

    $ajaxDetalle = new CaprinoAjax();
    $caprinos = JSON_decode($_POST['caprinos'], true);
    $idtratamiento = $_POST['idtratatamiento'];
    $ajaxDetalle->postCaprinosEnTratamiento($idtratamiento, $caprinos);
} /* else {
    return ("nada de dato detalle!!!");
} */
  

/* ------------------------------------------------ */
