<?php
require_once "../../controllers/informeTablas_controller.php";
require_once "../../models/informeTablas_model.php";


class InformeTablasAjax
{
    public $controlador;

    //registrar proceso de escaldado
    static public function InformeGeneralTablas($data)
    {
        $dataPost = ControladorReporteTablas::ctrInformeGeneralTablas($data);
        $respuesta = ($dataPost);
        echo json_encode($respuesta);
    }
}


//registrar proceso de escaldado
if (isset($_POST['fechas_reporte'])) {
    $postData = new InformeTablasAjax();
    $data = $_POST['fechas_reporte'];
    $postData->InformeGeneralTablas($data);
}
