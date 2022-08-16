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
    <div class="container  mt-5">
        <h2>
            <span class="text-warning ">Nueva Cosecha</span>
        </h2>
        <div class="row">
            <div class="col-12">
                <label class="form-label">
                    <h6>Fecha de inicio</h6>
                </label>
                <input type="date" name="fecha_inicio" id="fecha_Inicio" class="form-control" value="" required>
            </div>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">

                    <label class="form-label">
                        <h6>Pago por kilo</h6>
                    </label>
                    <input type="number" name="pago_kilo" id="pago_kilo" class="form-control" value="" required>
                </div>
                <div class="col-6">
                    <label class="form-label">
                        <h6>Pago Encargado</h6>
                    </label>
                    <input type="number" name="pago_encargado" id="pago_encargado" class="form-control" value="" required>
                </div>
                <div class="col-12 mt-5">
                    <button class="btn btn-warning" id="btnIniciarCosecha" type="button">Iniciar Cosecha</button>
                </div>
            </div>
        </form>
    </div>
</div>