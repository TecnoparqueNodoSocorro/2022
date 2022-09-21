<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

?>
<div class="container">
    <h4 class="mt-2"> Reporte de Tratamientos</h4>
    <div class="container mb-3 mt-2" style="background-color:#f8deb9;border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha inicio</h6>
                </label>
                <input type="date" name="fecha_inicioH" id="fecha_inicioRTPU" class="form-control" value="" required>
            </div>

            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha fin</h6>
                </label>
                <input type="date" name="fecha_finH" id="fecha_finRTPU" class="form-control" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-2 mb-2" id="btnReporteRTPU" type="button">Generar reporte</button>

        <!-- tabla del reporte generado -->

    </div>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered table-sm">
            <thead>
                <tr>
                    <th>Código del caprino</th>
                    <th>Raza</th>
                    <th>Propietario</th>
                    <th>Código del tratamiento</th>
                    <th>Descripción del tratamiento</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody id="tbodyreporteTratamientoRTPU">

             

            </tbody>
        </table>
    </div>
</div>