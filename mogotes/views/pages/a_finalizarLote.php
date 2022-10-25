<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}


$lotes = ControladorLote::ctrGetLotes();
?>
<div class="container">
    <h3>
        Finalizar lote
    </h3>
    <div class="container" style="background-color:#e3f8e0;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 px-3 py-3">


                <select class="form-select" id="select_cosecha_finalizar" aria-label="Default select example">
                    <option selected value="0">--Seleccione el lote a finalizar--</option>
                    <?php foreach ($lotes as $key => $value) : ?>
                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-12 col-sm-12 col-md-12 px-3 py-3">
                <input name="btnFinalizarLote" id="btnFinalizarLote" class="btn btn-success" type="button" value="Finalizar">
            </div>

        </div>
    </div>




</div>