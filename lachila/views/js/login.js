// Guardar datos del login y guardarlos en un array
let user = document.getElementById('doc')
let pass = document.getElementById('pass')
let btn = document.getElementById('btnIniciar')
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        if (user.value.trim() == "" || pass.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Credenciales incorrectas',
                confirmButtonColor: '#a20202',
            })
        } else {
            login = { user: user.value, password: pass.value }
            console.log(login);
            $.post("views/ajax/login_ajax.php", { login }, function (dato) {
                let response = JSON.parse(dato)
                console.log(response);
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

                } else {
                    console.log("empelado");
                    location.href = 'index.php?page=e_home'

                }
            })
        }
    })
}


//-------------------CERRAR SESIÓN------------------------------
let btnCerrarSesion = document.getElementById("btnCerrarSesion")
if (btnCerrarSesion) {

    btnCerrarSesion.addEventListener("click", () => {
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
                location.href = 'index.php?page=login'
                Swal.fire({
                    icon: 'success',
                    title: `${dato}`,
                    confirmButtonColor: '#f69100',
                    showConfirmButton: true,
                    timer: 1200,
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
                    setTimeout(function () {
                        location.href = 'index.php?page=login'

                    }, 1200);
                    if (result.isConfirmed) {

                        location.href = 'index.php?page=login'

                    }
                })
            }
        })
    })
}
