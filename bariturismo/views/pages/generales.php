<?php
if (isset($_GET["mun"])) {
    $mun = ($_GET["mun"]);
    $session = ($_GET["page"]);
}
?>

<div class="title_container">
    <div class="home_bottomS">
        <div class="container">

            <div class="container-prearticulos">

                <h1 class="publik-titulo"> <?php echo $mun ?> - <?php echo $session ?> </h1>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="publik_cultural">
                            <div class="row">
                                <div class="col-12 col-md-6  publik_imagen_cultural">
                                    <img class="img_publik" src="views/images/publicaciones/diversion/imagen.jpg" alt="">
                                </div>

                                <div class="col-12 col-md-6 publik_titulo">Lorem ipsis, consequuntur eos. Distinctio, natus?</div>
                                <div class="col-12  col-md-12 publik_desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos voluptatum laudantium deserunt debitis saepe repellendus, tempora obcaecati autem soluta repellat, fuga amet laboriosam nostrum recusandae. Debitis, consequuntur eos. Distinctio, natus?</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
