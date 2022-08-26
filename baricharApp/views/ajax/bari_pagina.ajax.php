<?php
require_once('../../controllers/controller_pagina.php');
require_once('../../models/model_pagina.php');

class CreateArticuloAjax{

public function CrearArticulo ($data)
{
$NewArticulo= Controladorpagina::CtrNewArticulo($data);
$respuesta= array("data"=>$NewArticulo);
echo json_encode($respuesta);
}

}


/* ------------------------------------------------------------------------------- */



if(isset($_POST['datosarticulo'])){
$ajaxarticulo=new CreateArticuloAjax();
$data= $_POST['datosarticulo'];
$ajaxarticulo->CrearArticulo($data);
}