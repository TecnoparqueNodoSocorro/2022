<?php
require_once "../../controllers/reporte_controller.php";
require_once "../../models/reporte_model.php";


//REPORTE DE LOS ENCARGADOS
class reporteAjax
{
    static public function reporteAvanzadoEncargado($dato)
    {
        $usuario = ControladorReporte::ctrReporteEncargado($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['dataConsulta'])) {
    $reporteE = new reporteAjax();
    $dato = $_POST['dataConsulta'];
    $reporteE->reporteAvanzadoEncargado($dato);
} else {
    return ("Error");
}
