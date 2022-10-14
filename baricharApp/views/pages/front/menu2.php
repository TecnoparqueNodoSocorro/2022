<!-- DIVERSION -->
<?php
if (isset($_GET["module"])) {
    $session = ($_GET["module"]);
}

require_once "models/model_pagina.php";
require_once "controllers/controller_pagina.php";
$pagina = Controladorpagina::ctrGetPagByItem($session);
//print_r($pagina)
?>

<div class="title_container divMenu2">
    <div class="home_bottomS mt-5">
        <h1 class="text-white" style="margin-top:100px"><strong>
            
            <?php
            if( $session=="tour_de_entretenimiento"){
                
                echo "TOURS DE ENTRETENIMIENTO";
            
            }else if( $session=="lunademiel"){
                echo "LUNA DE MIEL";
            }else if( $session=="planesdeboda"){
                echo "PLANES DE BODA";
            } else{
            echo strtoupper($session);
            }
        
        ?>
        
    
    </strong></h1>

        <div class="cards row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-2 mb-5" >
            <?php foreach ($pagina as $key => $value) : ?>
                <div class="col mx-auto">
                    <div class="cardm2">
                        <div class="container-fluid py-2">
                            <picture>
                                <source srcset="views<?php echo $value["imagen"] ?>" type="image/svg+xml">
                                <img src="views<?php echo $value["imagen"] ?>" class="img-fluid img-thumbnail" alt="...">
                            </picture>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title tituloCard "><strong><?php echo $value["titulo"] ?></strong></h5>
                            <p class="card-text text-white"><?php echo $value["descripcion"] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>

    </div>


</div>