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
                            <img id="imgproveedor" src="views/images/proveedores/proveedor1.jpg">
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



            <div class="row ">
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
                <h5 class="modal-title clear" id="exampleModalLabel">Editar datos de la empresa</h5>

            </div>
            <div class="modal-body">


                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <p class="clear"><strong>Datos de la empresa</strong></p>

                        <div class="row">

                            <div class="col-12  col-md-4">
                                <label>Direccion</label>
                                <input type="text" class="form_input " name="emp_direccion" id="emp_direccion" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Telefono</label>
                                <input type="number" class="form_input" name="emp_telefono" id="emp_telefono" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Email</label>
                                <input type="mail" class="form_input " name="emp_email" id="emp_email" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label>Logo <Small>(Reemplazar)</Small></label>
                                <input type="file" class="form_input " name="emp_logo" id="emp_logo" />
                            </div>
                            <br>

                            <div class="row">
                                <p class="clear"><strong>Cambiar Contraseña</strong></p>
                                <hr>
                                <div class="col-12  col-md-4">
                                    <label>Contraseña actual</label>
                                    <input type="text" class="form_input" name="emp_user" id="emp_user" />
                                </div>
                                <div class="col-12  col-md-4">
                                    <label>Contraseña Nueva</label>
                                    <input type="password" class="form_input" name="emp_pass_1" id="emp_pass_1" />
                                </div>
                                <div class="col-12  col-md-4">
                                    <label>Confirmar contraseña</label>
                                    <input type="password" class="form_input" name="emp_pass_2" id="emp_pass_2" />
                                </div>
                                <div class="col-12">
                                    <label>Breve descripcion de la empresa</label>
                                    <textarea class="form_textarea_full" name="emp_descr" id="emp_descr"></textarea>
                                </div>
                            </div>

                            <div>
                                <button type="button" class="btn btn-success"> Guardar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
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