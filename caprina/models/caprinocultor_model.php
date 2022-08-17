<?php

require_once "conexion.php";

class ModelCaprinocultor
{




    // -------------MODELO LOGIN--------
    static public function login($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombres=:user AND num_documento=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
    }

    // ----------REGISTRAR CAPRINOCULTOR-----------
    static public function registroCaprinocultor($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombres, apellidos, num_documento, num_telefono,  objetivo_produccion, direccion, id_cargo) VALUES( :nombres, :apellidos, :num_documento, :num_telefono, :objetivo_produccion, :direccion,  :id_cargo) ");
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":num_documento",  $data["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":num_telefono",  $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion",  $data["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":objetivo_produccion",  $data["objetivo_produccion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cargo", $data["cargo"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            /*         echo "\nPDO::errorInfo():\n". $data. "modelo; */
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    // -------------CONSULTAR CAPRINOCUTLOR--------
    static public function mdlConsultarCaprinocultor($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC ");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    // ----------GENERAR LA CANTIDAD DE CAPRINOCULTORES PARA EL ESTADO CAPRINO-----------
    static public function mdlCantidadDeCaprinocultores($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT  COUNT(*) FROM $tabla  WHERE id_cargo=2");
        $stmt->execute();
        $total = $stmt->fetchColumn();
        return $total;
    }
}
