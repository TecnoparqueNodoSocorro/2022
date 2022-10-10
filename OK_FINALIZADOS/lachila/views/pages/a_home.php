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
<div class="container" style="background-color:#eeb3b3; border-radius:5px;">
<h3>Resumen lotes primera y segunda fermentación</h3>
    <?php
    $datos = ControladorVariables::ctrDatosHome(1);
    $datos2f = ControladorVariables::ctrDatosHome(2);
    //print_r($datos)
    ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs pt-2" style="background-color:#eeb3b3;" role="tablist">
        <li class="nav-item" role="1f">
            <button class=" nav-link active " style="font-size:0.8rem" id="home1f-tab" data-bs-toggle="tab" data-bs-target="#home1f" type="button" role="tab" aria-controls="home1f" aria-selected="true">Lotes en 1 fermentación</button>
        </li>
        <li class="nav-item" role="2f">
            <button class=" nav-link" style="font-size:0.8rem" id="home2f-tab" data-bs-toggle="tab" data-bs-target="#home2f" type="button" role="tab" aria-controls="home2f" aria-selected="false">Lotes en 2 fermentación</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">


        <!-- tab primera fermentacion -->
        <div class="tab-pane active  mt-1 mb-5" id="home1f" role="tabpanel" aria-labelledby="home1f-tab" style="text-align:left">
            <div class="table-responsive mt-3 mb-5">
                <table class="table table-danger table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código lote</th>
                            <th>Materia</th>

                            <th>Fecha inicio</th>
                            <th>#Registros</th>
                            <th>Detalles</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($datos as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value["codigo_lote"] ?></td>
                                <td><?php echo $value["materia"] ?></td>
                                <td><?php echo $value["fecha_inicio"] ?></td>
                                <td><?php echo $value["cantidad_registros"] ?></td>
                                <td><button type="button" data-id="<?php echo $value["id"] ?>" data-codigo="<?php echo $value["codigo_lote"] ?>" class="btndetalles btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                        <i class="bi bi-eye"></i>
                                    </button></td>

                            </tr>

                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
            <!--  <?php foreach ($datos as $key => $value) : ?>
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
                        #Registros de registros: <span class="badge bg-danger rounded-pill"><?php echo $value["cantidad_registros"] ?></span>
                    </li>
                </ul>

            <?php endforeach ?> -->
        </div>
        <!-- tab 2 fermentacion -->
        <div class="tab-pane   mt-1 mb-5" id="home2f" role="tabpanel" aria-labelledby="home2f-tab" style="text-align:left">
            <div class="table-responsive mt-3 mb-5">
                <table class="table table-danger table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código lote</th>
                            <th>Materia</th>

                            <th>Fecha inicio</th>
                            <th>#Registros</th>
                            <th>Detalles</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($datos2f as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value["codigo_lote"] ?></td>
                                <td><?php echo $value["materia"] ?></td>
                                <td><?php echo $value["fecha_inicio"] ?></td>
                                <td><?php echo $value["cantidad_registros"] ?></td>
                                <td>
                                    <button type="button" data-id="<?php echo $value["id"] ?>" data-codigo="<?php echo $value["codigo_lote"] ?>" class="btndetalles btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>


                            </tr>

                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
            <!--  <?php foreach ($datos2f as $key => $value) : ?>
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
                        #Registros de registros: <span class="badge bg-danger rounded-pill"><?php echo $value["cantidad_registros"] ?></span>
                    </li>
                </ul>

            <?php endforeach ?> -->
        </div>
    </div>
</div>

<!-- //MODAL PARA VER LOS DETALLES DEL LOTE -->

<div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="tituloDetalle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Materia (Prima)</label>
                            <textarea readonly class="form-control" name="" id="materiaDetalle" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Código</label>
                            <input type="text" readonly class="form-control" name="codigoDetalle" id="codigoDetalle" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Peso ini KG </label>
                            <input type="number" readonly class="form-control" name="PesoIni" id="PesoIniDetalle" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Peso Neto </label>
                            <input type="number" readonly class="form-control" name="pesoNeto" id="pesoNetoDetalle" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">P. Desperdicio </label>
                            <input type="number" readonly class="form-control" name="pesoDesperDetalle" id="pesoDesperDetalle" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Fecha de Inicio</label>
                            <input type="date" readonly class="form-control" name="fInicioDetalle" id="fInicioDetalle" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Adición</label>
                            <div class="mb-3">
                                <textarea readonly class="form-control" name="" id="adicionDetalle" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>