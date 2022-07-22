<?php
require_once "conexion.php";
class ModelFacturas
{


    static public function mdlFacturar($tabla, $empresa, $usuario)
    {
        $stmt = conexion::conectar();
        $consulta = $stmt->prepare("INSERT INTO $tabla (id_empresa, id_usuario) VALUES(:idemp, :idusuario)");

        /* bindParam() */
        $consulta->bindParam(":idemp", $empresa, PDO::PARAM_STR);
        $consulta->bindParam(":idusuario", $usuario, PDO::PARAM_STR);

        $lastId =($stmt->lastInsertId());

        if ($consulta->execute()) {
            $lastId = $stmt->lastInsertId();
        
            return $lastId;

        } else {
            //Pueden haber errores, como clave duplicada

            echo $stmt->errorInfo()[2];
        }

        $consulta->closeCursor();
        $consulta = null;
        return "no se pudo";
    }


    static public function mdlDetalleFactura($tabla,$idfactura, $detalle)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (idemp, id_factura, id_producto, cantidad, fecha) VALUES(:idemp, :idfact, :id_producto, :cant, :fecha) ");
        /* bindParam() */
        $stmt->bindParam(":idemp", $detalle["idemp"], PDO::PARAM_STR);
        $stmt->bindParam(":idfac", $detalle["idfac"], PDO::PARAM_STR);
        $stmt->bindParam(":id_producto", $detalle["idproducto"], PDO::PARAM_STR);
        $stmt->bindParam(":cant", $detalle["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $detalle["fecha"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());

            $stmt->closeCursor();
            $stmt = null;
        }
        return ("ok");
    }
}
