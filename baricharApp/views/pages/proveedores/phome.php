<div class="title_container">

    <div class="home_bottomS">

        <div class="container-fluid" id="tablas">
            <br>

            <div class="container">
                <div class="row">
                    <h4>DATOS DEL PROVEEDOR</h4>
                </div>

                <div class="row">
                    <div class="col-12 col-md-2" id="imagen_prov">
                        <div class="container">
                            <img id="imgproveedor"src="views/images/proveedores/proveedor1.jpg">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-10">
                        <div class="row" id="proveedor">


                            <div class="prov_item col-6 col-md-4 ">
                                <label> <strong>Empresa:</strong></br> rosas y flores s.a</label>
                            </div>
                            <div class="prov_item col-6 col-md-4">
                                <label> <strong>Nit:</strong></br>1234566</label>
                            </div>
                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Rep legal:</strong></br> xx</label>
                            </div>
                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Telefono:</strong></br> xx</label>
                            </div>

                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Direccion:</strong></br> xx</label>
                            </div>
                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Email:</strong></br> xx</label>
                            </div>
                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Direccion:</strong></br> xx</label>
                            </div>
                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Descripcion:</strong></br> xx</label>
                            </div>
                            <div class="prov_item col-6  col-md-4">
                                <label> <strong>Licencia de uso hasta:</strong></br> 05-12-2022</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>


            <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    editar informacion
                </button>
            </div>


            <div class="table-responsive" id="proveedores">

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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">editar datos de la empresa</h5>

            </div>
            <div class="modal-body">


                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <br>
                        <div class="row">
                            <div class="col-12  col-md-4">
                                <label>Nombre del producto o Servicio</label>
                                <div class="select_container">
                                    <select class="form_select" name="guests" id="categoria">
                                        <option selected>---Categorias---</option>
                                        <option value="C1">Iglesias, hoteles y bodas</option>
                                        <option value="C2">Maquillaje y peinado</option>
                                        <option value="C3">Iluminacion sonido y animación</option>
                                        <option value="C4">Zapatos y recordatorios</option>
                                        <option value="C5">Planeadores de bodas</option>
                                        <option value="C6">Videos y fotografia</option>
                                        <option value="C7">Chef y pasteleros</option>
                                        <option value="C8">Anillos y accesorios</option>
                                        <option value="C9">Vestidos de novia y novio</option>
                                        <option value="C10">Tarjetas de invitación</option>
                                        <option value="C11">Bebidas y licores</option>
                                        <option value="C12">Floristeria y decoración</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Nombre del producto o Servicio</label>
                                <input type="text" class="form_input " name="product_nuevo" id="product_nombre" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Precio</label>
                                <input type="number" class="form_input " name="product_precio" id="product_precio" />
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (1)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img1" />
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (2)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img2" />
                            </div>
                            <div class="col-12">
                                <label>Breve descripcion de su producto o servicio</label>
                                <textarea class="form_textarea_full" name="descr_producto" id="descr_producto"></textarea>
                            </div>

                            <div class="col-6">


                            </div>
                            <div class="col-6">

                                <button type="button" class="btn btn-success"> Guardar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>
<!-- <div class="modal-footer">
    <h1>hola</h1>
</div> -->