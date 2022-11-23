<?php


class ControladorEquipos
{

    //CREAR usuario
    static public function CtrPostEquipo($data)
    {
        $tabla = "registro_equipo";
        $respuesta = ModelEquipos::mdlPostEquipo($tabla, $data);
        echo $respuesta;
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
    static public function ctrPostProcesosLimpieza  ($id_equipo, $data,  $id_cliente)
    {
        $tabla = "proceso_limpieza";
        $metodosLimpieza = ModelEquipos::mdlPostProcesosLimpieza($tabla, $id_equipo,  $data,  $id_cliente);
        return $metodosLimpieza;
    }
}
