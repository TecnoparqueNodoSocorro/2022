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
}
