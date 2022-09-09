<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if(isset( $_SESSION["id"])){
$id = $_SESSION["id"];}

?>

<div class="container mb-3">

    <!-- datos para generar el gráfico -->
    <h5 class="mt-2">Reporte gráfico de producción de leche por días</h5>

    <div class="container mb-2" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha inicio</h6>
                </label>
                <input type="date" name="fecha1_gra" id="fecha1_gra" class="form-control" value="" required>
            </div>

            <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha fin</h6>
                </label>
                <input type="date" name="fecha2_gra" id="fecha2_gra" class="form-control" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-3 mb-3" id="btnGenerarGrafica" type="submit">Generar gráfica</button>

        <!-- div para añadir la grafica -->
    </div>
    <div class="container">

        <canvas id="myChart" width="100%" height="100%" class="mb-5"></canvas>

    </div>
</div>