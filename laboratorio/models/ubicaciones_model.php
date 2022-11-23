<?php

require_once "conexion.php";

class ModelUbicaciones
{
    // ----------post ubicacion-----------
    static public function mdlPostUbicacion($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_cliente, nombre) VALUES( :id, :nombre) ");
            $stmt->bindParam(":id", $data["cliente"]);
            $stmt->bindParam(":nombre",  $data["nombre"], PDO::PARAM_STR);



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
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
    // ----------traer ubicaciones por cliente-----------
    static public function mdlGetUbicacionesByCliente($tabla, $data)
    {
        try {
           
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cliente = $data ");
 
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
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
    // ----------editar ubicacion-----------
    static public function mdlEditUbicacion($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET nombre = :nombre WHERE id = :id");
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":nombre",  $data["nombre"], PDO::PARAM_STR);



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
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
}
