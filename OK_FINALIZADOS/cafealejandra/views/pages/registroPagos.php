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
        <span class="text-warning mb-3">Registrar Pago a Recolectores</span>
    </h2>
    <?php
    $cosecha = ControladorCosecha::ConsultarCosechaActiva();
    ?>

    <label class="form-label">
        <h5 class="text-warning">Cosecha</h5>
    </label>
    <select class="form-select" name="cosecha_trabajo" id="registro_pago">
        <option selected>--Seleccione la cosecha--</option>
        <?php foreach ($cosecha as $key => $value) : ?>

            <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

        <?php endforeach ?>

    </select>

    <div class="table-responsive mt-4">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Documento</th>

                </tr>
            </thead>
            <tbody id="tablaPagos">
                <!-- <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModalEm
                                ">
                            <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>

                </tr>
                <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModalEncargado">
                            <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>

                </tr> -->
            </tbody>
        </table>

    </div>

</div>


<!-- The Modal empleado-->
<div class="modal" id="myModalEm">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="text-align: center">

            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title" id="nombreRecolector"> </h2>

            </div>

            <!-- Modal body -->
            <div class="modal-body">


                <div class="col-12">
                    <label class="form-label">
                        Kilos recogidos
                    </label>
                    <input type="number" readonly class="form-control" id="kilosRecogidos" name="kilosRecogidos" required>
                    <label class="form-label">
                        Total pendiente a pagar
                    </label>
                    <input type="text" readonly class="form-control" id="totalPagar" name="totalPagar" required>
                    <label class="form-label">
                        Cantidad a pagar
                    </label>
                    <input type="number" class="form-control" id="cantidadPagar" name="cantidadPagar" required>
                    <button type="button" id="btnPagar" class="btn btn-warning mt-5">Pagar</button>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>


<!-- 

<script type="text/javascript">
    $('#datepicker').datepicker({
        "multidate": true,

    }).on('changeDate', function(e) {
        // `e` here contains the extra attributes
        $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    });

    
</script> -->