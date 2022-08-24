<?php
require_once "conexion.php";
class ModelNewProveedor
{


    static public function MdlNewproveedor($datos, $tabla)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombre, nit, telefono, correo, maxprod, direccion, descripcion, logo, vigencia, usuario, pasww1, pasww2) VALUES(:nombre, :nit, :telefono, :correo, :maxprod, :direccion, :descripcion,:logo,:vigencia,:usuario,:pasww1,:pasww2)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":maxprod", $datos["max_p"]);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descr"], PDO::PARAM_STR);
        $stmt->bindParam(":logo", $datos["logo"], PDO::PARAM_STR);
        $stmt->bindParam(":vigencia", $datos["vigencia"]);
        $stmt->bindParam(":usuario", $datos["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pasww1", $datos["pass_1"], PDO::PARAM_STR);
        $stmt->bindParam(":pasww2", $datos["pass_2"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
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