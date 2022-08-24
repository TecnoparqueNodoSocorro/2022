<?php
require_once('../../controllers/caprino_controller.php');
require_once('../../models/caprino_model.php');


class CaprinoAjax
{
    public $controlador;



    public function __construct()
    {
    }
    //TRAER TODOS LOS CAPRINOS
    static public function GetCaprino($data)
    {
        $datoscaprino = ControladorCaprino::ctrGetCaprino($data);
        $rta = json_encode($datoscaprino);
        print_r($rta);
    }

    //POSTEAR CAPRINO
    public function PostCaprino($data)
    {
        $datoscaprino = ControladorCaprino::ctrPostCaprino($data);
        echo $datoscaprino;
            /*   $respuesta = array($datoscaprino);
        echo json_encode($respuesta) */;
    }

    //TRAER CAPRINO INDIVIDUAL PARA EL REGISTRO DE TRATAMIENTOS 
    static public function GetCaprinoInd($data)
    {
        $datoscaprino = ControladorCaprino::ctrGetCaprinoInd($data);
        $rta = json_encode($datoscaprino);
        print_r($rta);
    }

    //POST TRATAMIENTO, SE REGISTRA LA DESCRIPCION Y LA FECHA DEL TRATAMIENTO
    public function postTratamiento($descripcion, $id_usuario, $fecha_inicio)
    {
        $RtaCabecera = ControladorCaprino::ctrPostTratamiento($descripcion, $id_usuario, $fecha_inicio);
        $response = array("idTratamiento" => $RtaCabecera);
        echo json_encode($response);
    }


    //SE REGISTRA LOS CAPRINOS AL TRATAMIENTO CREADO ANTERIORMENTE
    public function postCaprinosEnTratamiento($idtratamiento, $caprinos)
    {
        $RtaDetallefact = ControladorCaprino::ctrPostCaprinosTratamiento($idtratamiento, $caprinos);
        echo json_encode($RtaDetallefact);
    }

    //TRAER LOS CAPRINOS PERTENECIENTES A UN USUARIO EN ESPECIFICO
    public function GetCaprinoUsuario($data)
    {
        $respuesta = ControladorCaprino::ctrGetCaprinoUsuario($data);
        echo json_encode($respuesta);
    }
}

//POST CARPINO
if (isset($_POST['nuevoCaprino'])) {
    $postCaprino = new CaprinoAjax();
    $data = $_POST['nuevoCaprino'];

    $postCaprino->PostCaprino($data);
}

//TRAER CAPRINOS
if (isset($_POST['controlIndividual'])) {
    $data = $_POST['controlIndividual'];
    $ajax = new CaprinoAjax();
    $ajax->GetCaprino($data);
}

//TRAER CAPRINO INDIVIDUAL POR EL CODIGO
if (isset($_POST['codigo'])) {
    $data = $_POST['codigo'];
    $codigoC = new CaprinoAjax();
    $codigoC->GetCaprinoInd($data);
}

/* --------------------POST DE LA DESCRIPCION Y LA FECHA DE TRATAMIENTOS---------------------------------- */
if (isset($_POST['datosTratamiento'])) {
    $ajaxCabecera = new CaprinoAjax();
    $data = $_POST['datosTratamiento'];
    $id_usuario = $data['id_usuario'];
    $descripcion = $data['descripcion'];
    $fecha_inicio = $data['fecha_inicio'];
    $ajaxCabecera->postTratamiento($id_usuario, $descripcion, $fecha_inicio);
}


/* ---SE REGISTRA LOS CAPRINOS AL ID DEL TRATAMIENTO REGISTRADO EN EL TRATAMIENTO INMEDIATAMENTE ANTERIOR------ */
if (isset($_POST['idtratatamiento']) && isset($_POST['caprinos'])) {

    $ajaxDetalle = new CaprinoAjax();
    $caprinos = JSON_decode($_POST['caprinos'], true);
    $idtratamiento = $_POST['idtratatamiento'];
    $ajaxDetalle->postCaprinosEnTratamiento($idtratamiento, $caprinos);
}

/* ------------------------------------------------ */

//TRAER CAPRINOS POR USUARIO
if (isset($_POST['id_usuario'])) {
    $data = $_POST['id_usuario'];
    $codigoC = new CaprinoAjax();
    $codigoC->GetCaprinoUsuario($data);
}
