<?php

class ControladorProveedor
{
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
