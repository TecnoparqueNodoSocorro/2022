let cliente_unic = document.getElementById('cliente_unic')
let name_ubic = document.getElementById('name_ubic')
let btnRegistrar_ubic = document.getElementById('btnRegistrar_ubic')

btnRegistrar_ubic ? btnRegistrar_ubic.addEventListener("click", UbicacionValidar) : ''
function UbicacionValidar() {
    if (cliente_unic.value == "0" || name_ubic.value == "") {
        DatosIncompletos()
    } else {
        UbicacionGuardar()
    }
}
//guardar ubicacion
function UbicacionGuardar() {
    let ubic = {
        cliente: cliente_unic.value,
        nombre: name_ubic.value
    }
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar ubicación?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#5ac15d',
        cancelButtonColor: '#3085d6',
        confirmButtonText: '¿Registrar',
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

            $.ajax({
                data: { ubic },
                type: "POST",
                dataType: "text",
                url: "views/ajax/ubicaciones_ajax.php",
            }).done(function (data, textStatus, jqXHR) {
                console.log(data, textStatus, jqXHR);
                Swal.fire({
                    icon: 'success',
                    title: `Ubicación registrada`,
                    confirmButtonColor: '#5ac15d',
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
                        location.reload()
                    }
                    return
                })

            }).fail(function (jqXHR, textStatus, errorThrown) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo procesar la solicitud ' + textStatus,
                    confirmButtonColor: '#5ac15d',

                })

            });
        }
    })
}

//crear ubicacion cliente|
