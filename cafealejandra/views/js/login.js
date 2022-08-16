

// --------------------------------CREDENCIALES PARA EL LOGIN---------------------------------
let user = document.getElementById('user')
let pass = document.getElementById('password')
let btn = document.getElementById('btnIniciar')
let menucafe = document.getElementById('menucafe')
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        Login()
    })
}
//--------------------------------------------------------------------------------------------
/*  console.log(login);
      Swal.fire({
          icon: 'success',
          title: 'Bienvenido',
      }) */

function Login() {
    /* ----------------------------------------------- */
   

        login = { user: user.value, password: pass.value }
        if (user.value.trim() == "" || pass.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Los campos son obligatorios para el ingreso',
            })
        } else {
            $.post("views/ajax/login_ajax.php", { login }, function (dato) {
                let response = JSON.parse(dato)
                console.log(response);



                if (response.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Credenciales incorrectas',
                    })
                }
                else {

                    let usuario = response[0]
                    let { id, id_cargo } = usuario
                    /*    console.log(id_cargo); */
                    if (id_cargo === "1") {
                        console.log("menu 1")
                        menuempleado();

                    }
                    else if (id_cargo === "3") {
                        console.log("menu 3")
                        menuadmin();
                    }
                    else {
                        console.log("menu 2");

                    }

                }

            })
        }
    }
    


    /* ---------------------------------------------- */



function menuadmin() {
    menucafe.innerHTML = `
                       <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-basket"></i>
                            Gestión de Cosechas
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=gestionCosechas">Iniciar nueva cosecha</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=finalizarCosecha">Finalizar cosecha</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person"></i>
                            Gestión de Empleados
                        </a>

                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item  text-faded px-lg-4"><a class="nav-link " href="index.php?page=gestionUsuarios">Registro
                                    de Empleados</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=reporteEmpleados">Listado
                                    de empleados</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-clipboard2-pulse"></i>
                            Registrar </a>
                        <ul class="dropdown-menu rounded" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroTrabajos">Registrar Trabajo Diario a Recolectores</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registrarDiasEncargados">Registrar Dias no Laborados a Encargados</a></li>



                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-coin"></i>
                            Pagos </a>
                        <ul class="dropdown-menu rounded" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">

                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroPagos">
                                    Pago Diario</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=pagoEncargados">
                                    Pagar a Encargados</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bar-chart"></i>
                            Reportes administrativos
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=reportePagos">Reporte
                                    de pagos</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=reporteKilos">Reporte
                                    de kilos</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=reporteAvanzadoRecolector">Reporte Avanzado por Recolector</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=reporteEncargado">Reporte Avanzado por Encargado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=home"><i class="bi bi-house"></i> Cerrar sesion</a></li> 
                   
                   `;

}

function menuempleado() {
    menucafe.innerHTML = `
                  
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bar-chart"></i>
                            Reportes particulares
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroActividades">Reporte por Empleado</a></li>

                        </ul>
                    </li>`;

}