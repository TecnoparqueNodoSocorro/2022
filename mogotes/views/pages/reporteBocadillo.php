<?php
$lotesRe = ControladorLote::mdlGetLotesReporte();
?>
<div class="container">
    <h5>Reporte Bocadillo</h5>



    <div class="container" style="background-color:#e3f8e0; max-width: 740px !important">
        <div class="row pt-4">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Seleccione Lote</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <select class="form-select" id="select_lote_reporteBocadillo" aria-label="Default select example">
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
                <input type="number" class="form-control" id="azucar" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Recortes</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="recortes" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Devolución Tablas</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="devolucion" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Botes Marmitas</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="botesM" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Botes Pailas</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="botesP" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">°Brix</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="brix" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>


        </div>

        <h6 class="mt-4" style="text-align:left;">Tablas</h6>
        <hr>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla extrafino</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="tablaExt" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla Bocadillos</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="tablaBoc" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>


        <div class="row  pb-2">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla Lonja</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="tablaLon" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>



            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text mr-2" id="basic-addon1">Tabla Manzana</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="tablaMan" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>


        </div>




        <button type="submit" id="btnGuardarB" class="btn btn-mg btn-success mt-2 mb-2">Guardar</button>

    </div>
    <!-- TABLA REGISTROS -->
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-success table-bordered table-sm">

            <thead id="theadReporteBocadillo">

            </thead>
            <tbody id="tbodyReporteBocadillo">
            </tbody>
        </table>
    </div>

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="textoTituloReporteBocadillo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container" style="background-color:#e3f8e0; max-width: 740px !important">
                    <div class="row pt-4">





                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Azúcar</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly class="form-control" id="azucarView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Recortes</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly  class="form-control" id="recortesView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Devolución Tablas</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly  class="form-control" id="devolucionView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Botes Marmitas</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number"  readonly class="form-control" id="botesMView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Botes Pailas</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly  class="form-control" id="botesPView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">°Brix</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly  class="form-control" id="brixView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                    </div>

                    <h6 class="mt-4" style="text-align:left;">Tablas</h6>
                    <hr>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Tabla extrafino</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number"  readonly class="form-control" id="tablaExtView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Tabla Bocadillos</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number"  readonly class="form-control" id="tablaBocView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>


                    <div class="row  pb-2">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Tabla Lonja</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" readonly  class="form-control" id="tablaLonView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>



                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text mr-2" id="basic-addon1">Tabla Manzana</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" readonly  class="form-control" id="tablaManView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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