<!-- <div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-12 col-lg-6">
            <section class="page-section">
                <div class="container">
                    <div class="bg-faded  rounded">
                        <img class="intro-img img-fluid  rounded" src="images/logohd.png">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6" style=" display: flex;
        align-items: center;    
        justify-content: center;">
            <div class="container" style="width:100%;">

                <form method="post">
                    <div class="input-group">
                        <span class="input-group-textt" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control" id="username" name="user" placeholder="Documento" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-textt" id="basic-addon1"><i class="bi bi-key"></i></span>
                        <input type="password" class="form-control" id="pass" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">
                    </div>


                    <button type="button" id="btnIniciar" class="btn btn-success mt-3 mb-5">Ingresar</button>
                </form>
            </div>
        </div>

    </div>
</div> -->

<!-- <section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="images/Imagen1.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form>

                    <div class="form-outline mb-4">
                        <input type="email" id="username" class="form-control form-control-lg" placeholder="Ingrese su número de documento" />
                        <label class="form-label" for="form3Example3">Número de documento</label>
                    </div>


                    <div class="form-outline mb-3">
                        <input type="password" id="pass" onkeypress="return valideKey(event)" class="form-control form-control-lg" placeholder="Ingrese su contraseña" />
                        <label class="form-label" for="form3Example4">Contraseña</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="button" id="btnIniciar" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Ingresar</button>

                    </div>

                </form>
            </div>
        </div>
    </div> -->
<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        echo '<script>window.location="index.php?page=home" </script>';
    }
}
?>

<!-- <div class="container">
    <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <img src="images/logohd2.png" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 offset-xl-1">
            <form method="post">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" id="username" name="user" placeholder="Número de documento" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                    <input type="password" onkeypress="return valideKey(event)" class="form-control" id="pass" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">
                </div>

                <button type="button" id="btnIniciar" class="btn btn-warning mt-3 mb-5 text-light">Ingresar</button>


            </form>
        </div>
    </div>
</div> -->

<div class="container" style="height: 100%;">
    <div class="row" style=" display: flex;align-items: center; justify-content: center;">
        <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
            <section class="page-section">
                <div class="container">
                    <div class="bg-faded  rounded">
                    <img src="images/logohd2.png" class="img-fluid" alt="Phone image">

                    </div>
                </div>
            </section>

        </div>
      <!-- ---------------------------------------- Borrar---------------------------------------- -->
      <p class="text-black"> empleado
                2222
                clave:
                2222
                <br>
                administrador 1111
                clave: 1111
            </p>
            <!-- ---------------------------------------- Borrar---------------------------------------- -->

        <div class="col-sm-12 col-md-12 col-lg-6">
            <form method="post">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" id="username" name="user" placeholder="Número de documento" aria-label="Username" aria-describedby="basic-addon1">

                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                    <input type="password" onkeypress="return valideKey(event)" class="form-control" id="pass" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">

                </div>


                <button type="button" id="btnIniciar" class="btn btn-warning mt-3 mb-5 text-light">Ingresar</button>
            </form>

        </div>
      
    </div>
</div>