<?php


class ControladorCaprinocultor
{


  //LOGIN
  static public function login($data)
  {
    $tabla = "usuarios";
    $respuesta = ModelCaprinocultor::login($tabla, $data);

   // return $respuesta;
     if ($respuesta == false) { 
      return "";  
    } else {
      session_start();
      $_SESSION["validar_ingreso"] = "ok";

      $_SESSION["id_cargo"] = $respuesta->id_cargo;
      $_SESSION["id"] = $respuesta->id;
      $_SESSION["nombres"] = $respuesta->nombres;
      $_SESSION["apellidos"] = $respuesta->apellidos;
      return $respuesta;
    } 
  }
  function ctrMenu()
  {
    if (isset($_SESSION["validar_ingreso"])) {
      if ($_SESSION["validar_ingreso"] == "ok") {
        if( $_SESSION["id_cargo"]=="1"){
          echo '<div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php?page=home">Gestión Caprina</a>
            <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <div class="boton">
                    <i class="bi bi-chevron-double-left"></i>
                </div>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasNavbarLabel">Caprinsoft</h2>
                    <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                        <div class="botonClose">
                            <i class="bi bi-chevron-double-right"></i>
                        </div>
                    </button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">



                        <li class="nav-item">
                            <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=home"> <i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_registroCaprinocultor"> <i class="bi bi-person"></i>
                                Registrar Caprinocultor</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase " href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-list-stars"></i> Reportes</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="nav-link sub-nav" href="index.php?page=a_reporteCaprinocultores">
                                    Reporte de caprinocultores </a>

                                <a class="nav-link sub-nav" href="index.php?page=a_reporteControles">
                                    Reporte de controles registrado</a>
                                <a class="nav-link sub-nav" href="index.php?page=a_reporteTratamientos">
                                    Reporte de tratamientos</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_estadoCaprino"> <i class="bi bi-activity"></i>
                                Estado General Caprino</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Registros</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=c_registroCaprinos"> Registro de
                                    Caprinos</a>
                                <a class=" nav-link sub-nav" href="index.php?page=c_registroControlIndividual">
                                    Registro de control Individual </a>
                                <a class=" nav-link  sub-nav" href="index.php?page=c_registroTratamientos"> Registro de
                                    Tratamientos</a>

                                <a class=" nav-link  sub-nav" href="index.php?page=c_registroSalidas"> Registro de
                                    Salidas</a>
                                <a class=" nav-link sub-nav" href="index.php?page=c_registroProduccion">
                                    Registrar Producción </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"><i class="bi bi-box-arrow-right"></i>
                                cerrar sesión</a>
                        </li>




                    </ul>
                </div>
            </div>
        </div>  ';
        }
        if( $_SESSION["id_cargo"]=="2"){
          echo '
         <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php?page=home">Gestión Caprina</a>
            <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <div class="boton">
                    <i class="bi bi-chevron-double-left"></i>
                </div>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasNavbarLabel">Caprinsoft</h2>
                    <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                        <div class="botonClose">
                            <i class="bi bi-chevron-double-right"></i>
                        </div>
                    </button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Registros</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=c_registroCaprinos"> Registro de
                                    Caprinos</a>
                                <a class=" nav-link sub-nav" href="index.php?page=c_registroControlIndividual">
                                    Registro de control Individual </a>
                                <a class=" nav-link  sub-nav" href="index.php?page=c_registroTratamientos"> Registro de
                                    Tratamientos</a>

                                <a class=" nav-link  sub-nav" href="index.php?page=c_registroSalidas"> Registro de
                                    Salidas</a>
                                <a class=" nav-link sub-nav" href="index.php?page=c_registroProduccion">
                                    Registrar Producción </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"><i class="bi bi-box-arrow-right"></i>
                                cerrar sesión</a>
                        </li>




                    </ul>
                </div>
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


  //CREAR CAPRINOCULTOR
  static public function ctrPostCaprinocultor($data)
  {
    $tabla = "usuarios";
    $respuesta = ModelCaprinocultor::registroCaprinocultor($tabla, $data);
    echo $respuesta;
  }


  //CONSULTAR TODOS LOS CAPRINOCULTORES
  static public function ctrConsultarCaprinocultores()
  {
    $tabla = "usuarios";
    $consulta = ModelCaprinocultor::mdlConsultarCaprinocultor($tabla);
    return $consulta;
  }

  //------------------CANTIDAD DE CAPRINOCULTORES-----------------------
  static public function mdlCantidadDeCaprinocultores()
  {
    $tabla = "usuarios";
    $consulta = ModelCaprinocultor::mdlCantidadDeCaprinocultores($tabla);
    return $consulta;
  }
}
