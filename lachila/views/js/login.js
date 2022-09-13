// Guardar datos del login y guardarlos en un array
let user = document.getElementById('doc')
let pass = document.getElementById('pass')
let btn = document.getElementById('btnIniciar')
let login = {}
//OPERADOR TERMARIO PARA VALIDAR SI EL BOTON EXISTE Y EVITAR EL ERROR QUE SALE EN LA CONSOLA
btn ? btn.addEventListener("click", logearse) : ''

function logearse() {
    if (user.value.trim() == "" || pass.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Credenciales incorrectas',
            confirmButtonColor: '#a20202',
        })
    } else {
        login = { user: user.value, password: pass.value }
        //console.log(login);
        $.post("views/ajax/login_ajax.php", { login }, function (dato) {
            let response = JSON.parse(dato)
            //console.log(response);
            if (response == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales incorrectas',
                    confirmButtonColor: '#a20202',
                })
            } else if (response == "Usuario inactivo") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `${response} contante al administrador`,
                    confirmButtonColor: '#a20202',
                })
            } else if (response.id_cargo == "2") {

                console.log("ok");

                location.href = 'index.php?page=a_home'

            } else if (response.id_cargo == "1") {
                console.log("empelado");
                location.href = 'index.php?page=e_home'

            } else if (response.id_cargo == "3") {
                console.log("empelado");
                location.href = 'index.php?page=env_home'
            }
        })
    }
}