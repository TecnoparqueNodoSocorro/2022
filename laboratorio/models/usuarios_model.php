<?php

require_once "conexion.php";

class ModelUsuario
{
    // ----------REGISTRAR CAPRINOCULTOR-----------
    static public function registroUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombres, apellidos, numero_documento,correo,  numero_telefono,  clave) 
      VALUES( :nombres, :apellidos, :num_documento,:correo, :num_telefono,  :pass) ");
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":num_documento",  $data["documento"]);
        $stmt->bindParam(":correo",  $data["correo"]);
        $stmt->bindParam(":num_telefono",  $data["telefono"]);
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
    //editar empleado
    static public function mdlEditEmpleado($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombres= :nombre,
        apellidos= :apellidos,
        numero_documento= :documento,
        correo = :correo,
        numero_telefono = :telefono   
        WHERE id = :id");
        $stmt->bindParam(":id",  $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre",  $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":documento",  $data["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":correo",  $data["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono",  $data["telefono"], PDO::PARAM_STR);



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
    // ------------- get usuario  por id--------
    static public function mdlGetInfoById($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id ");
            $stmt->bindParam(":id",  $data["id"]);
            $stmt->execute();
            $datos = $stmt->fetch(PDO::FETCH_OBJ);
            return $datos;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
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
    //cambio clave desde el usuario del administrador
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
    //cambio clave desde el usuario de empleado
    static public function mdlCambioClaveEmp($tabla, $data)
    {

        // SE COMPARA LA CLAVE ENVIADA PARA CONTAR SI ES LA QUE ESTÁ EN LA BASE DE DATOS
        $stmt = conexion::conectar()->prepare("SELECT  COUNT(clave) FROM $tabla WHERE id=:id AND clave=:pass ");
        $stmt->bindParam(":id", $data["id_usuario"]);
        $stmt->bindParam(":pass", $data["pass_old"]);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            return "Clave actual incorrecta";
        } else if ($count >= 1) {
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET clave=:pass WHERE id=:id");
            $stmt->bindParam(":id", $data["id_usuario"]);
            $stmt->bindParam(":pass", $data["pass"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "Clave cambiada exitosamente";
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
}
