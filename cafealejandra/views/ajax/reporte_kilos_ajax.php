<?php
require_once "../../controllers/cosecha_controller.php";
require_once "../../models/cosecha_model.php";


//REPORTE DE KILOS POR COSECHA
class ReporteAjax
{

    static public function ReporteKilos($data)
    {
        $reporteKilos = ControladorCosecha::ctrReporteCosecha($data);
        $respues = json_encode($reporteKilos);
        echo $respues;
    }
}

if (isset($_POST['reporte'])) {
    $reporte = new ReporteAjax();
    $data = $_POST['reporte'];
    $reporte->ReporteKilos($data);
} else {
    return ("Error");
}
