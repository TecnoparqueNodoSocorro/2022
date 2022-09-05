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
        $stmt = conexion::conectar()->prepare("select * from $tabla");
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
        
            $stmt = conexion::conectar()->prepare("update  $tabla  SET  nombre=:nombre ,nit=:nit ,telefono:=telefono ,correo:=correo ,maxprod=:maxprod ,direccion:=direccion,descripcion=:descripcion,logo:=logo,vigencia=:vigencia,usuario:=usuario WHERE id=:idproveedor");
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":maxprod", $datos["max_p"]);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descr"], PDO::PARAM_STR);
            $stmt->bindParam(":logo", $datos["logo"], PDO::PARAM_STR);
            $stmt->bindParam(":vigencia", $datos["vigencia"]);
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
static public function MdlNewVigencia($tabla,$data){
       
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
static public function MdlNewEstado($tabla,$data){
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


// cambiar password
static public function MdlNewPasssw($data,$tabla){
        try {
 $stmt = conexion::conectar()->prepare("UPDATE $tabla SET passw1=:newpass WHERE is=:idprov");
            $stmt->bindParam(":idprov", $data["id"], PDO::PARAM_STR);
            $stmt->bindParam(":newpass", $data["data_Newpass"], PDO::PARAM_STR);
            $stmt->execute();
            return "ok new passw";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
}

}

//maestro crud para tablas 
/* SELECT COUNT(*)
FROM information_schema.columns
WHERE table_name = 'mitabla'
 */