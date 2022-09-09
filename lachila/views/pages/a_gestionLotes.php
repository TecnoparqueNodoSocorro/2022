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
    <div class="row">
        <div class="col-8 mt-1">
            <h5> Gestión de Lotes Administrador</h5>
        </div>

        <div class="col-4">
            <!-- Button trigger modal -->

            <button type="button" class="btn btn-sm btn-danger mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Nuevo
            </button>


            <!-- Modal crear nuevo lote-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Lote</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Materia (Prima)</label>
                                        <input type="text" class="form-control" name="materia" id="materia" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Código</label>
                                        <input type="text" class="form-control" name="fInicio" id="codigo" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Peso ini KG </label>
                                        <input type="number" class="form-control" name="PesoIni" id="PesoIni" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Peso Neto </label>
                                        <input type="number" class="form-control" name="pesoNeto" id="pesoNeto" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">P. Desperdicio </label>
                                        <input type="number" class="form-control" name="pesoDesper" id="pesoDesper" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Fecha de Inicio</label>
                                        <input type="date" class="form-control" name="fInicio" id="fInicio" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="form-label">Adición</label>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="" id="adicion" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnCancelarLote" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" id="btnCrearLote" class="btn btn-danger">Crear Lote</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- final Modal crear nuevo lote-->

        </div>
    </div>



    <!-- Nav tabs -->
    <ul class="nav nav-tabs" style="background-color:#eeb3b3;" role="tablist">
        <li class="nav-item" role="1f">
            <button class="nav-tab nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">1 F</button>
        </li>
        <li class="nav-item" role="2f">
            <button class="nav-tab nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">2 F</button>
        </li>

        <li class="nav-item" role="envasado">
            <button class="nav-tab nav-link " id="envasado-tab" data-bs-toggle="tab" data-bs-target="#envasado" type="button" role="tab" aria-controls="envasado" aria-selected="false">Envasado</button>
        </li>
        <li class="nav-item" role="historial">
            <button class="nav-tab nav-link " id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Historial</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">







        <!-- tab primera fermentacion -->
        <div class="tab-pane active  mt-1 mb-5" id="home" role="tabpanel" aria-labelledby="home-tab" style="text-align:left">
            <h6 style="color: #a20202">Primera Fase</h6>

            <!-- tabla primera fermentacion -->
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered table-sm">
                    <thead>
                        <tr>

                            <th>Opciones</th>
                            <th>Código</th>
                            <th>Materia</th>
                            <th>F. Inicio</th>
                            <th>Peso Ini. Materia KG </th>
                        </tr>
                    </thead>

                    <tbody id="tbody1f">
                        <!--   <?php foreach ($lotes1 as $key => $value) : ?>
                      <tr>
                            <td><button type="button" id="btnFerme1" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#consultar">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td><?php echo $value["id"] ?></td>
                            <td><?php echo $value["materia"] ?></td>
                            <td><?php echo $value["fecha_inicio"] ?></td>
                            <td><?php echo $value["peso_inicial"] ?></td>
                        </tr> 
                        
                <?php endforeach ?> -->

                    </tbody>
                </table>
            </div>
            <!-- final tabla primer fermentacion -->

            <!-- Modal ver consultas de primer fermentacion-->
            <div class="modal fade" id="consultar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="numero_lote_f1"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: center;">
                            <div class="row justify-content-md-center">
                                <h5>Reporte gráfico temperatura y humedad por días</h5>

                                <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                                    <label class="form-label">
                                        <h6>Fecha inicio</h6>
                                    </label>
                                    <input type="date" name="fecha1_gra" id="fecha_inicioG" class="form-control" value="" required>
                                </div>

                                <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                                    <label class="form-label">
                                        <h6>Fecha fin</h6>
                                    </label>
                                    <input type="date" name="fecha2_gra" id="fecha_finG" class="form-control" value="" required>
                                </div>
                                <div class="row justify-content-md-center mt-2">
                                    <div class="col-6 col-xs-6 col-md-6 col-lg-6">
                                        <button type="button" class="botongrafico btn btn-primary" onclick="GenerarGrafica()" data-bs-toggle="button" aria-pressed="false" autocomplete="off">Generar Gráfica</button>
                                    </div>
                                    <div class="col-6 col-xs-6 col-md-6 col-lg-6">
                                        <button type="button" class="botongrafico btn btn-danger" onclick="OcultarGrafica()" data-bs-toggle="button" aria-pressed="false" autocomplete="off">Ocultar Gráfica</button>
                                    </div>
                                </div>


                            </div>
                            <div class="container" id="div_grafica" style="display:none;">
                                <h6>Temperatura y Humedad</h6>
                                <canvas id="myChart" width="100%" height="100%" class="mb-5"></canvas>


                            </div>



                            <div class="table-responsive mt-3">
                                <table class="table table-danger table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Brix</th>
                                            <th>Alcohol</th>
                                            <th>PH</th>
                                            <th>TDS</th>
                                            <th>AC</th>
                                            <th>Temp.</th>
                                            <th>Humed.</th>
                                            <th>Día registro</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyRegistrosLotesF1">
                                        <!-- <tr>

                                                    <td>1</td>
                                                    <td>Manzaana</td>
                                                    <td>11/07/2022</td>
                                                    <td>66</td>
                                                </tr> -->
                                    </tbody>
                                </table>
                            </div>


                            <div class="col-12 mt-3">
                                <a class="btn btn-primary" id="finalizarPrimeraF" onclick="finalizarPrimeraF()" type="button">Finalizar Proceso</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCerrarM" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- final del modal consultas de lote primera fermentacion-->



        </div>
        <!-- fin tab primera fermentacion -->


        <!-- segunda fermentacion tab -->
        <div class="tab-pane  mt-1 mb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="text-align:left">
            <h6 style="color: #a20202">Segunda Fase</h6>
            <!-- tabla segunda fermentacion -->
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Código</th>
                            <th>Materia</th>
                            <th>F. Inicio</th>
                            <th>Peso Inicial Materia en Kg</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tbody id="tbody2f">
                        <!--       <?php foreach ($lotes2 as $key => $value) : ?>
                         <tr>
                            <td><button type="button" id="btnFerme2" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#consultar2fase">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td><?php echo $value["id"] ?></td>
                            <td><?php echo $value["materia"] ?></td>
                            <td><?php echo $value["fecha_inicio"] ?></td>
                            <td><?php echo $value["peso_inicial"] ?></td>
                        </tr> 
                        
                <?php endforeach ?> -->
                    </tbody>
                </table>
            </div>

            <!-- Modal ver consultas de segunda fermentacion-->
            <div class="modal fade" id="consultar2fase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="numero_lote_f2"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: center;">

                            <div class="row justify-content-md-center">
                                <h5>Reporte gráfico temperatura y humedad por días</h5>

                                <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                                    <label class="form-label">
                                        <h6>Fecha inicio</h6>
                                    </label>
                                    <input type="date" name="" id="fecha_inicioGF2" class="form-control" value="" required>
                                </div>

                                <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                                    <label class="form-label">
                                        <h6>Fecha fin</h6>
                                    </label>
                                    <input type="date" name="" id="fecha_finGF2" class="form-control" value="" required>
                                </div>

                                <div class="row justify-content-md-center mt-2">
                                    <div class="col-6 col-xs-6 col-md-6 col-lg-6">
                                        <button type="button" class="botongrafico btn btn-primary" onclick="GenerarGraficaF2()" data-bs-toggle="button" aria-pressed="false" autocomplete="off">Generar Gráfica</button>
                                    </div>

                                    <div class="col-6 col-xs-6 col-md-6 col-lg-6">
                                        <button type="button" class="botongrafico btn btn-danger" onclick="OcultarGraficaF2()" data-bs-toggle="button" aria-pressed="false" autocomplete="off">Ocultar Gráfica</button>
                                    </div>

                                </div>


                            </div>
                            <div class="container" id="div_graficaF2" style="display:none;">
                                <h6>Temperatura y Humedad</h6>
                                <canvas id="myChartF2" width="100%" height="100%" class="mb-5"></canvas>


                            </div>

                            <div class="col-12">
                                <div class="table-responsive mt-3">
                                    <table class="table table-danger table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Brix</th>
                                                <th>Alcohol</th>
                                                <th>PH</th>
                                                <th>TDS</th>
                                                <th>AC</th>
                                                <th>Temp.</th>
                                                <th>Humed.</th>
                                                <th>Día registro</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyRegistrosLotesF2">
                                            <!--  <tr>

                                                    <td>1</td>
                                                    <td>Manzaana</td>
                                                    <td>11/07/2022</td>
                                                    <td>66</td>
                                                </tr> -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-12 mt-3">
                                <a class="btn btn-primary" id="nextProcess" onclick="finalizarSegundaF()" type="button">Finalizar Proceso</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCerrarM" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- final del modal consultas de lote segunda fermentacion-->

            <!-- final  tabla segunda f -->
        </div>
        <!-- fin tab segunda fermentacion -->


        <!-- tab fase de envasado -->
        <div class="tab-pane  mt-1 mb-5" id="envasado" role="tabpanel" aria-labelledby="envasado-tab" style="text-align:left">
            <h6 style="color: #a20202"> Fase Envasado</h6>
            <!-- tabla envase -->
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Id</th>
                            <th>Materia</th>
                            <th>F. Inicio</th>
                            <th>Peso Inicial Materia en Kg</th>
                        </tr>
                    </thead>

                    <tbody id="tbody3f">
                        <!--                     <?php foreach ($lotes3 as $key => $value) : ?>
                         <tr>
                            <td><button type="button" id="btnFerme3" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#consultar">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td><?php echo $value["id"] ?></td>
                            <td><?php echo $value["materia"] ?></td>
                            <td><?php echo $value["fecha_inicio"] ?></td>
                            <td><?php echo $value["peso_inicial"] ?></td>
                        </tr> 
                        
                <?php endforeach ?> -->

                    </tbody>
                </table>
            </div>
            <!-- fin tabla lotes en envase -->
            <!-- modal lotes en estado de envase -->
            <div class="modal fade" id="envase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="numero_lote_f3"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <!--    <div class="row  mt-3">

                                    <div class="table-responsive mt-3">
                                        <table class="table table-danger table-bordered table-sm">
                                            <thead>
                                                <tr>

                                                    <th>Id</th>
                                                    <th>Materia</th>
                                                    <th>F. Inicio</th>
                                                    <th>Peso Inicial Materia en Kg</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>1</td>
                                                    <td>Manzana</td>
                                                    <td>11/07/2022</td>
                                                    <td>76</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div> -->
                                <div class="col-12 mt-3">
                                    <a class="btn btn-primary" id="finishProcess" onclick="finalizarFaseEnvasado()" type="button">Finalizar Proceso</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCerrarEnvase" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- final del modal lotes en estado de envase -->
        </div>
        <!-- fin tab lotes en envase -->


        <!-- tab historial -->
        <div class="tab-pane  mt-1 mb-5" id="messages" role="tabpanel" aria-labelledby="messages-tab" style="text-align:left">
            <h6 style="color: #a20202">Historial</h6>
            <!-- tabla historial -->
            <div class="table-responsive mt-2">
                <table class="table table-danger table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Registros</th>
                            <th>Código del lote</th>
                            <th>Materia</th>
                            <th>Fecha de cierre</th>
                            <!--  <th>Código del registro</th>
                            <th>Código del lote</th>
                            <th>Brix</th>
                            <th>Alcohol</th>
                            <th>PH</th>
                            <th>TDS</th>
                            <th>AC</th>
                            <th>Fecha registro</th>
                            <th>Usuario</th> -->

                        </tr>
                    </thead>
                    <tbody id="tbody4f">
                        <!--      <tr>
                            <td><button type="button" id="btnHistA" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#detalles">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>11/07/2022</td>

                        </tr> -->

                    </tbody>
                </table>
                <!-- final  tabla historial -->

            </div>


            <!-- final  tab historial -->


            <!-- Modal ver detallles de lote historial -->
            <div class="modal fade mb-5" id="detalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="numero_lote_f4"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body" style="text-align: center;">



                            <h4>Registro del lote</h4>


                            <div class="table-responsive mt-3 mb-5">
                                <table class="table table-danger table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Fase</th>
                                            <th>Brix</th>
                                            <th>Alcohol</th>
                                            <th>PH</th>
                                            <th>TDS</th>
                                            <th>AC</th>
                                            <th>Temp.</th>
                                            <th>Humed.</th>
                                            <th>Día registro</th>

                                        </tr>
                                    </thead>
                                    <tbody id="HistorialLote">

                                        <!-- 
                                    <tr>
                                        <td>Mark</td>
                                        <td>4</td>
                                        <td>23</td>
                                        <td>33</td>
                                        <td>55</td>
                                        <td>6</td>
                                        <td>01/01/2022</td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- final del modal historial -->
        </div>
    </div>
</div>