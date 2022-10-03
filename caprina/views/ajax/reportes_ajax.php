<?php
require_once "../../controllers/reportes_controller.php";
require_once "../../models/reportes_model.php";

//REPORTES ENFERMEDADES
class ReportesAjax
{
    public $controlador;



    //REPORTE DE CONTROLES REGISTRADOS
    static public function reporteControles($data)
    {
        //EN EL JSON SE ENVÍA EL CARGO, 1, ES ADMINISTRADOR EN LUGAR DE SER 2 SE ENVÍA A OTRO CONTROLADOR
        if ($data["cargo"] == "1") {

            //sE SOLICITA LA INFORMACIÓN UNICAMENTE DE ENFERMEDAD RESPIRATORIA
           
            if ($data["enfermedad"] == 'enfermedad_respiratoria') {
                $reporte = ControladorReportes::ctrReporteControlesER($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }

            //sE SOLICITA LA INFORMACIÓN UNICAMENTE DE ENFERMEDAD GASTROINTESTINAL
            if ($data["enfermedad"] == 'enfermedad_gastrointestinal') {
                $reporte = ControladorReportes::ctrReporteControlesEG($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }

            //sE SOLICITA LA INFORMACIÓN UNICAMENTE DE ENFERMEDAD POR MORDEDURA
            if ($data["enfermedad"] == 'enfermedad_mordedura') {
                $reporte = ControladorReportes::ctrReporteControlesEM($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }
            //SE SOLICITA INFORMACION DE TODAS LAS ENFERMEDADES
            if ($data["enfermedad"] == 'todas') {
                $reporte = ControladorReportes::ctrReporteControlesT($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }
        }
        //SI EL CARGO ES 2 TAMBIEN SE ENVÍA EL ID DEL USUARIO PARA LISTAR UNICAMENTE LOS REGISTROS QUE TIENEN ESE ID DE USUARIO         
        else if ($data["cargo"] == "2") {
            //SE SOLICITA INFORMACION POR USUARIO POR ENFERMEDAD RESPIRATORIA
            if ($data["enfermedad"] == 'enfermedad_respiratoria') {
                $reporte = ControladorReportes::ctrReporteControlesERPorUsuario($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }
            //SE SOLICITA INFORMACION POR USUARIO POR ENFERMEDAD GASTROINTESTINAL
            if ($data["enfermedad"] == 'enfermedad_gastrointestinal') {
                $reporte = ControladorReportes::ctrReporteControlesEGPorUsuario($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }
            //SE SOLICITA INFORMACION POR USUARIO POR ENFERMEDAD POR MORDEDURA
            if ($data["enfermedad"] == 'enfermedad_mordedura') {
                $reporte = ControladorReportes::ctrReporteControlesEMPorUsuario($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }
            //SE SOLICITA INFORMACION POR USUARIO DE TODAS LAS ENFERMEDADES
            if ($data["enfermedad"] == 'todas') {
                $reporte = ControladorReportes::ctrReporteControlesTPorUsuario($data);
                $respuesta = json_encode($reporte);
                echo ($respuesta);
            }
        }
    }
    //REPORTE DE TRATAMIENTOS, EN EL CONTROLADOR SE DIRECCIONA A SI ES UNA CONSULTA DE ADMINISTRADOR O CAPRINOCULTOR
    static public function reporteTratamientos($data)
    {
        $reporteTratamiento = ControladorReportes::ctrReporteTratamientos($data);
        $rta = json_encode($reporteTratamiento);
        echo ($rta);
    }

    //SE ENVIAN LAS FECHAS PARA GENERAR GRÁFICO
    static public function generarGrafico($data)
    {
        $graficoProduccion = ControladorReportes::ctrReporteGrafico($data);
        $rta = json_encode($graficoProduccion);
        echo ($rta);
    }
}

//REPORTE DE CONTROLES REGISTRADOS
if (isset($_POST['fechas_reporte'])) {
    $Reporte = new ReportesAjax();
    $report = $_POST['fechas_reporte'];
    $Reporte->reporteControles($report);
}
//REPORTE DE LOS TRATAMIENTOS REGISTRADOS
if (isset($_POST['reporte_tratamientos'])) {
    $tratamiento = new ReportesAjax();
    $data = $_POST['reporte_tratamientos'];
    $tratamiento->reporteTratamientos($data);
}

//SE ENVIAN LAS FECHAS PARA GENERAR GRÁFICO
if (isset($_POST['grafico'])) {
    $grafico = new ReportesAjax();
    $data = $_POST['grafico'];
    $grafico->generarGrafico($data);
}
