<?php


class ControladorUsuario
{

    static public function ctrAgregarUsuario($data)
    {
        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlregistroUsuario($tabla, $data);
        return $respuesta;
    }


    /*     CONSULTAR TODOS LOS USUARIOS*/
    static public function ctrConsultarUsuario()
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuario($tabla);
        return  $consulta;
    }


    /*     CONSULTAR  LOS USUARIOS POR COSECHA*/
    static public function ctrConsultarUsuarioCosecha($dato)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuarioCosecha($tabla, $dato);
        return  $consulta;
    }


    /*     CONSULTAR  LOS RECOLECTORES POR COSECHA*/
    static public function ctrConsultarUsuarioCosechaRecolector($dato)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuarioCosechaRecolector($tabla, $dato);
        return  $consulta;
    }


    /*     CONSULTAR  LOS ENCARGADOS POR COSECHA*/
    static public function ctrConsultarEncargadoCosecha($dato)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarEncargadoCosecha($tabla, $dato);
        return  $consulta;
    }


    /*     CONSULTAR  USUARIO EN ESPECIFICO POR COSECHA*/
    static public function ctrConsultarUsuarioEspecifico($data)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuarioEspecifico($tabla, $data);
        return  $consulta;
    }
    /*   LOGIN */
    static public function ctrLogin($data)
    {

        $tabla = "empleados";
        $consulta = ModelUsuario::mdlLogin($tabla, $data);
        return  $consulta;
    }

    /*  
    static public function ctrFinalizarCosecha($data)
    {
        $tabla = "cosechas";
        $estado = 0;
        $rta = ModelCosecha::FinalizarCosecha($tabla, $data, $estado);

        return $rta;
    } */
}
