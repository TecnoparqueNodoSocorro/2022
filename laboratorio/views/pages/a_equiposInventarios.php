<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] == "3") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

$equipos = ControladorEquipos::CtrGetEquipos();
//print_r($equipos);
?>

<div class="container">
<h1 class="text-center fs-4">Inventario de los equipos</h1>

    <div class="table-responsive mt-3 mb-5">
        <table class="table table-primary  table-sm table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Menú</th>
                    <th>Equipo</th>
                    <th>Cliente</th>
                    <th>Ubicacion</th>
                    <th>Código</th>
                    <th style="width: 100px !important;">Imagen</th>
                    <th>Estado</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $key => $value) : ?>

                    <tr>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-chevron-double-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerDescrip dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_descripcion">Descripción del equipo</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-id_cliente="<?php echo $value["id_cliente"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editUbic dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_ubicacion">Cambiar ubicación</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerComponentes dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_componentes">Componentes</a></li>
                                    <li><a  data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerRiesgosA dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_riesgosAsociados">Riesgos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editRegistro dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_registrotecnico">Registro técnico</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editCaract dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_caracteristicasMetro">Características metrológicas</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editRegisHst dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_registroHistorico">Registro histórico</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="traerProcesos dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_procesosLimpieza">Procesos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="restoEdiciones dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_restoEdiciones">Intervenciones y disposición final</a></li>
                                    <li><a class="dropdown-item" href="#">Documentos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-estado=" <?php echo $value["estado"] ?>" class="ActDesact dropdown-item" href="#">
                                            <?php echo $value["estado"] == "1" ? 'Desactivar' : 'Activar' ?>

                                        </a></li>

                                </ul>
                            </div>
                        </td>
                        <td><?php echo $value["nombre"] ?></td>
                        <td><?php echo $value["nombre_cliente"] ?></td>
                        <td><?php echo $value["nombre_ubicacion"] ?></td>
                        <td><?php echo $value["codigo"] ?></td>
                        <td>

                            <picture>
                                <source srcset="views/views/<?php echo $value["imagen"] ?>" type="image/svg+xml">
                                <img src="views/views/<?php echo $value["imagen"] ?>" class="img-fluid img-thumbnail" alt="<?php echo $value["nombre"] ?>">
                            </picture>
                        </td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == "1" ? 'Activo' : 'Inactivo' ?></td>


                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>
<!-- Modal descripcion del equipo editar -->
<div class="modal fade" id="modal_descripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="formEdit" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title text-white" id="titulo_modal_descrip"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <!-- ID OCULTO DEL REGISTRO PARA ENVIAR EN EL FORM DATA -->
                            <input type="hidden" name="id_oculto_registro" id="id_oculto_registro">
                            <div class="mb-3">

                                <label class="form-label">
                                    <h6>Equipo</h6>
                                </label>
                                <input type="text" placeholder="Equipo" name="regEqui_nombre_edit" id="regEqui_nombre_edit" class="input-caja">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Código identificacion</h6>
                                </label>
                                <input type="text" placeholder="Código identificacion" name="regEqui_ident_edit" id="regEqui_ident_edit" class="input-caja">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Marca</h6>
                                </label>
                                <input type="text" placeholder="Marca" class="input-caja" name="regEqui_marca_edit" id="regEqui_marca_edit">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Modelo</h6>
                                </label>
                                <input type="text" placeholder="Modelo" class="input-caja" name="regEqui_modelo_edit" id="regEqui_modelo_edit">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Fabricante</h6>
                                </label>
                                <input type="text" placeholder="Fabricante" class="input-caja" name="regEqui_fabr_edit" id="regEqui_fabr_edit">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Serie</h6>
                                </label>
                                <input type="text" placeholder="Serie" class="input-caja" name="regEqui_serie_edit" id="regEqui_serie_edit">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Lote</h6>
                                </label>
                                <input type="text" placeholder="Lote" class="input-caja" name="regEqui_lote_edit" id="regEqui_lote_edit">
                            </div>
                        </div>


                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Tipo</h6>
                                </label>
                                <input type="text" placeholder="Tipo" class="input-caja" name="regEqui_tipo_edit" id="regEqui_tipo_edit">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Equipo</h6>
                                </label>
                                <select class="select-caja" name="regEqui_equipo_edit" id="regEqui_equipo_edit">
                                    <option selected value="0">--Equipo--</option>
                                    <option value="Móvil">Móvil</option>
                                    <option value="Fijo">Fijo</option>
                                    <option value="Invasivo">Invasivo</option>
                                    <option value="No invasico">No invasico</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Clasificación biomédica</h6>
                                </label>
                                <select class="select-caja" name="regEqui_clasificacion_bio_edit" id="regEqui_clasificacion_bio_edit">
                                    <option selected value="0">--Clasificación biomédica--</option>
                                    <option value="DX">DX</option>
                                    <option value="PRV">PRV</option>
                                    <option value="RH">RH</option>
                                    <option value="ALAB">ALAB</option>
                                    <option value="TMVD">TMVD</option>
                                    <option value="N/A">N/A</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Doc sanitario</h6>
                                </label>
                                <select class="select-caja" name="regEqui_doc_sanitario_edit" id="regEqui_doc_sanitario_edit">
                                    <option selected value="0">--Doc sanitario--</option>
                                    <option value="RS">RS</option>
                                    <option value="PC">PC</option>
                                    <option value="LS">LS</option>
                                    <option value="NO REQUIERE">NO REQUIERE</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Clasif. de riesgo</h6>
                                </label>
                                <select class="select-caja" name="regEqui_clasificacion_riesgo_edit" id="regEqui_clasificacion_riesgo_edit">
                                    <option selected value="0">--Clasif. de riesgo--</option>
                                    <option value="I">I</option>
                                    <option value="IIA">IIA</option>
                                    <option value="IIB">IIB</option>
                                    <option value="III">III</option>
                                    <option value="N/A">N/A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>PQS OMS</h6>
                                </label>
                                <input type="text" placeholder="PQS OMS" class="input-caja" name="regEqui_pqs_oms_edit" id="regEqui_pqs_oms_edit">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Código UMDNS</h6>
                                </label>
                                <input type="text" placeholder="Código UMDNS" class="input-caja" name="regEqui_codigo_umdns_edit" id="regEqui_codigo_umdns_edit">
                            </div>
                        </div>

                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="mb-3">

                                <small>Seleccione la imagen (máximo 600 kb)</small>

                                <div class="avatar-upload_edit">
                                    <div class="avatar-edit_edit">
                                        <input type='file' name="imagen_equipo_edit" id="imageUpload_edit" accept=".jpg, .jpeg" />
                                        <label for="imageUpload_edit"><i class="bi bi-pencil"></i></label>
                                    </div>
                                    <div class="avatar-preview_edit">
                                        <div id="imagePreview_edit">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>Uso Previsto</h6>
                                </label>
                                <textarea placeholder="Uso Previsto" class="input-caja" name="regEqui_uso_previsto_edit" id="regEqui_uso_previsto_edit" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal componentes -->
<div class="modal fade" id="modal_componentes" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_comp"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive mt-3 mb-2">
                    <table class="table table-primary table-sm">

                        <thead id="theadComponentesInfo">

                        </thead>
                        <tbody id="tbodyComponentesInfo">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal editar componentes -->
<div class="modal fade" id="modal_editar_componentes" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_edit_comp"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex;">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="mb-2">
                            <label class="form-label">
                                <h6>Componente</h6>
                            </label>
                            <input type="text" placeholder="Componente" id="componente_edit" class="input-caja" name="regEqui_componente">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="mb-2">
                            <label class="form-label">
                                <h6>Marca</h6>
                            </label>
                            <input type="text" placeholder="Marca" id="marca_edit" class="input-caja" name="regEqui_marca">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="mb-2">
                            <label class="form-label">
                                <h6>Modelo</h6>
                            </label>
                            <input type="text" placeholder="Modelo" id="modelo_edit" class="input-caja" name="regEqui_modelo">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="mb-2">
                            <label class="form-label">
                                <h6>Serie</h6>
                            </label>
                            <input type="text" placeholder="Serie" id="serie_edit" class="input-caja" name="regEqui_serie">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="mb-2">
                            <label class="form-label">
                                <h6>Código identificación</h6>
                            </label>
                            <input type="text" placeholder="Código identificación" id="codigo_edit" class="input-caja" name="regEqui_codigo_identificacion">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardarEditComp" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>





<!-- Modal editar ubicación-->
<div class="modal fade" id="editar_ubicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_editarUbicacion"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <select class="select-caja" name="ubicacion_editar" id="ubicacion_editar">
                        <option selected value="0">--Seleccionar ubicación--</option>

                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnCambiarUbicacion" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal riesgos asociado-->
<div class="modal fade" id="editar_riesgosAsociados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_riesgosAsociadoss"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnriesgosAsociados" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal editar registro tecnico-->
<div class="modal fade" id="editar_registrotecnico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_editarRegistroTecnico"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Fuente de alimentación</h6>
                            </label>

                            <input type="text" placeholder="Fuente de alimentación" class="input-caja" id="regEqui_fuente_alimentacion_edit" name="regEqui_fuente_alimentacion_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Tec. predominante</h6>
                            </label>

                            <input type="text" placeholder="Tec. predominante" class="input-caja" id="regEqui_tec_predominante_edit" name="regEqui_tec_predominante_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Tensión [V]</h6>
                            </label>
                            <input type="text" placeholder="Tensión [V]" class="input-caja" id="regEqui_tension_edit" name="regEqui_tension_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Corriente [A]</h6>
                            </label>
                            <input type="text" placeholder="Corriente  [A]" class="input-caja" id="regEqui_corriente_edit" name="regEqui_corriente_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Potencia [W]</h6>
                            </label>
                            <input type="text" placeholder="Potencia [W]" class="input-caja" id="regEqui_potencia_edit" name="regEqui_potencia_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Temperatura [°C]</h6>
                            </label>
                            <input type="text" placeholder="Temperatura [°C]" class="input-caja" id="regEqui_temperatura_edit" name="regEqui_temperatura_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Humedad [%]</h6>
                            </label>
                            <input type="text" placeholder="Humedad [%]" class="input-caja" id="regEqui_humedad_edit" name="regEqui_humedad_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Peso [kg]</h6>
                            </label>
                            <input type="text" placeholder="Peso [kg]" class="input-caja" id="regEqui_peso_edit" name="regEqui_peso_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Dimensiones (A x L x P)</h6>
                            </label>
                            <input type="text" placeholder="Dimensiones (A x L x P)" class="input-caja" id="regEqui_dimensiones_edit" name="regEqui_dimensiones_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Otro(s)</h6>
                            </label>

                            <input type="text" placeholder="Otro(s)" class="input-caja" id="regEqui_otros_edit" name="regEqui_otros_edit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnCambiarRegistroT" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal editar caracteristicas metrológicas-->
<div class="modal fade" id="editar_caracteristicasMetro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_editar_caracteristicasMetro"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Magnitud</h6>
                            </label>
                            <input type="text" class="input-caja" placeholder="Magnitud" id="regEqui_magnitud_edit" name="regEqui_magnitud_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Unidad de medida</h6>
                            </label>
                            <input type="text" class="input-caja" placeholder="Unidad de medida" id="regEqui_unidad_medida_edit" name="regEqui_unidad_medida_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Intervalo</h6>
                            </label>
                            <input type="text" class="input-caja" placeholder="Intervalo" id="regEqui_intervalo_edit" name="regEqui_intervalo_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>División de escala [A]</h6>
                            </label>
                            <input type="text" class="input-caja" placeholder="División de escala  [A]" id="regEqui_division_escala_edit" name="regEqui_division_escala_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Tipo de indicación</h6>
                            </label>
                            <input type="text" class="input-caja" placeholder="Tipo de indicación" id="regEqui_indicacion_edit" name="regEqui_indicacion_edit">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">
                                <h6>Clase</h6>
                            </label>
                            <input type="text" class="input-caja" placeholder="Clase" id="regEqui_clase_edit" name="regEqui_clase_edit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnEditarCaracteristicasMetro" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal editar registro histórico-->
<div class="modal fade" id="editar_registroHistorico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_registroHistorico"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Fecha fabricación</label>

                            <!-- <input type="text" placeholder="Forma de adquisición" class="input-caja" name="forma_adquisicion"> -->
                            <select class="select-caja" name="regEqui_forma_adquisicion_edit" id="regEqui_forma_adquisicion_edit">
                                <option selected value="0">--Forma de adquisición--</option>
                                <option value="Compra">Compra</option>
                                <option value="Donación">Donación</option>
                                <option value="Comodato">Comodato</option>
                                <option value="Alquiler">Alquiler</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Fecha fabricación</label>

                            <input type="text" placeholder="Doc. de adquisición" class="input-caja" id="regEqui_doc_adquisicion_edit" name="regEqui_doc_adquisicion_edit">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Fecha fabricación</label>

                            <!-- <input type="text" placeholder="Estado adq." class="input-caja" name="estado_adquisicion"> -->
                            <select class="select-caja" name="regEqui_estado_adquisicion" id="regEqui_estado_adquisicion_edit">
                                <option selected value="0">--Estado adq.--</option>
                                <option value="Nuevo">Nuevo</option>
                                <option value="Usado">Usado</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Fecha fabricación</label>

                            <input type="date" placeholder="Fecha fabricación" class="input-caja" id="regEqui_f_fabricacion_edit" name="regEqui_f_fabricacion_edit">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">

                            <label class="form-label">Fecha adquisición</label>
                            <input type="date" placeholder="Fecha adquisición" class="input-caja" id="regEqui_f_adquisicion_edit" name="regEqui_f_adquisicion_edit">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Fecha recepción</label>
                            <input type="date" placeholder="Fecha recepción" class="input-caja" id="regEqui_f_recepcion_edit" name="regEqui_f_recepcion_edit">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Fecha instalación</label>
                            <input type="date" placeholder="Fecha instalación" class="input-caja" id="regEqui_f_instalacion_edit" name="regEqui_f_instalacion_edit">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Fecha ven. garantía</label>
                            <input type="date" placeholder="Fecha ven. garantía" class="input-caja" id="regEqui_f_vengarantia_edit" name="regEqui_f_vengarantia_edit">
                        </div>
                    </div>


                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Costo (COP)</label>

                            <input type="number" placeholder="Costo (COP)" class="input-caja" id="regEqui_costo_edit" name="regEqui_costo_edit">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Vida útil (años)</label>

                            <input type="text" placeholder="Vida útil (años)" class="input-caja" id="regEqui_vida_util_edit" name="regEqui_vida_util_edit">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">

                        <div class="mb-3">
                            <label class="form-label">Proveedor</label>

                            <input type="text" placeholder="Proveedor" class="input-caja" id="regEqui_proveedor_edit" name="regEqui_proveedor_edit">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnregistroHistorico" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal procesos limpieza -->
<div class="modal fade" id="editar_procesosLimpieza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_procesosLimpieza"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnprocesosLimpieza" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal editar tipod de intervenciones, DISPOSICIÓN FINAL, RECOMENDACIONES DE USO Y CUIDADO-->
<div class="modal fade" id="editar_restoEdiciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="titulo_modal_restoEdiciones"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                <p class="text-center mb-4">TIPO DE INTERVENCIONES REQUERIDAS</p>

                    <div class="mb-3">
                        <select class="select-caja"  name="regEqui_tipo_intervencion_edit" id="regEqui_tipo_intervencion_edit">
                            <option selected value="0">--Tipo de intervención.--</option>
                            <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                            <option value="Metrología">Metrología</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="select-caja"  name="regEqui_recurso_humano_edit" id="regEqui_recurso_humano_edit">
                            <option selected value="0">--Recurso humano.--</option>
                            <option value="Interno">Interno</option>
                            <option value="Externo">Externo</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="input-caja" placeholder="Frecuencia en meses (No aplica = 0)" id="regEqui_frecuencia_edit" name="regEqui_frecuencia_edit">
                    </div>
                    <p class="text-center mb-4">DISPOSICIÓN FINAL</p>
                    <div class="mb-3">
                        <input type="text" class="input-caja" placeholder="Método de desecho" id="regEqui_metodo_desecho_edit"  name="regEqui_metodo_desecho_edit">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="input-caja" placeholder="Responsable" id="regEqui_responsable_edit"  name="regEqui_responsable_edit">
                    </div>
                    <p class="text-center mb-4">RECOMENDACIONES DE USO Y CUIDADO</p>
                    <div class="form-floating">
                        <textarea class="form-control" class="input-caja" placeholder="Leave a comment here" id="regEqui_recomendaciones_edit" name="regEqui_recomendaciones_edit" style="height: 200px"></textarea>
                        <label for="floatingTextarea">Recomendaciones</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnrestoEdiciones" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>