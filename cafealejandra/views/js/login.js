// --------------------------------CREDENCIALES PARA EL LOGIN---------------------------------
let user = document.getElementById('user')
let pass = document.getElementById('password')
let btn = document.getElementById('btnIniciar')
let menucafe = document.getElementById('menucafe')
let logincampos = document.getElementById('logincampos')
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        Login()
    })
}
//--------------------------------------------------------------------------------------------


function Login() {
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
            } else if (response == "cosecha inactiva") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error, contante al administrador ',
                })
            }
            else {
                  location.reload();
                  logincampos.innerHTML = 'bienvenido'
                  return;
   
            }

        })
    }
}

