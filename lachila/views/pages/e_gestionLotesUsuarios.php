<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=login"; </script>';
}
?>
<div class="container"  style="background-color:#eeb3b3; border-radius:5px;">


    <h5> Información de Lotes</h5>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" style="background-color:#eeb3b3;" role="1f">
        <li class="nav-item" role="presentation">
            <button class="nav-tab nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">1 F</button>
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







        <!-- empiezan los tab -->
        <div class="tab-pane active  mt-1 mb-5" id="home" role="tabpanel" aria-labelledby="home-tab" style="text-align:left">

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
                            <th>Peso Inicial Materia</th>
                        </tr>
                    </thead>
                    <tbody id="tbody1fEmp">
                        <!--  <tr>
                            <td><button type="button" id="btnPrimfU" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#AgregarVariables1F">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>66</td>
                        </tr>
 -->
                    </tbody>
                </table>
            </div>

            <!-- Modal agregar varibles de lote primer fermentacion -->
            <div class="modal fade" id="AgregarVariables1F" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloLoteF1"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="text-align:center">
                                <div class="row" style="background-color:#f9cbcb; border-radius:5px; ">

                                    <div class="col-12">
                                        <h5> Variables del producto </h5>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>Brix</h6>
                                        </label>
                                        <input type="number" name="brix" id="brix1f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>Alcohol</h6>
                                        </label>
                                        <input type="number" name="alcohol" id="alcohol1f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>PH</h6>
                                        </label>
                                        <input type="number" name="ph" id="ph1f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>TDS</h6>
                                        </label>
                                        <input type="number" name="tds" id="tds1f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label">
                                            <h6>AC</h6>
                                        </label>
                                        <input type="number" name="ac" id="ac1f" class="form-control" value="" required>
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
                                        <input type="number" name="temp" id="temp1f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">
                                            <h6>HUMEDAD</h6>
                                        </label>
                                        <input type="number" name="hume" id="hume1f" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="container">
                                    <button class="btn btn-danger" id="btnGuardarVar1f" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCancelVar" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin del modal para agregar variables primer fermentacion-->
        </div>
        <!-- fin del tab -->

        <!-- tabla que muestra los lotes que estan en segunda fermentacion -->
        <div class="tab-pane  mt-1 mb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="text-align:left">
            <h6 style="color: #a20202">Segunda fermentación</h6>
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
                    <thead>
                        <tr>
                            <th>Opciones</th>

                            <th> Id</th>
                            <th>Materia</th>
                            <th>F. Inicio</th>
                            <th>Peso Inicial Materia/th>
                        </tr>
                    </thead>
                    <tbody id="tbody2fEmp">
                        <!--    <tr>
                            <td><button type="button" id="btnSegfU" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#AgregarVariables2F">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>66</td>
                        </tr> -->

                    </tbody>
                </table>
            </div>

            <!-- Modal agregar varibles de lote segunda fermentacion -->
            <div class="modal fade" id="AgregarVariables2F" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloLoteF2">2</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="text-align:center">
                                <div class="row" style="background-color:#f9cbcb; border-radius:5px; ">

                                    <div class="col-12">
                                        <h5> Variables del producto </h5>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>Brix</h6>
                                        </label>
                                        <input type="number" name="brix2f" id="brix2f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>Alcohol</h6>
                                        </label>
                                        <input type="number" name="alcohol" id="alcohol2f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>PH</h6>
                                        </label>
                                        <input type="number" name="ph" id="ph2f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">
                                            <h6>TDS</h6>
                                        </label>
                                        <input type="number" name="tds" id="tds2f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label">
                                            <h6>AC</h6>
                                        </label>
                                        <input type="number" name="ac" id="ac2f" class="form-control" value="" required>
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
                                        <input type="number" name="temp" id="temp2f" class="form-control" value="" required>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="form-label">
                                            <h6>HUMEDAD</h6>
                                        </label>
                                        <input type="number" name="hume" id="hume2f" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="container">
                                    <button class="btn btn-danger" id="btnGuardarVar2f" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCancelVar" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin del modal para agregar variables segunda fermentacion-->


        </div>
        <!-- fin del tab -->

        <!-- tabla que muestra los lotes que estan en envasado -->
        <div class="tab-pane  mt-1 mb-5" id="envasado" role="tabpanel" aria-labelledby="envasado-tab" style="text-align:left">
            <h6 style="color: #a20202"> Fase Envasado</h6>
            <!-- tabla envase -->
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
                    <thead>
                        <tr>
                            <!--                             <th>Opciones</th>
 -->
                            <th>Código</th>
                            <th>Materia</th>
                            <th>F. Inicio</th>
                            <th>Peso Inicial Materia</th>
                        </tr>
                    </thead>
                    <tbody id="tbody3fEmp">
                        <!--  <tr>
                            <td><button type="button" id="btnEnvasadoU" class="btn btn-sm btn-danger" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#envaseUsuario">
                                    <i class="bi bi-plus-circle"></i>
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>66</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <!-- tabla lotes en estado de envaseUsuario -->

            <div class="modal fade" id="envaseUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloLoteF3">3</h5>
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
                                                    <th>Peso Inicial Materia</th>
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
                            <button type="button" class="btn btn-secondary" id="btnCancelarU" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- fin del modal lotes en estado de envase -->

        </div>

        <!-- fin del tab -->





        <!-- inicio tab historial -->
        <div class="tab-pane  mt-1 mb-5" id="messages" role="tabpanel" aria-labelledby="messages-tab" style="text-align:left">
            <h6 style="color: #a20202">Historial</h6>
            <div class="table-responsive mt-3">
                <table class="table table-danger table-bordered">
                    <thead>
                        <tr>
                            <th>Registros</th>
                            <th>Código del lote</th>
                            <th>Materia</th>
                            <th>Fecha de cierre</th>
                            <!--   <th>Brix</th>
                            <th>Alcohol</th>
                            <th>PH</th>
                            <th>TDS</th>
                            <th>AC</th>
                            <th>fecha</th>
                            <th>Usuario</th> -->

                        </tr>
                    </thead>
                    <tbody id="tbody4fEmp">
                        <!--       <tr>
                            <td><button type="button" id="btnHistorialU" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#historialUsuario">
                                    <i class="bi bi-plus-circle"></i> Ver
                                </button></td>
                            <td>1</td>
                            <td>Manzana</td>
                            <td>11/07/2022</td>
                            <td>11/07/2022</td>

                        </tr> -->

                    </tbody>
                </table>
            </div>



            <!-- Modal ver detallles de lote -->
            <div class="modal fade" id="historialUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloLoteF4">4</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: center;">


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
                                        <tbody id="tbodyHistorialEmpleados">

                                            <!-- <tr>
                                                <td>Mark</td>
                                                <td>4</td>
                                                <td>23</td>
                                                <td>33</td>
                                                <td>55</td>
                                                <td>6</td>
                                                <td>01/01/2022</td>
                                            </tr> -->

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
        </div>
        <!-- final del modal historial -->

    </div>

    <!-- fin del tab de historial-->

</div>