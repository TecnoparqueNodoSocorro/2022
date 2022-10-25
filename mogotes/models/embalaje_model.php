<?php

require_once "conexion.php";

class ModelEmbalaje
{

    // ----------REGISTRAR PROCESO DE ESCALDADO-----------
    static public function mdlGetEmpaquesByProductos($tabla, $data)
    {
        try {

            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE producto = :producto ");
            $stmt->bindParam(":producto", $data["producto"], PDO::PARAM_STR);


            if ($stmt->execute()) {
                return    $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
}
