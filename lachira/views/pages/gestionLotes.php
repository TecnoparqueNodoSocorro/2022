<div class="container">
    <div class="row">
        <div class="col-8 mt-1">
            <h5> Gestión de Lotes Administrador</h5>
        </div>

        <div class="col-4">
            <!-- Button trigger modal -->

            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Nuevo
            </button>


            <!-- Modal crear nuevo lote-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                                        <label for="" class="form-label">Materia (Sabor)</label>
                                        <input type="text" class="form-control" name="materia" id="materia"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Fecha de Inicio</label>
                                        <input type="date" class="form-control" name="fInicio" id="fInicio"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Peso ini KG </label>
                                        <input type="number" class="form-control" name="PesoIni" id="PesoIni"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Peso Neto </label>
                                        <input type="number" class="form-control" name="pesoNeto" id="pesoNeto"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">P. Desperdicio </label>
                                        <input type="number" class="form-control" name="pesoDesper" id="pesoDesper"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Adición</label>
                                        <input type="text" class="form-control" name="adicion" id="adicion"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="form-label">Fermentación</label>
                                        <input type="number" class="form-control" name="fermen" id="fermen"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnCancelarLote" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cerrar</button>
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
            <button class="nav-tab nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">1 F</button>
        </li>
        <li class="nav-item" role="2f">
            <button class="nav-tab nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">2 F</button>
        </li>

        <li class="nav-item" role="envasado">
            <button class="nav-tab nav-link " id="envasado-tab" data-bs-toggle="tab" data-bs-target="#envasado"
                type="button" role="tab" aria-controls="envasado" aria-selected="false">Envasado</button>
        </li>
        <li class="nav-item" role="historial">
            <button class="nav-tab nav-link " id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                type="button" role="tab" aria-controls="messages" aria-selected="false">Historial</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <!-- Modal ver consultas de lote -->
        <div class="modal fade" id="consultar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Numero de Lote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row  mt-3">
                                <div class="col-12 col-sm-6">
                                    <h6>Temperatura</h6>
                                    <div class="image">
                                        <img src="images/grafico.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 ">
                                    <h6>Humedad</h6>
                                    <div class="image">
                                        <img src="images/grafico.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h6>Temperatura</h6>
                                <table id="responsive-table"
                                    class="table rounded table-danger display responsive nowrap">
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
                                            <td>66</td>
                                        </tr>
                                     



                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 mt-3">
                                <a class="btn btn-success" id="nextProcess" type="button">Finalizar Proceso</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCerrarM"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- final del modal consultas de lote -->



        <!-- tabla lotes en estado de envase -->
        <div class="modal fade" id="envase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Numero de Lote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row  mt-3">

                                <table id="responsive-table-envase"
                                    class="table rounded table-danger display responsive nowrap">
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
                                            <td>66</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 mt-3">
                                <a class="btn btn-success" id="finishProcess" type="button">Finalizar Proceso</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCerrarEnvase"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- final de la tabla lotes en estado de envase -->

        <!-- tab primera fermentacion -->
        <div class="tab-pane active  mt-1 mb-5" id="home" role="tabpanel" aria-labelledby="home-tab" style="text-align:left">
            <h6 style="color: #a20202">Primera Fase</h6>

            <!-- tabla primera fermentacion -->
            <table id="responsive-table-primera" class="table rounded table-danger display responsive nowrap">
                <thead>
                    <tr>

                        <th>Opciones</th>
                        <th>Id</th>
                        <th>Materia</th>
                        <th>F. Inicio</th>
                        <th>Peso Inicial Materia en Kg</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button type="button" id="btnFerme1" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#consultar">
                                <i class="bi bi-plus-circle"></i>
                            </button></td>
                        <td>1</td>
                        <td>Manzana</td>
                        <td>11/07/2022</td>
                        <td>66</td>
                    </tr>
               


                </tbody>
            </table>
            <!-- final tabla primer fermentacion -->
        </div>
        <!-- fin tab primera fermentacion -->


        <!-- segunda fermentacion tab -->
        <div class="tab-pane  mt-1 mb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="text-align:left">
            <h6 style="color: #a20202">Segunda Fase</h6>
            <!-- tabla segunda fermentacion -->
            <table id="responsive-tableSegunda" class="table rounded table-danger display responsive nowrap">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Id</th>
                        <th>Materia</th>
                        <th>F. Inicio</th>
                        <th>Peso Inicial Materia en Kg</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button type="button" id="btnFerme2" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#consultar">
                                <i class="bi bi-plus-circle"></i>
                            </button></td>
                        <td>1</td>
                        <td>Manzana</td>
                        <td>11/07/2022</td>
                        <td>66</td>
                    </tr>
                </tbody>
            </table>
            <!-- final  tabla segunda f -->
        </div>
        <!-- fin tab segunda fermentacion -->


        <!-- tan fase de envasado -->
        <div class="tab-pane  mt-1 mb-5" id="envasado" role="tabpanel" aria-labelledby="envasado-tab"
            style="text-align:left">
            <h6 style="color: #a20202"> Fase Envasado</h6>
            <!-- tabla envase -->
            <table id="responsive-tableEnvase" class="table rounded table-danger display responsive nowrap">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Id</th>
                        <th>Materia</th>
                        <th>F. Inicio</th>
                        <th>Peso Inicial Materia en Kg</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button type="button" id="btnEnvA" class="btn btn-sm btn-danger"
                                class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#envase">
                                <i class="bi bi-plus-circle"></i>
                            </button></td>
                        <td>1</td>
                        <td>Manzana</td>
                        <td>11/07/2022</td>
                        <td>66</td>
                    </tr>
                </tbody>
            </table>
            <!-- fin tabla lotes en envase -->
        </div>
        <!-- fin tab lotes en envase -->


        <!-- tab historial -->
        <div class="tab-pane  mt-1 mb-5" id="messages" role="tabpanel" aria-labelledby="messages-tab"
            style="text-align:left">
            <h6 style="color: #a20202">Historial</h6>
            <!-- tabla historial -->
            <table id="responsive-tableHistorial" class="table rounded table-danger display responsive nowrap">
                <thead>
                    <tr>
                        <th>Registros</th>
                        <th>Id</th>
                        <th>Materia</th>
                        <th>F. Inicio</th>
                        <th>F. Fin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button type="button" id="btnHistA" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#detalles">
                                <i class="bi bi-plus-circle"></i>
                            </button></td>
                        <td>1</td>
                        <td>Manzana</td>
                        <td>11/07/2022</td>
                        <td>11/07/2022</td>

                    </tr>

                </tbody>
            </table>
            <!-- final  tabla historial -->

        </div>
        <!-- final  tab historial -->


        <!-- Modal ver detallles de lote historial -->
        <div class="modal fade" id="detalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Numero de Lote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="container">

                        <h4>Registro del lote</h4>
                        <div class="container" style="width:100%; margin-bottom: 4%; text-align:left; ">

                            <table id="responsive-table-detalle"
                                class="round table  table-danger display responsive nowrap rounded">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Brix</th>
                                        <th>Alcohol</th>
                                        <th>PH</th>
                                        <th>TDS</th>
                                        <th>AC</th>
                                        <th>Fecha</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>Mark</td>
                                        <td>4</td>
                                        <td>23</td>
                                        <td>33</td>
                                        <td>55</td>
                                        <td>6</td>
                                        <td>01/01/2022</td>
                                    </tr>

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