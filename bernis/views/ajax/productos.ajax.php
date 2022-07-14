<?php
require_once('../../controllers/productos_controller.php');
require_once('../../models/productos.modelo.php');
require_once('../../controllers/categoria_controller.php');
require_once('../../models/categoria_modelo.php');


class ProductoAjax
{
    public $controlador;


    public function __construct()
    {
        /*   $this->controlador=new ControladorProductos(); */
    }

    static public function GetProductos($datos)
    {
        $datosproducto = ControladorProductos::ctrdatosProducto($datos);
        $respuesta = array("data" => $datosproducto);
        echo json_encode($respuesta);
    }


    public function UpdateProductos($upd_idproducto, $upd_nombre, $upd_descripcion, $upd_costo, $upd_valor, $upd_clasificacion)
    {
        $productoactualizado = ControladorProductos::ctractualizarProducto($upd_idproducto, $upd_nombre, $upd_descripcion, $upd_costo, $upd_valor, $upd_clasificacion);
        $respuesta = array("data" => $productoactualizado);
        echo json_encode($respuesta);
    }

    public function DeleteProducto($delprod)
    {
        $prodeliminado = ControladorProductos::crtelimnarproducto($delprod);
        $respuesta = array("data" => $prodeliminado);
        echo json_encode($respuesta);
    }

    public function Deletecategoria($delprod)
    {
        $cateliminada = ControladorCategorias::crtEliminaCategoria($delprod);
        $respuesta = array("data" => $cateliminada);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['idp'])) {
    $ajax = new ProductoAjax();
    $ajax->GetProductos($_POST['idp']);
}


if (isset($_POST['prodId']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['costo']) && isset($_POST['valor']) && isset($_POST['clasificacion'])) {
    $ajax = new ProductoAjax();
    $upd_idproducto = $_POST['prodId'];
    $upd_nombre = $_POST['nombre'];
    $upd_descripcion = $_POST['descripcion'];
    $upd_costo = $_POST['costo'];
    $upd_valor = $_POST['valor'];
    $upd_clasificacion = $_POST['clasificacion'];
    $ajax->UpdateProductos($upd_idproducto, $upd_nombre, $upd_descripcion, $upd_costo, $upd_valor, $upd_clasificacion);
}


if (isset($_POST['idpdelete'])) {
    $delprod = $_POST['idpdelete'];
    $ajax = new ProductoAjax();
    $ajax->DeleteProducto($delprod);
}



if (isset($_POST['idpcategoria'])) {
    $delprod = $_POST['idpcategoria'];
    $ajax = new ProductoAjax();
    $ajax->Deletecategoria($delprod);
}
