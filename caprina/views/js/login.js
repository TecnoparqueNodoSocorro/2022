// Guardar datos del login y guardarlos en un array lohin
let user = document.getElementById('username')
let pass = document.getElementById('pass')
let btn = document.getElementById('btnIniciar')

let id_userOculto=document.getElementById('id_userOculto').value
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        if (user.value.trim() == "" || pass.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Credenciales incorrectas',
                confirmButtonColor: '#f69100',
            })
        } else {
            login = { user: user.value, password: pass.value }

            $.post("views/ajax/login_ajax.php", { login }, function (dato) {
                let response = JSON.parse(dato)
                console.log(response);
                if(response==false){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Credenciales incorrectas',
                        confirmButtonColor: '#f69100',
                    })
                }else{
                console.log("ok");
                location.href = 'index.php?page=home'

                }
            })
        }
    })
}

//-------------------CERRAR SESIÓN------------------------------
document.getElementById("btnCerrarSesion").addEventListener("click", () => {
    Swal.fire({
        title: 'Cerrar Sesión',
        text: `¿Seguro que desea cerrar sesión?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Cerrar Sesión',
        allowOutsideClick: () => {
            const popup = Swal.getPopup()
            popup.classList.remove('swal2-show')
            setTimeout(() => {
                popup.classList.add('animate__animated', 'animate__headShake')
            })
            setTimeout(() => {
                popup.classList.remove('animate__animated', 'animate__headShake')
            }, 500)
            return false
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("controllers/cerrar_sesion.php", { login }, function (dato) {
                console.log(dato);
            })
            Swal.fire({
                icon: 'success',
                title: `Sesión cerrada`,
                confirmButtonColor: '#f69100',
                showConfirmButton: true,
                allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                }
            }).then((result) => {
                if (result.isConfirmed) {

                    location.href = 'index.php?page=login'

                }
            })
        }
    })
})
