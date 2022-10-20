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
            //console.log(response);

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

//FUNCION SE LE AGREGA A LOS INPUT DE LA CONTRASEÑA DEL REGISTRO DE USUARIOS PARA QUE SOLO PERMITA EL INGRESO DE NUMEROS
function valideKey(evt){
			
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}