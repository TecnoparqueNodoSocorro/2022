<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

require_once "modal_sumatoria.php"
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

        <div class="row">

            <hr>

            <div class="col-4 ">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Lebrija</span>
                </div>
            </div>

            <div class="col-4 ">
                <input type="number" readonly class="form-control" id="lebrija" placeholder="" value="0" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="col-4 ">
                <button type="button" data-campo="1" class="btnCampo btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalSumatoria"><i class="bi bi-plus-square-fill"></i></button>
                <button type="button" data-delete="1" class="btnCampoDelete btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>

            </div>

        </div>

        <hr>



        <div class="row">
            <div class="col-4 ">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">La Cristalina</span>
                </div>
            </div>
            <div class="col-4 ">
                <input type="number" readonly class="form-control" id="cristalina" placeholder="" value="0" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-4 ">
                <button type="button" data-campo="2" class="btnCampo btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalSumatoria"><i class="bi bi-plus-square-fill"></i></button>
                <button type="button" data-delete="2" class="btnCampoDelete btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>

            </div>




        </div>
        <hr>

        <div class="row">

            <div class="col-4 ">
                <div class="input-group  mb-1">
                    <span class="input-group-text " id="basic-addon1">Villa Mercedes</span>
                </div>
            </div>

            <div class="col-4 ">
                <input type="number" readonly class="form-control" id="villaMercedes" placeholder="" value="0" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="col-4 ">

                <button type="button" data-campo="3" class="btnCampo btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalSumatoria"><i class="bi bi-plus-square-fill"></i></button>
                <button type="button" data-delete="3" class="btnCampoDelete btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>

            </div>
        </div>

        <hr>



        <div class="row">
            <div class="col-4 ">
                <div class="input-group  mb-1 ">
                    <span class="input-group-text mr-2" id="basic-addon1">Manzana/blanca</span>
                </div>
            </div>

            <div class="col-4 ">
                <input type="number" readonly class="form-control" id="manzanaBlanca" placeholder="" value="0" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="col-4 ">

                <button type="button" data-campo="4" class="btnCampo btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalSumatoria"><i class="bi bi-plus-square-fill"></i></button>
                <button type="button" data-delete="4" class="btnCampoDelete btn btn-danger btn-sm"><i class=" bi bi-trash3-fill"></i></button>

            </div>
        </div>


        <hr>








        <h6 class="mt-4">Lote Anterior</h6>
        <hr>
        <div class="container">

            <div class="row pb-3">
                <div class="col-6">
                    <div class="input-group">
                        <input type="number" class="form-control" id="loteAnterior" placeholder="Ingrese el número de lote" aria-label="Username" aria-describedby="basic-addon1">

                    </div>
                </div>

                <div class="col-6 ">
                    <input type="number" class="form-control" id="cantidad_adicionar_loteAnterior" value="0" placeholder="Cantidad a adicionar" aria-label="Username" aria-describedby="basic-addon1">
                </div>

               <!--  <div class="col-2">

                    <button  id="btnAdicionar" type="submit" id="btnAdicionar" class="btn btn-sm btn-success "><i class="bi bi-plus-circle-fill"></i></button>


                </div> -->
            </div>

        </div>

        <strong><span id="textKilosTotal"></span></strong>
        <hr>
    </div>
    <button type="submit" id="btnGuardar" class="btn btn-mg btn-primary mt-3 mb-5">Guardar</button>

</div>