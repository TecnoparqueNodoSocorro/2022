<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
?>
<div class="container">
    <h5 class="my-2">Registro de Embalaje</h5>

    <div class="container pb-3" style="background-color:#e3f8e0;">

        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-sm-6">
                <label class="form-label">
                    lote
                </label>
                <select class="form-select" id="lote_embalaje" aria-label="Default select example">
                    <option value="0" selected>Seleccione el lote</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="2">03</option>

                </select>
            </div>
            <div class="col-6  col-sm-6">

                <label class="form-label">
                    Azúcar
                </label>
                <input type="number" id="azucarEmb" class="form-control" value="" required>

            </div>
        </div>
        <div class="row justify-content-md-center mt-2">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    Bijao
                </label>
                <input type="number" id="bijaoEmb" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    P celofán
                </label>
                <input type="number" id="celofanEmb" class="form-control" value="" required>

            </div>
        </div>
        <div class="row justify-content-md-center mt-2">

            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    Recortes
                </label>
                <input type="number" id="recortesEmb" class="form-control" value="" required>


            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    T madera
                </label>
                <input type="number" id="maderaEmb" class="form-control" value="" required>

            </div>
        </div>
        <div class="row justify-content-md-center mt-2">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    Tablas
                </label>
                <input type="number" id="tablasEmb" class="form-control" value="" required>
            </div>
        </div>
        <!-- <button type="submit" id="limpiar" onclick="Limpiar()" class="btn  btn-primary mt-3 mb-5">Limpiar</button> -->

    </div>




    <!-- Nav tabs -->
    <ul class="nav nav-tabs pt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="bocadillo-tab" data-bs-toggle="tab" data-bs-target="#bocadillo" type="button" role="tab" aria-controls="bocadillo" aria-selected="true">Bocadillo</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="espejuelo-tab" data-bs-toggle="tab" data-bs-target="#espejuelo" type="button" role="tab" aria-controls="espejuelo" aria-selected="false">Espejuelo</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="arequipe-tab" data-bs-toggle="tab" data-bs-target="#arequipe" type="button" role="tab" aria-controls="arequipe" aria-selected="false">Arequipe</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" style="background-color:#e3f8e0;">
        <div class=" tab-pane active" id="bocadillo" role="tabpanel" aria-labelledby="bocadillo-tab">
            <h6 class="mt-4" style="text-align:left;">Bocadillo</h6>
            <hr>
            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Especial Navideño </span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="espNav" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Extrafino 28x16 </span>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" id="extrafino" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">20x30 </span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="veinte_t" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text mr-2" id="basic-addon1"> 28x20</span>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" id="venti_ocho" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">84x10</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="ochenta_cuatro" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Mooticos x 10</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="mooticos" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Mooticos x5</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="mooticos_c" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Unidades</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="unidades" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="row">

                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Mooticos Unidades</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="moticos_unidades" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Bocadillo Manzana</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="bocadillo_manzana" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>

            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Lonja</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="lonja" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <button type="submit" id="btnGuardarEmbB" class="btn  btn-primary mt-3 mb-5">Guardar</button>

        </div>








        <div class="tab-pane" id="espejuelo" role="tabpanel" aria-labelledby="espejuelo-tab">
            <h6 class="mt-4" style="text-align:left;">Espejuelo</h6>
            <hr>
            <div class="row">


                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Pastilla Unidad</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="pastilla_unidad" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>




                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Mooticos Unidad</span>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" id="moticos_esp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>


            <div class="row">


                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">20x40 </span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="veinte_esp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>



                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text mr-2" id="basic-addon1"> 40x20</span>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" id="cuarente_esp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>


            </div>
            <div class="row">


                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">96x12</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="noventas_esp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Mooticos x 10</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="mooticos_diez" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>
            <div class="row">

                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Mooticos x5</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="mooticos_cinco" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>


            </div>
            <button type="submit" id="btnGuardarEmbE" class="btn btn-mg btn-primary mt-3 mb-5">Guardar</button>

        </div>








        <div class="tab-pane" id="arequipe" role="tabpanel" aria-labelledby="arequipe-tab">
            <h6 class="mt-4" style="text-align:left;">Arequipe</h6>
            <hr>

            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Cajita x2 Unidades</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="caja_2" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Bocadillo Panela Unidad</span>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" id="bocadillo_panelaU" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>


            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Bocadillo Panela</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="bocadillo_panela" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text mr-2" id="basic-addon1">Bocadillo Light</span>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <input type="number" class="form-control" id="bocadillo_light" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>


            <div class="row">
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                        <span class="input-group-text" id="basic-addon1">Herpos</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control" id="herpos" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <button type="submit" id="btnGuardarEmbA" class="btn btn-mg btn-primary mt-3 mb-5">Guardar</button>

        </div>
    </div>

</div>