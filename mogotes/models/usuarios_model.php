<?php

require_once "conexion.php";

class ModelUsuario
{
    // ----------REGISTRAR CAPRINOCULTOR-----------
    static public function registroUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombres, apellidos, numero_documento, numero_telefono, id_cargo, clave) 
      VALUES( :nombres, :apellidos, :num_documento, :num_telefono,  :id_cargo, :pass) ");
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":num_documento",  $data["documento"]);
        $stmt->bindParam(":num_telefono",  $data["telefono"]);
        $stmt->bindParam(":id_cargo", $data["cargo"]);
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
    // -------------MODELO LOGIN--------
    static public function login($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE numero_documento=:user AND clave=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
    //LISTAR USUARIOS
    static public function mdlGetUsuarios($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cargo !=1");
        $stmt->execute();
        return $stmt->fetchAll();
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
