<div class="container-fluid" id="lista_productos">
    <div id="alertas"></div>
    <div class="container" id="logo">
        <img src="images/logo.png" alt="" id="imagenlogo">
    </div>

    <div id="titulo" style="text-align:center;">
        Nuestros productos
    </div>


    <div id="productos" name="productos">

        <?php
        $productos = ControladorProductos::ctrConsultarProductos();
        ?>
        <?php foreach ($productos as $key => $value) :  ?>
            <div class="col-6 col-md-3 col-lg-3 ">
                <div class="card" style="width: auto;">
                    <div class="imagen"><img src=<?php echo $value["imagen"] ?> id="imagentarjeta"></div>

                    <div class="card-body">

                        <div class="row tablacarrito" id="nombre">
                            <div class="col-12 nombreprod" id="nombreprod"> <?php echo $value["nombre"] ?>
                            </div>
                        </div>
                        <div class="row tablacarrito">
                            <div class="col-md-8 col-8 precio">
                                <div class="precio" id="precio"><?php echo $value["precio"] ?></div>
                            </div>

                            <a href="#" onclick="cargareventListener()" class="btn btn-default btn-circle btn-lg agregarP" id="btnprod" data_id="<?php echo $value["id"] ?>"><i class="bi bi-cart-plus agregar_producto"></i>
                            </a>
                            <div class="col-md-12 col-12 descripcion">
                                <p class="card-text" id="descripcion"> <?php echo $value["descripcion"] ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>
<hr>
<p class="piedepagina">Designed by Tecnoparque Nodo Socorro 2022 ©</p>