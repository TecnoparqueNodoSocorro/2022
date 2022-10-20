<?php
if (isset($_SESSION["validar_rol"])) {
    if ($_SESSION["validar_rol"] != "3") {
        echo '<script>window.location="index.php?page=error2"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error3"; </script>';
}
?>
<!-- header -->
<div class="container">
    <h2>
        <span class="text-warning mb-3">Reporte Avanzado Encargado</span>
    </h2>
    <div class="formularioKilos">

        <?php
        $cosecha = ControladorCosecha::ConsultarCosechaActiva()
        ?>


        <div class="row">
            <div class="col-12">
                <select class="form-select" id="cosecha_encargado" aria-label="Default select example">
                    <option selected>Seleccione la cosecha</option>
                    <?php foreach ($cosecha as $key => $value) : ?>

                        <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

                    <?php endforeach ?>

                </select>
            </div>
            <div class="col-12 mt-3">
                <select class="form-select" id="listado_encargados" aria-label="Default select example">
                    <option selected>Seleccione el encargado</option>

                </select>
            </div>


            <div class="col-6">
                <label for="validationServer01">
                    <h6>Fecha Inicio</h6>
                </label>
                <input type="date" id="fecIni" name="fecIni" class="form-control" value="" required>
            </div>
            <div class="col-6">
                <label for="validationServer02">
                    <h6>Fecha Fin</h6>
                </label>
                <input placeholder="Fecha fin" id="fecFinal" name="fecFin" type="date" class="form-control" value="" required>
            </div>
            <div class="col-12">

                <button type="button" id="btnGenerar" class="btn btn-warning mt-3">Generar </button>
            </div>
        </div>





        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Días trabajados</th>
                        <th>Días no Trabajados</th>
                        <th>Total a pagar</th>
                        <th>Total pagado</th>
                        <th>Saldo a pagar</th>

                    </tr>
                </thead>
                <tbody id="bodyReporteEncargado">
                    <!--  <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>