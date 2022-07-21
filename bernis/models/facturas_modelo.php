<?php
require_once "conexion.php";
class ModelFacturas
{


    static public function mdlFacturar($tabla, $cabecera)
    {



        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_empresa) VALUES(:idemp) ");
        /* bindParam() */
        $stmt->bindParam(":idemp", $cabecera ,PDO::PARAM_STR);
        if ($stmt->execute()) {
           /*  $lastInsertId = $pdo->lastInsertId(); */
           return "ok";
        } else {
            //Pueden haber errores, como clave duplicada
            $lastInsertId = 0;
            echo $stmt->errorInfo()[2];
        }

        $stmt->closeCursor();
        $stmt = null;
        return  $lastInsertId;
    }




    static public function mdlDetalleFactura($tabla, $detalle)
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
