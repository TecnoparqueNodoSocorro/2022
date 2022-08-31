<?php

require_once "conexion.php";

class ModelUsuario
{
    static public function mdlLogin($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT $tabla.id, $tabla.id_cargo, cosechas.estado
        FROM $tabla left JOIN cosechas ON $tabla.id_cosecha=cosechas.id  
        WHERE $tabla.num_documento =:user AND  $tabla.contrasena=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $datos;

            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }



    static public function mdlregistroUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_cosecha, nombres, apellidos, id_cargo, num_telefono, num_documento, contrasena) 
        VALUES( :id_cosecha, :nombres, :apellidos, :id_cargo, :num_telefono, :num_documento, :clave) ");
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cargo",  $data["cargo"]);
        $stmt->bindParam(":id_cosecha",  $data["cosecha"]);
        $stmt->bindParam(":num_telefono",  $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":num_documento",  $data["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":clave",  $data["clave"]);


        if ($stmt->execute()) {

            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }


    /* LISTAR USUARIOS */
    static public function mdlConsultarUsuario($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT id, nombres, apellidos, num_telefono, num_documento, id_cargo FROM $tabla ");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    /* LISTAR USUARIOS POR COSECHA */
    static public function mdlConsultarUsuarioCosecha($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cosecha= :dato ");
        $stmt->bindParam(":dato",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /* LISTAR RECOLECTORES POR COSECHA */
    static public function mdlConsultarUsuarioCosechaRecolector($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cosecha= :dato AND id_cargo=1 ");
        $stmt->bindParam(":dato",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /* LISTAR ENCARGADOS POR COSECHA */
    static public function mdlConsultarEncargadoCosecha($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT $tabla.id, $tabla.id_cosecha, $tabla.nombres, $tabla.apellidos, $tabla.num_telefono, $tabla.num_documento, $tabla.id_cargo, cosechas.pago_encargado, cosechas.fecha_inicio FROM $tabla INNER JOIN cosechas ON id_cosecha = cosechas.id /* INNER JOIN pagos ON pagos.id_empleado = $tabla.id */ WHERE id_cosecha= :dato AND id_cargo=2 ");
        $stmt->bindParam(":dato",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* LISTAR USUARIO EN ESPECIFICO */
    static public function mdlConsultarUsuarioEspecifico($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT   $tabla.id, $tabla.nombres, $tabla.apellidos, $tabla.id_cosecha, 
         cosechas.pago_kilo , registro.kilos, registro.fecha_registro   FROM $tabla  
      INNER JOIN registro ON registro.id_empleado=:dato
         INNER JOIN cosechas ON cosechas.id = $tabla.id_cosecha  
         WHERE $tabla.id=:dato");
        $stmt->bindParam(":dato",  $data["id_empleado"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //reporte general de recolectores
    static public function mdlReporteGeneral($tabla, $data)
    {
        //CONSULTAR TODAS LAS COSECHAS
        $stmt = conexion::conectar()->prepare("SELECT $tabla.id, $tabla.nombres, $tabla.apellidos,
         (IFNULL(vk.sum_kilos,0)) AS sum_kilos,
          (IFNULL(vp.sum_pagos,0)) AS sum_pagos, 
          ((IFNULL(vk.sum_kilos,0))*c.pago_kilo) AS totalPagar,
          (((IFNULL(vk.sum_kilos,0))*c.pago_kilo)- (IFNULL(vp.sum_pagos,0))) AS total_deber
          FROM $tabla 
          LEFT JOIN vw_sumpagos vp ON vp.id_empleado=$tabla.id
          INNER JOIN vw_sumakilos vk ON vk.id_empleado = $tabla.id
          INNER JOIN cosechas c ON $tabla.id_cosecha= c.id
          WHERE $tabla.id_cosecha=:id AND $tabla.id_cargo=1
          GROUP BY $tabla.id");

        $stmt->bindParam(":id", $data["id"]);
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
    //reporte general de encargados
    static public function mdlReporteGeneralEncargados($tabla, $data)
    {
        //VARIABLE HOY PARA CALCULAR ELDÍA ACTUAL Y PODER EJECUTAR LA CONSULTA
        $hoy = date("Ymd");

        $stmt = conexion::conectar()->prepare("SELECT DATEDIFF( $hoy,c.fecha_inicio) AS dias_desde_inicio,  
        DATEDIFF( $hoy,c.fecha_inicio)- (ifnull(d.dia_no_asistido, 0)) AS dias_trabajados, 
        (DATEDIFF( $hoy,c.fecha_inicio)- (ifnull(d.dia_no_asistido, 0)))*c.pago_encargado AS total_a_pagar,  
        ((DATEDIFF( $hoy,c.fecha_inicio)- (ifnull(d.dia_no_asistido, 0)))*c.pago_encargado)-(IFNULL(p.sum_pagos, 0)) AS total_a_deber,
        $tabla.id, $tabla.id_cosecha as id_cosecha, $tabla.nombres, $tabla.apellidos, (IFNULL(d.dia_no_asistido, 0)) AS dias_no_asistidos, (IFNULL(p.sum_pagos, 0)) AS suma_de_pagos
        FROM $tabla 
        LEFT JOIN vw_dia_no_asistido d ON d.id_empleado=$tabla.id
        LEFT JOIN vw_sumpagos p ON p.id_empleado=$tabla.id
        INNER JOIN cosechas c ON c.id = $tabla.id_cosecha
        WHERE $tabla.id_cosecha=:id AND $tabla.id_cargo=2
        GROUP BY $tabla.id");

        $stmt->bindParam(":id", $data["id"]);
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

