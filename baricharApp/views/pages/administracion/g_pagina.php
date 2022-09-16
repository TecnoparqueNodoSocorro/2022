<div class="container" style="background-color: black;padding-top: 5%;">

    <div class="container-fluid mt-5" style="margin-top:10%" id="tablas">
        <div class="container">
            <!-- aqui imagen representativa  -->
            <h4 style="padding: 0;">Gestion de contenidos de la aplicacion </h4>

            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_pagina">
                    + Adicionar
                </button>
            </div>
        </div>

        <div class="table-responsive mb-4" id="paginas">
            <table class="table caption-top table-bordered table-sm">

                <thead>
                    <tr>
                        <th>Menú</th>
                        <th>Sesion</th>
                        <th>Categoria</th>
                        <th>Item</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <?php
                $paginas = Controladorpagina::ctrGetPaginas();
                //print_r($paginas)
                ?>
                <tbody>
                    <?php foreach ($paginas as $key => $value) : ?>
                        <tr>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" data-id="<?php echo $value["id"] ?>" class="pag btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-plus-circle-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">

                                        <li><a onclick="OpenModalBloquear()" class="dropdown-item" href="#"><i class="bi bi-lock-fill"></i>Bloquear</a></li>
                                        <li><a onclick="OpenModalEditar()" class="dropdown-item" href="#"><i class="bi bi-pen"></i> Editar</a></li>
                                        <li><a onclick="OpenModalEliminar()" class="dropdown-item" href="#"><i class="bi bi-trash"></i> Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <?php echo $value["sesion"] ?>
                            </td>
                            <td><?php echo $value["categoria"] ?></td>
                            <td><?php echo $value["item"] ?></td>
                            <td><?php echo $value["titulo"] ?></td>
                            <td class="fw-bold <?php echo $value["estado"] == "1" ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        </tr>
                    <?php endforeach ?>



                </tbody>
                <br><br><br>
            </table>
        </div>
    </div>


    <div class="slider_container">
        <div class="slider_trans_black"></div>
        <div id="random">
            <div style="background-image: url(views/images/slider/slide14.jpg);"></div>

        </div>
    </div>
    <!-- modal crear pagina -->
    <div class="modal fade" id="modal_pagina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="padding: 0;">+ Agregar nuevo Articulo a la pagina</h5>

                </div>
                <div class="modal-body">


                    <div class="container">
                        <form id="ContactForm" method="post" action="">
                            <br>
                            <div class="row">
                                <div class=" col-sm-6">
                                    <label>Sesion</label>
                                    <div class="select_container">
                                        <select class="form_select" name="pag_sesion" id="pag_sesion">
                                            <option selected>---Sesiones---</option>
                                            <option value="menu">menu</option>
                                            <option value="menu2">menu2</option>
                                            <option value="menu3">menu3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Categoria</label>
                                    <div class="select_container">
                                        <select class="form_select" name="pag_cat" id="pag_cat">
                                            <option selected>---Categorias---</option>

                                        </select>
                                    </div>
                                </div>
                                <div class=" col-sm-6">
                                    <label>Item</label>
                                    <div class="select_container">
                                        <select class="form_select" name="pag_item" id="pag_item">
                                            <option selected>---Items---</option>




                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12  col-md-6">
                                    <label>Imagen del articulo</label>
                                    <input type="file" class="form_input " name="pag_img" id="pag_img" />
                                </div>
                                <div class="col-sm-12">
                                    <span>Recomendaciones de la imagen:</br> <small>Menos de 600kb</small></span>

                                </div>
                                <div class="col-sm-12  ">
                                    <label>Titulo del Articulo</label>
                                    <input type="text" class="form_input " name="pag_titulo" id="pag_titulo" />
                                </div>


                                <div class="col-sm-12">
                                    <label>Descripcion</label>
                                    <textarea class="form_textarea_full" name="pag_descr" id="pag_descr"></textarea>
                                </div>

                                <br>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="pag_btnguardar"> Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>


            </div>



        </div>
    </div>
</div>

<!-- modal bloqeuadr pagina -->
<div class="modal fade" id="modal_bloquear_pagina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="padding: 0;">Bloquear página</h5>

            </div>
            <div class="modal-body">
                <div class="container">
                    <input id="estadoPagina" type="hidden"></input>
                    <span><strong> Estado actual de la página: </strong></span>
                    <strong><span id="p_bloquear_desb"></span></strong>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_bloq_desbloq_pag"></button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- modal editar pagina -->
<div class="modal fade" id="modal_editar_pagina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="padding: 0;">Editar página</h5>

            </div>
            <div class="modal-body">

                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <br>
                        <div class="row">
                            <div class=" col-sm-6">
                                <label>Sesion</label>
                                <div class="select_container">
                                    <select class="form_select" name="pag_sesion" id="edit_pag_sesion">
                                        <option selected>---Sesiones---</option>
                                        <option value="menu">menu</option>
                                        <option value="menu2">menu2</option>
                                        <option value="menu3">menu3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Categoria</label>
                                <div class="select_container">
                                    <select class="form_select" name="pag_cat" id="edit_pag_cat">
                                        <option selected>---Categorias---</option>

                                    </select>
                                </div>
                            </div>
                            <div class=" col-sm-6">
                                <label>Item</label>
                                <div class="select_container">
                                    <select class="form_select" name="pag_item" id="edit_pag_item">
                                        <option selected>---Items---</option>




                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12  col-md-6">
                                <label>Imagen del articulo</label>
                                <input type="file" class="form_input " name="pag_img" id="edit_pag_img" />
                            </div>
                            <div class="col-sm-12">
                                <span>Recomendaciones de la imagen:</br> <small>Menos de 600kb</small></span>

                            </div>
                            <div class="col-sm-12  ">
                                <label>Titulo del Articulo</label>
                                <input type="text" class="form_input " name="pag_titulo" id="edit_pag_titulo" />
                            </div>


                            <div class="col-sm-12">
                                <label>Descripcion</label>
                                <textarea class="form_textarea_full" name="pag_descr" id="edit_pag_descr"></textarea>
                            </div>

                            <br>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnEditPag"> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>