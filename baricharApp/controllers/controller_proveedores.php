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

    static public function CtrSelectProveedor($id_proveedor)
    {
        $tabla = "proveedores";
        $RtaSelectprovedor = ModelProveedor::MdlSelectProveedor($tabla, $id_proveedor);
        return $RtaSelectprovedor;
    }

    static public function CtrUpdateProveedor($id_proveedor)
    {
        $tabla = "proveedores";
        $RtaUpdateProveedores = ModelProveedor::MdlUpdateProveedor($tabla, $id_proveedor);
        return $RtaUpdateProveedores;
    }
}
