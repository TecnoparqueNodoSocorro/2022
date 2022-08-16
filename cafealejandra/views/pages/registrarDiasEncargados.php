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
        <span class="text-warning mb-3">Registrar de Dias no Laborados</span>
    </h2>

    <?php
    $cosecha = ControladorCosecha::ConsultarCosechaActiva();
    ?>
    <label class="form-label">
        <h4 class="text-warning">Cosecha</h4>
    </label>
    <select class="form-select" name="cosecha_trabajo" id="dias_encargados">
        <option selected>--Seleccione la cosecha--</option>
        <?php foreach ($cosecha as $key => $value) : ?>

            <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

        <?php endforeach ?>

    </select>


    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Registrar</th>

                    <th>Nombre</th>
                    <th>Documento</th>

                </tr>
            </thead>
            <tbody id="bodyEncargados">
                <!--    <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Tiger Nixon</td>
                    <td>Edinburgh</td>

                </tr> -->

        </table>
    </div>

</div>




<!-- The Modal encargado-->
<div class="modal" id="myModalEncargado">
    <div class="modal-dialog modal-dialog-centered   ">
        <div class="modal-content" style="text-align: center">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title" id="nombre_encargado"></h2>
            </div>
            <!-- Modal body -->
            <div class="modal-body">



                <form name="form2" id="form2" method="post">

                    <div class="row">
                        <div class="input-group date col-12" id="datepicker">
                            <div class="col-12">
                                <span class="input-group-addon">
                                    <label class="form-label mt-3">
                                        Días de no asistencia:
                                    </label>
                                    <span id="fechas" class="count"></span></span>
                            </div>

                            <div class="col-12">

                                <input type="date" class="form-control" id="diasNoAsistidos" name="diasNoAsistidos" placeholder="Seleccione el día" required />

                            </div>
                        </div>
                        <!--         <div class="col-12">
                            <label class="form-label">
                                Total pendiente a pagar
                            </label>
                            <input type="number" readonly class="form-control" id="totalPagarEncargado" name="totalPagarEncargado" required>
                            <label class="form-label">
                                Cantidad a pagar
                            </label>
                            <input type="number" class="form-control" id="cantidadPagarEncargado" name="cantidadPagarEncargado" required>

                        </div> -->

                    </div>

                    <button type="button" id="btnCalcularEncargado" class="btn btn-warning mt-4">Agregar</button>
                </form>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>