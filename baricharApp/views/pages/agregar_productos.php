<div class="home_agregar">
    <div class="agregar">
        <div class="page_content">
            <div class="full_width_centered">

                <div class="form_content mt-3">
                    <form id="ContactForm" method="post" action="">

                        <h3 class="form_subtitle">PRODUCTO NUEVO</h3>
                        <div class="form_section">
                            <div class="form_row_full">
                                <label>SELECCIONE LA CATEGORIA</label>
                                <div class="select_container">
                                    <select class="form_select" name="guests" id="categoria">
                                        <option selected>---Categorias---</option>
                                        <option value="1">IGLESIAS, HOTELES Y BODAS</option>
                                        <option value="2">MAQUILLAJE Y PEINADO</option>
                                        <option value="3">ILUMINACIÓN SONIDO Y ANIMACIÓN</option>
                                        <option value="4">ZAPATOS Y RECORDATORIOS</option>
                                        <option value="5+">PLANEADORES DE BODAS</option>

                                        <option value="1">VIDEOS Y FOTOGRAFÍAS</option>
                                        <option value="2">CHEF - PASTELEROS </option>
                                        <option value="3">ANILLOS Y ACCESORIOS</option>
                                        <option value="4">VESTIDOS DE NOVIA Y NOVIO</option>
                                        <option value="5">TARJETA DE INVITACIÓN</option>
                                        <option value="4">BEBIDAS Y LICORES</option>
                                        <option value="5+">FLORISTERÍA Y DECORACIÓN</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form_row left13_first">
                                <label>NOMBRE</label>
                                <input type="text" class="form_input " name="product_nuevo" id="product_nuevo" />
                            </div>

                            <div class="form_row left13">
                                <label>PRECIO</label>
                                <input type="number" class="form_input " name="product_precio" id="product_precio" />
                            </div>
                            <div class="form_row left13_last">
                                <label>IMAGEN (1)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img" />
                            </div>
                            <div class="form_row left13_last">
                                <label>IMAGEN (2)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img" />
                            </div>
                            <div class="form_row left13">
                                <label>DESCRIPCIÓN</label>
                                <textarea class="form_textarea_full" name="descr_producto"
                                    id="descr_producto"></textarea>
                            </div>
                            <div class="form_row left13 mt-5">
                            <input name="" id="agregar_producto" class="btn btn-warning" type="button" value="Crear Producto">
                            </div>
                            <div class="form_row left13_last">
                            <a name="" id="" class="btn btn-danger " type="button" value="Cancelar"
                                    href="index.php?page=productos" >Cancelar </a>
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