// Guardar datos del login y guardarlos en un array
let user = document.getElementById('username')
let pass = document.getElementById('pass')
let btn = document.getElementById('btnIniciar')
let login = {}
btn ? btn.addEventListener("click", Login) : ''


function Login() {
    if (user.value.trim() == "" || pass.value.trim() == "") {
        DatosIncompletos()
    } else {
        login = { user: user.value, password: pass.value }
        console.log(login);
        $.post("views/ajax/usuarios_ajax.php", { login }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
            if (response == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales incorrectas',
                    confirmButtonColor: '#5ac15d',
                })
            } else if (response.estado == "0") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Contacte al administrador',
                    confirmButtonColor: '#5ac15d',
                })
            } else if (response.id_cargo == "1") {
                location.href = 'index.php?page=a_home'
            } else if (response.id_cargo == "2") {
                location.href = 'index.php?page=e_home'
            }

        })
    }
}