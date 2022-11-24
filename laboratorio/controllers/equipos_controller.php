<?php


class ControladorEquipos
{

    //CREAR equipo
    static public function CtrPostEquipo($data)
    {
        $tabla = "registro_equipo";
        $respuesta = ModelEquipos::mdlPostEquipo($tabla, $data);
        echo $respuesta;
    }

    //traer equipo
    static public function CtrGetEquipos()
    {
        $tabla = "registro_equipo";
        $respuesta = ModelEquipos::mdlGetEquipos($tabla);
        return $respuesta;
    }

    /* --------------------POST COMPONENTES ASOCIADOS--------------------------------- */
    static public function ctrPostComponentesAsociados($id_equipo, $data,  $id_cliente)
    {
        $tabla = "componentes_asociados";

        $componenetesAsociados = ModelEquipos::mdlPostComponentesAsociados($tabla, $id_equipo,  $data,  $id_cliente);
        return $componenetesAsociados;
    }
    /* --------------------POST riesgos ASOCIADOS--------------------------------- */
    static public function ctrPostRiesgosAsociados($id_equipo, $data,  $id_cliente)
    {
        $tabla = "riesgos_asociados";

        $riesgosAsociados = ModelEquipos::mdlPostRiesgosAsociados($tabla, $id_equipo,  $data,  $id_cliente);
        return $riesgosAsociados;
    }
    /* --------------------POST PROCESOS DE LIEMPIEZA--------------------------------- */
    static public function ctrPostProcesosLimpieza($id_equipo, $data,  $id_cliente)
    {
        $tabla = "proceso_limpieza";
        $metodosLimpieza = ModelEquipos::mdlPostProcesosLimpieza($tabla, $id_equipo,  $data,  $id_cliente);
        return $metodosLimpieza;
    }
    /* --------------------ACTIVAR O DESACTIVAR--------------------------------- */
    static public function ctrActivar_Desactivar($data)
    {

        if ($data["estado"] == "1") {

            $tabla = "registro_equipo";
            $results = ModelEquipos::mdlDesactivarEquipo($tabla, $data);
            return $results;
        } else if ($data["estado"] == "0") {
            $tabla = "registro_equipo";
            $results = ModelEquipos::mdlActivarEquipo($tabla, $data);
            return $results;
        }
    }

    /* -------------------TRAER COMPONENTES POR EQUIPO --------------------------------- */
    static public function ctrTraerComponentesByEquipo($id)
    {
        $tabla = "componentes_asociados";
        $results = ModelEquipos::mdlTraerComponentesByEquipo($tabla, $id);
        return $results;
    }
    /* -------------------TRAER COMPONENTE POR ID -------------------------------- */
    static public function ctrTraerComponentesById($idComponente)
    {
        $tabla = "componentes_asociados";
        $results = ModelEquipos::mdlTraerComponentesById($tabla, $idComponente);
        return $results;
    }
    /* -------------------TRAER COMPONENTE POR ID -------------------------------- */
    static public function ctrEditarComponente($data)
    {
        $tabla = "componentes_asociados";
        $results = ModelEquipos::mdlEditarComponente($tabla, $data);
        return $results;
    }
        /* -------------------TRAER DESCRIPCION GENERAL----------------------------------- */
        static public function ctrTraerDescripcion($id)
        {
            $tabla = "registro_equipo";
            $results = ModelEquipos::mdlTraerDescripcion($tabla, $id);
            return $results;
        }
}
