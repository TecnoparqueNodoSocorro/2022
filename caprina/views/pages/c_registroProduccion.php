<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
?>
<div class="container">

    <h4 class="mt-2">Registrar Producción</h4>
    <!-- div para agregar produccion -->
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-12 col-lg-12">
                <label class="form-label">
                    <h6>Código</h6>
                </label>
                <?php
                $caprino = ControladorCaprino::ctrConsultarCaprinoActivo($id)
                ?>
                <select class="form-select mb-2" name="cosecha_user" id="caprino_produccion_select" aria-label="Default select example">
                    <option selected value="0">--Seleccione el código del caprino--</option>
                    <?php foreach ($caprino as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>
            </div>
        </div>
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Cantidad de Leche (Litros)</h6>
                </label>
                <input type="number" name="cantidad_leche" id="cantidad_leche" class="form-control" value="" required>
            </div>

            <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha</h6>
                </label>
                <input type="date" name="fecha_prod" id="fecha_prod" class="form-control" value="" required>
            </div>
        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnAdicionar" type="submit">Adicionar</button>
    </div>

   
</div>