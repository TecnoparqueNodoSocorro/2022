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

    static public function CtrInfoProveedor($data)
    {
    
        $tabla = "proveedores";
        $RtaInfoprovedor = ModelProveedor::MdlInfoProveedor($tabla, $data);
        return $RtaInfoprovedor;
    }



    /* modals */


    static public function CtrNewVigencia($data)
    {
        $tabla = "proveedores";
        $RtaVigencia = ModelProveedor::MdlNewVigencia($tabla, $data);
        return $RtaVigencia;
    }


    static public function CtrNewEstado($data)
    {
        $tabla = "proveedores";
        $RtaEstado = ModelProveedor::MdlNewEstado($tabla, $data);
        return $RtaEstado;
    }

    static public function CtrUpdateProveedor($id_proveedor)
    {
        $tabla = "proveedores";
        $RtaUpdateProveedores = ModelProveedor::MdlUpdateProveedor($tabla, $id_proveedor);
        return $RtaUpdateProveedores;
    }

    static public function CtrNewPass($data)
    {
        $tabla = "proveedores";
        $RtaPassw = ModelProveedor::MdlNewPasssw($data, $tabla);
        return $RtaPassw;
    }

  
}
