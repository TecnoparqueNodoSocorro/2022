<?php

require_once "conexion.php";

class ModelReporte
{
    //CONSULTA TOTAL KILOS POR RECOLECTOR
    static public function mdlReporte($tabla, $data, $where)
    {
        $stmt = conexion::conectar()->prepare("SELECT *, SUM(kilos) AS 'kilos_totales', (SUM(kilos)*cosechas.pago_kilo) AS 'total_pagar' FROM $tabla JOIN cosechas ON $tabla.id_cosecha = cosechas.id   WHERE  id_empleado = :id_emp AND id_cosecha= :id_co AND $where BETWEEN :fechaIni AND :fechaFin");
        $stmt->bindParam(":id_emp", $data["id_empleado"]);
        $stmt->bindParam(":fechaIni",  $data["fecha_inicio"]);
        $stmt->bindParam(":fechaFin",  $data["fecha_fin"]);
        $stmt->bindParam(":id_co",  $data["id_cosecha"]);



        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" ;
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    //CONSULTAR CANTIDAD DE DIAS NO TRABAJADOS POR EL RECOLECTOR
    static public function mdlReporteEncargado($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT  cosechas.pago_encargado, COUNT(dia_no_asistido) AS 'dias_no_asistidos' from $tabla JOIN cosechas ON $tabla.id_cosecha = cosechas.id WHERE id_empleado=:id_emp AND id_cosecha = :id_co AND dia_no_asistido BETWEEN :fechaIni AND :fechaFin");
        $stmt->bindParam(":id_emp", $dato["id_empleado"]);
        $stmt->bindParam(":fechaIni",  $dato["fecha_inicio"]);
        $stmt->bindParam(":fechaFin",  $dato["fecha_fin"]);
        $stmt->bindParam(":id_co",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //CONSULTAR LOS PAGOS A LOS RECOLECTORES ENTRE UN RANGO DE FECHAS
    static public function mdlReporteRecolectorPagos($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT  SUM(pagos) AS 'total_pagado' FROM $tabla WHERE id_empleado=:id_emp AND fecha BETWEEN :fechaIni AND :fechaFin GROUP BY id_empleado;");
        $stmt->bindParam(":id_emp", $dato["id_empleado"]);
        $stmt->bindParam(":fechaIni",  $dato["fecha_inicio"]);
        $stmt->bindParam(":fechaFin",  $dato["fecha_fin"]);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" ;
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
