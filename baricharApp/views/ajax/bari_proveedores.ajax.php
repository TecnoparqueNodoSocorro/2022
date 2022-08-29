<?php
require_once('../../controllers/controller_proveedores.php');
require_once('../../models/model_proveedores.php');

class ProveedoresAjax
{
  
    //crear proveedor ----------------------------------------------------------
    public function CrearProveedor($data)
    {
        $NewProveedor = ControladorProveedor::CtrNewProveedor($data);
     
        echo $NewProveedor;
    }   


//seleccionar proveedor-------------------------------------------------------------
    public function SelecProveedor($data)
    {
        $SelectProveedor = ControladorProveedor::CtrSelectProveedor($data);
        $respuesta= array("data"=>$SelectProveedor);
        echo $respuesta;
    }   
}


























/* ********************************************************* */
/* ********************************************************* */
if (isset($_POST['datos_proveedor'])) {
    $ajaxproveedor = new ProveedoresAjax();
    $data = $_POST['datos_proveedor'];
    $ajaxproveedor->CrearProveedor($data);
}
