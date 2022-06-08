<div class="container-fluid" id="lista_productos">
    <div class="container" id="logo">
        <img src="images/logo.png" alt="" id="imagenlogo">
    </div>
    <div id="titulo">
        Nuestros productos
    </div>
    <div id="productos" name="productos">

        <?php
        $productos = ControladorProductos::ctrConsultarProductos();
        ?>
        <?php foreach ($productos as $key => $value) :  ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card" style="width: auto;">
                    <div class="imagen"><img src=<?php echo $value["imagen"] ?> id="imagentarjeta"></div>
                    <div class="card-body">
                     
                        <div class="row" id="nombre">
                            <div class="col-12 nombreprod" id="nombreprod"> <?php echo $value["nombre"] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-4 precio">
                                <div class="precio" id="precio"><?php echo $value["precio"] ?></div>
                            </div>
                            <div class="col-md-12 col-8 descripcion">
                                <p class="card-text" id="descripcion"> <?php echo $value["descripcion"] ?></p>
                            </div>
                            <a href="#" class="btn btn-default btn-circle btn-lg agregarP" id="btnprod" data_id="<?php echo $value["id"] ?>"><i class="bi bi-cart-plus agregarproducto" ></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>
