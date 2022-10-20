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
    <h4>
        <span class="text-warning mb-3">Reporte Avanzado Recolector</span>
    </h4>
    <div class="formularioKilos">

        <?php
        $cosecha = ControladorCosecha::ConsultarCosecha()
        ?>


        <div class="row">
            <div class="col-12">
                <select class="form-select" id="cosecha_pago" aria-label="Default select example">
                    <option selected>Seleccione la cosecha</option>
                    <?php foreach ($cosecha as $key => $value) : ?>

                        <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

                    <?php endforeach ?>

                </select>
            </div>
            <div class="col-12 mt-3">
                <select class="form-select" id="empleado_cosecha" aria-label="Default select example">
                    <option selected>Seleccione el empleado</option>

                </select>
            </div>


            <div class="col-6">
                <label for="validationServer01">
                    <h6>Fecha Inicio</h6>
                </label>
                <input type="date" id="fecInicio" name="fecInicio" class="form-control" value="" required>
            </div>
            <div class="col-6">
                <label for="validationServer02">
                    <h6>Fecha Fin</h6>
                </label>
                <input placeholder="Fecha fin" id="fecFin" name="fecFin" type="date" class="form-control" value="" required>
            </div>
            <div class="col-12">

                <button type="button" id="btnGenerarCant" class="btn btn-warning mt-3">Generar </button>
            </div>
        </div>





        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Kilos </th>
                        <th>Total. pagar</th>
                        <th>Total. pagado</th>
                        <th>Faltante por pagar</th>


                    </tr>
                </thead>
                <tbody id="bodyReporte">
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