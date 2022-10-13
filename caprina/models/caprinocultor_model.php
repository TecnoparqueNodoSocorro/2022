<?php

require_once "conexion.php";

class ModelCaprinocultor
{




    // -------------MODELO LOGIN--------
    static public function login($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE num_documento=:user AND clave=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
    }

    // ----------REGISTRAR CAPRINOCULTOR-----------
    static public function registroCaprinocultor($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombres, apellidos, num_documento, num_telefono,  objetivo_produccion, direccion, id_cargo, clave) 
        VALUES( :nombres, :apellidos, :num_documento, :num_telefono, :objetivo_produccion, :direccion,  :id_cargo, :pass) ");
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":num_documento",  $data["documento"]);
        $stmt->bindParam(":num_telefono",  $data["telefono"]);
        $stmt->bindParam(":direccion",  $data["direccion"]);
        $stmt->bindParam(":objetivo_produccion",  $data["objetivo_produccion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cargo", $data["cargo"]);
        $stmt->bindParam(":pass", $data["password"]);


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

    // -------------CONSULTAR CAPRINOCUTLOR--------
    static public function mdlConsultarCaprinocultor($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cargo = 2 ORDER BY id DESC ");
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
    //cambio clave
    static public function mdlCambioClave($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET clave = :pass WHERE id = :id");
        $stmt->bindParam(":id",  $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["pass"], PDO::PARAM_STR);

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

}
