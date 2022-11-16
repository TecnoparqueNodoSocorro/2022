<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}


?>
<div class="container-fluid" style="text-align: center;">
    <h3 class="mt-2">Cambio de contraseña</h3>
    <div class="container shadow p-3" style="background-color:#e3f8e0; border-radius:5px;">

        <div class="row justify-content-md-center">
            <div class="col col-xs-12 col-md-12 col-lg-12">
                <label class="form-label">
                    <h5>Contraseña actual</h5>
                   

                </label>
                <input type="password" onkeypress="return valideKey(event)" name="contra_act" id="contra_act" class="form-control" value="" required>

            </div>

        </div>

        <div class="row justify-content-md-center">
            <div class="col-12 col-md-6 col-lg-6 mb-4">
                <label class="form-label">
                    <h5>Nueva      contraseña</h5>
                </label>
                <input type="password" name="new_contra"  id="new_contra" class="form-control only_numbers" value="" required>
                <h7 >La clave tiene que ser de 4 números</h7>

            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h5>Confirmar contraseña</h5>
                </label>
                <input type="password" name="confirm_new_contra"  id="confirm_new_contra" class="form-control only_numbers"  value="" required>
            </div>
        </div>

        <!--       <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Cargo</h6>
                </label>
                <select class="form-select" name="cargo_user" id="cargo_user" aria-label="Default select example">
                    <option selected>Seleccione el cargo</option>
                    <option value="1">Empleado</option>
                    <option value="2">Administrador</option>

                </select>
            </div>

        </div> -->
        <button class="btn btn-warning mt-2 mb-4  shadow p-1" id="btnCambiarPass" type="submit">Cambiar contraseña</button>

    </div>
</div>