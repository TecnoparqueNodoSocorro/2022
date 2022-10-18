<?php

class ControladorLogin
{
        /* metodo de ingreso */

        public function ctrlogin()
        {
                if (isset($_SESSION["validar_ingreso"])) {
                        $_SESSION["validar_ingreso"] == "ok";
                        echo ' <br>   <div class="container" id="fondo">
               <hr>
                            <h3>Administracion</h3>
                            <li> <a class="nav-link" href="index.php?page=facturar"><i class="bi bi-calendar2-check"></i>
                                    Facturar</a> </li>
                            <li> <a class="nav-link " href="index.php?page=productos"><i class="bi bi-collection-fill"></i>
                                    Productos</a></li>
                            <li> <a class="nav-link " href="index.php?page=categorias"><i class="bi bi-columns"></i>
                                    Categorias</a> </li>
                            <li> <a class="nav-link " href="index.php?page=informes"><i class="bi bi-cash-coin"></i>
                                    Informes</a> </li>
                            <li> <a class="nav-link " href="index.php?page=salir"><i class="bi bi-x-circle-fill"></i>
                                    Salir</a> </li>
                                         <hr>
                        </div>';
                        return;
                } else {
                        if (isset($_POST["l_username"])) {
                                $tabla = "usuarios";
                                $item = "usuario";
                                $valor = ($_POST["l_username"]);
                                $password = ($_POST["l_password"]);
                                $respuesta = modelUsuarios::mdlloginusuario($tabla, $item, $valor);
                                /* Validacion */
                                if ($respuesta == false || $respuesta == '0') {

                                        echo '<script> 
            if (window.history.replaceState){
                window.fistoy.replaceState(null, null, window.location.href);
            } </script>';
                                        echo '<div class="alert alert-danger" role="alert">
            Error de credenciales!
             </div>';


                                        /* var_dump($respuesta); */
                                } else {
                                        if ($respuesta["usuario"] == $_POST["l_username"]  &&  $respuesta["contrasena"] == $_POST["l_password"]) {

                                                $_SESSION["validar_ingreso"] = "ok";

                                                echo ' <br>   <div class="container" id="fondo">
               <hr>

                            <h3>Administracion</h3>

                            <li> <a class="nav-link" href="index.php?page=facturar"><i class="bi bi-calendar2-check"></i>
                                    Facturar</a> </li>
                            <li> <a class="nav-link " href="index.php?page=productos"><i class="bi bi-collection-fill"></i>
                                    Productos</a></li>
                            <li> <a class="nav-link " href="index.php?page=categorias"><i class="bi bi-columns"></i>
                                    Categorias</a> </li>
                            <li> <a class="nav-link " href="index.php?page=informes"><i class="bi bi-cash-coin"></i>
                                    Informes</a> </li>
                            <li> <a class="nav-link " href="index.php?page=salir"><i class="bi bi-x-circle-fill"></i>
                                    Salir</a> </li>
                                         <hr>
                        </div>';
                                        } else {
                                                echo '<div class="alert alert-danger" role="alert">
                Error de credenciales!
                 </div>';
                                        }
                                }
                        }
                }
        }
}
