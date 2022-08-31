<?php

require_once "conexion.php";

class ModelPagos
{
    //CONSULTAR TOTAL DE KILOS RECOGIDOS POR UN RECOLECTOR
    static public function mdlConsultarPagoRecolector($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT SUM(kilos)AS 'total_recogido', $tabla.nombres, $tabla.apellidos, $tabla.id, cosechas.pago_kilo FROM $tabla INNER JOIN cosechas ON cosechas.id=:id_cos INNER JOIN registro ON registro.id_empleado= $tabla.id WHERE $tabla.id=:id_emp");
        $stmt->bindParam(":id_cos",  $data["id_cosecha"]);
        $stmt->bindParam(":id_emp",  $data["id_usuario"]);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    //CALCULAR EL TOTAL DE PAGOS REALIZADOS A UN RECOLECTOR
    static public function mdlConsultarPagosRecolector($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT SUM(pagos) AS 'total_pagado' FROM $tabla  WHERE id_empleado=:id_emp");
        $stmt->bindParam(":id_emp",  $data["id_usuario"]);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    /* consultar pagos al recolector para registro individual */
    static public function mdlConsultarPagos($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE id_empleado=:id_emp");
        $stmt->bindParam(":id_emp",  $data["id_empleado"]);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    //REGISTRAR UN PAGO A UN RECOLECTOR
    static public function mdlPostPagosRecolector($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT  INTO $tabla(id_empleado, pagos,id_cosecha) VALUES (:id_emp, :pago, :id_cos) ");
        $stmt->bindParam(":id_emp",  $data["id_usuario"]);
        $stmt->bindParam(":id_cos",  $data["id_cosecha"]);
        $stmt->bindParam(":pago",  $data["cantidad"]);


        if ($stmt->execute()) {
            return "ok";
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
        //CONSULTAR PAGOS ANTERIORES A ENCARGADOS EN UN RANGO DE FECHAS
        static public function mdlConsultarPagosEncargadoInd($tabla, $data)
        {
            $stmt = conexion::conectar()->prepare("SELECT SUM(pagos) AS 'total_pagado' FROM $tabla  WHERE id_empleado=:id_emp");
            $stmt->bindParam(":id_emp",  $data["id_usuario"]);
    
            if ($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_OBJ);
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        }
    
    //CONSULTAR PAGOS ANTERIORES A ENCARGADOS EN UN RANGO DE FECHAS
    static public function mdlConsultarPagosEncargado($tabla, $data)
    {
        
        $stmt = conexion::conectar()->prepare("SELECT SUM(pagos) AS 'total_pagado' FROM $tabla  WHERE id_empleado=:id_emp AND fecha BETWEEN :inicio AND :fin GROUP BY id_empleado");
        $stmt->bindParam(":id_emp",  $data["id_usuario"]);
        $stmt->bindParam(":inicio",  $data["fecha_inicio"]);
        $stmt->bindParam(":fin",  $data["fecha_fin"]);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    //REGISTRAR UN PAGO A UN ENCARGADO
    static public function mdlPostPagosEncargado($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT  INTO $tabla(id_empleado, pagos, id_cosecha) VALUES (:id_emp, :pago, :id_cos) ");
        $stmt->bindParam(":id_emp",  $data["id_usuario"]);
        $stmt->bindParam(":id_cos",  $data["id_cosecha"]);
        $stmt->bindParam(":pago",  $data["pago"]);


        if ($stmt->execute()) {
            return "ok";
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    //LISTAR TODOS LOS PAGOS
    static public function mdlReportePagos($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN empleados ON empleados.id =$tabla.id_empleado WHERE $tabla.id_cosecha=:id_cos ");
        $stmt->bindParam(":id_cos",  $data["id_cosecha"]);


        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
