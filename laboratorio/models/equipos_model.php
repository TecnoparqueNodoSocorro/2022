<?php

require_once "conexion.php";

class ModelEquipos
{
    // ----------REGISTRAR cliente-----------
    static public function mdlPostEquipo($tabla, $data)
    {
        try {
            $stmt = conexion::conectar();
            $consulta = $stmt->prepare("INSERT INTO $tabla (
            id_cliente, ubicacion, nombre, codigo, marca, modelo,
            fabricante, serie, lote, tipo, equipo, claficacion_bio,
            doc_sanitario, clasif_riesgo, pqs_oms, codigo_umdns, imagen,
            uso_previsto, fuente_alimentacion, tec_predominante, tension, corriente, potencia, 
            temperatura, humedad, peso, dimensiones, otro, magnitud, unidad_medida, 
            intervalo, division_escala, tipo_indicacion, clase, forma_adq, doc_adq,
            estado_adq, f_fabricacion, f_adq, f_recepcion, f_instal, f_venc_garantia,
            costo, vida_util, proveedor, tipo_intervencion, recurso_humano, frecuencia,
            metodo_desecho, responsable, recomendaciones
            ) 
            VALUES( 
            :id_cliente, :ubicacion, :nombre, :codigo, :marca, :modelo,
            :fabricante, :serie, :lote, :tipo, :equipo, :claficacion_bio,
            :doc_sanitario, :clasif_riesgo, :pqs_oms, :codigo_umdns, :imagen,
            :uso_previsto, :fuente_alimentacion, :tec_predominante, :tension, :corriente, :potencia, 
            :temperatura, :humedad, :peso, :dimensiones, :otro, :magnitud, :unidad_medida, 
            :intervalo, :division_escala, :tipo_indicacion, :clase, :forma_adq, :doc_adq,
            :estado_adq, :f_fabricacion, :f_adq, :f_recepcion, :f_instal, :f_venc_garantia,
            :costo, :vida_util, :proveedor, :tipo_intervencion, :recurso_humano, :frecuencia,
            :metodo_desecho, :responsable, :recomendaciones
            ) ");
            $consulta->bindParam(":id_cliente", $data["id_cliente"], PDO::PARAM_STR);
            $consulta->bindParam(":ubicacion",  $data["ubicacion"], PDO::PARAM_STR);
            $consulta->bindParam(":nombre",  $data["nombre"], PDO::PARAM_STR);
            $consulta->bindParam(":codigo",  $data["codigo"], PDO::PARAM_STR);
            $consulta->bindParam(":marca", $data["marca"], PDO::PARAM_STR);
            $consulta->bindParam(":modelo", $data["modelo"], PDO::PARAM_STR);
            $consulta->bindParam(":fabricante", $data["fabricante"], PDO::PARAM_STR);
            $consulta->bindParam(":serie", $data["serie"], PDO::PARAM_STR);
            $consulta->bindParam(":lote", $data["lote"], PDO::PARAM_STR);
            $consulta->bindParam(":tipo", $data["tipo"], PDO::PARAM_STR);
            $consulta->bindParam(":equipo", $data["equipo"], PDO::PARAM_STR);
            $consulta->bindParam(":claficacion_bio",  $data["claficacion_bio"], PDO::PARAM_STR);
            $consulta->bindParam(":doc_sanitario",  $data["doc_sanitario"], PDO::PARAM_STR);
            $consulta->bindParam(":clasif_riesgo",  $data["clasif_riesgo"], PDO::PARAM_STR);
            $consulta->bindParam(":pqs_oms", $data["pqs_oms"], PDO::PARAM_STR);
            $consulta->bindParam(":codigo_umdns", $data["codigo_umdns"], PDO::PARAM_STR);
            $consulta->bindParam(":imagen", $data["imagen"], PDO::PARAM_STR);
            $consulta->bindParam(":uso_previsto", $data["uso_previsto"], PDO::PARAM_STR);
            $consulta->bindParam(":fuente_alimentacion", $data["fuente_alimentacion"], PDO::PARAM_STR);
            $consulta->bindParam(":tec_predominante", $data["tec_predominante"], PDO::PARAM_STR);
            $consulta->bindParam(":tension", $data["tension"], PDO::PARAM_STR);
            $consulta->bindParam(":corriente",  $data["corriente"], PDO::PARAM_STR);
            $consulta->bindParam(":potencia",  $data["potencia"], PDO::PARAM_STR);
            $consulta->bindParam(":temperatura",  $data["temperatura"], PDO::PARAM_STR);
            $consulta->bindParam(":humedad", $data["humedad"], PDO::PARAM_STR);
            $consulta->bindParam(":peso", $data["peso"], PDO::PARAM_STR);
            $consulta->bindParam(":dimensiones", $data["dimensiones"], PDO::PARAM_STR);
            $consulta->bindParam(":otro", $data["otro"], PDO::PARAM_STR);
            $consulta->bindParam(":magnitud", $data["magnitud"], PDO::PARAM_STR);
            $consulta->bindParam(":unidad_medida", $data["unidad_medida"], PDO::PARAM_STR);
            $consulta->bindParam(":intervalo", $data["intervalo"], PDO::PARAM_STR);
            $consulta->bindParam(":division_escala",  $data["division_escala"], PDO::PARAM_STR);
            $consulta->bindParam(":tipo_indicacion",  $data["tipo_indicacion"], PDO::PARAM_STR);
            $consulta->bindParam(":clase",  $data["clase"], PDO::PARAM_STR);
            $consulta->bindParam(":forma_adq", $data["forma_adq"], PDO::PARAM_STR);
            $consulta->bindParam(":f_fabricacion", $data["f_fabricacion"], PDO::PARAM_STR);
            $consulta->bindParam(":f_adq", $data["f_adq"], PDO::PARAM_STR);
            $consulta->bindParam(":f_recepcion", $data["f_recepcion"], PDO::PARAM_STR);
            $consulta->bindParam(":doc_adq", $data["doc_adq"], PDO::PARAM_STR);
            $consulta->bindParam(":estado_adq", $data["estado_adq"], PDO::PARAM_STR);
            $consulta->bindParam(":f_instal", $data["f_instal"], PDO::PARAM_STR);
            $consulta->bindParam(":f_venc_garantia", $data["f_venc_garantia"], PDO::PARAM_STR);
            $consulta->bindParam(":costo",  $data["costo"], PDO::PARAM_STR);
            $consulta->bindParam(":vida_util",  $data["vida_util"], PDO::PARAM_STR);
            $consulta->bindParam(":proveedor",  $data["proveedor"], PDO::PARAM_STR);
            $consulta->bindParam(":tipo_intervencion", $data["tipo_intervencion"], PDO::PARAM_STR);
            $consulta->bindParam(":recurso_humano", $data["recurso_humano"], PDO::PARAM_STR);
            $consulta->bindParam(":frecuencia", $data["frecuencia"], PDO::PARAM_STR);
            $consulta->bindParam(":metodo_desecho", $data["metodo_desecho"], PDO::PARAM_STR);
            $consulta->bindParam(":responsable", $data["responsable"], PDO::PARAM_STR);
            $consulta->bindParam(":recomendaciones", $data["recomendaciones"], PDO::PARAM_STR);



            $lastId = ($stmt->lastInsertId());
            if ($consulta->execute()) {
                $lastId = $stmt->lastInsertId();

                return $lastId;
                $consulta->closeCursor();
                $consulta = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($consulta->errorInfo());
                $consulta->closeCursor();
                $consulta = null;
            }
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }

    //mostrar datos principales de los equipos para el inventario
    static public function mdlGetEquipos($tabla)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT $tabla.id, $tabla.id_cliente, c.nombre AS nombre_cliente, 
            $tabla.ubicacion, u.nombre AS nombre_ubicacion, $tabla.nombre, $tabla.codigo, $tabla.estado
            FROM $tabla
            INNER JOIN ubicaciones u ON $tabla.ubicacion= u.id INNER JOIN clientes c ON c.id= $tabla.id_cliente");
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
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /* --------------------POST COMPONENTES ASOCIADOS---------------------------------- */
    static public function mdlPostComponentesAsociados($tabla, $id_equipo, $data,  $id_cliente)
    {
        try {
            foreach ($data as $key => $value) {
                $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( 
                id_cliente, id_equipo, componente, marca, modelo, serie, cod_iden) 
                VALUES( 
                :id_cliente, :id_equipo, :componente, :marca, :modelo, :serie, :cod_iden ) ");
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_equipo",   $id_equipo);
                $stmt->bindParam(":componente", $value["componente"]);
                $stmt->bindParam(":marca", $value["marca"]);
                $stmt->bindParam(":modelo", $value["modelo"]);
                $stmt->bindParam(":serie", $value["serie"]);
                $stmt->bindParam(":cod_iden", $value["codigo"]);
                $stmt->execute();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return "Componentes guardados con exito";
    }
    /* --------------------POST RIESGOS ASOCIADOS---------------------------------- */
    static public function mdlPostRiesgosAsociados($tabla, $id_equipo, $data,  $id_cliente)
    {
        try {
            foreach ($data as $key => $value) {
                $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( 
                id_cliente, id_equipo, riesgo) 
                VALUES( 
                :id_cliente, :id_equipo, :riesgo) ");
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_equipo",   $id_equipo);
                $stmt->bindParam(":riesgo", $value["riesgo"]);
                $stmt->execute();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return "Riesgos guardados con exito";
    }
    /* --------------------POST PROCESOS DE LIEMPIEZA---------------------------------- */
    static public function mdlPostProcesosLimpieza($tabla, $id_equipo, $data,  $id_cliente)
    {
        try {
            foreach ($data as $key => $value) {
                $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( 
            id_cliente, id_equipo, proceso, metodo) 
            VALUES( 
            :id_cliente, :id_equipo, :proceso, :metodo) ");
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_equipo",   $id_equipo);
                $stmt->bindParam(":proceso", $value["proceso"]);
                $stmt->bindParam(":metodo", $value["metodo"]);
                $stmt->execute();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return "Procesos guardados con exito";
    }
    /* --------------------DESACTIVAR --------------------------------- */
    static public function mdlDesactivarEquipo($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET estado=0 WHERE id=:id ");
            $stmt->bindParam(":id", $data["id"]);

            if ($stmt->execute()) {
                $stmt->closeCursor();
                $stmt = null;
                return "Equipo desactivado";
            } else {
                print_r($data);
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /* --------------------ACTIVAR --------------------------------- */
    static public function mdlActivarEquipo($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET estado=1 WHERE id=:id ");
            $stmt->bindParam(":id", $data["id"]);

            if ($stmt->execute()) {

                $stmt->closeCursor();
                $stmt = null;
                return "Equipo activado";
            } else {
                print_r($data);
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /* ---------------------TRAER COMPONENTES POR EQUIPO --------------------------------- */
    static public function mdlTraerComponentesByEquipo($tabla, $id)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_equipo = $id ");

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
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /* ---------------------TRAER COMPONENTE POR ID --------------------------------- */
    static public function mdlTraerComponentesById($tabla, $idComponente)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = $idComponente ");

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
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /* --------------------EDITAR COMPONENTE --------------------------------- */
    static public function mdlEditarComponente($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET componente = :componente,
            marca = :marca, modelo = :modelo, serie = :serie, cod_iden= :codigo
            WHERE id=:id ");
            $stmt->bindParam(":marca", $data["marca"]);
            $stmt->bindParam(":componente", $data["componente"]);
            $stmt->bindParam(":modelo", $data["modelo"]);
            $stmt->bindParam(":serie", $data["serie"]);
            $stmt->bindParam(":codigo", $data["codigo"]);
            $stmt->bindParam(":id", $data["id"]);


            if ($stmt->execute()) {

                $stmt->closeCursor();
                $stmt = null;
                return "Componente editado";
            } else {

                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /* ---------------------TRAER DESCRIPCION GENERAL------------------------------------ */
    static public function mdlTraerDescripcion($tabla, $id)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT $tabla.nombre, $tabla.codigo, $tabla.marca, $tabla.modelo,
            $tabla.fabricante, $tabla.serie, $tabla.lote, $tabla.tipo, $tabla.equipo, $tabla.claficacion_bio, $tabla.doc_sanitario, $tabla.clasif_riesgo,
            $tabla.pqs_oms,	 $tabla.codigo_umdns, $tabla.imagen, $tabla.uso_previsto
             FROM $tabla WHERE id = $id "); 

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
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
