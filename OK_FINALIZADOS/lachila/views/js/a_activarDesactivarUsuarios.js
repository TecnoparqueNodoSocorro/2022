

//.------------------------------------ACTIVAR O DESACTIVAR UN USUARIO PARA EL INGRESO AL SISTEMA----------------------------------------//
// VARIABLES PARA GUARDAR LOS DATOS
const ExtraerId = document.querySelectorAll(".ExtraerId")
ExtraerId.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {
        id = el.dataset.id
        estado = el.dataset.estado
        nombre = el.dataset.nombre

        desactivar = { id_usuario: id, state: estado }
        //console.log(typeof estado);

            //SE VALIDA EL ESTADO PARA LA ACCIÓN YA SE ACTIVAR O DESACTIVAR
        if (estado === "1") {
            Swal.fire({
                title: 'Listo',
                text: `¿Desactivar al empleado ${nombre}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#a20202',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Desactivar',
                cancelButtonText: 'Cancelar',
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
                    //se envia un json con los datos del registro sea cual sea el estado
                    $.post("views/ajax/usuarios_ajax.php", { desactivar }, function (dato) {
                        let response = (dato)
                        console.log(response);
                        setTimeout(function () {
                            location.href = 'index.php?page=a_gestionUsuarios'
                        }, 1500);
                    })
                    Swal.fire({
                        icon: 'success',
                        title: `Empleado desactivado`,
                        showConfirmButton: true,
                        confirmButtonColor: '#a20202',

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
                            location.href = 'index.php?page=a_gestionUsuarios'
                        }
                    })
                }
            })

            //SE VALIDA EL ESTADO PARA LA ACCIÓN YA SE ACTIVAR O DESACTIVA
        } else if (estado === "0") {
            Swal.fire({
                title: 'Listo',
                text: `¿Activar al empleado ${nombre}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#a20202',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Activar',
                cancelButtonText: 'Cancelar',
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

                    $.post("views/ajax/usuarios_ajax.php", { desactivar }, function (dato) {
                        let response = (dato)
                        console.log(response);


                        setTimeout(function () {
                            location.href = 'index.php?page=a_gestionUsuarios'
                        }, 1500);
                    })
                    Swal.fire({
                        icon: 'success',
                        title: `Empleado activado`,
                        showConfirmButton: true,
                        confirmButtonColor: '#a20202',

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
                            location.href = 'index.php?page=a_gestionUsuarios'
                        }
                    })


                }
            })

        }

    })
})
