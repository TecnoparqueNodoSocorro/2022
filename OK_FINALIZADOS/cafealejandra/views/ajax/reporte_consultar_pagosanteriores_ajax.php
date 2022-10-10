<?php
require_once "../../controllers/reporte_controller.php";
require_once "../../models/reporte_model.php";



//REPORTE DE KILOS RECOLECTADOR
class reporteAjax
{
   
    static public function reporteAvanzadoPagos($dato)
    {
        $usuario = ControladorReporte::ctrReporteRecolectorPagos($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
     /*    return $usuario; */
    }
}

if (isset($_POST['reporteAvanzadoPagos'])) {
    $reporteA = new reporteAjax();
    $dato = $_POST['reporteAvanzadoPagos'];
    $reporteA->reporteAvanzadoPagos($dato);
} else {
    return ("Error");
}
