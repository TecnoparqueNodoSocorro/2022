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
    <h4 class="mt-2">Estado General Caprino</h4>
    <div class="container">
        <ul class="list-group mt-3">
            <?php
            $caprinos = ControladorCaprino::ctrConsultarCantidadDeCaprinosPorCaprinocultor($id);
            $controles = ControladorCaprinoControl::ctrCantidadDeControlesPorCaprinocultor($id);
            $controlesHoy = ControladorCaprinoControl::ctrCantidadDeControlesHoyPorCaprinocultor($id);
            $tratamientos = ControladorCaprino::ctrCantidadTratamientosPorCaprinocultor($id);
            ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Caprines <span class="badge bg rounded-pill"><?php echo ($caprinos) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Controles registrados <span class="badge bg rounded-pill"><?php echo ($controles) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Controles hoy <span class="badge bg rounded-pill"><?php echo ($controlesHoy) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Tratamientos registrados <span class="badge bg rounded-pill"><?php echo ($tratamientos) ?></span>
            </li>
        </ul>

    </div>
    <!-- listado de cantidad por razas -->
    <div class="container mt-3 mb-5">
        <h5 style="text-align:left">Razas</h5>
        <ul class="list-group mt-1 mb-2">
            <?php
            $razas = ControladorCaprino::ctrConsultarCantidadDeCaprinosPorRazaPorCaprinocultor($id)

            ?>
            <?php foreach ($razas as $key => $value) : ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $value["raza"] ?>
                    <span class="badge bg rounded-pill"><?php echo $value["cantidad"] ?></span>
                </li>
            <?php endforeach ?>

            <!--             <li class="list-group-item d-flex justify-content-between align-items-center">
                Alpino <span class="badge bg rounded-pill">3332</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Santandereano <span class="badge bg rounded-pill">1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nubiana <span class="badge bg rounded-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Tongengurn <span class="badge bg rounded-pill">1</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Booer <span class="badge bg rounded-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Otros <span class="badge bg rounded-pill">1</span>
            </li> -->

        </ul>
    </div>
</div>