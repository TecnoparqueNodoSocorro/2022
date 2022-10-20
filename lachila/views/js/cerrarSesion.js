

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
