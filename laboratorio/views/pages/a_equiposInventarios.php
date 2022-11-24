<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

$equipos = ControladorEquipos::CtrGetEquipos();
// print_r($equipos);
?>

<div class="container-fluid">
    <div class="table-responsive mt-3 mb-2">
        <table class="table table-primary table-sm">

            <thead>
                <tr>
                    <th>Menú</th>
                    <th>Equipo</th>
                    <th>Cliente</th>
                    <th>Ubicacion</th>
                    <th>Código</th>
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
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerDescrip dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_descripcion">Info</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerComponentes dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_componentes">Componentes</a></li>
                                    <li><a class="dropdown-item" href="#">Riesgos</a></li>
                                    <li><a class="dropdown-item" href="#">Procesos</a></li>
                                    <li><a class="dropdown-item" href="#">Documentos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" " data-estado=" <?php echo $value["estado"] ?>" class="ActDesact dropdown-item" href="#">
                                            <?php echo $value["estado"] == "1" ? 'Desactivar' : 'Activar' ?>

                                        </a></li>

                                </ul>
                            </div>
                        </td>
                        <td><?php echo $value["nombre"] ?></td>
                        <td><?php echo $value["nombre_cliente"] ?></td>
                        <td><?php echo $value["nombre_ubicacion"] ?></td>
                        <td><?php echo $value["codigo"] ?></td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == "1" ? 'Activo' : 'Inactivo' ?></td>


                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>
<!-- Modal descripcion del equipo editar -->
<div class="modal fade" id="modal_descripcion" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <form id="formEdit" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title" id="titulo_modal_descrip"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
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
                    </div>

                    <div class="row">
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
                                <select class="input-caja" name="regEqui_equipo_edit" id="regEqui_equipo_edit">
                                    <option selected value="">--Equipo--</option>
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
                                <select class="input-caja" name="regEqui_clasificacion_bio_edit" id="regEqui_clasificacion_bio_edit">
                                    <option selected value="">--Clasificación biomédica--</option>
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
                                <select class="input-caja" name="regEqui_doc_sanitario_edit" id="regEqui_doc_sanitario_edit">
                                    <option selected value="">--Doc sanitario--</option>
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
                                <select class="input-caja" name="regEqui_clasificacion_riesgo_edit" id="regEqui_clasificacion_riesgo_edit">
                                    <option selected value="">--Clasif. de riesgo--</option>
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
                    <button type="input" class="btn btn-primary">Guardar</button>
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
                <h5 class="modal-title" id="titulo_modal_comp"></h5>
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
                <h5 class="modal-title" id="titulo_modal_edit_comp"></h5>
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