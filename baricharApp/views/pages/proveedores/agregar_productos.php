<div class="home_agregar">
    <div class="agregar">
        <div class="page_content">
            <div class="full_width_centered">

                <div class="form_content mt-3">
                    <form id="ContactForm" method="post" action="">
<br>
                        <h3 class="form_subtitle">AGREGAR NUEVO PRODUCTO O SERVICIO</h3>
                        <div class="form_section">
                            <div class="form_row_full">
                                <label>Categoria del servicio o producto</label>
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
                            <div class="form_row left13_first">
                                <label>Nombre del producto o Servicio</label>
                                <input type="text" class="form_input " name="product_nuevo" id="product_nombre" />
                            </div>

                            <div class="form_row left13">
                                <label>Precio</label>
                                <input type="number" class="form_input " name="product_precio" id="product_precio" />
                            </div>
                            <div class="form_row left13_last">
                                <label>Imagen (1)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img1" />
                            </div>
                            <div class="form_row left13_last">
                                <label>Imagen (2)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img2" />
                            </div>
                            <div class="form_row left13">
                                <label>Breve descripcion de su producto o servicio</label>
                                <textarea class="form_textarea_full" name="descr_producto"
                                    id="descr_producto"></textarea>
                            </div>
                            <div class="form_row left13 mt-5">
                            <input name="" id="agregar_producto" class="btn btn-warning" type="button" value="Guardar">
                            </div>
                            <div class="form_row left13_last">
                            <a name="" id="" class="btn btn-danger " type="button" value="Cancelar"
                                    href="index.php?page=productos" style="">Cancelar </a>
                            </div>
                            

                    </form>
                </div>

                </form>
            </div>

        </div>
    </div>

    <!--end of full width-->
</div>
<!--end of page content-->