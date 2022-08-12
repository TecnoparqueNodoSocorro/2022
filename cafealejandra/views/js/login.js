

// --------------------------------CREDENCIALES PARA EL LOGIN---------------------------------
let user = document.getElementById('user')
let pass = document.getElementById('password')
let btn = document.getElementById('btnIniciar')
let menucafe = document.getElementsByClassName('#menucafe')
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
                if (id_cargo === 1) {
                    console.log("menu 1")
                }
                else if (id_cargo === 2) {
                    console.log("menu 2")
                }
                else {
                    console.log("menu 3")
                }

            }

        })
    }

}