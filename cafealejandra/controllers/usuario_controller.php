<?php

use function PHPSTORM_META\type;

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
        $datajson= json_encode($data);
        $jsonconsulta=json_encode($consulta);
        return $jsonconsulta .  $datajson;

     /*    if ($consulta["num_documento"] == $data->user  &&  $consulta["contrasena"] == $data->password) {
            $_SESSION["validar_ingreso"] = "ok";
            $_SESSION["perfil"] = $data->id_cargo;

        
           // presentacion de menu
            if ($consulta["id_cargo"] == 1) {
                //menu de empleado
                echo ' mostrar menu';
            } else {
                if ($consulta["id_cargo"] == 2) {
                    //MENU DE ENCARGADO
                    echo ' mostrar menu';
                } else {
                    if ($consulta["id_cargo"] == 3) {
                        //MENU DE ADMINISTRACION
                        echo ' mostrar menu';
                    }
                }
            }

       
        } else {
            return "error";
        } */
    }
}

    /*  
    static public function ctrFinalizarCosecha($data)
    {
        $tabla = "cosechas";
        $estado = 0;
        $rta = ModelCosecha::FinalizarCosecha($tabla, $data, $estado);

        return $rta;
    } */
