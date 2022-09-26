<?php
require_once('../../controllers/controller_productos.php');
require_once('../../models/model_productos.php');

class ProductosAjax
{
    //agregar producto

    public function PostProducto($data)
    {
        $NewProducto = ControladorProductos::CtrPostProducto($data);
        echo $NewProducto;
    }
        //------------------------------------------------------------
    //CAMBIAR ESTADO
    public function NewEstadoProd($data)
    {
        $NewEstado = ControladorProductos::CtrNewEstadoPro($data);
        echo $NewEstado;
    }
    //------------------------------------------------------------
    
    //ELIMINAR PRODUCTO
    public function DeleteProduct($data)
    {
        $rta = ControladorProductos::ctrDeleteProducto($data);
        echo $rta;
    }
    //------------------------------------------------------------ 
    //GET PRODUCTO
    public function GetProduct($data)
    {
        $rta = ControladorProductos::ctrGetProducto($data);
        $datos = json_encode($rta);
        print_r($datos);
        }
    //------------------------------------------------------------
    
    //EDITAR PAGINA
    public function EditProd($data)
    {
        $editProd = ControladorProductos::CtrEditProd($data);
        echo $editProd;
    }
    //------------------------------------------------------------

}
//agregar producto
if (isset($_POST['nuevoProducto'])) {
    $datos = new ProductosAjax();
    $data = $_POST['nuevoProducto'];
    $datos->PostProducto($data);
}
//CAMBIAR ESTADO
if (isset($_POST['CambioEstadoProd'])) {
    $Estado = new ProductosAjax();
    $data = $_POST['CambioEstadoProd'];
    $Estado->NewEstadoProd($data);
}
//ELIMINAR PRODUCTP 
if (isset($_POST['DataDeleteProd'])) {
    $dato = new ProductosAjax();
    $data = $_POST['DataDeleteProd'];
    $dato->DeleteProduct($data);
}
//TRAER PRODUCTO PARA VISUALIAR
if (isset($_POST['dataProduct'])) {
    $dato = new ProductosAjax();
    $data = $_POST['dataProduct'];
    $dato->GetProduct($data);
}

//EDITAR PAPRODUCTPGINA 
if (isset($_POST['editProduct'])) {
    $EditP = new ProductosAjax();
    $data = $_POST['editProduct'];
    $EditP->EditProd($data);
}

