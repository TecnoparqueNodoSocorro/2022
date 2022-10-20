<?php
require_once "conexion.php";
class ModelProveedor
{
    // crear 
    // -------------MODELO LOGIN--------
    static public function mdlLogin($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:user AND pasww1=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
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
            return "ok";
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
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
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
    }

    // consultar 1

    static public function MdlInfoProveedor($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("select * from $tabla where id =:idproveedor");
        $stmt->bindParam(":idproveedor", $data["id"]);
        if ($stmt->execute()) {
            return $stmt->fetchObject();
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    // editar proveedor admin

    static public function MdlUpdateProveedor($tabla, $datos)
    {

        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET  nombre=:nombre, nit=:nit, direccion=:direccion,
        telefono=:telefono, correo=:correo, maxprod=:maxprod, vigencia=:vigencia ,descripcion=:descripcion,
        usuario= :usuario WHERE id=:idproveedor");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":maxprod", $datos["max_p"]);

        $stmt->bindParam(":vigencia", $datos["vigencia"]);
        $stmt->bindParam(":usuario", $datos["user"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descr"], PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor", $datos["idproveedor"]);
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
    }

    // editar logo admin

    static public function MdlUpdateLogoProveedor($tabla, $datos)
    {

        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET logo=:logo WHERE id=:idproveedor");

        $stmt->bindParam(":logo", $datos["logo"], PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor", $datos["idproveedor"]);
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
    }
    // editar  proveedor usuario: proveedor

    static public function mdlEditProv($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare(" UPDATE $tabla SET  
        direccion=:direccion, telefono=:telefono, correo=:correo, descripcion=:descripcion 
        WHERE id=:idproveedor");

        $stmt->bindParam(":direccion", $datos["direc"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["tel"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descr"], PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor", $datos["id"]);
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
    }
    //actualizar vigencia
    static public function MdlNewVigencia($tabla, $data)
    {

        try {
            $stmt = conexion::conectar()->prepare("UPDATE $tabla set vigencia =:newvigencia WHERE id=:idproveedor");
            $stmt->bindParam(":newvigencia", $data["vignew"], PDO::PARAM_STR);
            $stmt->bindParam(":idproveedor", $data["id"]);
            $stmt->execute();
            return "New vigencia";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }


    //cambiar estado
    static public function MdlNewEstado($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET estado=:newestado WHERE id=:idprov");
            $stmt->bindParam(":newestado", $data["NewEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":idprov", $data["id"], PDO::PARAM_STR);
            $stmt->execute();
            return "ok new estado";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }


    // cambiar password desde el rol de admin
    static public function MdlNewPasssw($data, $tabla)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET pasww1=:newpass WHERE id=:idprov");
        $stmt->bindParam(":idprov", $data["id"]);
        $stmt->bindParam(":newpass", $data["Newpass"], PDO::PARAM_STR);
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
    }

    //-------------------Cambiar contraseña desde el rol de proveedor-----------------------------------------
    static public function MdlNewPassProv($data, $tabla)
    {

        // SE COMPARA LA CLAVE ENVIADA PARA CONTAR SI ES LA QUE ESTÁ EN LA BASE DE DATOS
        $stmt = conexion::conectar()->prepare("SELECT  COUNT(pasww1) FROM $tabla WHERE  pasww1=:pass");
        //$stmt->bindParam(":id", $data["id"]);
        $stmt->bindParam(":pass", $data["clave_old"]);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count == 0) {
            return "Clave incorrecta";
        } else if ($count == 1) {
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET pasww1=:newpass WHERE id=:id");
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":newpass", $data["clave_new"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "Clave cambiada exitosamente";
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
    //    // consultar informacion del proveedor para el home

    static public function mdlInfoProveedorHome($tabla, $dato)
    {

        $stmt = conexion::conectar()->prepare("SELECT * from $tabla where id = $dato");

        if ($stmt->execute()) {
            return $stmt->fetchObject();
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

//maestro crud para tablas 
/* SELECT COUNT(*)
FROM information_schema.columns
WHERE table_name = 'mitabla'
 */