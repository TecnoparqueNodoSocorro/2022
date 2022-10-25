<?php
$lotesRe = ControladorLote::mdlGetLotesReporte();
?>

<div class="container">
    <h5>Reporte Espejuelo</h5>

    <div class="container" style="background-color:#e3f8e0;">
        <div class="row pt-4">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Seleccione Lote</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <select class="form-select" id="lote_espejuelo" aria-label="Default select example">
                    <option selected value="0">--Lote--</option>
                    <?php foreach ($lotesRe as $key => $value) : ?>
                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Azúcar</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="azucarE" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Aceite de Oliva</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="aceite_oliva" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Pectina</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="pectina" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="row">

            <!-- 
            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Recortes/espumas</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="recortesE" placeholder="" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div> -->




            <!--       <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Devolucción Tablas</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="dev_tablas" placeholder="" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div> -->
        </div>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Botes Marmitas</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="marmitasEsp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Botes Pailas</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="pailasEsp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>


        </div>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">°Brix</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="brixEsp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




        </div>


        <h6 class="mt-4" style="text-align:left;">Tablas</h6>
        <hr>
        <div class="row">


            <!--  <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla Madera</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="maderaEsp" placeholder="" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
 -->



            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla Metálicas</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="metalicasEsp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>


        <div class="row  pb-4">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Redonda</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="redondaEsp" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>



            <!--   <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text mr-2" id="basic-addon1">Suvenir</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="suvenir" placeholder="" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
 -->

        </div>




        <button type="submit" id="btnGuardarE" class="btn btn-mg btn-success mt-1 mb-2">Guardar</button>
    </div>

    <div class="table-responsive mt-3 mb-5">
        <table class="table table-success table-bordered table-sm">

            <thead id="theadReporteEspejuelo">

            </thead>
            <tbody id="tbodyReporteEspejuelo">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_espejuelo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="textoTituloReporteEspejuelo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container" style="background-color:#e3f8e0;">
                    <div class="row pt-4">

                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Azúcar</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly class="form-control" id="azucarEView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Aceite de Oliva</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly class="form-control" id="aceite_olivaView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Pectina</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly class="form-control" id="pectinaView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Botes Marmitas</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly class="form-control" id="marmitasEspView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Botes Pailas</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly class="form-control" id="pailasEspView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                    </div>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">°Brix</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly class="form-control" id="brixEspView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                    </div>


                    <h6 class="mt-4" style="text-align:left;">Tablas</h6>
                    <hr>
                    <div class="row">



                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Tabla Metálicas</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly class="form-control" id="metalicasEspView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>


                    <div class="row  pb-3">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Redonda</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly class="form-control" id="redondaEspView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>