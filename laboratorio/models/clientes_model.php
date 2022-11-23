<?php

require_once "conexion.php";

class ModelClientes
{
    // ----------REGISTRAR cliente-----------
    static public function mdlPostCliente($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombre, nit, rep_legal, ciudad,direccion, telefono, email, clave, logo) 
            VALUES( :nombre, :nit, :replegal,:city, :direcc, :tel,   :email, :pass, :logo) ");
            $stmt->bindParam(":nombre", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":nit",  $data["nit"], PDO::PARAM_STR);
            $stmt->bindParam(":replegal",  $data["replegal"], PDO::PARAM_STR);
            $stmt->bindParam(":city",  $data["city"], PDO::PARAM_STR);
            $stmt->bindParam(":direcc",  $data["dir"]);
            $stmt->bindParam(":tel",  $data["tel"]);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":pass", $data["pass"], PDO::PARAM_STR);
            $stmt->bindParam(":logo", $data["img"], PDO::PARAM_STR);



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
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
    // ----------editar cliente-----------
    static public function mdlEditCliente($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET  nombre = :nombre, 
            nit= :nit,
            rep_legal= :replegal,
            ciudad= :city,
            direccion= :direcc,
            telefono= :tel,
            email= :email
            WHERE id= :id");
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":nombre", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":nit",  $data["nit"], PDO::PARAM_STR);
            $stmt->bindParam(":replegal",  $data["replegal"], PDO::PARAM_STR);
            $stmt->bindParam(":city",  $data["city"], PDO::PARAM_STR);
            $stmt->bindParam(":direcc",  $data["dir"]);
            $stmt->bindParam(":tel",  $data["tel"]);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);

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
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
     // ----------editar logo cliente-----------
     static public function mdlEditLogoClient($tabla, $data)
     {
         try {
             $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET  logo = :img  WHERE id= :id");
             $stmt->bindParam(":id", $data["id"]);
             $stmt->bindParam(":img", $data["img"]);
 
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
         } catch (PDOException $e) {
             echo 'Error de conexión: ' . $e->getMessage();
             exit;
         }
     }
    // -------------MODELO get cliente  por id--------
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
    // -------------MODELO LOGIN--------
    static public function login($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nit=:nit AND clave=:pass");
        $stmt->bindParam(":nit",  $data["nit"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
    //LISTAR clientes
    static public function mdlGetClientes($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    //Desactivar un cliente  en especifico
    static public function mdlDesactivarClientes($tabla, $data)
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
    //Activar un cliente en especifico
    static public function mdlActivarClientes($tabla, $data)
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
    static public function mdlCambioClaveCli($tabla, $data)
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
