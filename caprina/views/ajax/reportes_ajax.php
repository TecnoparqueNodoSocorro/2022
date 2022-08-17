<?php
require_once "../../controllers/reportes_controller.php";
require_once "../../models/reportes_model.php";

//REPORTES ENFERMEDADES
class ReportesAjax
{
    public $controlador;




    static public function reporteControles($data)
    {

        if ($data["enfermedad"] == 'enfermedad_respiratoria') {
            $reporte = ControladorReportes::ctrReporteControlesER($data);
            $respuesta = json_encode($reporte);
            echo ($respuesta);
        }
        if ($data["enfermedad"] == 'enfermedad_gastrointestinal') {
            $reporte = ControladorReportes::ctrReporteControlesEG($data);
            $respuesta = json_encode($reporte);
            echo ($respuesta);
        }
        if ($data["enfermedad"] == 'enfermedad_mordedura') {
            $reporte = ControladorReportes::ctrReporteControlesEM($data);
            $respuesta = json_encode($reporte);
            echo ($respuesta);
        }
        if ($data["enfermedad"] == 'todas') {
            $reporte = ControladorReportes::ctrReporteControlesT($data);
            $respuesta = json_encode($reporte);
            echo ($respuesta);
        }
    }

    static public function reporteTratamientos($data)
    {
        $reporteTratamiento = ControladorReportes::ctrReporteTratamientos($data);
        $rta = json_encode($reporteTratamiento);
        echo ($rta);
    }
    static public function generarGrafico($data)
    {
        $graficoProduccion = ControladorReportes::ctrReporteGrafico($data);
        $rta = json_encode($graficoProduccion);
        echo ($rta);
    }
}

if (isset($_POST['fechas_reporte'])) {
    $Reporte = new ReportesAjax();
    $report = $_POST['fechas_reporte'];
    $Reporte->reporteControles($report);
} 
if (isset($_POST['reporte_tratamientos'])) {
    $tratamiento = new ReportesAjax();
    $data = $_POST['reporte_tratamientos'];
    $tratamiento->reporteTratamientos($data);
} 
if (isset($_POST['grafico'])) {
    $grafico = new ReportesAjax();
    $data = $_POST['grafico'];
    $grafico->generarGrafico($data);
} 