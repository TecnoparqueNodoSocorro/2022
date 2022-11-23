
//ADMINISTRADOR

//.------------------------------------ACTIVAR O DESACTIVAR UN USUARIO PARA EL INGRESO AL SISTEMA----------------------------------------//
// VARIABLES PARA GUARDAR LOS DATOS
const ExtIdCliente = document.querySelectorAll(".ExtIdCliente")
ExtIdCliente.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {
       let id = el.dataset.id
       let estado = el.dataset.estado


       const desactivarC = { id_usuario: id, state: estado }
        //console.log(typeof estado);

            //SE VALIDA EL ESTADO PARA LA ACCIÓN YA SE ACTIVAR O DESACTIVAR
        if (estado === "1") {
            Swal.fire({
                title: 'Listo',
                text: `¿Desactivar cliente?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
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
                    $.post("views/ajax/clientes_ajax.php", { desactivarC }, function (dato) {
                        let response = (dato)
                        console.log(response);
                        setTimeout(function () {
                            location.reload()
                        }, 1500);
                    })
                    Swal.fire({
                        icon: 'success',
                        title: `Cliente desactivado`,
                        showConfirmButton: true,
                        confirmButtonColor: '#0d6efd',

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
                            location.reload()
                        }
                    })
                }
            })

            //SE VALIDA EL ESTADO PARA LA ACCIÓN YA SE ACTIVAR O DESACTIVA
        } else if (estado === "0") {
            Swal.fire({
                title: 'Listo',
                text: `¿Activar cliente?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
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

                    $.post("views/ajax/clientes_ajax.php", { desactivarC }, function (dato) {
                        let response = (dato)
                        console.log(response);


                        setTimeout(function () {
                            location.reload()
                        }, 1500);
                    })
                    Swal.fire({
                        icon: 'success',
                        title: `Cliente activado`,
                        showConfirmButton: true,
                        confirmButtonColor: '#0d6efd',

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
                            location.reload()
                        }
                    })


                }
            })

        }

    })
})
