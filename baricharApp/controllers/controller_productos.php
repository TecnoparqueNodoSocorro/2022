<?php


class ControladorProductos
{
    //traer 
    static public function ctrGetCategoriaProductos()
    {
        $tabla = "product_categorias";
        $RtanewArticulo = ModelProducto::mdlGetCategoriaProductos($tabla);
        return $RtanewArticulo;
    }
    //crear producto
    static public function CtrPostProducto($data)
    {
        $tabla = "productos";
        $rtaPostProducto = ModelProducto::mdlPostProducto($tabla, $data);
        return $rtaPostProducto;
    }
    //crear producto
    static public function CtrGetProductos()
    {
        $tabla = "productos";
        $rtaPostProducto = ModelProducto::mdlGetProductos($tabla);
        return $rtaPostProducto;
    }
    //CAMBIAR ESTADO
    static public function CtrNewEstadoPro($data)
    {
        $tabla = "productos";
        $RtaEstado = ModelProducto::MdlNewEstadoPro($tabla, $data);
        return $RtaEstado;
    }
    //DELETE PRODUCTO
    static public function ctrDeleteProducto($data)
    {
        $tabla = "productos";
        $RtaEstado = ModelProducto::mdlDeleteProducto($tabla, $data);
        return $RtaEstado;
    }
        //TRAER PRODUCTO
    static public function ctrGetProducto($data)
    {
        $tabla = "productos";
        $RtaEstado = ModelProducto::mdlGetProducto($tabla, $data);
        return $RtaEstado;
    }
        //EDITAR PAGINA
        static public function CtrEditProd($data)
        {
            $tabla = "productos";
            $rtaEdit = ModelProducto::mdlEditProd($tabla, $data);
            echo $rtaEdit;
        }
}
