<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

//CREAR USUARIO NUEVO
class UsuarioAjax
{
    static public function usuarioCosecha($data)
    {
        $usuario = ControladorUsuario::ctrAgregarUsuario($data);
        $respuesta = array($usuario);
        echo json_encode($respuesta);
    }
    static public function GetReporteGeneral($data)
    {
        $datos = ControladorUsuario::ctrReporteGeneral($data);
        /* $respuesta = array($datos);
        echo json_encode($respuesta); */
        echo json_encode($datos);
    }
    static public function CambioClave ($data)
    {
        $datos = ControladorUsuario::ctrCambioClave($data);
        /* $respuesta = array($datos);
        echo json_encode($respuesta); */
        echo json_encode($datos);
    }
}

if (isset($_POST['empleado_nuevo'])) {
    $nuevoUsuario = new UsuarioAjax();
    $data = $_POST['empleado_nuevo'];
    $nuevoUsuario->usuarioCosecha($data);
} 
//REPORTE GENERAL 
if (isset($_POST['ReporteGeneral'])) {
    $postCosecha = new UsuarioAjax();
    $data = $_POST['ReporteGeneral'];
    $postCosecha->GetReporteGeneral($data);
}
//cambio clave
if (isset($_POST['newPass'])) {
    $postCosecha = new UsuarioAjax();
    $data = $_POST['newPass'];
    $postCosecha->CambioClave($data);
}