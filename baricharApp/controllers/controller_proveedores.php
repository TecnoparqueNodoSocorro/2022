<?php

class ControladorProveedor
{

    static public function CtrCrearProveedor($data)
    {
        $tabla = "proveedores";
        $RtanewProveedor = ModelNewProveedor::MdlNewproveedor($data, $tabla);
        return $RtanewProveedor;
    }
}
