<?php
$lotes = ControladorLote::ctrGetLotesEscaldado();
?>
<div class="container">
    <h5 class="mt-3">Escaldado de Guayaba</h5>

    <div class="container" style="background-color:#e3f8e0; ">


        <div class="row mt-3 pt-2">

            <div class="col-6 col-sm-3  mt-1">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Seleccione lote</span>
                    <span class="input-group-text" id="textoPesoLote" style="display: none;"></span>

                </div>

            </div>


            <div class="col-6  col-sm-3  mt-1">

                <select class="form-select" id="select_lote_escaldado" aria-label="Default select example">
                    <option selected value="0">--Lote--</option>
                    <?php foreach ($lotes as $key => $value) : ?>
                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>
                    <?php endforeach ?>
                </select>

            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Desperdicio (kg)</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="desperdicio" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>


        <div class="row">


            <div class="col-6 col-sm-3 ">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Desinfectante (ml)</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="desinfectante" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>



            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1 ">
                    <span class="input-group-text mr-2" id="basic-addon1">Escaldada (kg)</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="escaldada" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>


        </div>
        <div class="row">




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1 ">
                    <span class="input-group-text mr-2" id="basic-addon1">Cantidad guayaba verde (kg)</span>
                </div>
            </div>
            <div class="col-6 col-sm-3 mb-1">
                <input type="number" class="form-control" id="guayaba_verde" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>


        </div>
        <button type="submit" id="btnGuardarEsc" class="btn btn-mg btn-primary mt-1 mb-1">Guardar</button>

    </div>
    <div class="table-responsive mt-3">
        <table class="table table-success table-bordered table-sm">

            <thead id="theadRegistros">

            </thead>
            <tbody id="tbodyRegistros">
            </tbody>
        </table>
    </div>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-success table-bordered table-sm">

            <thead id="theadRegistrosSumatoria">

            </thead>
            <tbody id="tbodyRegistrosSumatoria">
            </tbody>
        </table>
    </div>

</div>