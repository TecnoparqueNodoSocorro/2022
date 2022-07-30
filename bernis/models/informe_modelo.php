<?php
require_once "conexion.php";

class ModeloInformes
{

    static public function  mdlconsultaAll($tabla, $datosConsulta)
    {
        $fechainicial = $datosConsulta["finicio"] . " 00:00:00";
        $fechafinal = $datosConsulta["ffinal"] . " 23:59:59";
        $stmt = conexion::conectar();
      /*   $consulta = $stmt->prepare("SELECT categoria, nombrep, precioP, cantidad,fecha  FROM $tabla WHERE id_empresa = :id_empresa AND fecha BETWEEN :finicial AND :ffinal"); */
        $consulta = $stmt->prepare("SELECT SUM(cantidad) as cantidad, categoria, nombrep, precioP,fecha FROM $tabla WHERE id_empresa =:id_empresa  AND fecha BETWEEN :finicial AND :ffinal group by nombrep;");
       
        $consulta->bindParam(":id_empresa", $datosConsulta["id_empresa"]);
        $consulta->bindParam(":finicial",  $fechainicial);
        $consulta->bindParam(":ffinal", $fechafinal);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function  mdlconsultaCat($tabla, $datosConsulta)
    {
        $fechainicial = $datosConsulta["finicio"] . " 00:00:00";
        $fechafinal = $datosConsulta["ffinal"] . " 23:59:59";
        $stmt = conexion::conectar();
       /*  $consulta = $stmt->prepare("SELECT categoria, nombrep, precioP, cantidad,fecha  FROM $tabla WHERE id_empresa = :id_empresa AND categoria=:categoria AND  fecha BETWEEN :finicial AND :ffinal"); */

        $consulta = $stmt->prepare("SELECT SUM(cantidad)as cantidad, categoria, nombrep, precioP, fecha FROM $tabla WHERE id_empresa =:id_empresa AND categoria=:categoria AND fecha BETWEEN :finicial AND :ffinal group by nombrep;");
        $consulta->bindParam(":id_empresa", $datosConsulta["id_empresa"]);
        $consulta->bindParam(":finicial",  $fechainicial);
        $consulta->bindParam(":ffinal", $fechafinal);
        $consulta->bindParam(":categoria", $datosConsulta["categoria"], PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
