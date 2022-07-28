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

        /*         $datosConsulta = file_get_contents('$datosConsulta');
        $decode =  json_decode($datosConsulta, true);  */


        if ($datosConsulta["categoria"] == "todas") {
            /*    $id_empresa = $datosConsulta["id_empresa"];
            $finicial = $datosConsulta["finicio"];
            $ffinal = $datosConsulta["ffinal"]; */
            $datosC = InformesController::ctrdatosconsultaAll($datosConsulta);
            $rta = json_encode($datosC);
            echo $rta;
        } else {
            /*    $id_empresa = $datosConsulta["id_empresa"];
            $finicial = $datosConsulta["finicio"];
            $ffinal = $datosConsulta["ffinal"];
            $categoria = $datosConsulta["categoria"]; */
            $datosC = InformesController::ctrdatosconsultaCat($datosConsulta);
            $rta = json_encode($datosC);
            echo $rta;
        }

        /*      if($datosConsulta["categoria"] = "todas"){

            echo $datosConsulta["categoria"];
            }else{
                echo "error";
            }
    */
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
