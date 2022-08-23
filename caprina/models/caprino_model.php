<?php

require_once "conexion.php";

class ModelCaprino
{

    // ---------------------REGISTRAR CAPRINO--------------
    static public function registroCaprino($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo, id_usuario, raza, fecha_nacimiento, origen) VALUES( :codigo, :id_usuario, :raza, :fecha_nacimiento, :origen) ");
        $stmt->bindParam(":id_usuario", $data["usuario"]);
        $stmt->bindParam(":codigo", $data["codigo"]);

        $stmt->bindParam(":raza",  $data["raza"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento",  $data["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":origen",  $data["origen"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            /*  echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo()); */
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    // ------------CONSULTAR CAPRINO POR CODIGO---------
    static public function mdlConsultarCaprino($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY codigo DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    // -------------CONSULTAR LA CANTIDAD DE CAPRINOS PARA EL ESTADO CAPRINO--------
    static public function mdlConsultarCantidadDeCaprinos($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla");
        $stmt->execute();
        return $stmt->fetchColumn();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    // -----------------CONSULTAR LA CANTIDAD DE TRATAMIENTOS PARA EL ESTADO CAPRINO----------
    static public function mdlCantidadTratamientos($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla");
        $stmt->execute();
        return $stmt->fetchColumn();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    //---CONSULTAR LA CANTIDAD DE CAPRINOS POR RAZA PARA EL ESTADO CAPRINO---
    static public function mdlConsultarCantidadDeCaprinosPorRaza($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT COUNT(*) AS 'cantidad',raza FROM $tabla GROUP BY raza");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    //---------MODELO CONSULTAR LOS CAPRINOS ACTIVOS  POR CAPRINOCULTOR--------
    static public function mdlConsultarCaprinoActivo($tabla, $id)
    {

        $stmt = conexion::conectar()->prepare("SELECT id,codigo, raza, origen, fecha_nacimiento FROM $tabla WHERE estado =1 AND id_usuario=$id ORDER BY codigo DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    //---------MODELO CONSULTAR LOS CAPRINOS INACTIVOS POR CAPRINOCULTOR--------
    static public function mdlConsultarCaprinoInactivo($tabla, $id)
    {

        $stmt = conexion::conectar()->prepare("SELECT id,codigo, motivo_salida, fecha_salida FROM $tabla WHERE estado =0 AND id_usuario = $id ORDER BY codigo DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    //---------MODELO CONSULTAR UN CAPRINO EN ESPECIFICO-- Y QUE ESTE ACTIVO------
    static public function mdlGetCaprino($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo =:codigo AND estado = 1");
        $stmt->bindParam(":codigo", $data["codigo_caprino_control"]);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    //--------MODELO CONSULTAR UN CAPRINO EN ESPECIFICO---------
    static public function mdlConsultarCaprinoInd($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo=:cod");
        $stmt->bindParam(":cod", $data["codigo"]);


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

    //--------------CREAR TRATAMIENTO--------------------------
    static public function mdlTratamiento($tabla, $id_usuario, $descripcion, $fecha_inicio)
    {
        $stmt = conexion::conectar();
        $consulta = $stmt->prepare("INSERT INTO $tabla (id_usuario, descripcion, fecha_inicio) VALUES( :id_usuario,:descr, :fecha) ");
        $consulta->bindParam(":id_usuario", $id_usuario);
        $consulta->bindParam(":descr", $descripcion, PDO::PARAM_STR);
        $consulta->bindParam(":fecha", $fecha_inicio, PDO::PARAM_STR);
        $lastId = ($stmt->lastInsertId());
        if ($consulta->execute()) {
            $lastId = $stmt->lastInsertId();

            return $lastId;
        } else {
            echo $stmt->errorInfo()[2];
        }
        $consulta->closeCursor();
        $consulta = null;
        return "no se pudo";
    }


    //------------AGREGAR CAPRINOS AL TRATAMIENTO ANTERIOR----------------   
    static public function mdlCaprinosTratamiento($tabla, $idtratamiento, $caprinos)
    {
        foreach ($caprinos   as $value) {
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( id_usuario, codigo_caprino, id_tratamiento) VALUES( 1, :codigo, :id_trat) ");
            $stmt->bindParam(":id_trat", $idtratamiento);
            $stmt->bindParam(":codigo", $value["codigo"]);
            $stmt->execute();
        }
        return "OK";
    }

    //--------MODELO CONSULTAR CAPRINOS POR USUARIO---------
    static public function mdlConsultarCaprinoPorUsuario($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario=:id");
        $stmt->bindParam(":id", $data["id_usuario"]);


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
    //---------MODELO CONSULTAR LOS CAPRINOS  POR USUARIO-------
    static public function mdlCaprinosPorUsuario($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario=:id   ORDER BY codigo DESC");
        $stmt->bindParam(":id", $data["id_usuario"]);

        $stmt->execute();
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
}
