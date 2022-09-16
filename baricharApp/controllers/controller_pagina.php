<?php


class Controladorpagina
{
    //crear
    static public function CtrNewArticulo($data)
    {
        $tabla = "pagina";
        $RtanewArticulo = ModelPagina::MdlNewArticulo($tabla, $data);
        return $RtanewArticulo;
    }
    //TRAER TODAS LAS PAGINAS PARA LISTARLAS
    static public function ctrGetPaginas()
    {
        $tabla = "pagina";
        $RtanewArticulo = ModelPagina::mdlGetPaginas($tabla);
        return $RtanewArticulo;
    }

    //consulta de combos
    static public function CtrCBcateg($sesion)
    {
        $tabla = "pg_categorias";
        $RtaCBcat = ModelPagina::CtrCBcategorias($tabla, $sesion);
        return $RtaCBcat;
    }

    static public function CrtBCitems($categ)
    {
        $tabla = "pg_categorias";
        $RtaCBitem = ModelPagina::CtrCBitems($tabla, $categ);
        return $RtaCBitem;
    }
    //traer una pagina
    static public function ctrGetPag($data)
    {

        $tabla = "pagina";
        $rta = ModelPagina::mdlGetPag($tabla, $data);
        return $rta;
    }
    //CAMBIAR ESTADO
    static public function CtrNewEstado($data)
    {
        $tabla = "pagina";
        $RtaEstado = ModelPagina::MdlNewEstado($tabla, $data);
        return $RtaEstado;
    }
    //DELETE PAGINA
    static public function ctrDeletePagina($data)
    {
        $tabla = "pagina";
        $RtaEstado = ModelPagina::mdlDeletePagina($tabla, $data);
        return $RtaEstado;
    }
    //EDITAR PAGINA
    static public function CtrUpdatePagina($data)
    {
        $tabla = "pagina";
        $RtaEstado = ModelPagina::mdlUpdatePagina($tabla, $data);
        echo $RtaEstado;
    }
}
