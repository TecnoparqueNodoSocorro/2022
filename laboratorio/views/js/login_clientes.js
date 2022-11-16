// Guardar datos del login y guardarlos en un array
let user_cliente = document.getElementById('username_cliente')
let pass_cliente = document.getElementById('pass_cliente')
let btn_cliente = document.getElementById('btnIniciar_cliente')
let login_cliente = {}
btn_cliente ? btn_cliente.addEventListener("click", Login_cliente) : ''


function Login_cliente() {
    if (user_cliente.value.trim() == "" || pass_cliente.value.trim() == "") {
        DatosIncompletos()
    } else {
        login_cliente = { nit: user_cliente.value, password: pass_cliente.value }
        console.log(login_cliente);
        $.post("views/ajax/clientes_ajax.php", { login_cliente }, function (dato) {
            //falta todo lo de cliente en el ajax y demas 
            let response = JSON.parse(dato)
            //console.log(response);
            if (response == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales incorrectas',
                    confirmButtonColor: '#dc3545',
                })
            } else if (response.estado == "0") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Contacte al administrador',
                    confirmButtonColor: '#dc3545',
                })
/*             } else if (response.id_cargo == "1") {
                location.href = 'index.php?page=a_home'
            } else if (response.id_cargo == "2") {
                location.href = 'index.php?page=e_home' */
            }  else if (response.id_cargo == "3") {
                location.href = 'index.php?page=c_home'
            } 

        })
    }
}