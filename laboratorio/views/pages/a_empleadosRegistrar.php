<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}



?>
<div class="container shadow p-3" style="text-align: center;">
    <h3 class="text-titulo">Registrar Empleado</h3>
    <div class="container-fluid mb-5" style="background-color:#ffffff; border-radius:5px;  text-align: initial;">
        <div class="row justify-content-md-center">
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Nombres</h6>
                </label>
                <input type="text" name="name_user" id="name_user" class="input-caja" value="" required>
            </div>
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Apellidos</h6>
                </label>
                <input type="text" name="lastname_user" id="lastname_user" class="input-caja" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Número de Teléfono</h6>
                </label>
                <input type="number" name="phone_user" id="phone_user" class="input-caja" value="" required>

            </div>
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Número de documento</h6>
                </label>
                <input type="number" name="document_user" id="document_user" class="input-caja" value="" required>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-12">
                <label class="form-label">
                    <h6>Correo electrónico</h6>
                </label>
                <input type="text" name="email_user" id="email_user" class="input-caja" value="" required>

            </div>

        </div>


        <div class="row justify-content-md-center">
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Contraseña (Máximo 8 caracteres)</h6>
                </label>
                <input type="password" maxlength="8" name="password_user" id="password_user" class="input-caja" value="" required>

            </div>
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Confirmar contraseña</h6>
                </label>
                <input type="password" maxlength="8" name="confirm_password" id="confirm_password" class="input-caja" value="" required>
            </div>
        </div>

        <div class="md-center" style="text-align: center;">

            <button class="btn btn-primary mt-2 mb-4" id="btnRegistrar" type="submit">Registrar Empleado</button>
        </div>


    </div>
</div>