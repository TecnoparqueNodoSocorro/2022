<?php


class ControladorUsuarios
{

  //LOGIN
  static public function ctrLogin($data)
  {
    $tabla = "usuarios";
    $respuesta = ModelUsuarios::mdlLogin($tabla, $data);

    // return $respuesta;
    if ($respuesta == false) {
      return "";
    } else if($respuesta->estado=="0"){
    return "Usuario inactivo";
    }else {
      //SI LA RESPUESTA DEL MODELO ES DIFERENTE A FALSO FUE PORQUE ENCONTRÓ COINCIDENCIA EN LOS DATOS QUE SE ENVIARION

      //SE CREA LA SESSION
      session_start();

      //SE CREAN LAS VARIABLES DE SESSION
      $_SESSION["validar_ingreso"] = "ok";
      $_SESSION["id_cargo"] = $respuesta->id_cargo;
      $_SESSION["id"] = $respuesta->id;
      $_SESSION["estado"] = $respuesta->estado;
      $_SESSION["nombres"] = $respuesta->nombres;
      $_SESSION["apellidos"] = $respuesta->apellidos;
    
      return $respuesta;
      //------------------------------------------
    }
  }





  function ctrMenu()
  {
    //SI EXISTE LA VARIABLES DE VALIDAR INGRESO
    if (isset($_SESSION["validar_ingreso"])) {
      //SI LA VARIBLA ES IGUAL A "OK"
      if ($_SESSION["validar_ingreso"] == "ok") {
        //SI EL ID DEL CARGO ES IGUAL A 1 SE DIBUJA EL MENU DEL EMPLEADO
        if ($_SESSION["id_cargo"] == "1") {
          echo '
          <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <div class="boton">
              <i class="bi bi-chevron-double-left"></i>
          </div>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <h2 class="offcanvas-title" id="offcanvasNavbarLabel">LaChila</h2>
              <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                  <div class="botonClose">
                      <i class="bi bi-chevron-double-right"></i>
                  </div>
              </button>
          </div>

          <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                      <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=e_home"> <i class="bi bi-house"></i> Home</a>
                  </li>
                  <li class="nav-item">
                      <a class=" nav-link text-uppercase" href="index.php?page=e_gestionLotesUsuarios"> <i class="bi bi-archive"></i>
                          Registro de variables</a>
                  </li>

                 

                  <li class="nav-item">
                  <a class=" nav-link text-uppercase" href="index.php?page=e_registroActividades"><i class="bi bi-layout-text-sidebar"></i>
                  Registro de Actividades </a>
                  </li>

                  <li class="nav-item">
                      <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"><i class="bi bi-box-arrow-left"></i>
                          Cerrar sesión</a>
                  </li>







              </ul>
          </div>
      </div>
       
          ';
        }
        if ($_SESSION["id_cargo"] == "2") {
          //SI EL ID DE CARGO ES 2 SE DIBUJA EL MENU DEL ADMINISTRADOR
          echo '
      
          <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <div class="boton">
                  <i class="bi bi-chevron-double-left"></i>
              </div>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <h2 class="offcanvas-title" id="offcanvasNavbarLabel">LaChila</h2>
              <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                  <div class="botonClose">
                      <i class="bi bi-chevron-double-right"></i>
                  </div>
              </button>
          </div>

          <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                      <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=a_home"> <i class="bi bi-house"></i> Home</a>
                  </li>

                  <li class="nav-item">
                      <a class=" nav-link text-uppercase" href="index.php?page=a_gestionUsuarios"> <i class="bi bi-person"></i>
                          Gestión de Usuarios</a>
                  </li>
                 <li class="nav-item">
                      <a class=" nav-link text-uppercase" href="index.php?page=a_gestionLotes"> <i class="bi bi-archive"></i>
                          Gestión de lotes</a>
                  </li>
             
                  <!--
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                          Informes</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                          <a class=" nav-link  sub-nav" href="index.php?page=a_informeInvima"> Informe INVIMA</a>
                          <a class=" nav-link sub-nav" href="index.php?page=a_informeLotes">
                              Informe de Lotes </a>
                      </div>
                  </li>


                  <li class="nav-item dropdown">

                      <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-activity"></i>
                          Registros</a>


                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                          <div class="dropp">

                              <a class=" nav-link sub-nav" href="index.php?page=e_registroActividades"></i>
                                  Registro de Actividades </a>

                          </div>
                      </div>
                  </li>
                  -->
                 

                  <li class="nav-item">
                      <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"><i class="bi bi-box-arrow-left"></i>
                          Cerrar sesión</a>
                  </li>







              </ul>
          </div>
      </div>
          ';
        }
      } else {
        echo '';
      }
    } else {
      echo "";
    }
  }



  //CREAR USUARIO
  static public function ctrPostUsuario($data)
  {
    $tabla = "usuarios";
    $respuesta = ModelUsuarios::mdlPostUsuario($tabla, $data);
    echo $respuesta;
  }
  //LISTAR USUARIOS
  static public function ctrGetUsuarios()
  {
    $tabla = "usuarios";
    $respuesta = ModelUsuarios::mdlGetUsuarios($tabla);
    return $respuesta;
  }
  //desactivar O ACTIVAR USUARIOS
  static public function ctrDesactivarUsuario($data)
  {
    $tabla = "usuarios";
    //SI EL USUARIO ESTA ACTIVO, SE ENVIA AL MODELO QUE DESACTIVA AL USUARIO
    if ($data["state"] == 1) {
      $respuesta = ModelUsuarios::mdlDesactivarUsuarios($tabla, $data);
      echo $respuesta;
      //SI EL USUARIO ESTA INACTIVO, SE ENVIA AL MODELO QUE ACTIVA AL USUARIO

    } else if ($data["state"] == 0) {
      $respuesta = ModelUsuarios::mdlActivarUsuarios($tabla, $data);
      echo $respuesta;
    }
  }
    //cambio clave
    static public function ctrCambiarClave($data)
    {
      $tabla = "usuarios";
      $respuesta = ModelUsuarios::mdlCambioClave($tabla, $data);
      return $respuesta;
    }
}
