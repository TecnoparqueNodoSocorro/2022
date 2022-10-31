<?php
if (isset($_SESSION["validar_ingreso"])) {
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
$lotesRe = ControladorLote::mdlGetLotesReporte();

?>

<div class="container">
    <h5>Reporte Arequipe Mogotino</h5>

    <div class="container" style="background-color:#e3f8e0;">
        <div class="row pt-4">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Seleccione Lote</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <select class="form-select" id="lote_arequipe" aria-label="Default select example">
                    <option selected value="0">--Lote--</option>
                    <?php foreach ($lotesRe as $key => $value) : ?>
                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>

        </div>
        <div class="row pt-2">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Leche (L)</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="leche" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Azúcar (lb)</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="azucarA" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>



        <h6 class="mt-4" style="text-align:left;">Botes</h6>
        <hr>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Botes Marmitas</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="marmitasA" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Botes Pailas</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="pailasA" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>


        <h6 class="mt-4" style="text-align:left;">Tablas</h6>
        <hr>
        <div class="row">


            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla Extrafino</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="extrafinoA" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text" id="basic-addon1">Tabla Bocadillos</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="bocadillosA" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>




        <button type="submit" id="btnGuardarA" class="btn btn-mg btn-success mt-2 mb-2">Guardar</button>

    </div>

    <div class="table-responsive mt-3 mb-5">
        <table class="table table-success table-bordered table-sm">

            <thead id="theadReporteArequipe">

            </thead>
            <tbody id="tbodyReporteArequipe">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_arequipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="textoTituloReporteArequipe"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container" style="background-color:#e3f8e0;">

                    <div class="row pt-2">

                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Leche (L)</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" class="form-control" id="lecheView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Azúcar (lb)</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" class="form-control" id="azucarAView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>



                    <h6 class="mt-4" style="text-align:left;">Botes</h6>
                    <hr>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Botes Marmitas</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" class="form-control" id="marmitasAView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Botes Pailas</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" class="form-control" id="pailasAView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>


                    <h6 class="mt-4" style="text-align:left;">Tablas</h6>
                    <hr>
                    <div class="row">


                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Tabla Extrafino</span>
                            </div>
                        </div>
                        <div class="col-6  col-sm-3">
                            <input type="number" class="form-control" id="extrafinoAView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>




                        <div class="col-6 col-sm-3">
                            <div class="input-group  mb-1">
                                <span class="input-group-text" id="basic-addon1">Tabla Bocadillos</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <input type="number" class="form-control" id="bocadillosAView" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>




                    <button type="submit" id="btnGuardarA" class="btn btn-mg btn-success mt-2 mb-2">Guardar</button>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>