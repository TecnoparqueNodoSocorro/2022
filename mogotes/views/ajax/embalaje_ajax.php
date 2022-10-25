<?php
require_once "../../controllers/embalaje_controller.php";
require_once "../../models/embalaje_model.php";


class EmbalajeAjax
{
    public $controlador;

    //traer empaques dependiendo del producto
    static public function GetEmpaquesByProductos($data)
    {
        $datos = ControladorEmbalaje::ctrGetEmpaquesByProductos($data);
        $rta = json_encode($datos);
        echo($rta);
    }
}


//traer empaques dependiendo del producto
if (isset($_POST['producto'])) {
    $postData = new EmbalajeAjax();
    $data = $_POST['producto'];
    $postData->GetEmpaquesByProductos($data);
}
