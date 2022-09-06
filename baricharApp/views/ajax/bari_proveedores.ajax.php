<?php
require_once('../../controllers/controller_proveedores.php');
require_once('../../models/model_proveedores.php');

class ProveedoresAjax
{
    //crear proveedor -----------------------------------------------
    public function CrearProveedor($data)
    {
        $NewProveedor = ControladorProveedor::CtrNewProveedor($data);
        echo $NewProveedor;
    }
    //seleccionar proveedor------------------------------------------
    public function InfoProveedor($data)
    {

        $SelectProveedor = ControladorProveedor::CtrInfoProveedor($data);
        //$respuesta = array("data" => $SelectProveedor);
       // echo $respuesta;
       $datos = json_encode($SelectProveedor);
       echo($datos);
    }

    
    /* modales */

    //-------------------------------------------------------------
    public function NewVigenciaProv($data)
    {
        $NewVigencia = ControladorProveedor::CtrNewVigencia($data);
        /*  $RtaNewVigencia = array("data"=> $NewVigencia); 
        echo $RtaNewVigencia;*/
        echo $NewVigencia;
    }

    //------------------------------------------------------------
    public function NewEstadoProv($data)
    {
        $NewEstado = ControladorProveedor::CtrNewEstado($data);
        echo $NewEstado;
    }
  //------------------------------------------------------------
    public function EditProv($data)
    {
        $Updateprov = ControladorProveedor::CtrUpdateProveedor($data);
        echo $Updateprov;
    }
    //------------------------------------------------------------
    public function NewPasswProv($data)
    {
        $NewPass = ControladorProveedor::CtrNewPass($data);
        echo $NewPass;
    }
}


/* ********************************************************* */
/* ********************************************************* */
 //crear proveedor
if (isset($_POST['datos_proveedor'])) {
    $ajaxproveedor = new ProveedoresAjax(); 
     
    $data = $_POST['datos_proveedor'];
    $ajaxproveedor->CrearProveedor($data);
}

    //informacion proveedor----
if (isset($_POST['info_proveedor'])) {
    $ajaxInfoproveedor = new ProveedoresAjax();
    $data = $_POST['info_proveedor'];
    $ajaxInfoproveedor->InfoProveedor($data);
  
}



/* ********************************************************* */

if (isset($_POST['data_VigNew'])) {
    $vigencia = new  ProveedoresAjax();
    $data = $_POST['data_VigNew'];
    $vigencia->NewVigenciaProv($data);
}

if (isset($_POST['data_NewEstado'])) {
    $Estado = new ProveedoresAjax();
    $data = $_POST['data_NewEstado'];
    $Estado->NewEstadoProv($data);
}

if (isset($_POST['data_editprov'])) {
    $EditProv = new ProveedoresAjax();
    $data = $_POST['data_editprov'];
    $EditProv->EditProv($data);
}

if (isset($_POST['data_Newpass'])) {
    $passwnew = new ProveedoresAjax();
    $data = $_POST['data_Newpass'];
    $passwnew->NewPasswProv($data);
}

