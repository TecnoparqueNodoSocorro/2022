<?php
require_once "../../controllers/ubicaciones_controller.php";
require_once "../../models/ubicaciones_model.php";


class UbicacionesAjax
{
    public $controlador;

    //crear ubicacion
    static public function PostUbicacion($data)
    {
        $datos = ControladorUbicaciones::CtrPostCliente($data);
        echo ($datos);
    }
    //traer ubicaciones
    static public function GetUbicacionesByCliente($data)
    {
        $datos = ControladorUbicaciones::CtrGetUbicacionesByCliente($data);
        $rta = json_encode($datos);
        print_r($rta);
    }
    //editar ubicacion
    static public function EditUbicacion($data)
    {
        $datos = ControladorUbicaciones::CtrEditUbicacion($data);
        echo ($datos);
    }
}

//registrar ubicacion
if (isset($_POST['ubic'])) {
    $postData = new UbicacionesAjax();
    $data = $_POST['ubic'];
    $postData->PostUbicacion($data);
}
//traer ubicaciones
if (isset($_POST['id_c'])) {
    $postData = new UbicacionesAjax();
    $data = $_POST['id_c'];

    $postData->GetUbicacionesByCliente($data);
}
//editar ubicacion 
if (isset($_POST['id']) && isset($_POST['nombre'])) {
    $postData = new UbicacionesAjax();
    $data = $_POST['id'];
    $data = array(
        "id" => $_POST["id"],
        "nombre" => $_POST["nombre"],
    );
    $postData->EditUbicacion($data);
}
