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
<div class="container">

    <h2>
        <span class="text-warning mb-3">Reporte general por cosecha</span>
    </h2>

    <?php
    $cosecha = ControladorCosecha::ConsultarCosecha();
    ?>


    <select class="form-select rounded mb-2" name="cosecha" id="selectReporteGeneral" aria-label="Default select example">
        <option selected value="0">--Seleccione la cosecha--</option>
        <?php foreach ($cosecha as $key => $value) : ?>

            <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

        <?php endforeach ?>
    </select>

    <div class="row mb-3">
        <div class="col-6">


            <select class="form-select" name="" id="selectCargoReporteG">
                <option selected value="0">--Cargo--</option>
                <option value="1">Recolector</option>
                <option value="2">Encargado</option>
            </select>
        </div>
        <div class="col-6">

            <button type="button" onclick="GenerarReporte()" class="btn btn-warning col-12">Generar reporte</button>
        </div>

    </div>



    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead id="theadReporte">
                <!--    <tr>
                    <th>Nombre</th>
                    <th>Kilos recogidos</th>
                    <th>Total a pagar</th>
                    <th>Total pagado</th>
                    <th>Faltante a pagar</th>


                </tr> -->
            </thead>
            <tbody id="tbodyReporteGeneral">
            </tbody>
        </table>
    </div>


    <div class="table-responsive mt-3 mb-3">
        <table class="table table-bordered">
            <thead id="headReporteGeneral">
                <!-- <tr>
                    <th>Nombre Empleados</th>
                    <th>Kilos recogidos</th>
                    <th>Cafe Guayaba</th>
                    <th>Cafe Pergamino</th>
                </tr> -->
        </table>
    </div>
</div>