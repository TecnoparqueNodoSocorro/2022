<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

$lotesEmb = ControladorLote::mdlGetLotesReporte();

//print_r($lotesEmb)
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
                    <option selected value="0">--Lote--</option>

                    <?php foreach ($lotesEmb as $key => $value) : ?>
                        <option data-fecha="<?php echo $value["codigo"] ?>" value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>
                    <?php endforeach ?>

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





    <div class="container my-1 py-1 mb-5" id="" style="background-color:#e3f8e0;">
        <div class="row">
            <div class="col-12 col-md-6 my-2">
                <select class="form-select" id="select_producto_embalaje" aria-label="Default select example">
                    <option selected value="0">Seleccione el producto</option>
                    <option value="Bocadillo">Bocadillo</option>
                    <option value="Espejuelo">Arequipe</option>
                    <option value="Arequipe">Espejuelo</option>
                </select>
            </div>
            <div class="col-12 col-md-6 my-2">
                <select class="form-select" id="select_empaque" aria-label="Default select example">
                    <option selected>Seleccione el empaque</option>

                </select>
                <div class="col-12">
                    <input type="number" placeholder="Cantidad" id="cantidadEmpaque" style="display: none;" class="form-control mt-2" value="" required>
                </div>
                <div class="col-12">
                    <button type="submit" id="btnAgregar_empaque" class="btn  mt-2 btn-primary " style="float:right;display: none ">Agregar</button>
                </div>


            </div>
        </div>
        <!-- TABLA REGISTROS -->
        <div class="table-responsive mt-3 mb-3">
            <table class="table table-light table-bordered table-sm">

                <thead id="theadRegistroEmbalaje">

                </thead>
                <tbody id="tbodyRegistroEmbalaje">
                </tbody>
            </table>
        </div>
        <div id="divBtnGuardarEmbalaje" style="text-align: center; display:none">
            <button type="submit" id="btnGuardarEmbalaje" class="btn  mb-4 btn-primary ">Guardar embalaje</button>
        </div>
    </div>

</div>