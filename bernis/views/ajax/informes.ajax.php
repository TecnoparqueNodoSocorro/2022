<?php
require_once('../../controllers/categoria_controller.php');
require_once('../../models/categoria_modelo.php');
require_once('../../controllers/informes_controller.php');
require_once('../../models/informes_modelo.php');

class informesAjax
{
    public function
    InformeConCateg($finicial, $ffinal, $categoria)
    {
        if ($categoria = "todas") {
            //informe con todass las categorias
            $datosconsulta = InformesController::ctrdatosconsultaAll($finicial, $ffinal);
        } else {
            //informe con categoria seleccionada
            $datosconsulta = InformesController::ctrdatosconsultaCat($finicial, $ffinal, $categoria);
        }
    }
}


if (isset($_POST['datos'])) {
    $ajax = new informesAjax();
    $datosConsulta = ($_POST['datos']);
    $finicial = $datosconsulta . $finicio;
    $ffinal = $datosConsulta . $ffinal;
    $categoria = $datosConsulta . $categoria;
    $ajax->InformeConCateg($ffinal, $ffinal, $categoria);
}
