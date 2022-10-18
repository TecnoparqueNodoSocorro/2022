// Guardar datos del login y guardarlos en un array
let user = document.getElementById('user')
let pass = document.getElementById('password')
let btn = document.getElementById('btnIniciar')
let login = {}
btn ? btn.addEventListener("click", iniciar_sesion) : ''

function iniciar_sesion() {
    if (user.value.trim() == "" || pass.value.trim() == "") {
        DatosIncompletos()
    } else {
        login = { user: user.value, password: pass.value }
        console.log(login);//console.log(login);
        $.post("views/ajax/login_ajax.php", { login }, function (dato) {
            let response = JSON.parse(dato)
           console.log(response);
            if (response == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales incorrectas',
                    confirmButtonColor: '#a20202',
                    scrollbarPadding: false,
                    heightAuto: false,
                })
            } else if(response.id_cargo=="1") {
                //location.reload()
                location.href = 'proveedor.php?page=phome'
              //  console.log(response);

            }else if(response.id_cargo=="2"){
                location.href = 'admin.php?page=ahome'

            }
        })
    }

}

function DatosIncompletos() {
    Swal.fire({
        icon: 'error',
        title: `Datos incompletos`,
        showConfirmButton: true,
        confirmButtonColor: '#646306 ',
        scrollbarPadding: false,
        heightAuto: false,
    })
}