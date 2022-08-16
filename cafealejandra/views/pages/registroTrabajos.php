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
        <span class="text-warning mb-3">Registro de Trabajo Diario</span>
    </h2>

    <?php
    $cosecha = ControladorCosecha::ConsultarCosechaActiva();
    ?>
    <label class="form-label">
        <h4 class="text-warning">Cosecha</h4>
    </label>
    <select class="form-select" name="cosecha_trabajo" id="cosecha_trabajo">
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
            <tbody id="body">
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



<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content " style="text-align: center">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalHeadNombre">Nombre del empleado</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


                <div class="col-12">
                    <form>


                        <label for="validationServer02" class="form-label">
                            <h4>Kilos recogidos</h4>
                        </label>
                        <input type="number" id="kilos_recogidos" class="form-control" value="" required>


                        <label for="validationServer02" class="form-label">
                            <h4>Fecha</h4>
                        </label>
                        <input type="date" id="fecha_recoleccion" class="form-control" value="" required>
                        <button type="button" id="agregar_trabajo" class="btn btn-warning mt-4">Agregar</button>
                    </form>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="cancelar" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>