

// --------------------------------CREDENCIALES PARA EL LOGIN---------------------------------
let user = document.getElementById('user')
let pass = document.getElementById('password')
let btn = document.getElementById('btnIniciar')
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
            title: 'Oops...',
            text: 'Credenciales incorrectas',
        })
    } else {
        $.post("views/ajax/login_ajax.php", { login }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
            if(response=="error"){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales incorrectas',
                })
            }
        })
    }

}