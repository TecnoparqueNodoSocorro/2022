<?php
require_once "../../controllers/pagos_controller.php";
require_once "../../models/pagos_model.php";


//REPORTE DE pagos POR COSECHA
class ReportePagosAjax
{

    static public function ReportePagos($data)
    {
        $reportePagos = ControladorPagos::ctrReportePagos($data);
        $respues = json_encode($reportePagos);
        echo $respues;
    }
}

if (isset($_POST['ObjreportePago'])) {
    $reporte = new ReportePagosAjax();
    $data = $_POST['ObjreportePago'];
    $reporte->ReportePagos($data);
} else {
    return ("Error");
}
