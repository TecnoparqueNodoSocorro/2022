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

        $lastId = ($stmt->lastInsertId());

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


    static public function mdlDetalleFactura($tabla, $idfactura, $detalle)
    {
        $data = json_decode($detalle, true);
        try {
            foreach
           

            ($data as $key=>$data1) {
                $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_factura, id_empresa, id_producto,nombrep,cantidad) VALUES(:idfact,:idemp,:idprod,:nombrep,:cant)");
                $stmt->bindParam(":idfact", $idfactura, PDO::PARAM_STR);
                $stmt->bindParam(":idemp", $key["id_empresa"], PDO::PARAM_STR);
                $stmt->bindParam(":idprod", $key["id_producto"], PDO::PARAM_STR);
                $stmt->bindParam(":nombrep", $key["descripcion"], PDO::PARAM_STR);
                $stmt->bindParam(":cant", $key["descripcion"], PDO::PARAM_STR);
                $stmt->execute();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
       /*  return $detalle; */
            return "ok";
    }
}
