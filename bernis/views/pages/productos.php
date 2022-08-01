<?php
// instanciar el metodo estatico
$registro = ControladorProductos::ctrRegistro();
if ($registro == "ok") {
    /* LIMPIANDO STORAGE */
    echo '<script>
    if ( window.history.replaceState)
    { window.history.replaceState ( null, null, window.location.href); }
    </script>';
}
?>


<?php
$categorias = ControladorCategorias::ctrConsultar();

?>


<!-- MODAL CREAR PRODUCTO  -->
<div class="modal fade" id="crearpro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Adicionar producto</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="container">

                        <div class="input-group mb-3">
                            <div>Seleccione la imagen del producto</div>
                            <div class="row">
                                <div class="input-group mb-3 mt-3">
                                    <input type="file" class="form-control imageproducto" id="imagen" name="imagen">
                                </div>
                                <div class="col-4 col-sm-4 col-xs-5">
                                    <img src="views/images/icono.png" class="reviewImagen img-thumbnail" style="width: 100px" />
                                </div>
                                <div class="col-8 col-sm-4 col-xs-7"><small> <strong>Recomendacion: </strong>Si la imagen es directamente desde la camara del celular se debe tomar de manera horizantal </small> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mb-3 mt-3">
                                <label class="input-group-text" for="inputGroupSelect01">Clasificacion</label>
                                <select class="form-select" id="prod_clasificacion" name="prod_clasificacion">
                                    <option selected>Seleccione...</option>
                                    <?php foreach ($categorias as $key => $value) :  ?>
                                        <option value=<?php echo $value["nombre"] ?>><?php echo $value["nombre"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!-- idemp en campo oculto -->
                            <input id="prod_idemp" name="prod_idemp" type="hidden" value="1">
                            <!--  -->
                            <div class="col-6">Nombre</div>
                            <div class="col-6"><input type="text" name="prod_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">Descripcion</div>
                            <div class="col-6"> <textarea class="form-control" name="prod_descripcion" aria-label="With textarea" required></textarea></div>
                        </div>


                        <div class="row">
                            <div class="col-6">Costo</div>
                            <div class="col-6"><input type="number" name="prod_costo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">Valor</div>
                            <div class="col-6"><input type="number" name="prod_valor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm">Agregar</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
</div>


<!-- MODAL ACTUALIZAR  -->

<div class="modal fade" id="modaleditarpro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    console.log($producto);

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Actualizar producto</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="input-group mb-3 mt-3">
                        <label class="input-group-text" for="inputGroupSelect01">Clasificacion</label>
                        <select class="form-select" id="clasificacion" name="clasificacion">
                            <option selected>Seleccione...</option>
                            <?php foreach ($categorias as $key => $value) :  ?>
                                <option value=<?php echo $value["nombre"] ?>><?php echo $value["nombre"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row">
                        <!-- id producto  oculto -->
                        <input id="prodId" name="prodId" type="hidden">
                        <div class="col-6">Nombre</div>
                        <div class="col-6"><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="nombre"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Descripcion</div>
                        <div class="col-6"> <textarea class="form-control" aria-label="With textarea" id="descripcion"></textarea></div>
                    </div>


                    <div class="row">
                        <div class="col-6">Costo</div>
                        <div class="col-6"><input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="costo"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Valor</div>
                        <div class="col-6"><input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="valor"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary  btn-sm" id="btnActualizar">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!--  -->

<?php
$productos = ControladorProductos::ctrConsultarProductos();
?>




<!--  -->
<div class="container" id="fondo">
    <h3>Productos</h3>
    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#crearpro">+ Adicionar</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-sm ">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Imagen</th>
                    <th>Clasificacion</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Costo</th>
                    <th>Valor</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($productos as $key => $value) :  ?>
                    <tr>
                        <td>
                            <div class="d-grid gap-1 d-md-block">
                                <a type="button" class="btn btn-outline-success btn-circle btn-sm" data-bs-toggle='modal' data-bs-target="#modaleditarpro" data-idp='<?php echo $value["id"] ?>' data-idemp='<?php echo $value["idemp"] ?>' id="btneditarp"><i class="bi bi-pencil"></i></a>
                                <a type="button" class="btn btn-outline-danger btn-circle btn-sm" id="btneliminar" data-idp='<?php echo $value["id"] ?>'><i class="bi bi-trash3-fill"></i>
                            </div></a>
                        </td>
                        <td> <img src=<?php echo $value["imagen"] ?> id="miniaturas" alt="">

                        </td>
                        <td>
                            <?php echo $value["clasificacion"] ?>
                        </td>
                        <td>
                            <?php echo $value["nombre"] ?>
                        </td>
                        <td>
                            <?php echo $value["descripcion"] ?>
                        </td>
                        <td>
                            <?php echo $value["costo"] ?>
                        </td>
                        <td>
                            <?php echo $value["precio"] ?>
                        </td>

                    </tr>
                <?php endforeach ?>

            </tbody>

        </table>
    </div>