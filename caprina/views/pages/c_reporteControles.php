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
<div class="container-fluid" id="div_form_cont_c">
    <h4 class=""> Reporte de Controles</h4>
    <div class="container-fluid mb-3 mt-2" style="background-color:#f8deb9;border-radius:5px; text-align:center">
        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha inicio</h6>
                </label>
                <input type="date" name="fecha_inicio" id="fecha_inicioReporteUsuario" class="form-control" value="" required>
            </div>

            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha fin</h6>
                </label>
                <input type="date" name="fecha_fin" id="fecha_finReporteUsuario" class="form-control" value="" required>
            </div>
            <div class="col-12 mt-1">
                <label class="form-label">
                    <h6>Seleccione la enfermedad</h6>
                </label>

                <select class="form-select mb-2" name="" id="seleccion_enfermedadReporteUsuario" aria-label="Default select example">
                    <option selected value="0">--Seleccione la enfermedad--</option>
                    <option value="todas">Todas</option>
                    <option value="enfermedad_respiratoria">Enfermedad respiratoria</option>
                    <option value="enfermedad_gastrointestinal">Enfermedad gastrointestinal</option>
                    <option value="enfermedad_mordedura">Enfermedad por mordeduras</option>
                </select>
            </div>
        </div>

        <button class="btn btn-warning mt-2 mb-2" id="btnReporteControlesReporteUsuario" type="submit">Generar reporte</button>

        <!-- tabla del reporte generado -->

    </div>
</div>

<div class="container-fluid" style="display:grid ;">
    <div class="table-responsive mt-3 mb-3">
        <table class="table table-warning table-bordered  table-sm rc_tabla">
            <thead id="thead_reporteReporteUsuario" class="table-light">
                <!--    <tr>
                    <th>Código del caprino</th>
                    <th>Raza</th>
                    <th>Condición corporal</th>
                    <th>Enfermedad respiratoria</th>
                    <th>Enfermedad gastrointestinal</th>
                    <th>Enfermedad por mordeduras</th>
                    <th>Fecha de registro</th>

                </tr> -->
            </thead>
            <tbody id="tbody_reporte_controlesReporteUsuario">

            </tbody>
        </table>
    </div>
    <button class="fw-bold btn btn-warning  mb-5" id="btn_nueva_consulta_c" type="button">Generar Nuevo Reporte</button>

</div>