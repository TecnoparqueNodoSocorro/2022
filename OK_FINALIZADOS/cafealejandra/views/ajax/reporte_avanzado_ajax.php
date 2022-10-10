<?php
require_once "../../controllers/reporte_controller.php";
require_once "../../models/reporte_model.php";



//REPORTE DE KILOS RECOLECTADOR
class reporteAjax
{
    static public function reporteAvanzado($dato)
    {
        $usuario = ControladorReporte::ctrReporte($dato);
       /*  return $usuario; */
        $respuesta = json_encode($usuario);
        echo ($respuesta);
    }
/*     static public function reporteAvanzadoPagos($dato)
    {
        $usuario = ControladorReporte::ctrReporteRecolectorPagos($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    } */
}

if (isset($_POST['reporteAvanzado'])) {
    $reporteA = new reporteAjax();
    $dato = $_POST['reporteAvanzado'];
    $reporteA->reporteAvanzado($dato);
} else {
    return ("Error");
}
