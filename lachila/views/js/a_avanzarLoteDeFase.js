//--------------------FUNCIONES PARA FINALIZAR LOTE SE LE ASIGNA A CADA BOTON CON EL METODO ONCLICK-----------------------------------
function finalizarPrimeraF() {
    Swal.fire({
        title: 'Listo',
        text: `¿Finalizar primera fase de fermentación y avanzar a la segunda fase?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#a20202',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Avanzar',
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
            // SE CREA UN JSON LA ULTIMA ID GUARDADA Y LA FASE ACTUAL PARA SABER A CUAL HAY QUE AVANZAR 
            //AL DARLE CLICK AL BOTON DE ABRIR EL MODAL PARA HACER EL PROCESO DE UPDATE
            const codigolote = { codigolote: codigo, fermentacion: estado }
            // SE HACE EL LLAMADO A AJAX
            $.post("views/ajax/lotes_ajax.php", { codigolote }, function (dato) {
                let response = (dato)
                console.log(response);

                /*   setTimeout(function () {
                      location.href = 'index.php?page=a_gestionLotes'
                  }, 1500); */
            })
            Swal.fire({
                icon: 'success',
                title: `Lote avanzado a segunda fermentación`,
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
                    //SE REDIRECCIONA O RECARGA LA PAGINA
                    location.href = 'index.php?page=a_gestionLotes'

                }
            })


        }
    })

}


function finalizarSegundaF() {
    Swal.fire({
        title: 'Listo',
        text: `¿Finalizar segunda fase de fermentación y avanzar a la fase de envasado?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#a20202',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Avanzar',
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
            // SE CREA UN JSON LA ULTIMA ID Y LA FASE ACTUAL PARA SABER A CUAL HAY QUE AVANZAR GUARDADA
            // AL DARLE CLICK AL BOTON DE ABRIR EL MODAL  PARA HACER EL PROCESO DE UPDATE
            const codigolote = { codigolote: codigo, fermentacion: estado }

            // SE HACE EL LLAMADO A AJAX
            console.log(codigolote);
            $.post("views/ajax/lotes_ajax.php", { codigolote }, function (dato) {
                let response = (dato)
                console.log(response);

                /*   setTimeout(function () {
                      location.href = 'index.php?page=a_gestionLotes'
                  }, 1500); */
            })
            Swal.fire({
                icon: 'success',
                title: `Lote avanzado a fase de envasado`,
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
                    //SE REDIRECCIONA O RECARGA LA PAGINA

                    location.href = 'index.php?page=a_gestionLotes'

                }
            })


        }
    })

}

function finalizarFaseEnvasado() {
    Swal.fire({
        title: 'Listo',
        text: `¿Finalizar fase de envasado y pasar lote al historial?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#a20202',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Avanzar',
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
            // SE CREA UN JSON LA ULTIMA ID Y LA FASE ACTUAL PARA SABER A CUAL HAY QUE AVANZAR GUARDADA
            // AL DARLE CLICK AL BOTON DE ABRIR EL MODAL  PARA HACER EL PROCESO DE UPDATE
            const codigolote = { codigolote: codigo, fermentacion: estado }

            // SE HACE EL LLAMADO A AJAX
            $.post("views/ajax/lotes_ajax.php", { codigolote }, function (dato) {
                let response = (dato)
                console.log(response);

                /*   setTimeout(function () {
                      location.href = 'index.php?page=a_gestionLotes'
                  }, 1500); */
            })
            Swal.fire({
                icon: 'success',
                title: `Lote pasado a historial`,
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
                    //SE REDIRECCIONA O RECARGA LA PAGINA

                    location.href = 'index.php?page=a_gestionLotes'

                }
            })


        }
    })

}
//---------------------------------------------------------------------
