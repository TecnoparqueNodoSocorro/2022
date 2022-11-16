<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {


         if ($_SESSION["id_cargo"] == "1") {
            echo '<script>window.location="index.php?page=a_home"; </script>';
        } elseif ($_SESSION["id_cargo"] == "2") {
            echo '<script>window.location="index.php?page=e_home"; </script>';
        } elseif ($_SESSION["id_cargo"] == "3") {
            echo '<script>window.location="index.php?page=c_home"; </script>';
        }
    }
}/*  else {
    echo '<script>window.location="index.php?page=error"; </script>';
} */



?>
<section class="vh-99 ">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong rounded" style="border: transparent;">


                    <div class="card-body p-5 text-center shadow-lg ">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="display: inline-flex;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Usuario</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Cliente</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <!-- ---------------------------------------- Borrar---------------------------------------- -->
                                <p class="text-black"> empleado
                                    465465464
                                    clave:
                                    1111 <br>
                                    administrador 987654321
                                    clave: 4765 <br>

                                </p>
                                <!-- ---------------------------------------- Borrar---------------------------------------- -->
                                <h3 class="mb-5">Iniciar Sesión</h3>

                                <div class="form-outline mb-4">
                                    <input type="email" id="username" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">Número de documento</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="pass" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Contraseña</label>
                                </div>



                                <button class="btn btn-primary  btn-block" id="btnIniciar" type="button">Iniciar Sesión</button>
                            </div>


                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                                <!-- ---------------------------------------- Borrar---------------------------------------- -->
                                <p class="text-black"> <br>
                                    cliente 534534534
                                    clave: 5555
                                </p>
                                <!-- ---------------------------------------- Borrar---------------------------------------- -->
                                <h3 class="mb-5">Iniciar Sesión</h3>

                                <div class="form-outline mb-4">
                                    <input type="email" id="username_cliente" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">Número de documento</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="pass_cliente" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Contraseña</label>
                                </div>



                                <button class="btn btn-primary  btn-block" id="btnIniciar_cliente" type="button">Iniciar Sesión</button>
                            </div>
                        </div>


                        <hr class="my-4">



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>