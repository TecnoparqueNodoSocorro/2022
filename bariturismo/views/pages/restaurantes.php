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
    //print_r($historia)
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
                            <h5 class="card-title"><?php echo $value["nombre"] ?></h5>
                            <p class="card-text  text-light"><?php echo $value["descripcion"] ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="listSesion text-light list-group-item"><strong>Dirección: </strong><?php echo $value["direccion"] ?></li>
                            </ul>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-4"><a href="<?php echo $value["facebook"] ?>" target="_blank" class="btn btn-sm btn-primary"><i class="bi bi-facebook"></i> <strong>Facebook</strong></a></div>
                                    <div class="col-4"><a href="<?php echo $value["instagram"] ?>" target="_blank" class="instabtn btn btn-sm btn-primary"><i class="bi bi-instagram"></i> <strong>Instagram</strong></a></div>
                                    <div class="col-4"> <button data-x="<?php echo $value["coordenadas_x"] ?>" data-y="<?php echo $value["coordenadas_y"] ?>" class="extraerC btn btn-sm btn-primary"> <i class="bi bi-geo-alt-fill"></i> <strong>Ubicación</strong></button>
                                    </div>
                                </div>
                            </div>
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