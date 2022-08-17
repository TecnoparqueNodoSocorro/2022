<?php

require_once "conexion.php";

class ModelUsuario
{
    static public function mdlLogin($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE num_documento =:user AND contrasena=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
     
    }



    static public function mdlregistroUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_cosecha, nombres, apellidos, id_cargo, num_telefono, num_documento) VALUES( :id_cosecha, :nombres, :apellidos, :id_cargo, :num_telefono, :num_documento) ");
        $stmt->bindParam(":nombres", $data["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos",  $data["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cargo",  $data["cargo"]);
        $stmt->bindParam(":id_cosecha",  $data["cosecha"]);
        $stmt->bindParam(":num_telefono",  $data["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":num_documento",  $data["documento"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            echo "\nPDO::errorInfo():\n" . $data["apellidos"] . $data["cargo"] . $data["cosecha"] . $data["telfono"] . $data["documento"] . ":nombres";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }


    /* LISTAR USUARIOS */
    static public function mdlConsultarUsuario($tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT id, nombres, apellidos, num_telefono, num_documento, id_cargo FROM $tabla ");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    /* LISTAR USUARIOS POR COSECHA */
    static public function mdlConsultarUsuarioCosecha($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cosecha= :dato ");
        $stmt->bindParam(":dato",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /* LISTAR RECOLECTORES POR COSECHA */
    static public function mdlConsultarUsuarioCosechaRecolector($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cosecha= :dato AND id_cargo=1 ");
        $stmt->bindParam(":dato",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /* LISTAR ENCARGADOS POR COSECHA */
    static public function mdlConsultarEncargadoCosecha($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT $tabla.id, $tabla.id_cosecha, $tabla.nombres, $tabla.apellidos, $tabla.num_telefono, $tabla.num_documento, $tabla.id_cargo, cosechas.pago_encargado, cosechas.fecha_inicio FROM $tabla INNER JOIN cosechas ON id_cosecha = cosechas.id /* INNER JOIN pagos ON pagos.id_empleado = $tabla.id */ WHERE id_cosecha= :dato AND id_cargo=2 ");
        $stmt->bindParam(":dato",  $dato["id_cosecha"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* LISTAR USUARIO EN ESPECIFICO */
    static public function mdlConsultarUsuarioEspecifico($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT   $tabla.id, $tabla.nombres, $tabla.apellidos, $tabla.id_cosecha, 
         cosechas.pago_kilo , registro.kilos, registro.fecha_registro   FROM $tabla  
      INNER JOIN registro ON registro.id_empleado=:dato
         INNER JOIN cosechas ON cosechas.id = $tabla.id_cosecha  
         WHERE $tabla.id=:dato");
        $stmt->bindParam(":dato",  $data["id_empleado"]);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
