<?php

class ControladorProveedor
{

       //LOGIN
       static public function ctrLogin($data)
       {
           $tabla = "proveedores";
           $respuesta = ModelProveedor::mdlLogin($tabla, $data);
           // return $respuesta;
           if ($respuesta == false) {
               return "";
           } /* else if ($respuesta->estado == "0") {
               return "Usuario inactivo";
           }  */ else {
               //SI LA RESPUESTA DEL MODELO ES DIFERENTE A FALSO FUE PORQUE ENCONTRÓ COINCIDENCIA EN LOS DATOS QUE SE ENVIARION
               //SE CREA LA SESSION
               session_start();
               //SE CREAN LAS VARIABLES DE SESSION
               $_SESSION["validar_ingreso"] = "ok";
               $_SESSION["id_cargo"] = $respuesta->id_cargo;
               $_SESSION["id"] = $respuesta->id;
               $_SESSION["usuario"] = $respuesta->usuario;
               return $respuesta;
               //------------------------------------------
           }
       }
    static public function CtrNewProveedor($data)
    {
        $tabla = "proveedores";
        $RtanewProveedor = ModelProveedor::MdlNewproveedor($data, $tabla);
        return $RtanewProveedor;
    }
    static public function CtrSelectAllProveedor()
    {
        $tabla = "proveedores";
        $RtaSelectAllproveedores = ModelProveedor::MdlSelectAllProveedores($tabla);
        return $RtaSelectAllproveedores;
    }
    //consultar 1 proveedor por id
    static public function CtrInfoProveedor($data)
    {

        $tabla = "proveedores";
        $RtaInfoprovedor = ModelProveedor::MdlInfoProveedor($tabla, $data);
        return $RtaInfoprovedor;
    }
    //consultar la informacion de  para el home del proveedor
    static public function CtrInfoProveedorHome($dato)
    {
        $tabla = "proveedores";
        $RtaInfoprovedor = ModelProveedor::mdlInfoProveedorHome($tabla, $dato);
        return $RtaInfoprovedor;
    }



    /* modals */

    //------------actualizar vigencia-----ADMIN--------------------------------------------

    static public function CtrNewVigencia($data)
    {
        $tabla = "proveedores";
        $RtaVigencia = ModelProveedor::MdlNewVigencia($tabla, $data);
        return $RtaVigencia;
    }


    //---------------cambiar estado---ADMIN------------------------------------------
    static public function CtrNewEstado($data)
    {
        $tabla = "proveedores";
        $RtaEstado = ModelProveedor::MdlNewEstado($tabla, $data);
        return $RtaEstado;
    }

    //--------------------editar proveedor-ADMIN---------------------------------------
    static public function CtrUpdateProveedor($id_proveedor)
    {
        $tabla = "proveedores";
        $RtaUpdateProveedores = ModelProveedor::MdlUpdateProveedor($tabla, $id_proveedor);
        return $RtaUpdateProveedores;
    }
        //--------------------editar logo del proveedor-ADMIN---------------------------------------
        static public function CtrUpdateLogoProveedor($id_proveedor)
        {
            $tabla = "proveedores";
            $RtaUpdateProveedores = ModelProveedor::MdlUpdateLogoProveedor($tabla, $id_proveedor);
            return $RtaUpdateProveedores;
        }
    //-------------------Cambiar contraseña ADMIN-----------------------------------------
    static public function CtrNewPass($data)
    {
        $tabla = "proveedores";
        $RtaPassw = ModelProveedor::MdlNewPasssw($data, $tabla);
        return $RtaPassw;
    }
    //-------------------Editar info desde el rol de proveedor-----------------------------------------

    static public function ctrEditProv($data)
    {
        $tabla = "proveedores";
        $rtaEdit = ModelProveedor::mdlEditProv($tabla, $data,);
        return $rtaEdit;
    }

    //-------------------Cambiar contraseña desde el rol de proveedor-----------------------------------------
    static public function ctrNewPassProv($data)
    {
        $tabla = "proveedores";
        $RtaPassw = ModelProveedor::MdlNewPassProv($data, $tabla);
        return $RtaPassw;
    }
}
