<?php
require_once('../../controllers/categoria_controller.php');
require_once('../../models/categoria_modelo.php');
require_once('../../controllers/informes_controller.php');
require_once('../../models/informes_modelo.php');

class informesAjax
{
    public function
    InformeConCateg($id_empresa, $finicial, $ffinal, $categoria)
    {
        if ($categoria = "todas") {
            //informe con todass las categorias
            $datosconsulta = InformesController::ctrdatosconsultaAll($id_empresa, $finicial, $ffinal);
        } else {
            //informe con categoria seleccionada
            $datosconsulta = InformesController::ctrdatosconsultaCat($id_empresa, $finicial, $ffinal, $categoria);
        }
    }
}


if (isset($_POST['datos'])) {
    $ajax = new informesAjax();
    $datosConsulta = ($_POST['datos']);
    $finicial = $datosconsulta . $finicio;
    $ffinal = $datosConsulta . $ffinal;
    $categoria = $datosConsulta . $categoria;
    $id_empresa =$datosConsulta.$id_empresa; 
    $ajax->InformeConCateg($id_empresa, $ffinal, $ffinal, $categoria);
}
