<?php
require_once "conexion.php";

class ModeloInformes{

static public function  mdlconsultaAll( $tabla, $datosConsulta)
{
        $stmt = conexion::conectar();
        $consulta = $stmt->prepare("SELECT categoria, nombrep, cantidad,fecha  FROM $tabla WHERE id_empresa = :id_empresa AND fecha BETWEEN :finicial AND :ffinal");
        $consulta->bindParam(":id_empresa", $datosConsulta["id_empresa"]);
        $consulta->bindParam(":finicial", $datosConsulta["finicial"], PDO::PARAM_STR);
        $consulta->bindParam(":ffinal", $datosConsulta["ffinal"], PDO::PARAM_STR);

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

    static public function  mdlconsultaCat( $tabla, $datosConsulta)
    {
        $stmt = conexion::conectar();
        $consulta = $stmt->prepare("SELECT nombrep, cantidad, categoria FROM $tabla WHERE id_empresa = :id_empresa AND categoria=:categoria AND  fecha BETWEEN :finicial AND :ffinal");
        $consulta->bindParam(":id_empresa", $datosConsulta["id_empresa"]);
        $consulta->bindParam(":finicial", $datosConsulta["finicial"], PDO::PARAM_STR);
        $consulta->bindParam(":ffinal", $datosConsulta["ffinal"], PDO::PARAM_STR);
        $consulta->bindParam(":categoria", $datosConsulta["categoria"], PDO::PARAM_STR);


        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

}