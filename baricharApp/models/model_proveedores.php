<?php
require_once "conexion.php";
class ModelProveedor
{
    // crear 

    static public function MdlNewproveedor($datos, $tabla)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombre, nit, telefono, correo, maxprod, direccion, descripcion, logo, vigencia, usuario, pasww1) VALUES(:nombre, :nit, :telefono, :correo, :maxprod, :direccion, :descripcion,:logo,:vigencia,:usuario,:pasww1)");
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

    // consultar TODOS

    static public function MdlSelectAllProveedores($tabla)
    {
        $stmt = conexion::conectar()->prepare("select * from $tabla");
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

    // consultar 1

    static public function MdlSelectProveedor($tabla, $id_proveedor)
    {
        $stmt = conexion::conectar()->prepare("select * from $tabla where id_proveedor=:idproveedor");
        $stmt->bindParam(":idproveedor", $id_proveedor);
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

    // editar 

    static public function MdlUpdateProveedor($tabla, $datos)
    {
        try {
            $stmt = conexion::conectar()->prepare("update  $tabla  SET  nombre=:nombre ,nit=:nit ,telefono:=telefono ,correo:=correo ,maxprod=:maxprod ,direccion:=direccion,descripcion=:descripcion,logo:=logo,vigencia=:vigencia,usuario:=usuario,pasww1=;pasww1 WHERE id=:idproveedor");
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

            return 1;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }

    //actualizar vigencia

    //cambiar estado

    
}
