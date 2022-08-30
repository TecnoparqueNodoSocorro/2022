<?php
require_once('../../controllers/controller_pagina.php');
require_once('../../models/model_pagina.php');

class ArticulosPag
{

    public function NewArticulo($data)
    {
        $NewArticulo = Controladorpagina::CtrNewArticulo($data);
        echo $NewArticulo;
    }

    public function CBOCateg($data){
        $CBO_cat=Controladorpagina::CtrCBcateg($data);
        $respuesta = json_encode($CBO_cat);
        echo ($respuesta);
    }

    public function CBOitems($data){
        $CBO_items=Controladorpagina::CrtBCitems($data);
        $respuesta= json_encode($CBO_items);
        echo ($respuesta);
    }
}


/* ------------------------------------------------------------------------------- */



if (isset($_POST['pag_datosarticulo'])) {
    $ajaxarticulo = new ArticulosPag();
    $data = $_POST['pag_datosarticulo'];
    $ajaxarticulo->NewArticulo($data);
}

if(isset ($_POST['datasesion'])){
    $cbcategoria=new ArticulosPag();
    $data= $_POST['datasesion'];
    $cbcategoria->CBOCateg($data);

}

if (isset($_POST['datacateg'])) {
    $cbitems=new ArticulosPag();
    $data= $_POST['datacateg'];
    $cbitems->CBOitems($data);
}




/* $respuesta = json_encode($pagoRecolector);
echo ($respuesta);
 */

 /* if(isset ($_POST[''])){
    
}
 */