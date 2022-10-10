<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
?>
<div class="container-fluid" style="text-align: center;">
    <h4 class="mt-2"> Reporte de Tratamientos</h4>
    <div class="container-fluid mb-3 mt-2" style="background-color:#f8deb9;border-radius:5px;" id="div_formulario_tratamientos">
        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha inicio</h6>
                </label>
                <input type="date" name="fecha_inicioH" id="fecha_inicioH" class="form-control" value="" required>
            </div>

            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha fin</h6>
                </label>
                <input type="date" name="fecha_finH" id="fecha_finH" class="form-control" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-2 mb-2" id="btnReporteH" type="button">Generar reporte</button>

        <!-- tabla del reporte generado -->

    </div>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-striped table-warning  table-sm dt_tabla">
            <thead>
                <tr>
                <th>Código del tratamiento</th>

                    <th>Aplicado</th>
                    <th>Código del caprino</th>
                    <th>Raza</th>
                    <th>Propietario</th>
                    <th>Descripción del tratamiento</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody id="tbodyreporteTratamiento">



            </tbody>
        </table>
        <button class="btn btn-warning mt-2 mb-2" style="margin: 0 auto;" id="btn_recargar_reporte" type="button">Generar Nuevo reporte</button>


    </div>
</div>