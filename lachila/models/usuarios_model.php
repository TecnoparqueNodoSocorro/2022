<?php

require_once "conexion.php";

class ModelUsuarios
{

    // -------------MODELO LOGIN--------
    static public function mdlLogin($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE num_documento=:user AND clave=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
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
    // ----------REGISTRAR CAPRINOCULTOR-----------
    static public function mdlPostUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( id_cargo,nombres, apellidos, num_telefono, num_documento, fecha_nacimiento, clave) 
        VALUES( :id_cargo, :nombres, :apellidos,  :telefono, :documento, :fecha_n,  :pass) ");
        $stmt->bindParam(":id_cargo", $data["cargo"]);
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono",  $data["telefono"]);
        $stmt->bindParam(":documento",  $data["documento"]);
        $stmt->bindParam(":fecha_n",  $data["fecha_nacimiento"]);
        $stmt->bindParam(":pass", $data["clave"]);

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

    //LISTAR LOS USUARIO 
    static public function mdlGetUsuarios($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cargo=1 ORDER BY id DESC ");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }
    
    //Desactivar un USUARIO  en especifico
    static public function mdlDesactivarUsuarios($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET estado=0 WHERE id=:id ");
        $stmt->bindParam(":id", $data["id_usuario"]);

        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            print_r($data);
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    //Activar un USUARIO en especifico
    static public function mdlActivarUsuarios($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET estado=1 WHERE id=:id ");
        $stmt->bindParam(":id", $data["id_usuario"]);

        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            print_r($data);
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
