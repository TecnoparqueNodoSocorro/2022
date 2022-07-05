<div class="container" style="width:90%">

    <h3>
        Registro de Usuarios
    </h3>
    <div class="container" style="background-color:#eeb3b3; border-radius:5px;">
        <!-- formulario para agregar un usuario -->
        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                
                    <h6>Nombres</h6>
                
                <input type="text" name="name_user" id="name_user" class="form-control" value="" required>
            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
               
                    <h6>Apellidos</h6>
                
                <input type="text" name="lastname_user" id="lastname_user" class="form-control" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
               
                    <h6>Número de Teléfono</h6>
                
                <input type="number" name="phone_user" id="phone_user" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
               
                    <h6>Núm de documento</h6>
                
                <input type="number" name="document_user" id="document_user" class="form-control" value="" required>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-12 col-xs-6 col-md-6 col-lg-6">
               
                    <h6>F. Nacimiento</h6>
                
                <input type="date" name="nacimiento_user" id="nacimiento_user" class="form-control" value="" required>
            </div>
            <div class="col-12 col-xs-6 col-md-6 col-lg-6">
               
                    <h6>Cargo</h6>
                
                <select class="form-select" name="cargo_user" id="cargo_user" aria-label="Default select example">
                    <option selected>Seleccione el cargo</option>
                    <option value="1">Usuario</option>
                    <option value="2">Administrador</option>
                </select>
            </div>

        </div>




        <div class="formulario mt-3" style="text-align:center">
            <form class="row g-3" method="post">

                <div class="col-12  mb-3">
                    <button class="btn btn-danger" id="btnRegistrar" type="button">Registrar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tabla que muestra los empleados registrado -->
<div class="container mb-5" style="width:95%; margin-bottom: 4%; text-align:left;">

    <table id="responsive-table" class="table rounded table-danger display responsive nowrap">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th class="none">Teléfono</th>
                <th class="none">Cargo</th>
            </tr>
        </thead>
        <tbody>

            <!--         <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["nombre"] ?></td>
                        <td><?php echo $value["apellido"] ?></td>
                        <td><?php echo $value["documento"] ?></td>
                        <td><?php echo $value["telefono"] ?></td>
                        <td><?php echo $value["cargo"] ?></td>
                        <?php endforeach ?> -->
            <tr>
                <td>Mark</td>
                <td>Ootto</td>
                <td>6444534</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>

        </tbody>
    </table>
</div>