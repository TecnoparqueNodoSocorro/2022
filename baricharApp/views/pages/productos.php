<div class="home_bottomS">
    <div class="agregar">

        <div class="page_content">
            <h3 class="form_subtitle mt-5">LISTADO DE PRODUCTOS</h3>


            <div class="container">
                <a name="" id="agregar_producto" class="btn btn-warning" href="index.php?page=agregar_productos"
                    role="button">NUEVO PRODUCTO</a>
            </div>

            <div class="full_width_centered">


                <div class="form_content">
                    <h3 class="form_toptitle" id="Note"></h3>
                    <form id="ContactForm" method="post" action="">



                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Opciones</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="d-flex justify-content-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modelId">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                <i class="bi bi-trash3"></i>
                                            </button>

                                        </th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <!-- <div class="clear"></div> -->
            </div>
            <!--end of full width-->
        </div>
        <!--end of page content-->




        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Producto Info</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="form_row_full">
                                <label>NOMBRE</label>
                                <input type="text" readonly class="form-control-plaintext" value="Nombre"
                                    name="nombre_pro" id="nombre_pro" />
                            </div>
                            <div class="form_row_full">
                                <label>CATEGORIA</label>
                                <input type="text" readonly class="form-control-plaintext" value="Categoria"
                                    name="categoria_pro" id="categoria_pro" />
                            </div>
                            <div class="form_row_full">
                                <label>PRECIO</label>
                                <input type="number" readonly class="form-control-plaintext" value="50000"
                                    name="precio_pro" id="precio_pro" />
                            </div>
                            <div class="form_row_full">
                                <label>DESCRIPCION</label>
                                <input type="text" readonly class="form-control-plaintext" value="Descripcion"
                                    name="descripcion_pro" id="descripcion_pro" />
                            </div>
                            <div class="form_row_full">
                                <label>FOTOS</label>
                                <div class="container">
                                    <div class="row row-cols-2">
                                        <div class="col"><img src="views/images/boda2.jpg" class="img-fluid" alt="...">
                                        </div>
                                        <div class="col"><img src="views/images/boda3.jpg" class="img-fluid" alt="...">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>

    </div>





</div>