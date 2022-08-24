<?php
require_once('../../controllers/controller_proveedores.php');
require_once('../../models/model_proveedores.php');

class ProveedoresAjax
{
    public $controlador;
    //crear proveedor 

    public function CrearProveedor($data)
    {
        $NewProveedor = ControladorProveedor::CtrCrearProveedor($data);
        $respuesta= array("data"=>$NewProveedor);
        echo json_encode($respuesta);
    }
}

//editar proveedor

/* ********************************************************* */
if (isset($_POST['datos_proveedor'])) {
    $ajaxproveedor = new ProveedoresAjax();
    $data = $_POST['datos_proveedor'];
    $ajaxproveedor->CrearProveedor($data);
}
