<?php
require_once "../../controllers/controller_articulos.php";
require_once "../../models/model_articulos.php";



class ArticulosAjax
{
    public $controlador;


    static public function PostArticulo($data)
    {
        $datos = ControladorArticulos::ctrPostArticulos($data);
        echo $datos;
    }
    static public function CambiarEstado($data)
    {
        $datos = ControladorArticulos::ctrCambiarEstado($data);
        echo $datos;
    }
    static public function DeleteArticulo($data)
    {
        $datos = ControladorArticulos::ctrDeleteArticulo($data);
        echo $datos;
    }
    static public function GetArticulo($data)
    {
        $datos = ControladorArticulos::ctrGetArticulo($data);
        $rta = json_encode($datos);
        print_r($rta);
    }
    static public function EditarArticulo($data)
    {
        $datos = ControladorArticulos::ctrEditarArticulo($data);
        echo $datos;
    }
}

if (isset($_POST['new_articulo'])) {
    $art = new ArticulosAjax();
    $data = $_POST['new_articulo'];
    $art->PostArticulo($data);
}


if (isset($_POST['new_estado'])) {
    $art = new ArticulosAjax();
    $data = $_POST['new_estado'];
    $art->CambiarEstado($data);
}

if (isset($_POST['delete_articulo'])) {
    $art = new ArticulosAjax();
    $data = $_POST['delete_articulo'];
    $art->DeleteArticulo($data);
}
if (isset($_POST['get_info'])) {
    $art = new ArticulosAjax();
    $data = $_POST['get_info'];
    $art->GetArticulo($data);
}
if (isset($_POST['edit_articulo'])) {
    $art = new ArticulosAjax();
    $data = $_POST['edit_articulo'];
    $art->EditarArticulo($data);
}