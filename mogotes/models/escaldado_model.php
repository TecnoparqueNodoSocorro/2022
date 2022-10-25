<?php

require_once "conexion.php";

class ModelEscaldado
{

    // ----------REGISTRAR PROCESO DE ESCALDADO-----------
    static public function mdlPostEscaldado($tabla, $data)
    {
        try {

            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=2 WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"], PDO::PARAM_STR);


            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }

            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado, desperdicio, desinfectante, escaldada, cantidad_verde) 
        VALUES(:lote, :usuario, :desperdicio, :desinfectante, :escaldada, :cantidad_verde  ) ");
            $stmt->bindParam(":lote", $data["codigo_lote"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario",  $data["id_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":desperdicio",  $data["desperdicio"]);
            $stmt->bindParam(":desinfectante",  $data["desinfectante"]);
            $stmt->bindParam(":escaldada", $data["escaldada"]);
            $stmt->bindParam(":cantidad_verde", $data["guayaba_verde"]);

            if ($stmt->execute()) {
                return "ok";
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }

    // ----------TRAER TODOS LOS REGISTROS POR CODIGO DE LOTE-----------
    static public function mdlGetReistrosByCodigo($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla 
            INNER JOIN  usuarios ON $tabla.id_empleado = usuarios.id WHERE codigo_lote=:cod ");
            $stmt->bindParam(":cod", $data["codigo"], PDO::PARAM_STR);


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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
}
