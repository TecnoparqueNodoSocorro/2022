<?php

require_once "conexion.php";

class ModelReportes
{

    // -------REPORTE DE CONTROLES--------------
    static public function mdlReporteControlesT($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla   INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo  INNER JOIN usuarios u ON $tabla.id_usuario = u.id  WHERE $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC ");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }


    // -------REPORTE DE CONTROLES ENFERMEDAD RESPIRATORIA--------------
    static public function mdlReporteControlesER($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_caprino, $tabla.id_usuario, peso, condicion_corporal,enfermedad_respiratoria, fecha, c.raza, u.nombres, u.apellidos FROM $tabla INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo INNER JOIN usuarios u ON $tabla.id_usuario = u.id   WHERE $tabla.enfermedad_respiratoria !='' AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC ");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    // -------REPORTE DE CONTROLES ENFERMEDAD GASTROINTESTINAL--------------
    static public function mdlReporteControlesEG($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_caprino, $tabla.id_usuario, peso, condicion_corporal,enfermedad_gastrointestinal, fecha, c.raza, u.nombres, u.apellidos FROM $tabla INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo INNER JOIN usuarios u ON $tabla.id_usuario = u.id  WHERE $tabla.enfermedad_gastrointestinal !='' AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    // -------REPORTE DE CONTROLES ENFERMEDAD MORDEDURA--------------
    static public function mdlReporteControlesEM($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_caprino, $tabla.id_usuario, peso, condicion_corporal,enfermedad_mordedura, fecha, raza, u.nombres, u.apellidos  FROM $tabla INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo INNER JOIN usuarios u ON $tabla.id_usuario = u.id  WHERE $tabla.enfermedad_mordedura !='' AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC ");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }





    // -------REPORTE DE CONTROLES POR CAPRINOCULTOR--------------
    static public function mdlReporteControlesTPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla   INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo 
          INNER JOIN usuarios u ON $tabla.id_usuario = u.id
          WHERE $tabla.id_usuario=:id_user AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC ");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        $stmt->bindParam(":id_user", $data["usuario"]);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }


    // -------REPORTE DE CONTROLES ENFERMEDAD RESPIRATORIA POR CAPRINOCULTOR--------------
    static public function mdlReporteControlesERPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_caprino, $tabla.id_usuario, peso, condicion_corporal,enfermedad_respiratoria, fecha, c.raza, u.nombres, u.apellidos FROM $tabla INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo INNER JOIN usuarios u ON $tabla.id_usuario = u.id   WHERE $tabla.id_usuario=:id_user AND  $tabla.enfermedad_respiratoria !='' AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC ");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        $stmt->bindParam(":id_user", $data["usuario"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    // -------REPORTE DE CONTROLES ENFERMEDAD GASTROINTESTINAL POR CAPRINOCULTOR--------------
    static public function mdlReporteControlesEGPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_caprino, $tabla.id_usuario, peso, condicion_corporal,enfermedad_gastrointestinal, fecha, c.raza, u.nombres, u.apellidos FROM $tabla INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo INNER JOIN usuarios u ON $tabla.id_usuario = u.id  WHERE $tabla.id_usuario=:id_user AND  $tabla.enfermedad_gastrointestinal !='' AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        $stmt->bindParam(":id_user", $data["usuario"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    // -------REPORTE DE CONTROLES ENFERMEDAD MORDEDURA POR CAPRINOCULTOR--------------
    static public function mdlReporteControlesEMPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_caprino, $tabla.id_usuario, peso, condicion_corporal,enfermedad_mordedura, fecha, raza, u.nombres, u.apellidos  FROM $tabla INNER JOIN registro_caprino c ON $tabla.codigo_caprino=c.codigo INNER JOIN usuarios u ON $tabla.id_usuario = u.id  WHERE $tabla.id_usuario=:id_user AND  $tabla.enfermedad_mordedura !='' AND $tabla.fecha BETWEEN :inicio AND :fin ORDER BY $tabla.fecha DESC ");
        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        $stmt->bindParam(":id_user", $data["usuario"]);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    // -------REPORTE DE TRATAMIENTOS--------------
    static public function mdlReporteTratamientos($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT u.nombres, u.apellidos, u.id, c.codigo, c.raza, t.codigo_caprino, t.id_tratamiento, $tabla.fecha_inicio, $tabla.descripcion FROM $tabla 
        INNER JOIN caprinos_en_tratamiento t ON  t.id_tratamiento=$tabla.id 
        INNER JOIN registro_caprino c ON t.codigo_caprino=c.codigo
        INNER JOIN usuarios u ON $tabla.id_usuario = u.id 
        WHERE $tabla.fecha_inicio BETWEEN :inicio AND :fin ORDER BY $tabla.fecha_inicio DESC ");

        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);

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

     // -------REPORTE DE TRATAMIENTOS--------------
     static public function mdlReporteTratamientosPorUsuario($tabla, $data)
     {
         $stmt = conexion::conectar()->prepare("SELECT u.nombres, u.apellidos, u.id, c.codigo, c.raza, t.codigo_caprino, t.id_tratamiento, $tabla.fecha_inicio, $tabla.descripcion FROM $tabla 
         INNER JOIN caprinos_en_tratamiento t ON  t.id_tratamiento=$tabla.id 
         INNER JOIN registro_caprino c ON t.codigo_caprino=c.codigo
         INNER JOIN usuarios u ON $tabla.id_usuario = u.id 
         WHERE $tabla.id_usuario=:id AND $tabla.fecha_inicio BETWEEN :inicio AND :fin ORDER BY $tabla.fecha_inicio DESC ");
 
         $stmt->bindParam(":inicio", $data["fecha_inicio"]);
         $stmt->bindParam(":fin", $data["fecha_fin"]);
         $stmt->bindParam(":id", $data["id_usuario"]);
 
         if ($stmt->execute()) {
             return $stmt->fetchAll(PDO::FETCH_ASSOC);
             $stmt->closeCursor();
             $stmt = null;
         } else {
             echo "\nPDO::errorInfo():\n" . $data . "modelo";
             print_r($stmt->errorInfo());
             $stmt->closeCursor();
             $stmt = null;
         }
     }

    //--------MODELO TRAER LAS CANTIDADES DE LECHE POR DIA PARA EL GRAFICO
    static public function mdlGenerarGrafico($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT fecha_registro, SUM(cantidad_leche) AS 'cantidad' FROM $tabla WHERE fecha_registro BETWEEN :inicio AND :fin AND id_usuario= :id GROUP BY fecha_registro");

        $stmt->bindParam(":inicio", $data["fecha_inicio"]);
        $stmt->bindParam(":fin", $data["fecha_fin"]);
        $stmt->bindParam(":id", $data["id_usuario"]);


        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
