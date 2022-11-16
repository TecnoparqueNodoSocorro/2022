<?php
$clientes = ControladorClientes::ctrGetClientes();

?>

<div class="container-fluid" style="text-align: center;">
    <h3 class="text-titulo">Registrar ubicación</h3>
    <div class="row justify-content-md-center">
        <div class="col-12 col-xs-12 col-md-12 col-lg-6 mt-4 mb-3">

            <select class="input-caja" name="cliente_unic" id="cliente_unic">
                <option selected value="0">--Seleccionar cliente--</option>
                <?php foreach ($clientes as $key => $value) : ?>
                    <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <div class="col-12 col-xs-12 col-md-12 col-lg-6 mt-4 mb-3">

            <input type="text" name="name_ubic" id="name_ubic" class="input-caja" placeholder="Ubicación" value="">


        </div>
        <div class="col-12 ">

            <button class="btn btn-primary mt-2 mb-4" id="btnRegistrar_ubic" type="button">Registrar ubicación</button>


        </div>
    </div>



</div>