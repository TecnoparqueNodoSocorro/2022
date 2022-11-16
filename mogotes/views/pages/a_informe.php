<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

$lotes = ControladorLote::ctrGetLotesInformes();
$lotesFinalizados = ControladorLote::ctrGetLotesFinalizadosInformes();
//print_r($lotes)
?>


<div class="container">
    <div class="container">

        <h3 class="fw-bold">Informe</h3>
        <div class="table-responsive mt-3 mb-5">
            <table class="table table-ligh table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Registros</th>
                        <th>Código</th>
                        <th>Fecha recepción</th>
                        <th>Etapa</th>
                    </tr>
                </thead>
                <?php foreach ($lotes as $key => $value) : ?>
                    <tbody>
                        <tr class=" <?php if ($value["estado"] == "1") {
                                        echo 'table-primary';
                                    } elseif ($value["estado"] == "2") {
                                        echo  'table-secondary';
                                    } elseif ($value["estado"] == "3") {
                                        echo  'table-warning';
                                    } elseif ($value["estado"] == "4") {
                                        echo   'table-info';
                                    } elseif ($value["estado"] == "5") {
                                        echo  'table-danger';
                                    } ?>">

                            <td>
                                <button type="button" data-cod="<?php echo $value["codigo"] ?>" class="btnInfo btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_informes"><i class="bi bi-plus-square-fill"></i></button>
                            </td>
                            <td><?php echo $value["codigo"] ?></td>
                            <td><?php echo $value["fecha_recepcion"] ?></td>
                            <td>
                                <?php if ($value["estado"] == "1") {
                                    echo "Recepción";
                                } elseif ($value["estado"] == "2") {
                                    echo "Escaldado";
                                } elseif ($value["estado"] == "3") {
                                    echo "Producción";
                                } elseif ($value["estado"] == "4") {
                                    echo "Embalaje";
                                } elseif ($value["estado"] == "5") {
                                    echo "Finalizado";
                                } ?>


                            </td>

                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btm-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-finalizados">
            Ver lotes finalizados
        </button>
    </div>

</div>


<!-- Modal finalizados-->
<div class="modal fade" id="modal-finalizados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="width:100%">
                <div class="table-responsive mt-3 mb-5">
                    <table class="table table-ligh table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Registros</th>
                                <th>Código</th>
                                <th>Fecha recepción</th>
                                <th>Etapa</th>
                            </tr>
                        </thead>
                        <?php foreach ($lotesFinalizados as $key => $value) : ?>
                            <tbody>
                                <tr class=" <?php if ($value["estado"] == "1") {
                                                echo 'table-primary';
                                            } elseif ($value["estado"] == "2") {
                                                echo  'table-secondary';
                                            } elseif ($value["estado"] == "3") {
                                                echo  'table-warning';
                                            } elseif ($value["estado"] == "4") {
                                                echo   'table-info';
                                            } elseif ($value["estado"] == "5") {
                                                echo  'table-danger';
                                            } ?>">

                                    <td>
                                        <button type="button" data-cod="<?php echo $value["codigo"] ?>" class="btnInfo btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_informes"><i class="bi bi-plus-square-fill"></i></button>
                                    </td>
                                    <td><?php echo $value["codigo"] ?></td>
                                    <td><?php echo $value["fecha_recepcion"] ?></td>
                                    <td>
                                        <?php if ($value["estado"] == "1") {
                                            echo "Recepción";
                                        } elseif ($value["estado"] == "2") {
                                            echo "Escaldado";
                                        } elseif ($value["estado"] == "3") {
                                            echo "Producción";
                                        } elseif ($value["estado"] == "4") {
                                            echo "Embalaje";
                                        } elseif ($value["estado"] == "5") {
                                            echo "Finalizado";
                                        } ?>


                                    </td>

                                </tr>

                            </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal ifnorme-->
<div class="modal fade" id="modal_informes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloModalInforme"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="width:100%">
                <h5 class="titulo-reporte titulo-recepcion ">Recepción</h5>
                <div class="row div-reporte  div-recepcion">

                    <div class="col-6 ">
                        <div class="input-group  mb-1">
                            <span class="text-informe  input-group-text " id="">F. recepción: <strong id="fecha_recepcionInfo"></strong></span>
                        </div>

                    </div>

                    <div class="col-6 ">
                        <div class="input-group  mb-1">
                            <span class="text-informe  input-group-text " id="">Peso total: <strong id="pesoTotalLote"></strong></span>
                        </div>

                    </div>
                </div>
                <div class="row div-reporte div-recepcion">


                    <div class="col-6">
                        <div class="input-group  mb-1">
                            <span class="text-informe input-group-text " id="lebrijaInfo"></span>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="input-group  mb-1">
                            <span class="text-informe  input-group-text " id="cristalinaInfo"></span>
                        </div>
                    </div>

                </div>





                <div class="row div-reporte  div-recepcion">

                    <div class="col-6 ">
                        <div class="input-group  mb-1">
                            <span class="text-informe  input-group-text " id="villaMercedesInfo"></span>
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="input-group  mb-1 ">
                            <span class="text-informe  input-group-text mr-2" id="manzanaBlancaInfo"></span>
                        </div>

                    </div>


                </div>
                <div class="row div-reporte  div-recepcion">

                    <div class="col-12">
                        <div class="input-group  mb-1">
                            <span class="text-informe  input-group-text " id="textLoteAnteriorInfo"></span>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="input-group  mb-1">
                            <span class="text-informe  input-group-text " id="textUsuarioRecepcion"></span>
                        </div>

                    </div>
                </div>

                <hr>
                <h5 class="titulo-reporte titulo-escaldado">Escaldado</h5>


                <div class="row div-escaldado" id="">
                    <div class="col-6  div-escaldado" id="divInfoEscaldado1">


                    </div>
                    <div class="col-6  div-escaldado" id="divInfoEscaldado2">


                    </div>
                </div>

                <hr>
                <h5 class="titulo-reporte titulo-produccion">Producción</h5>
                <div class="row div-produccion" id="" style="text-align: center;">
                    <h7 class="" id="textBocadillo"></h7>
                    <div class="col-6 " id="ReporteBocadilloInfo1">

                    </div>
                    <div class="col-6 " id="ReporteBocadilloInfo2">

                    </div>

                    <h7 class="" id="textEspejuelo"></h7>
                    <div class="col-6 " id="ReporteEspejueloInfo1">

                    </div>
                    <div class="col-6 " id="ReporteEspejueloInfo2">

                    </div>
                    <h7 class="" id="textArequipe"></h7>
                    <div class="col-6 " id="ReporteArequipeInfo1">

                    </div>
                    <div class="col-6 " id="ReporteArequipeInfo2">

                    </div>
                </div>
                <hr>
                <h5 class="titulo-reporte titulo-embalaje">Embalaje</h5>

                <div class=" div-embalaje row row-cols-2" id="containerEmbalaje">


                </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>