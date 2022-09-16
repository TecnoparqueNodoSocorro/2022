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

    public function CBOCateg($data)
    {
        $CBO_cat = Controladorpagina::CtrCBcateg($data);
        $respuesta = json_encode($CBO_cat);
        echo ($respuesta);
    }

    public function CBOitems($data)
    {
        $CBO_items = Controladorpagina::CrtBCitems($data);
        $respuesta = json_encode($CBO_items);
        echo ($respuesta);
    }

    //TRAER JSON COMPLETO CON LA INFORMACION DE LA PAGINA
    public function GetDataPag($data)
    {

        $pagina = Controladorpagina::ctrGetPag($data);
        $datos = json_encode($pagina);
        echo ($datos);
    }
    //------------------------------------------------------------
    //CAMBIAR ESTADO
    public function NewEstadoPag($data)
    {
        $NewEstado = Controladorpagina::CtrNewEstado($data);
        echo $NewEstado;
    }
    //------------------------------------------------------------

    //ELIMINAR PAGINA
    public function DeletePagina($data)
    {
        $NewEstado = Controladorpagina::ctrDeletePagina($data);
        echo $NewEstado;
    }
    //------------------------------------------------------------

    //EDITAR PAGINA
    public function EditPag($data)
    {
        $Updateprov = Controladorpagina::CtrUpdatePagina($data);
        echo $Updateprov;
    }
    //------------------------------------------------------------

}


/* ------------------------------------------------------------------------------- */



if (isset($_POST['pag_datosarticulo'])) {
    $ajaxarticulo = new ArticulosPag();
    $data = $_POST['pag_datosarticulo'];
    $ajaxarticulo->NewArticulo($data);
}

if (isset($_POST['datasesion'])) {
    $cbcategoria = new ArticulosPag();
    $data = $_POST['datasesion'];
    $cbcategoria->CBOCateg($data);
}

if (isset($_POST['datacateg'])) {
    $cbitems = new ArticulosPag();
    $data = $_POST['datacateg'];
    $cbitems->CBOitems($data);
}

/* ********************************************************* */

//TRAER JSON COMPLETO CON LA INFORMACION DE LA PAGINA
if (isset($_POST['DataPag'])) {
    $datos = new ArticulosPag();
    $data = $_POST['DataPag'];
    $datos->GetDataPag($data);
}
//CAMBIAR ESTADO
if (isset($_POST['data_NewEstado'])) {
    $Estado = new ArticulosPag();
    $data = $_POST['data_NewEstado'];
    $Estado->NewEstadoPag($data);
}

//ELIMINAR PAGINA 
if (isset($_POST['dataDeletePagina'])) {
    $pagina = new ArticulosPag();
    $data = $_POST['dataDeletePagina'];
    $pagina->DeletePagina($data);
}

//EDITAR PAGINA 
if (isset($_POST['DataEdit'])) {
    $EditPag = new ArticulosPag();
    $data = $_POST['DataEdit'];
    $EditPag->EditPag($data);
}
/* $respuesta = json_encode($pagoRecolector);
echo ($respuesta);
 */

 /* if(isset ($_POST[''])){
    
}
 */