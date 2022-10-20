<?php
require_once "models/model_proveedores.php";
require_once "controllers/controller_proveedores.php";
$prov = ControladorProveedor::CtrSelectAllProveedor();
//print_r($prov)
require_once "modal_porductos_prov.php";

?>
<div class="title_container">
    <div class="home_bottomS">
        <div class="container-fluid mt-2" style="display: grid; place-content: center;">

            <h1 class="text-white">Listado de proveedores</h1>

            <div class="table-responsive" id="" style="max-width: 500px; background-color:white; margin-bottom: 200px !important;">
                <table class="table caption-top table-bordered table-sm">
                    <thead>
                        <tr>
                            <th style="width: 100px;">logo</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($prov as $key => $value) : ?>
                            <tr>

                                
                                    <td> <button class="info_proveedor" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" data-bs-toggle="modal" data-bs-target="#modalProductosProv" style="border-color:transparent; background: transparent;"><img src="views/views/<?php echo $value["logo"] ?>" class="img-thumbnail" alt="..."> </button></td>
                                    <td>  <button class="info_proveedor" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" data-bs-toggle="modal" data-bs-target="#modalProductosProv" style="border-color:transparent; background: transparent;  padding: 30px 90px 20px;"><?php echo $value["nombre"] ?>   </button> </td>
                             
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>


            </div>


        </div>
    </div>

</div>
<div class="slider_container" style="    position: fixed !important;">
    <div class="slider_trans_black"></div>
    <div id="random">
        <div style="background-image: url(views/images/slider/slide1.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide3.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide4.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide5.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide6.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide7.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide8.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide9.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide10.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide11.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide12.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide13.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide14.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide15.jpg);"></div>
    </div>
</div>