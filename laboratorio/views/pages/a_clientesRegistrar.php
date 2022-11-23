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
<div class="container shadow p-3" style="text-align: center; ">
    <h3 class="text-titulo">Registrar Cliente</h3>
    <div class="container-fluid mb-5" style="background-color:#ffffff; border-radius:5px;  text-align: initial;">
        <form id="formulario_post_cliente" enctype="multipart/form-data">

            <div class="row justify-content-md-center">
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Nombre</h6>
                    </label>
                    <input type="text" name="name_emp" id="name_emp" class="   input-caja" value="" >
                </div>
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Nit</h6>
                    </label>
                    <input type="text" name="nit_emp" id="nit_emp" class=" input-caja" value="" >
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Representante legal</h6>
                    </label>
                    <input type="text" name="replegal_emp" id="replegal_emp" class="   input-caja" value="" >

                </div>
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Ciudad</h6>
                    </label>
                    <input type="text" name="ciudad_emp" id="ciudad_emp" class="   input-caja" value="" >
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Dirección</h6>
                    </label>
                    <input type="text" name="direccion_emp" id="direccion_emp" class=" input-caja" value="" >

                </div>
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Teléfono</h6>
                    </label>
                    <input type="number" name="tel_emp" id="tel_emp" class="   input-caja" value="" >

                </div>

            </div>
            <div class="row justify-content-md-center">
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Email</h6>
                    </label>
                    <input type="email" name="email_emp" id="email_emp" class="input-caja" value="" >

                </div>
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Logo (Peso máxino 600kb)</h6>
                    </label>
                    <input type="file" name="logo_emp" id="logo_emp" class="   input-caja" value="" >

                </div>

            </div>


            <div class="row justify-content-md-center">
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Contraseña (Máximo 8 caracteres)</h6>
                    </label>
                    <input type="password" maxlength="8" name="password_emp" id="password_emp" class="input-caja" value="" >

                </div>
                <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label">
                        <h6>Confirmar contraseña (Máximo 8 caracteres)</h6>
                    </label>
                    <input type="password" maxlength="8"  name="confirm_password_emp" id="confirm_password_emp" class="   input-caja" value="" >
                </div>
            </div>

            <div class="md-center" style="text-align: center;">

                <button class="btn btn-primary mt-2 mb-4" id="btnRegistrar_emp" type="submit">Registrar cliente</button>
            </div>
        </form>

    </div>
</div>