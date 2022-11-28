<?php
require_once "../../controllers/equipos_controller.php";
require_once "../../models/equipos_model.php";


class EquiposAjax
{
    public $controlador;


    //GUARDAR equipo
    public function PostEquipo($data)
    {
        $newEquipo = ControladorEquipos::CtrPostEquipo($data);
        echo $newEquipo;
    }
    /* --------------------POST COMPONENTES ASOCIADOS---------------------------------- */
    public function PostComponentesAsociados($id_equipo, $data,  $id_cliente)
    {
        $RtaDetalleComp = ControladorEquipos::ctrPostComponentesAsociados($id_equipo, $data,  $id_cliente);
        echo json_encode($RtaDetalleComp);
    }
    /* --------------------POST RIESGOS ASOCIADOS---------------------------------- */
    public function PostRiesgosAsociados($id_equipo, $data,  $id_cliente)
    {
        $RtaDetalleRiesgos = ControladorEquipos::ctrPostRiesgosAsociados($id_equipo, $data,  $id_cliente);
        echo json_encode($RtaDetalleRiesgos);
    }
    /* --------------------POST PROCESOS DE LIEMPIEZA ---------------------------------- */
    public function PostProcesosLimpieza($id_equipo, $data,  $id_cliente)
    {
        $RtaDetalleLimp = ControladorEquipos::ctrPostProcesosLimpieza($id_equipo, $data,  $id_cliente);
        echo json_encode($RtaDetalleLimp);
    }
    /* --------------------ACTIVAR O DESACTIVAR ---------------------------------- */
    public function Activar_Desactivar($data)
    {
        $datosAct = ControladorEquipos::ctrActivar_Desactivar($data);
        echo json_encode($datosAct);
    }
    /* -------------------TRAER COMPONENTES POR EQUIPO ---------------------------------- */
    public function TraerComponentesByEquipo($id)
    {
        $datosAct = ControladorEquipos::ctrTraerComponentesByEquipo($id);
        echo json_encode($datosAct);
    }
    /* -------------------TRAER COMPONENTE POR ID ---------------------------------- */
    public function TraerComponentesById($id)
    {
        $datosAct = ControladorEquipos::ctrTraerComponentesById($id);
        echo json_encode($datosAct);
    }
    /* ------------------ EDITAR COMPONENTE ---------------------------------- */
    public function EditarComponente($id)
    {
        $datosAct = ControladorEquipos::ctrEditarComponente($id);
        echo json_encode($datosAct);
    }
    /* -------------------TRAER DESCRIPCION GENERAL---------------------------------- */
    public function TraerDescripcion($id)
    {
        $datosAct = ControladorEquipos::ctrTraerDescripcion($id);
        echo json_encode($datosAct);
    }
    //editar descripcion  equipo
    public function EditDescripcion($data)
    {
        $newEquipo = ControladorEquipos::CtrEditDescripcionEquipo($data);
        echo $newEquipo;
    }
    //editar imagen  equipo
    public function EditImagenEquipo($data)
    {
        $newEquipo = ControladorEquipos::CtrEditImagenEquipo($data);
        echo $newEquipo;
    }
    //editar ubicacion  equipo
    public function EditUbicacion($data)
    {
        $newEquipo = ControladorEquipos::CtrEditUbicacion($data);
        echo $newEquipo;
    }
    //editar registro tecnico  equipo
    public function EditarRegistroTecnico($data)
    {
        $newEquipo = ControladorEquipos::CtrEditarRegistroTecnico($data);
        echo $newEquipo;
    }

    //editar caraceteristicas metrologicas
    public function EditarCaracteristicasMetro($data)
    {
        $newEquipo = ControladorEquipos::CtrEditarCaracteristicasMetro($data);
        echo $newEquipo;
    }
    //editar registro historico
    public function EditarRegistroHistorico($data)
    {
        $newEquipo = ControladorEquipos::CtrEditarRegistroHistorico($data);
        echo $newEquipo;
    }
    //editar TIPO DE INTERVENCIONES REQUERIDAS, DISPOSICIÓN FINAL, RECOMENDACIONES DE USO Y CUIDADO
    public function EditarResto($data)
    {
        $newEquipo = ControladorEquipos::CtrEditarResto($data);
        echo $newEquipo;
    }
    //traer riesgos asociados por equipo
    public function TraerRiesgosByEquipo($data)
    {
        $rta = ControladorEquipos::CtrTraerRiesgosByEquipo($data);
        echo  json_encode($rta);
    }
    //traer procesos limpieza por equipo
    public function TraerProcesosByEquipo($data)
    {
        $rta = ControladorEquipos::CtrTraerProcesosByEquipoo($data);
        echo  json_encode($rta);
    }
}
//------------------------------------------------------------------------
//GUARDAR equipo
// imagen generica
$rutaimagen = "../../images/registro_equipo/imagen_defecto.jpg";
// directorio de almacenamiento de imagenes 
$raizImagenes = "../../images/registro_equipo";
if (
    !empty($_POST['regEqui_cliente']) ||
    !empty($_POST['regEqui_ubic']) ||
    !empty($_POST['regEqui_nombre']) ||
    !empty($_POST['regEqui_ident']) ||
    !empty($_POST['regEqui_marcaRE']) ||
    !empty($_POST['regEqui_modeloRE']) ||
    !empty($_POST['regEqui_fabr']) ||
    !empty($_POST['regEqui_serieRE']) ||
    !empty($_POST['regEqui_lote']) ||
    !empty($_POST['regEqui_tipo']) ||
    !empty($_POST['regEqui_equipo']) ||
    !empty($_POST['regEqui_clasificacion_bio']) ||
    !empty($_POST['regEqui_doc_sanitario']) ||
    !empty($_POST['regEqui_clasificacion_riesgo']) ||
    !empty($_POST['regEqui_pqs_oms']) ||
    !empty($_POST['regEqui_codigo_umdns']) ||
    !empty($_POST['regEqui_uso_previsto']) ||
    !empty($_POST['regEqui_fuente_alimentacion']) ||
    !empty($_POST['regEqui_tec_predominante'])  ||
    !empty($_POST['regEqui_tension']) ||
    !empty($_POST['regEqui_corriente']) ||
    !empty($_POST['regEqui_potencia']) ||
    !empty($_POST['regEqui_temperatura']) ||
    !empty($_POST['regEqui_humedad']) ||
    !empty($_POST['regEqui_peso']) ||
    !empty($_POST['regEqui_dimensiones']) ||
    !empty($_POST['regEqui_otros']) ||
    !empty($_POST['regEqui_magnitud']) ||
    !empty($_POST['regEqui_unidad_medida']) ||
    !empty($_POST['regEqui_intervalo']) ||
    !empty($_POST['regEqui_division_escala']) ||
    !empty($_POST['regEqui_indicacion']) ||
    !empty($_POST['regEqui_clase']) ||
    !empty($_POST['regEqui_forma_adquisicion']) ||
    !empty($_POST['regEqui_doc_adquisicion']) ||
    !empty($_POST['regEqui_estado_adquisicion']) ||
    !empty($_POST['regEqui_f_fabricacion']) ||
    !empty($_POST['regEqui_f_adquisicion']) ||
    !empty($_POST['regEqui_f_recepcion']) ||
    !empty($_POST['regEqui_f_instalacion']) ||
    !empty($_POST['regEqui_f_vengarantia']) ||
    !empty($_POST['regEqui_costo']) ||
    !empty($_POST['regEqui_vida_util']) ||
    !empty($_POST['regEqui_proveedor']) ||
    !empty($_POST['regEqui_tipo_intervencion']) ||
    !empty($_POST['regEqui_recurso_humano']) ||
    !empty($_POST['regEqui_frecuencia']) ||
    !empty($_POST['regEqui_metodo_desecho']) ||
    !empty($_POST['regEqui_responsable']) ||
    !empty($_POST['regEqui_recomendaciones'])

) {  //-------------------IMAGEN --------------------------------------
    if (empty($_FILES['imagen_equipo']['tmp_name'])) {
        $error = true;
        $mensaje[] = ('Por favor, seleccione una foto para enviar.');
    } else {
        if (isset($_FILES["imagen_equipo"]["tmp_name"])) {
            $newAncho = 300;
            $newAlto = 300;
            list($ancho, $alto) = getimagesize($_FILES["imagen_equipo"]["tmp_name"]);
            if (!file_exists($raizImagenes))
                mkdir($raizImagenes, 0755);
            $dateLoad = new DateTime();
            $nameRandom =  $dateLoad->getTimestamp();

            if ($_FILES["imagen_equipo"]["type"] == "image/png") {
                $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
                $orige = imagecreatefrompng($_FILES["imagen_equipo"]["tmp_name"]);
                $destino = imagecreatetruecolor($newAncho, $newAlto);
                imagealphablending($destino, false);
                imagesavealpha($destino, true);
                $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
                imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
                imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
                imagepng($destino, $rutaimagen);
            } else if ($_FILES["imagen_equipo"]["type"] == "image/jpeg") {
                $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
                $orige = imagecreatefromjpeg($_FILES["imagen_equipo"]["tmp_name"]);
                $destino = imagecreatetruecolor($newAncho, $newAlto);
                imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
                imagejpeg($destino, $rutaimagen);
            } else if ($_FILES["imagen_equipo"]["type"] == "image/jpg") {
                $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
                $orige = imagecreatefromjpeg($_FILES["imagen_equipo"]["tmp_name"]);
                $destino = imagecreatetruecolor($newAncho, $newAlto);
                imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
                imagejpeg($destino, $rutaimagen);
            }
        }
    }

    $datos = new EquiposAjax();
    $data = array(
        "id_cliente" => $_POST['regEqui_cliente'],
        "ubicacion" => $_POST['regEqui_ubic'],
        "nombre" => $_POST['regEqui_nombre'],
        "codigo" => $_POST['regEqui_ident'],
        "marca" => $_POST['regEqui_marcaRE'],
        "modelo" => $_POST['regEqui_modeloRE'],
        "fabricante" => $_POST['regEqui_fabr'],
        "serie" => $_POST['regEqui_serieRE'],
        "lote" => $_POST['regEqui_lote'],
        "tipo" => $_POST['regEqui_tipo'],
        "equipo" => $_POST['regEqui_equipo'],
        "claficacion_bio" => $_POST['regEqui_clasificacion_bio'],
        "doc_sanitario" => $_POST['regEqui_doc_sanitario'],
        "clasif_riesgo" => $_POST['regEqui_clasificacion_riesgo'],
        "pqs_oms" => $_POST['regEqui_pqs_oms'],
        "codigo_umdns" =>  $_POST['regEqui_codigo_umdns'],
        //imagen
        "imagen" => $rutaimagen,
        "uso_previsto" => $_POST['regEqui_uso_previsto'],
        "fuente_alimentacion" => $_POST['regEqui_fuente_alimentacion'],
        "tec_predominante" => $_POST['regEqui_tec_predominante'],
        "tension" => $_POST['regEqui_tension'],
        "corriente" => $_POST['regEqui_corriente'],
        "potencia" => $_POST['regEqui_potencia'],
        "temperatura" => $_POST['regEqui_temperatura'],
        "humedad" => $_POST['regEqui_humedad'],
        "peso" => $_POST['regEqui_peso'],
        "dimensiones" => $_POST['regEqui_dimensiones'],
        "otro" =>  $_POST['regEqui_otros'],
        "magnitud" => $_POST['regEqui_magnitud'],
        "unidad_medida" => $_POST['regEqui_unidad_medida'],
        "intervalo" => $_POST['regEqui_intervalo'],
        "division_escala" => $_POST['regEqui_division_escala'],
        "tipo_indicacion" => $_POST['regEqui_indicacion'],
        "clase" => $_POST['regEqui_clase'],
        "forma_adq" => $_POST['regEqui_forma_adquisicion'],
        "doc_adq" => $_POST['regEqui_doc_adquisicion'],
        "estado_adq" => $_POST['regEqui_estado_adquisicion'],
        "f_fabricacion" => $_POST['regEqui_f_fabricacion'],
        "f_adq" => $_POST['regEqui_f_adquisicion'],
        "f_recepcion" => $_POST['regEqui_f_recepcion'],
        "f_instal" => $_POST['regEqui_f_instalacion'],
        "f_venc_garantia" =>  $_POST['regEqui_f_vengarantia'],
        "costo" => $_POST['regEqui_costo'],
        "vida_util" => $_POST['regEqui_vida_util'],
        "proveedor" => $_POST['regEqui_proveedor'],
        "tipo_intervencion" => $_POST['regEqui_tipo_intervencion'],
        "recurso_humano" => $_POST['regEqui_recurso_humano'],
        "frecuencia" => $_POST['regEqui_frecuencia'],
        "metodo_desecho" => $_POST['regEqui_metodo_desecho'],
        "responsable" => $_POST['regEqui_responsable'],
        "recomendaciones" => $_POST['regEqui_recomendaciones'],


    );
    //print_r($data);
    $datos->PostEquipo($data);
}
//------------------------------------------------------------------------
//guardar componentes asociados
if (isset($_POST['id_equipo']) && isset($_POST['componentes']) && isset($_POST['id_cliente'])) {

    $ajaxDetalle = new EquiposAjax();
    $data = JSON_decode($_POST['componentes'], true);
    $id_equipo = $_POST['id_equipo'];
    $id_cliente = $_POST['id_cliente'];
    $ajaxDetalle->PostComponentesAsociados($id_equipo, $data,  $id_cliente);
}

//guardar riesgos asociados
if (isset($_POST['id_equipo']) && isset($_POST['riesgos']) && isset($_POST['id_cliente'])) {

    $ajaxDetalle = new EquiposAjax();
    $data = JSON_decode($_POST['riesgos'], true);
    $id_equipo = $_POST['id_equipo'];
    $id_cliente = $_POST['id_cliente'];
    $ajaxDetalle->PostRiesgosAsociados($id_equipo, $data,  $id_cliente);
}

//guardar porcesos de liempieza
if (isset($_POST['id_equipo']) && isset($_POST['proceso']) && isset($_POST['id_cliente'])) {

    $ajaxDetalle = new EquiposAjax();
    $data = JSON_decode($_POST['proceso'], true);
    $id_equipo = $_POST['id_equipo'];
    $id_cliente = $_POST['id_cliente'];

    $ajaxDetalle->PostProcesosLimpieza($id_equipo, $data,  $id_cliente);
}


//activar o desactivar
if (isset($_POST['id']) && isset($_POST['estado'])) {
    $postData = new EquiposAjax();

    $data = array(
        "id" => $_POST["id"],
        "estado" => $_POST["estado"],
    );
    $postData->Activar_Desactivar($data);
}

//traer componentes
if (isset($_POST['traerComponentes'])) {
    $postData = new EquiposAjax();
    $id = $_POST['traerComponentes'];
    $postData->TraerComponentesByEquipo($id);
}
//traer componente por id
if (isset($_POST['idComponente'])) {
    $postData = new EquiposAjax();
    $idComponente = $_POST['idComponente'];
    $postData->TraerComponentesById($idComponente);
}
//editar componente
if (isset($_POST['dataComponent'])) {
    $postData = new EquiposAjax();
    $data = $_POST['dataComponent'];
    $postData->EditarComponente($data);
}
//traer descripcion general
if (isset($_POST['traerDescrip'])) {
    $postData = new EquiposAjax();
    $id = $_POST['traerDescrip'];
    $postData->TraerDescripcion($id);
}

//editar descripcion equipo
if (
    !empty($_POST['id_oculto_registro']) ||
    !empty($_POST['regEqui_nombre_edit']) ||
    !empty($_POST['regEqui_ident_edit']) ||
    !empty($_POST['regEqui_marca_edit']) ||
    !empty($_POST['regEqui_modelo_edit']) ||
    !empty($_POST['regEqui_fabr_edit']) ||
    !empty($_POST['regEqui_serie_edit']) ||
    !empty($_POST['regEqui_lote_edit']) ||
    !empty($_POST['regEqui_tipo_edit']) ||
    !empty($_POST['regEqui_equipo_edit']) ||
    !empty($_POST['regEqui_clasificacion_bio_edit']) ||
    !empty($_POST['regEqui_doc_sanitario_edit']) ||
    !empty($_POST['regEqui_clasificacion_riesgo_edit']) ||
    !empty($_POST['regEqui_pqs_oms_edit']) ||
    !empty($_POST['regEqui_codigo_umdns_edit']) ||
    !empty($_POST['regEqui_uso_previsto_edit'])

) {

    $datos = new EquiposAjax();
    $data = array(
        "id" => $_POST['id_oculto_registro'],

        "nombre" => $_POST['regEqui_nombre_edit'],
        "codigo" => $_POST['regEqui_ident_edit'],
        "marca" => $_POST['regEqui_marca_edit'],
        "modelo" => $_POST['regEqui_modelo_edit'],
        "fabricante" => $_POST['regEqui_fabr_edit'],
        "serie" => $_POST['regEqui_serie_edit'],
        "lote" => $_POST['regEqui_lote_edit'],
        "tipo" => $_POST['regEqui_tipo_edit'],
        "equipo" => $_POST['regEqui_equipo_edit'],
        "claficacion_bio" => $_POST['regEqui_clasificacion_bio_edit'],
        "doc_sanitario" => $_POST['regEqui_doc_sanitario_edit'],
        "clasif_riesgo" => $_POST['regEqui_clasificacion_riesgo_edit'],
        "pqs_oms" => $_POST['regEqui_pqs_oms_edit'],
        "codigo_umdns" =>  $_POST['regEqui_codigo_umdns_edit'],
        "uso_previsto" => $_POST['regEqui_uso_previsto_edit']


    );
    //print_r($data);
    $datos->EditDescripcion($data);
}


//EDITAR imagen equipo
if (
    !empty($_POST['id_oculto_registro'])
) {
    //-------------------EDITAR IAMGEN 1--------------------------------------
    // imagen generica
    $rutaimagen = "../../images/registro_equipo/imagen_defecto.jpg";
    // directorio de almacenamiento de imagenes 
    $raizImagenes = "../../images/registro_equipo";
    if (!empty($_FILES["imagen_equipo_edit"]["tmp_name"])) {
        $newAncho = 300;
        $newAlto = 300;
        list($ancho, $alto) = getimagesize($_FILES["imagen_equipo_edit"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom =  $dateLoad->getTimestamp();
        if ($_FILES["imagen_equipo_edit"]["type"] == "image/png") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["imagen_equipo_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen);
            $EditP = new EquiposAjax();
            $data = array(
                "id" => $_POST["id_oculto_registro"],
                "imagen" => $rutaimagen,
            );
            //print_r($data);

            $EditP->EditImagenEquipo($data);
        } else if ($_FILES["imagen_equipo_edit"]["type"] == "image/jpeg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["imagen_equipo_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
            $EditP = new EquiposAjax();
            $data = array(
                "id" => $_POST["id_oculto_registro"],
                "imagen" => $rutaimagen,
            );
            //print_r($data);

            $EditP->EditImagenEquipo($data);
        } else if ($_FILES["imagen_equipo_edit"]["type"] == "image/jpg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["imagen_equipo_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
            $EditP = new EquiposAjax();
            $data = array(
                "id" => $_POST["id_oculto_registro"],
                "imagen" => $rutaimagen,
            );
            //print_r($data);

            $EditP->EditImagenEquipo($data);
        }
    }
}

//editar ubicacion
if (isset($_POST['equipo']) && isset($_POST['new_ubic'])) {
    $postData = new EquiposAjax();

    $data = array(
        "id" => $_POST["equipo"],
        "ubicacion" => $_POST["new_ubic"],
    );
    $postData->EditUbicacion($data);
}

//editar registro tecnico
if (isset($_POST['datosRegistroTecnico'])) {
    $postData = new EquiposAjax();
    $data = $_POST['datosRegistroTecnico'];
    $postData->EditarRegistroTecnico($data);
}

//editar caracetristicas metrologicas
if (isset($_POST['datosCaracteristicasMetro'])) {
    $postData = new EquiposAjax();
    $data = $_POST['datosCaracteristicasMetro'];
    $postData->EditarCaracteristicasMetro($data);
}

//editar registro histórico
if (isset($_POST['datosRegistroHistorico'])) {
    $postData = new EquiposAjax();
    $data = $_POST['datosRegistroHistorico'];
    $postData->EditarRegistroHistorico($data);
}
//editar TIPO DE INTERVENCIONES REQUERIDAS, DISPOSICIÓN FINAL, RECOMENDACIONES DE USO Y CUIDADO
if (isset($_POST['datosResto'])) {
    $postData = new EquiposAjax();
    $data = $_POST['datosResto'];
    $postData->EditarResto($data);
}
//traer riesgos
if (isset($_POST['TraerRiesgosA'])) {
    $postData = new EquiposAjax();
    $id = $_POST['TraerRiesgosA'];
    $postData->TraerRiesgosByEquipo($id);
}

//traer procesos
if (isset($_POST['TraerProcesos'])) {
    $postData = new EquiposAjax();
    $id = $_POST['TraerProcesos'];
    $postData->TraerProcesosByEquipo($id);
}
