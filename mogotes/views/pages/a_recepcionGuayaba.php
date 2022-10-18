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
    <h5>
        Recepcion Guayaba
    </h5>
    <div class="container" style="background-color:#e3f8e0; text-align: left;">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-12">
                <div class="input-group mt-1 mb-1">
                    <span class="input-group-text mb-3 mt-3" id="basic-addon1">Lote</span>
                    <input type="number" class="form-control mb-3 mt-3" id="newLote" placeholder="Ingrese el número de lote" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>


        <h6 class="mt-4">Cantidad y origen</h6>
        <hr>
        <div class="row">


            <div class="col-6 col-sm-3 ">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Lebrija</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="lebrija" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>




            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Mogotes</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="mogotes" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>


        <div class="row">


            <div class="col-6 col-sm-3 ">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Villa Mercedes</span>
                </div>
            </div>
            <div class="col-6  col-sm-3">
                <input type="number" class="form-control" id="villaMercedes" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>



            <div class="col-6 col-sm-3">
                <div class="input-group  mb-1 ">
                    <span class="input-group-text mr-2" id="basic-addon1">Manzana/blanca</span>
                </div>
            </div>
            <div class="col-6 col-sm-3">
                <input type="number" class="form-control" id="manzanaBlanca" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>


        </div>





        <h6 class="mt-4">Lote Anterior</h6>
        <hr>
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="input-group mt-1 mb-1">
                        <span class="input-group-text " id="basic-addon1">Lote</span>
                        <input type="number" class="form-control" id="loteAnterior" placeholder="Ingrese el número de lote" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div style="text-align:right">
                <button style="text-align:rigth;" id="btnAdicionar" type="submit" id="btnAdicionar" class="btn btn-sm btn-success mt-3 mb-3">Adicionar</button>
            </div>

        </div>
    </div>
    <button type="submit" id="btnGuardar" class="btn btn-mg btn-primary mt-3 mb-5">Guardar</button>

</div>