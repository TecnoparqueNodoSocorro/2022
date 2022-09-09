<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=login"; </script>';
}
?>
<div class="container"  style="background-color:#eeb3b3; border-radius:5px;">
    <?php
    $datos = ControladorVariables::ctrDatosHome(1);
    $datos2f = ControladorVariables::ctrDatosHome(2);
    ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs pt-2" style="background-color:#eeb3b3;" role="tablist">
        <li class="nav-item" role="1f">
            <button class="nav-tab nav-link active " id="home1f-tab" data-bs-toggle="tab" data-bs-target="#home1f" type="button" role="tab" aria-controls="home1f" aria-selected="true">Lotes en 1 Fase</button>
        </li>
        <li class="nav-item" role="2f">
            <button class="nav-tab nav-link" id="home2f-tab" data-bs-toggle="tab" data-bs-target="#home2f" type="button" role="tab" aria-controls="home2f" aria-selected="false">Lotes en 2 Fase</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">


        <!-- tab primera fermentacion -->
        <div class="tab-pane active  mt-1 mb-5" id="home1f" role="tabpanel" aria-labelledby="home1f-tab" style="text-align:left">
            <?php foreach ($datos as $key => $value) : ?>
                <ul class="list-group pb-3">

                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Código lote: <span class="badge bg-danger rounded-pill"><?php echo $value["codigo_lote"] ?></span>
                    </li>
                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Materia: <span class="badge bg-danger rounded-pill"><?php echo $value["materia"] ?></span>
                    </li>
                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Fecha inicio: <span class="badge bg-danger rounded-pill"><?php echo $value["fecha_inicio"] ?></span>
                    </li>
                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Cantidad de registros: <span class="badge bg-danger rounded-pill"><?php echo $value["cantidad_registros"] ?></span>
                    </li>
                </ul>

            <?php endforeach ?>
        </div>
        <!-- tab 2 fermentacion -->
        <div class="tab-pane   mt-1 mb-5" id="home2f" role="tabpanel" aria-labelledby="home2f-tab" style="text-align:left">
            <?php foreach ($datos2f as $key => $value) : ?>
                <ul class="list-group pb-3">

                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Código lote: <span class="badge bg-danger rounded-pill"><?php echo $value["codigo_lote"] ?></span>
                    </li>
                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Materia: <span class="badge bg-danger rounded-pill"><?php echo $value["materia"] ?></span>
                    </li>
                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Fecha inicio: <span class="badge bg-danger rounded-pill"><?php echo $value["fecha_inicio"] ?></span>
                    </li>
                    <li class="list-group-item d-flex  justify-content-between align-items-center">
                        Cantidad de registros: <span class="badge bg-danger rounded-pill"><?php echo $value["cantidad_registros"] ?></span>
                    </li>
                </ul>

            <?php endforeach ?>
        </div>
    </div>
</div>