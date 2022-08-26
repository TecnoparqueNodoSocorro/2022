<?php


class Controladorpagina
{
//crear
    static public function CtrNewArticulo($data)
    {
        $tabla="pagina";
        $RtanewArticulo=ModelPagina::MdlNewArticulo($tabla,$data);
        return $RtanewArticulo;
    }
}
