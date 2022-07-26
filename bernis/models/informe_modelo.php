<?php
require_once "conexion.php";

class ModeloInformes{

static public function  mdlconsultaAll( $tabla, $id_empresa, $finicial, $ffinal)
{
        $stmt = conexion::conectar();
        $consulta = $stmt->prepare("SELECT nombrep, cantidad, categoria FROM $tabla WHERE id_empresa =$id_empresa AND fecha BETWEEN $finicial AND $ffinal");
        return $consulta;
}

    static public function  mdlconsultaCat( $tabla, $id_empresa, $finicial, $ffinal, $categoria)
    {
        $stmt = conexion::conectar();
        $consulta = $stmt->prepare("SELECT nombrep, cantidad, categoria FROM $tabla WHERE id_empresa =$id_empresa AND categoria=$categoria AND  fecha BETWEEN $finicial AND $ffinal");
        return $consulta;
    }

}