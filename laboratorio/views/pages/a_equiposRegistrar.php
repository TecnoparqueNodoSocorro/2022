<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] == "3") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}



$clientes = ControladorClientes::ctrGetClientes();


?>




<h1 class="text-center fs-4">Registrar equipo</h1>
<div class="container">
    <form id="signUpForm" enctype="multipart/form-data">
        <!-- start step indicators -->
        <div class="form-header d-flex mb-4">
            <span class="stepIndicator">1</span>
            <span class="stepIndicator">2</span>
            <span class="stepIndicator">3</span>
            <span class="stepIndicator">4</span>
            <span class="stepIndicator">5</span>
            <span class="stepIndicator">6</span>
            <span class="stepIndicator">7</span>
            <span class="stepIndicator">8</span>
            <span class="stepIndicator">9</span>
            <span class="stepIndicator">10</span>
            <span class="stepIndicator">11</span>
            <span class="stepIndicator">12</span>





        </div>
        <!-- end step indicators -->
        <!-- step 0 -->
        <div class="step">
            <p class="text-center mb-4">SELECCIÓN CLIENTE Y UBICACIÓN</p>
            <div class="mb-3">
                <select class="validarSelect" oninput="this.className = ''" name="regEqui_cliente" id="regEqui_cliente">
                    <option selected value="0">--Seleccionar cliente--</option>
                    <?php foreach ($clientes as $key => $value) : ?>
                        <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>
                    <?php endforeach ?>

                </select>
            </div>
            <div class="mb-3">
                <select class="validarSelect" oninput="this.className = ''" name="regEqui_ubic" id="regEqui_ubic">
                    <option selected value="0">--Seleccionar ubicación--</option>

                </select>
            </div>

        </div>
        <!-- step one -->

        <div class="step">
            <p class="text-center mb-4">DESCRIPCIÓN DEL EQUIPO</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Equipo" name="regEqui_nombre" id="regEqui_nombre" oninput="this.className = ''">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Código identificacion" name="regEqui_ident" id="regEqui_ident" oninput="this.className = ''">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Marca" oninput="this.className = ''" name="regEqui_marcaRE" id="regEqui_marcaRE">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Modelo" oninput="this.className = ''" name="regEqui_modeloRE" id="regEqui_modeloRE">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Fabricante" oninput="this.className = ''" name="regEqui_fabr" id="regEqui_fabr">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Serie" oninput="this.className = ''" name="regEqui_serieRE" id="regEqui_serieRE">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Lote" oninput="this.className = ''" name="regEqui_lote" id="regEqui_lote">
                    </div>
                </div>
                <!--                 <div class="col-12 col-md-6 col-lg-3">
                        <div class="mb-3">


                            <select class="validar" oninput="this.className = ''" name="ubicacion" id="ubicacion">
                                <option selected>--Ubicación--</option>
                                <option value="New Delhi">New Delhi</option>|
                                <option value="Istanbu">Istanbul</option>
                                <option value="akarta">Jakarta</option>
                            </select>

                        </div>
                    </div> -->

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Tipo" oninput="this.className = ''" name="regEqui_tipo" id="regEqui_tipo">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <select class="validarSelect" oninput="this.className = ''" name="regEqui_equipo" id="regEqui_equipo">
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
                        <select class="validarSelect" oninput="this.className = ''" name="regEqui_clasificacion_bio" id="regEqui_clasificacion_bio">
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
                        <select class="validarSelect" oninput="this.className = ''" name="regEqui_doc_sanitario" id="regEqui_doc_sanitario">
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
                        <select class="validarSelect" oninput="this.className = ''" name="regEqui_clasificacion_riesgo" id="regEqui_clasificacion_riesgo">
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
                        <input class="ValidInput" type="text" placeholder="PQS OMS" oninput="this.className = ''" name="regEqui_pqs_oms">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Código UMDNS" oninput="this.className = ''" name="regEqui_codigo_umdns">
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="mb-3">

                        <small>Seleccione la imagen (máximo 600 kb)</small>

                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="imagen_equipo" id="imageUpload" accept=".jpg, .jpeg" />
                                <label for="imageUpload"><i class="bi bi-pencil"></i></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(images/registro_equipo/imagen_defecto.jpg);">
                                </div>
                            </div>
                        </div>
                        <!--           <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                        <label for="file-1">
                            <i class="bi bi-image-fill"></i>
                            <span class="iborrainputfile">Seleccionar imagen</span>
                        </label> -->
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="mb-3">
                        <textarea placeholder="Uso Previsto" class="ValidInput" oninput="this.className = ''" name="regEqui_uso_previsto" id="" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- step two -->
        <div class="step">

            <p class="text-center mb-4">COMPONENTES ASOCIADOS</p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input type="text" placeholder="Componente" id="componente" oninput="this.className = ''" name="regEqui_componente">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input type="text" placeholder="Marca" id="marca" oninput="this.className = ''" name="regEqui_marca">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input type="text" placeholder="Modelo" id="modelo" oninput="this.className = ''" name="regEqui_modelo">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input type="text" placeholder="Serie" id="serie" oninput="this.className = ''" name="regEqui_serie">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <input type="text" placeholder="Código identificación" id="codigo" oninput="this.className = ''" name="regEqui_codigo_identificacion">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        <button style="float: right; width:100%" type="button" id="btnAgregarComponente" class="btn btn-lg btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive-sm mt-3 mb-5">
                        <table class="table table-striped table-primary table-bordered table-sm">

                            <thead id="theadComponentes">

                            </thead>
                            <tbody id="tbodyComponentes">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- step three -->
        <div class="step">
            <p class="text-center mb-4">RIESGOS ASOCIADOS AL USO</p>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <ol class="list-group list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/bio2.png" class="img-thumbnail" alt="Riesgo biológico"> Biológico</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo biológico" id="r_biologogico" name="r_biologogico" style="width: 0;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/atra.png" class="img-thumbnail" alt="Riesgo de atrapamiento"> Atrapamiento</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo de atrapamiento" id="r_atrapamiento" name="r_atrapamiento" style="width: 0;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/advertencia.png" class="img-thumbnail" alt="Riesgo específico"> Específico</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo específico" id="r_especifico" name="r_especifico" style="width: 0;">
                        </li>
                    </ol>
                </div>



                <div class="col-12 col-lg-4">
                    <ol class="list-group list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/pun.png" class="img-thumbnail" alt="Riesgo por puncion"> Punción</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo de punción" id="r_puncion" name="r_puncion" style="width: 0;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/quema.png" class="img-thumbnail" alt="Riesgo por quemadura"> Quemadura</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo quemaduras" id="r_quemadura" name="r_quemadura" style="width: 0;">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/las.png" class="img-thumbnail" alt="Riesgo por radiacón láser"> Radiación Láser</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo láser" id="r_laser" name="r_laser" style="width: 0;">
                        </li>
                    </ol>
                </div>


                <div class="col-12 col-lg-4">
                    <ol class="list-group list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/alto-voltaje.png" class="img-thumbnail" alt="Riesgo Eléctrico"> Eléctrico</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo eléctrico" id="r_electrico" name="r_electrico">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/nieve.png" class="img-thumbnail" alt="Riesgo de congelamiento"> Congelamiento</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo de congelamiento" id="r_congelamiento" name="r_congelamiento">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><img src="images/iconos/electro.png" class="img-thumbnail" alt="Riesgo electrostático"> Electrostático</div>

                            </div>
                            <input class="form-check-input check_style" type="checkbox" value="Riesgo electrostático" id="r_electrostatico" name="r_electrostatico">
                        </li>
                    </ol>
                </div>
                <!-- 
                <a name="" id="btncheckprueba" class="btn btn-primary" href="#" role="button">Button</a> -->
            </div>
        </div>



        <!-- step 4 -->
        <div class="step">
            <p class="text-center mb-4">REGISTRO TÉCNICO DE INSTALACIÓN Y DE FUNCIONAMIENTO</p>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Fuente de alimentación" oninput="this.className = ''" name="regEqui_fuente_alimentacion">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Tec. predominante" oninput="this.className = ''" name="regEqui_tec_predominante">
                    </div>
                </div>

                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Tensión [V]" oninput="this.className = ''" name="regEqui_tension">
                    </div>
                </div>

                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Corriente  [A]" oninput="this.className = ''" name="regEqui_corriente">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Potencia [W]" oninput="this.className = ''" name="regEqui_potencia">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Temperatura [°C]" oninput="this.className = ''" name="regEqui_temperatura">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Humedad [%]" oninput="this.className = ''" name="regEqui_humedad">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Peso  [kg]" oninput="this.className = ''" name="regEqui_peso">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Dimensiones (A x L x P)" oninput="this.className = ''" name="regEqui_dimensiones">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Otro(s)" oninput="this.className = ''" name="regEqui_otros">
                    </div>
                </div>

            </div>

        </div>

        <!-- step 5 -->
        <div class="step">
            <p class="text-center mb-4">CARACTERÍSTICAS METROLÓGICAS</p>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Magnitud" oninput="this.className = ''" name="regEqui_magnitud">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Unidad de medida" oninput="this.className = ''" name="regEqui_unidad_medida">
                    </div>
                </div>

                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Intervalo" oninput="this.className = ''" name="regEqui_intervalo">
                    </div>
                </div>

                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="División de escala  [A]" oninput="this.className = ''" name="regEqui_division_escala">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Tipo de indicación" oninput="this.className = ''" name="regEqui_indicacion">
                    </div>
                </div>
                <div class="col-12 col-lg-6">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Clase" oninput="this.className = ''" name="regEqui_clase">
                    </div>
                </div>



            </div>
        </div>

        <!-- step 6 -->
        <div class="step">
            <p class="text-center mb-4">REGISTRO HISTÓRICO</p>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="mb-3">
                        <!-- <input type="text" placeholder="Forma de adquisición" oninput="this.className = ''" name="forma_adquisicion"> -->
                        <select class="validarSelect" oninput="this.className = ''" name="regEqui_forma_adquisicion" id="regEqui_forma_adquisicion">
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
                        <input type="text" placeholder="Doc. de adquisición" oninput="this.className = ''" name="regEqui_doc_adquisicion">
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <!-- <input type="text" placeholder="Estado adq." oninput="this.className = ''" name="estado_adquisicion"> -->
                        <select class="validarSelect" oninput="this.className = ''" name="regEqui_estado_adquisicion" id="regEqui_estado_adquisicion">
                            <option selected value="0">--Estado adq.--</option>
                            <option value="Nuevo">Nuevo</option>
                            <option value="Usado">Usado</option>

                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <label class="form-label">Fecha fabricación</label>

                        <input class="ValidInput" type="date" placeholder="Fecha fabricación" oninput="this.className = ''" name="regEqui_f_fabricacion">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">

                        <label class="form-label">Fecha adquisición</label>
                        <input class="ValidInput" type="date" placeholder="Fecha adquisición" oninput="this.className = ''" name="regEqui_f_adquisicion">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <label class="form-label">Fecha recepción</label>
                        <input class="ValidInput" type="date" placeholder="Fecha recepción" oninput="this.className = ''" name="regEqui_f_recepcion">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <label class="form-label">Fecha instalación</label>
                        <input class="ValidInput" type="date" placeholder="Fecha instalación" oninput="this.className = ''" name="regEqui_f_instalacion">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <label class="form-label">Fecha ven. garantía</label>
                        <input class="ValidInput" type="date" placeholder="Fecha ven. garantía" oninput="this.className = ''" name="regEqui_f_vengarantia">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <input class="ValidInput" type="number" placeholder="Costo (COP)" oninput="this.className = ''" name="regEqui_costo">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Vida útil (años)" oninput="this.className = ''" name="regEqui_vida_util">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="mb-3">
                        <input class="ValidInput" type="text" placeholder="Proveedor" oninput="this.className = ''" name="regEqui_proveedor">
                    </div>
                </div>

            </div>
        </div>

        <!-- step 7 -->
        <div class="step">
            <p class="text-center mb-4">TIPO DE INTERVENCIONES REQUERIDAS</p>
            <div class="mb-3">
                <select class="validarSelect" oninput="this.className = ''" name="regEqui_tipo_intervencion" id="regEqui_tipo_intervencion">
                    <option selected value="0">--Tipo de intervención.--</option>
                    <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                    <option value="Metrología">Metrología</option>

                </select>
            </div>
            <div class="mb-3">
                <select class="validarSelect" oninput="this.className = ''" name="regEqui_recurso_humano" id="regEqui_recurso_humano">
                    <option selected value="0">--Recurso humano.--</option>
                    <option value="Interno">Interno</option>
                    <option value="Externo">Externo</option>

                </select>
            </div>
            <div class="mb-3">
                <input class="ValidInput" type="number" placeholder="Frecuencia en meses (No aplica = 0)" oninput="this.className = ''" name="regEqui_frecuencia">
            </div>
        </div>

        <!-- step 8 -->
        <div class="step">
            <p class="text-center mb-4">LIMPIEZA, DESINFECCIÓN Y ESTERILIZACIÓN</p>

            <div class="row mb-3" style="text-align:left;">


                <div class="col-12">
                    <label class="mt-2">Limpieza</label>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input check-limpieza" type="checkbox" value="Limpieza" name="check_limp" id="check_limp" aria-label="Checkbox for following text input">
                        </div>
                        <textarea style="width: 0;" class="form-control text-limpieza" name="metodo_limpieza" id="metodo_limpieza" disabled></textarea>

                    </div>

                </div>
                <div class="col-12">
                    <label class="mt-2">Desinfección</label>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input check-limpieza" type="checkbox" value="Desinfeccion" name="check_des" id="check_des" aria-label="Checkbox for following text input">
                        </div>
                        <textarea style="width: 0;" type="text" class="form-control text-limpieza" name="metodo_desinfeccion" id="metodo_desinfeccion" aria-label="Text input with checkbox" disabled></textarea>
                    </div>

                </div>
                <div class="col-12">
                    <label class="mt-2">Esterilización</label>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input check-limpieza" type="checkbox" value="Esterilizacion" name="check_ester" id="check_ester" aria-label="Checkbox for following text input">
                        </div>
                        <textarea style="width: 0;" type="text" class="form-control text-limpieza" name="metodo_esterilizacion" id="metodo_esterilizacion" aria-label="Text input with checkbox" disabled></textarea>
                    </div>

                </div>

            </div>
        </div>

        <!-- step 9 -->
        <div class="step">
            <p class="text-center mb-4">DISPOSICIÓN FINAL</p>
            <div class="mb-3">
                <input class="ValidInput" type="text" placeholder="Método de desecho" oninput="this.className = ''" name="regEqui_metodo_desecho">
            </div>
            <div class="mb-3">
                <input class="ValidInput"  type="text" placeholder="Responsable" oninput="this.className = ''" name="regEqui_responsable">
            </div>

        </div>

        <!-- step 10 -->
        <div class="step">
            <p class="text-center mb-4">ANEXOS A LA HOJA DE VIDA</p>

            <div class="row">
                <div class="col-12 col-md-6 ">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_copia_satisfaccion" aria-label="...">
                            C. acta de recibo a satisfacción
                        </li>

                        <!--                         <li class="list-group-item">
                            <input type="text" placeholder="Observaciones" oninput="this.className = ''"
                                id="copia_satisfaccion" name="copia_satisfaccion" disabled>
                        </li> -->
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_copia_per_comerc" aria-label="...">
                            Copia Permiso Comercialización
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_registro_impor" aria-label="...">
                            Copia Registro de importación

                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_copia_factura" aria-label="...">
                            C. factura o doc. Equivalente
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_registro_sanitario" aria-label="...">
                            Copia Registro Sanitario

                        </li>

                    </ul>
                </div>

                <div class="col-12 col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_protocolo_mant" aria-label="...">
                            Protocolo de mantenimiento
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_cronograma_man" aria-label="...">
                            Cronograma de mantenimiento
                        </li>

                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_recomendaciones_fabr" aria-label="...">
                            Recomendaciones del fabricante
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_acta_r_op" aria-label="...">
                            Acta de recibo por el operador
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1 check_style" type="checkbox" value="0" id="check_guia_op_rapida" aria-label="...">
                            Guía rápida de operación
                        </li>


                    </ul>
                </div>
                <div class="col-12 my-2">
                    <textarea class="form-control" placeholder="Observaciones" id="regEqui_obs" name="regEqui_obs" style="height: 200px"></textarea>

                </div>

                <div class="col-12 my-2">

                    <p class="mt-2 text-center">

                        <input type="file" name="file[]" id="attachment" style="visibility: hidden;" multiple />
                        <label for="attachment">
                            <a class="btn btn-primary text-light" role="button" aria-disabled="false">Agregar
                                documentos</a>

                        </label>
                    </p>
                    <div class="container" id="files-area" style="background-color: gray; width: 100%; height: auto;border-radius: 5px;">
                        <span id="filesList">
                            <span id="files-names"></span>
                        </span>
                    </div>

                </div>
            </div>


        </div>

        <!-- step 11 -->
        <div class="step">
            <p class="text-center mb-4">RECOMENDACIONES DE USO Y CUIDADO</p>
            <div class="form-floating">
                <textarea class="form-control ValidInput" id="regEqui_recomendaciones" name="regEqui_recomendaciones" style="height: 200px"></textarea>
                <label for="floatingTextarea">Recomendaciones</label>
            </div>
        </div>


        <!-- start previous / next buttons -->
        <div class="form-footer d-flex">
            <button type="button" class="btn-sm" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
            <button style="display: none;" type="submit" id="btnGuardarEquipo">Guardar.</button>

        </div>
        <!-- end previous / next buttons -->
    </form>
</div>