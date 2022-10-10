<?php

require_once "conexion.php";

class ModelDiasEncargado
{
    //AGREGAR DÍA NO TRABAJADO POR EL RECOLECTOR
    static public function mdlAgregarDia($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_empleado, id_cosecha, dia_no_asistido)  VALUES(:id_emp, :id_cos, :fecha)");
        $stmt->bindParam(":id_emp", $data["id_empleado"]);
        $stmt->bindParam(":id_cos",  $data["id_cosecha"]);
        $stmt->bindParam(":fecha",  $data["dia"]);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->fetchColumn();
        /*         $stmt->closeCursor();
            $stmt = null; */
    }

    //CONSULTA PARA COMPARAR FECHAS, SI SE INTENTA INGRESAR UNA FECHA DUPLICADA DEVUELVE ALERTA
    static public function mdlCompararFecha($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT COUNT(dia_no_asistido) FROM $tabla WHERE id_empleado=:id_emp AND dia_no_asistido=:fecha /* AND id_cosecha =:id_cos */");
        $stmt->bindParam(":id_emp", $data["id_empleado"]);
/*         $stmt->bindParam(":id_cos",  $data["id_cosecha"]); */
        $stmt->bindParam(":fecha",  $data["dia"]);
        $stmt->execute();


        if ($stmt->execute()) {
            return $stmt->fetchColumn();
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    static public function mdlCantidadDias($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT COUNT(dia_no_asistido) AS 'dias_no_asistidos' FROM $tabla WHERE $tabla.id_empleado=:id_emp");
        $stmt->bindParam(":id_emp", $data["id_usuario"]);

        if ($stmt->execute()) {
            return $stmt->fetchColumn();
            $stmt->closeCursor();
            $stmt = null;
        } else {
            return "fallo";
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    
// CONSULTAR DIAS NO ASISTIDOS POR EL ENCARGADO
    static public function mdlDias($tabla,
        $dato
    ) {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN empleados ON empleados.id=$tabla.id_empleado WHERE $tabla.id_empleado=:id_emp");
        $stmt->bindParam(":id_emp", $dato["id_encargado"]);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            return "fallo";
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
