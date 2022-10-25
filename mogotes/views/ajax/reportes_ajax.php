<?php
require_once "../../controllers/reportes_controller.php";
require_once "../../models/reportes_model.php";


class ReportesAjax
{
    public $controlador;

    //post reporte bocadillo
    static public function PostReporteBocadillo($data)
    {
        $datos = ControladorReportes::ctrPostReporteBocadillo($data);
        /*   $respuesta = ($datosusuario);
                echo json_encode($respuesta); */
        echo $datos;
    }
    //get info del lote de bocadillo por codigo
    static public function GetInfoByCodigo($data)
    {
        $datos = ControladorReportes::ctrGetInfoByCodigoo($data);
        $respuesta =  json_encode($datos);
        print_r($respuesta);
    }

    //get registro por id del registro de bocadillo
    static public function GetRegistroById($data)
    {
        $datos = ControladorReportes::ctrGetRegistroById($data);
        $respuesta =  json_encode($datos);
        echo ($respuesta);
    }




    //post reporte arequipe
    static public function PostReporteArequipe($data)
    {
        $datos = ControladorReportes::ctrPostReporteArequipe($data);
        echo $datos;
    }
    //get info del lote de arequipe por codigo
    static public function GetInfoByCodigoAre($data)
    {
        $datos = ControladorReportes::ctrGetInfoByCodigoAre($data);
        $respuesta =  json_encode($datos);
        print_r($respuesta);
    }

    //get registro por id del registro de arequipe
    static public function GetRegistroByIdAre($data)
    {
        $datos = ControladorReportes::ctrGetRegistroByIdAre($data);
        $respuesta =  json_encode($datos);
        print_r($respuesta);
    }



    //post reporte espejuelo
    static public function PostReporteEspejuelo($data)
    {
        $datos = ControladorReportes::ctrPostReporteEspejuelo($data);
        echo $datos;
    }

    //get info del lote de espejuelo por codigo
    static public function GetInfoByCodigoEsp($data)
    {
        $datos = ControladorReportes::ctrGetInfoByCodigoEsp($data);
        $respuesta =  json_encode($datos);
        print_r($respuesta);
    }

    //get registro por id del registro de espejuelo
    static public function GetRegistroByIdEsp($data)
    {
        $datos = ControladorReportes::ctrGetRegistroByIdEsp($data);
        $respuesta =  json_encode($datos);
        print_r($respuesta);
    }
}





//post reporte bocadillo
if (isset($_POST['reporteBocadillo'])) {
    $postData = new ReportesAjax();
    $data = $_POST['reporteBocadillo'];
    $postData->PostReporteBocadillo($data);
}
//get info del lote de bocadillo por codigo
if (isset($_POST['infoReporte'])) {
    $postData = new ReportesAjax();
    $data = $_POST['infoReporte'];
    $postData->GetInfoByCodigo($data);
}
//get registro por id del registro de bocadillo
if (isset($_POST['idregistro'])) {
    $postData = new ReportesAjax();
    $data = $_POST['idregistro'];
    $postData->GetRegistroById($data);
}




//post reporte espejuelo
if (isset($_POST['reporteEspejuelo'])) {
    $postData = new ReportesAjax();
    $data = $_POST['reporteEspejuelo'];
    $postData->PostReporteEspejuelo($data);
}
//get info del lote de espejuelo por codigo
if (isset($_POST['infoReporteEsp'])) {
    $postData = new ReportesAjax();
    $data = $_POST['infoReporteEsp'];
    $postData->GetInfoByCodigoEsp($data);
}


//get registro por id del registro de espejuelo
if (isset($_POST['idregistroEsp'])) {
    $postData = new ReportesAjax();
    $data = $_POST['idregistroEsp'];
    $postData->GetRegistroByIdEsp($data);
}




//post reporte arequipe
if (isset($_POST['reporteArequipe'])) {
    $postData = new ReportesAjax();
    $data = $_POST['reporteArequipe'];
    $postData->PostReporteArequipe($data);
}

//get info del lote de arequipe por codigo
if (isset($_POST['infoReporteAre'])) {
    $postData = new ReportesAjax();
    $data = $_POST['infoReporteAre'];
    $postData->GetInfoByCodigoAre($data);
}


//get registro por id del registro de espejuelo
if (isset($_POST['idregistroAre'])) {
    $postData = new ReportesAjax();
    $data = $_POST['idregistroAre'];
    $postData->GetRegistroByIdAre($data);
}
