<?php

require_once "conexion.php";

class ModelEmbalaje
{

    // ----------TRAER EMPAQUES-----------
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
            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=4 WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"], PDO::PARAM_STR);


            if ($sql->execute()) {

                $sql->closeCursor();
                $sql = null;
            }

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
    static public function mdlPostDetalleEmb($tabla, $idEncabezado, $data,  $codigoLote)
    {

        foreach ($data   as $value) {
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( id_encabezado, id_empaque, codigo_lote, cantidad) VALUES( :idEnc, :idEmp, :lote, :cant ) ");
            $stmt->bindParam(":idEnc", $idEncabezado);
            $stmt->bindParam(":lote",   $codigoLote);
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


    //traer embalajes por codigo
    static public function mdlGetEmbalajesByCodigo($tabla, $data)
    {


        $stmt = conexion::conectar()->prepare("SELECT $tabla.id AS 'idEncabezado', $tabla.azucar, $tabla.bijao, $tabla.celofan, $tabla.celofan,
        $tabla.recortes, $tabla.madera, $tabla.tablas, $tabla.fecha_fabricacion, $tabla.fecha_vencimiento, $tabla.fecha_embalaje,

        usuarios.nombres, usuarios.apellidos,

        embalaje_detalle.id_empaque, embalaje_detalle.cantidad,embalaje_empaque.producto,  embalaje_empaque.empaque
        
        FROM $tabla INNER JOIN embalaje_detalle ON embalaje_detalle.id_encabezado = $tabla.id INNER JOIN usuarios ON usuarios.id = $tabla.id_empleado INNER JOIN embalaje_empaque ON embalaje_empaque.id = embalaje_detalle.id_empaque WHERE $tabla.codigo_lote = :codigo_lote  ");
        $stmt->bindParam(":codigo_lote", $data["codigo"]);

        if ($stmt->execute()) {
            return    $stmt->fetchAll(PDO::FETCH_ASSOC);
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
