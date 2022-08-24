<?php
if (isset($_SESSION["validar_ingreso"])) {
 
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if(isset( $_SESSION["id"])){
$id = $_SESSION["id"];}

?>

<div class="container">
    <h4>Registro de Salidas</h4>

    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <!-- formulario para buscar caprino para darle de baja -->
        <div class="row justify-content-md-center mt-2">
            <?php
            $caprino = ControladorCaprino::ctrConsultarCaprinoActivo($id);
            ?>
            <div class="col-12">
                <label class="form-label">
                    <h6>Código</h6>
                </label>
                <select class="form-select mb-2" name="" id="caprino_salida_select" aria-label="Default select example">
                    <option selected value="0">--Seleccione el código del caprino--</option>
                    <?php foreach ($caprino as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>
            </div>

        </div>
        <div class="row justify-content-md-center mt-2">
            <div class="col-12">
                <label class="form-label">
                    <h6>Fecha</h6>
                </label>
                <input type="date" name="fecha_salida" id="fecha_salida" class="form-control" value="" required>
            </div>

        </div>
        <div class="row justify-content-md-center mt-2">

            <div class="col-12">

                <label class="form-label">
                    <h6>Motivo de Salida</h6>
                </label>
                <select class="form-select" name="motivo_salida" id="motivo_salida" aria-label="Default select example">
                    <option selected>--Seleccione el motivo--</option>
                    <option value="1">Sacrificio</option>
                    <option value="2">Venta</option>
                    <option value="2">Muerte Natural</option>
                    <option value="2">Autoconsumo</option>
                    <option value="2">Otra</option>
                </select>
            </div>
        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrarS" type="submit">Registrar Salida</button>
    </div>

    <!-- listado de caprinos que se dieron de baja -->
    <h5 class="mt-3">Listado de Salidas</h5>
    <?php
    $caprinoInactivo = ControladorCaprino::ctrConsultarCaprinoInactivo($id)

    ?>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Raza</th>
                    <th>Motivo de salida</th>
                    <th>Fecha de salida</th>


                </tr>
            </thead>
            <tbody>

                <?php foreach ($caprinoInactivo as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["codigo"] ?></td>
                        <td><?php echo $value["raza"] ?></td>
                        <td><?php echo $value["motivo_salida"] ?></td>
                        <td><?php echo $value["fecha_salida"] ?></td>

                    </tr>

                <?php endforeach ?>

                </tr>
            </tbody>
        </table>
    </div>
</div>