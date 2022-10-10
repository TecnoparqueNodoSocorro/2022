<?php
require_once "../../controllers/cosecha_controller.php";
require_once "../../models/cosecha_model.php";


//CREAR COSECHA AJAX
class CosechaAjax
{
    static public function PostCosecha($data)
    {
        $datoscosecha = ControladorCosecha::ctrPostCosecha($data);
        $respuesta = array($datoscosecha);
        echo json_encode($respuesta);
    }

    /* static public function ReporteCosechaPagos($data)
    {
        $datos = ControladorCosecha::ctrReporteGeneralCosecha($data);
        $respuesta = array($datos);
        echo json_encode($respuesta);
        echo json_encode($datos);
    } */
}

if (isset($_POST['cosecha'])) {
    $postCosecha = new CosechaAjax();
    $data = $_POST['cosecha'];
    $postCosecha->PostCosecha($data);
}


/* //REPORTE GENERAL 
if (isset($_POST['ReporteGeneralPagos'])) {
    $postCosecha = new CosechaAjax();
    $data = $_POST['ReporteGeneralPagos'];
    $postCosecha->ReporteCosechaPagos($data);
} */