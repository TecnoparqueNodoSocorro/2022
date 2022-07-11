<div class="container">


    <h5> Información de Lotes</h5>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" style="background-color:#eeb3b3;" role="1f">
        <li class="nav-item" role="presentation">
            <button class="nav-tab nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
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



        <!-- Modal agregar varibles de lote -->
        <div class="modal fade" id="verHistorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Númeroq de Lote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="row" style="background-color:#f9cbcb; border-radius:5px">

                                <div class="col-12">
                                    <h5> Variables del producto </h5>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">
                                        <h6>Brix</h6>
                                    </label>
                                    <input type="number" name="brix" id="brix" class="form-control" value="" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">
                                        <h6>Alcohol</h6>
                                    </label>
                                    <input type="number" name="alcohol" id="alcohol" class="form-control" value=""
                                        required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">
                                        <h6>PH</h6>
                                    </label>
                                    <input type="number" name="ph" id="ph" class="form-control" value="" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">
                                        <h6>TDS</h6>
                                    </label>
                                    <input type="number" name="tds" id="tds" class="form-control" value="" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label">
                                        <h6>AC</h6>
                                    </label>
                                    <input type="number" name="ac" id="ac" class="form-control" value="" required>
                                </div>

                            </div>

                            <div class="row mt-1">
                                <div class="col-12">
                                    <h5> Variables de INVIMA</h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="form-label">
                                        <h6>TEMPERATURA</h6>
                                    </label>
                                    <input type="number" name="temp" id="temp" class="form-control" value="" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="form-label">
                                        <h6>HUMEDAD</h6>
                                    </label>
                                    <input type="number" name="hume" id="hume" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="container">
                                <button class="btn btn-danger" id="btnGuardarVar" type="submit">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCancelVar"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin del modal para agregar variables -->


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
                                <div class="table-responsive mt-3">
                                    <table class="table table-danger table-bordered">
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

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCancelarU"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- fin del modal lotes en estado de envase -->


        <!-- empiezan los tab -->
        <div class="tab-pane active  mt-1 mb-5" id="home" role="tabpanel" aria-labelledby="home-tab"
            style="text-align:left">

            <h6 style="color: #a20202">Primera Fermentación</h6>

            <!-- tabla que muestra los lotes que estan en primera fermentacion -->
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
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
                            <td><button type="button" id="btnPrimfU" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#verHistorial">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>66</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- fin del tab -->

        <!-- tabla que muestra los lotes que estan en segunda fermentacion -->
        <div class="tab-pane  mt-1 mb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab"
            style="text-align:left">
            <h6 style="color: #a20202">Segunda fermentación</h6>
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
                    <thead>
                        <tr>
                            <th>Opciones</th>

                            <th> Id</th>
                            <th>Materia</th>
                            <th>F. Inicio</th>
                            <th>Peso Inicial Materia en Kg</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" id="btnSegfU" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#verHistorial">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>66</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- fin del tab -->

        <!-- tabla que muestra los lotes que estan en envasado -->
        <div class="tab-pane  mt-1 mb-5" id="envasado" role="tabpanel" aria-labelledby="envasado-tab"
            style="text-align:left">
            <h6 style="color: #a20202"> Fase Envasado</h6>
            <!-- tabla envase -->
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
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
                            <td><button type="button" id="btnEnvasadoU" class="btn btn-sm btn-danger"
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
            </div>
        </div>

        <!-- fin del tab -->





        <!-- inicio tab historial -->
        <div class="tab-pane  mt-1 mb-5" id="messages" role="tabpanel" aria-labelledby="messages-tab"
            style="text-align:left">
            <h6 style="color: #a20202">Historial</h6>
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
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
                            <td><button type="button" id="btnHistorialU" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#detalles">
                                    <i class="bi bi-plus-circle"></i> Ver
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>11/07/2022</td>

                        </tr>

                    </tbody>
                </table>
            </div>



            <!-- Modal ver detallles de lote -->
            <div class="modal fade" id="detalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Numero de Lote</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="container">

                                <h4>Registro del lote</h4>

                                <!-- tabla registro del lote -->
                                <div class="table-responsive mt-3">
                                    <table class="table table-danger table-bordered">
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- final del modal historial -->

    </div>

    <!-- fin del tab de historial-->

</div>