<?php
if (isset($_GET["mun"])) {
    $mun = ($_GET["mun"]);
    $session = ($_GET["page"]);
}
?>

<div class="divHistoria container-fluid">
    <a href="index.php?page=home" class="btn-flotante btn-sm"><i class="bi bi-house"></i></a>

    <?php
    $historia = ControladorArticulos::ctrGetArticuloPorSession($mun, $session);
    // print_r($historia)
    ?>

    <h1 class="publik-titulo"> <?php echo $mun == 'barichara' ? 'Barichara' : 'Villanueva' ?> - <?php echo $session ?> </h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-2">
        <?php foreach ($historia as $key => $value) : ?>
            <div class="col">
                <div class="card-columns">
                    <div class="cardHistoria card">

                        <div class="row mx-1 my-1">
                            <div class="col-6">
                                <picture>
                                    <source srcset="views/views/<?php echo $value["imagen1"] ?>" type="image/svg+xml">
                                    <img src="views/views/<?php echo $value["imagen1"] ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </div>
                            <div class="col-6">
                                <picture>
                                    <source srcset="views/views/<?php echo $value["imagen2"] ?>" type="image/svg+xml">
                                    <img src="views/views/<?php echo $value["imagen2"] ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $value["nombre"] ?></h5>
                            <p class="card-text  text-light"><?php echo $value["descripcion"] ?></p>

                            <button data-x="<?php echo $value["coordenadas_x"] ?>" data-y="<?php echo $value["coordenadas_y"] ?>" class="extraerC btn btn-sm btn-primary"> <i class="bi bi-geo-alt-fill"></i></a> <strong>Ubicación</strong>


                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalMapa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubicación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="container-fluid" id="map">


                    <!-- <a href="http://www.google.com" id="imagenubicacion" src="views/images/ubicacion.png"></a> -->
                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.7852651686119!2d-73.22954017080932!3d6.62939599970039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x450bf1a223f979f2!2zNsKwMzcnNDUuOCJOIDczwrAxMyc0NC40Ilc!5e0!3m2!1ses!2sco!4v1664900907739!5m2!1ses!2sco" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!--                 <button type="button" class="btn btn-primary">Save changes</button>
 -->
            </div>
        </div>
    </div>
</div>
<!--         <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
         -->




































<!-- <br>
<h1 class="publik-titulo"> <?php echo $mun ?> - <?php echo $session ?> </h1>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="home">
                <div class="container-fluid historia">
                    <div class="row">
                        <div class="col-6 col_img_izq"> <img class="appimg1" src="views/images/images.png" alt=""></div>
                        <div class="col-6 col_img_der"> <img class="appimg1" src="views/images/images.png" alt=""></div>
                    </div>
                    <div class="container infoapp">
                        <div class="row apptitulo">nombre del articulo</div>
                        <div class="row">
                            <div class="col-8 appdescripcion">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis doloremque perferendis reprehenderit dolor tempora nemo laboriosam, illo voluptas delectus, neque quos quod recusandae ipsam cum nulla maxime! Non, enim itaque?
                            </div>
                            <div class="col-4 imagenubicacion">
                                <a href="http://www.google.com" id="imagenubicacion" src="views/images/ubicacion.png"></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
     

    </div>
</div>
</div>
</div>
</div>
<hr> -->

<!--  <div class="row">
        <div class="col-12 col-md-6">
            <div class="publik_serv">
                <div class="row">
                    <div class="container">
                        <div class="row">

                            <div class="col-3 col-md-3  publik_imagen_serv b-r">
                                <div class="container_servicios">
                                    <img class="img_publik_serv" src="views/images/images.png" alt="">
                                </div>

                            </div>

                            <div class="col-3 col-md-3 publik_titulo b-r">Lorem ipsis, consequuntur eos. Distinctio, natus?</div>

                            <div class="col-6  col-md-6 publik_desc_serv b-r">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos voluptatum laudantium deserunt debitis saepe repellendus, tempora obcaecati autem soluta repellat, fuga amet laboriosam nostrum recusandae. Debitis, consequuntur eos. Distinctio, natus?</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div> -->
<!-- </div>

</div>
<br>
</div>
</div> -->