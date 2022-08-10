<?php

require_once "conexion.php";

class ModelCosecha
{
    //CREAR COSECHA
    static public function mdlregistroCosecha($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (fecha_inicio, pago_kilo, pago_encargado) VALUES( :fecha_inicio, :pago_kilo, :pago_encargado) ");
        $stmt->bindParam(":fecha_inicio", $data["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":pago_kilo",  $data["pago_kilo"], PDO::PARAM_STR);
        $stmt->bindParam(":pago_encargado",  $data["pago_encargado"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    static public function mdlConsultarCosecha($tabla)
    {
        //CONSULTAR TODAS LAS COSECHAS
        $stmt = conexion::conectar()->prepare("SELECT id, fecha_inicio FROM $tabla ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }


    static public function mdlConsultarCosechaActiva($tabla)
    {
        //CONSULTAR LAS COSECHAS QUE ESTEN ACTIVAS UNICAMENTE
        $stmt = conexion::conectar()->prepare("SELECT id, fecha_inicio FROM $tabla WHERE estado = 1 ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }
   
    static public function mdlReporteCosecha($tabla, $data)
    {
         // REPORTE DE KILOS POR COSECHA
        $stmt = conexion::conectar()->prepare("SELECT CONCAT(nombres,' ', apellidos) AS 'Nombre' , SUM(kilos) AS 'total_kilos' FROM registro INNER JOIN empleados ON empleados.id= registro.id_empleado WHERE registro.id_cosecha = :id GROUP BY empleados.nombres");
        $stmt->bindParam(":id", $data["reporte"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }

    static public function mdlFinalizarCosecha($tabla, $data, $estado)
    {
        //DESACTIVAR COSECHA
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET estado=:estado WHERE id=:id ");
        $stmt->bindParam(":id", $data["id_cosecha"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);



        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }

        
    }
}
