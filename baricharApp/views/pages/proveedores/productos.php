<div class="title_container">

    <div class="home_bottomS">

        <div class="container-fluid" id="tablas">
            <h4>Gestion de productos y servicios</h4>



            <div class="d-grid gap-2 col-8 mx-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_agregar_pro">
                    Adicionar
                </button>
            </div>

            <?php
            $productos = ControladorProductos::CtrGetProductos();
            //   print_r($productos)

            ?>
            <div class="table-responsive" id="proveedores" style="min-height:450px">
                <table class="table caption-top  table-sm">
                    <!--   <caption>List of users</caption> -->
                    <thead>
                        <tr>
                            <th>imag</th>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $key => $value) : ?>
                            <tr>
                                <td>
                                    <img id="imgproveedorlista" src="views/images/proveedores/proveedor1.jpg">
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>" class="id_producto btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-plus-circle-fill"></i>

                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a onclick="eliminarProductos()" class="dropdown-item" href="#"><i class="bi bi-trash3-fill">Eliminar</i></a></li>
                                            <li><a onclick="activar_desactivar()" class="dropdown-item" href="#"><i class="bi bi-lock-fill"><?php echo $value["estado"] == "1" ? 'Desactivar' : 'Activar' ?></i></a></li>
                                            <li><a onclick="OpenModalVerProduct()" class="dropdown-item" href="#"><i class="bi bi-check2-square">Mostrar</i></a></li>
                                            <li><a onclick="OpenModalEditProduct()" class="dropdown-item" href="#"><i class="bi bi-pen">Editar</i></a></li>
                                            <!-- <li><a class="dropdown-item" href="#"><i class="bi bi-search">Ver</i></a></li> -->

                                        </ul>
                                    </div>
                                </td>
                                <td><?php echo $value["nombre"] ?></td>
                                <td><?php echo $value["descripcion"] ?></td>
                                <td><?php echo $value["precio"] ?></td>
                                <td class="fw-bold <?php echo $value["estado"] == "1" ? 'text-primary' : 'text-danger' ?> "><?php echo $value["estado"] == "1" ? 'Activo' : 'Inactivo' ?></td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <br><br><br>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="slider_container">
    <div class="slider_trans_black"></div>
    <div id="random">
        <div style="background-image: url(views/images/slider/slide14.jpg);"></div>

    </div>
</div>

<!-- ------------------------------MODAL AGREGAR PRODUCTOS ----------------------------------------------->
<div class="modal fade" id="modal_agregar_pro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto o servicio</h5>

            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <br>
                        <div class="row">
                            <div class="col-12  col-md-4">
                                <?php
                                $categorias = ControladorProductos::ctrGetCategoriaProductos();
                                //   print_r($categorias)
                                ?>
                                <label>Seleccione la categoria producto o Servicio</label>
                                <div class="select_container">
                                    <select class="form_select" name="prov_p_categ" id="prov_p_categ">
                                        <option selected value="0">---Categorias---</option>
                                        <?php foreach ($categorias as $key => $value) : ?>
                                            <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>
                                        <?php endforeach ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Nombre del producto o Servicio</label>
                                <input type="text" class="form_input " name="prov_p_nombre" id="prov_p_nombre" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Precio</label>
                                <input type="number" class="form_input " name="prov_p_precio" id="prov_p_precio" />
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (1)</label>
                                <input type="file" class="form_input " name="prov_p_imagen1" id="prov_p_imagen1" />
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (2)</label>
                                <input type="file" class="form_input " name="prov_p_imagen2" id="prov_p_imagen2" />
                            </div>
                            <div class="col-12">
                                <label>Breve descripcion de su producto o servicio</label>
                                <textarea class="form_textarea_full" name="prov_p_descripciom" id="prov_p_descripcion"></textarea>
                            </div>

                            <div class="col-6">


                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-success" id="btnGuardarProducto"> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- ------------------------------MODAL EDITAR PRODUCTOS ----------------------------------------------->

<div class="modal fade" id="edit_modal_prod" tabindex="-1" aria-labelledby="modal_edit" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_modal_titulo">Editar producto o servicio</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <br>
                        <div class="row">
                            <div class="col-12  col-md-4">
                                <?php
                                $categorias = ControladorProductos::ctrGetCategoriaProductos();
                                //   print_r($categorias)
                                ?>
                                <label>Seleccione la categoria producto o Servicio</label>
                                <div class="select_container">
                                    <select class="form_select" name="prov_p_categ" id="edit_prov_p_categ">
                                        <option selected value="0">---Categorias---</option>
                                        <?php foreach ($categorias as $key => $value) : ?>
                                            <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>
                                        <?php endforeach ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Nombre del producto o Servicio</label>
                                <input type="text" class="form_input " name="prov_p_nombre" id="edit_prov_p_nombre" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Precio</label>
                                <input type="number" class="form_input " name="prov_p_precio" id="edit_prov_p_precio" />
                            </div>
                            <!-- FALTAN LAS IMAGENES -->

                            <div class="col-12  col-md-6">
                                <label>Imagen (1)</label>
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (2)</label>
                            </div>

                            <!-- ------------------------------------------------- -->
                            <div class="col-12">
                                <label>Breve descripcion de su producto o servicio</label>
                                <textarea class="form_textarea_full" name="prov_p_descripciom" id="edit_prov_p_descripcion"></textarea>
                            </div>

                            <div class="col-6">


                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="edit_btnProducto"> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- ------------------------------MODAL MOSTRAR PRODUCTOS ----------------------------------------------->

<div class="modal fade" id="mostrar_modal_prod" tabindex="-1" aria-labelledby="modal_mostrar" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_modal_titulo">Mostrar producto o servicio</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <br>
                        <div class="row">
                            <div class="col-12  col-md-4">
                                <span><strong>Categoria</strong></span>
                                <label class="form-control" id="mostrar_categoria_prod"></label><br>


                            </div>
                            <div class="col-12  col-md-4">
                                <span><strong>Nombre del producto o Servicio</strong></span>

                                <label class="form-control" id="mostrar_nombre_prod"></label><br>
                            </div>
                            <div class="col-12  col-md-4">
                                <span><strong>Precio</strong></span>

                                <label class="form-control" id="mostrar_precio_prod"> </label><br>
                            </div>
                        </div>
                        <div class="col-12  col-md-6">
                            <span><strong>Imagen 1</strong></span>

                            <!--                                 <label>Imagen (1)</label>
                                <input type="file" class="form_input " name="prov_p_imagen1" id="edit_prov_p_imagen1" /> -->

                        </div>
                        <div class="col-12  col-md-6">
                            <span><strong>Imagen 2</strong></span>
                            <!--    <label>Imagen (2)</label>
                                <input type="file" class="form_input " name="prov_p_imagen2" id="edit_prov_p_imagen2" /> -->


                        </div>
                        <div class="col-12">
                            <label><strong>Breve descripcion de su producto o servicio</strong></label>
                            <textarea class="form_textarea_full" disabled name="prov_p_descripciom" id="mostrar_descrip_prod"></textarea>
                        </div>

                        <div class="col-6">


                        </div>
                </div>
                </form>
            </div>


            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-success" id=""> Guardar</button> -->
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal-footer">
    <h1>hola</h1>
</div> -->