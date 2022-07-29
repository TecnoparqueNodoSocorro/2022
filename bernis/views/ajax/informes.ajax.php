<?php
require_once('../../controllers/categoria_controller.php');
require_once('../../models/categoria_modelo.php');
require_once('../../controllers/informes_controller.php');
require_once('../../models/informe_modelo.php');



class informesAjax
{

    static public function
    InformeConCateg($datosConsulta)
    {
        if ($datosConsulta["categoria"] == "todas") {
            $datosC = InformesController::ctrdatosconsultaAll($datosConsulta);
            $rta = json_encode($datosC);
            echo $rta;
        } else {
            $datosC = InformesController::ctrdatosconsultaCat($datosConsulta);
            $rta = json_encode($datosC);
            echo $rta;
        }
    }
}






/* -------------------------------------------------------------- */

if (isset($_POST['datosC'])) {
    $ajax = new informesAjax();
    $datosConsulta = $_POST['datosC'];
    $ajax->InformeConCateg($datosConsulta);
} else {
    return "error";
}
