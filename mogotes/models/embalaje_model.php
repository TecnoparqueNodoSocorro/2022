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
    static public function mdlPostEncabezadoEmb($tabla, $data)
    {
        try {
            $stmt = conexion::conectar();
            $consulta = $stmt->prepare("INSERT INTO $tabla (codigo_lote, id_empleado, azucar, bijao, celofan, recortes, madera, tablas, fecha_fabricacion, fecha_vencimiento) 
            VALUES(:codigo_lote, :id_usuario, :azucar, :bijao, :celofan, :recortes, :madera, :tablas, :fabricacion, :vencimiento ) ");
            $consulta->bindParam(":codigo_lote", $data["codigo_lote"]);
            $consulta->bindParam(":id_usuario", $data["id_usuario"]);
            $consulta->bindParam(":azucar", $data["azucar"]);
            $consulta->bindParam(":bijao", $data["bijao"]);
            $consulta->bindParam(":celofan", $data["celofan"]);
            $consulta->bindParam(":recortes", $data["recortes"]);
            $consulta->bindParam(":madera", $data["madera"]);
            $consulta->bindParam(":tablas", $data["tablas"]);
            $consulta->bindParam(":fabricacion", $data["fabricacion"]);
            $consulta->bindParam(":vencimiento", $data["vencimiento"]);


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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }

/* --------------------POST DE LA CABECERA DEL EMBALAJE---------------------------------- */
static public function mdlPostDetalleEmb($tabla, $idEncabezado, $data)
    {

        foreach ($data   as $value) {
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( id_encabezado, id_empaque, cantidad) VALUES( :idEnc, :idEmp, :cant ) ");
            $stmt->bindParam(":idEnc", $idEncabezado);
            $stmt->bindParam(":idEmp", $value["id"]);
            $stmt->bindParam(":cant", $value["cantidad"]);
            if ($stmt->execute()) {
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        }
        return "OK";
    }
}
