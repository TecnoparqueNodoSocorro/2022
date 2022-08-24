//id usuario TRAIDO DE LA PLANTILLA
let id_usua = id_userOculto.value;;

let codigo_salida = document.getElementById('caprino_salida_select')
let fecha_salida = document.getElementById('fecha_salida')

let motivo_salida = document.getElementById('motivo_salida')
let btnRegistrarS = document.getElementById('btnRegistrarS')
let salidas = {}
if (btnRegistrarS) {
    btnRegistrarS.addEventListener("click", () => {
        if (codigo_salida.value == "0" || fecha_salida.value.trim() == "" || motivo_salida.value == "--Seleccione el motivo--") {
            DatosIncompletos()
        } else {
            salidas = { usuario: id_usua, codigo: codigo_salida.value, motivo: motivo_salida.options[motivo_salida.selectedIndex].text, fecha: fecha_salida.value }

            Swal.fire({
                title: 'Listo',
                text: `¿Registrar salida del caprino con código: ${codigo_salida.value}?`,
                icon: 'question',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonColor: '#f69100',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Registrar',
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
                    Swal.fire({

                        icon: 'success',
                        title: `Caprino dado de baja `,
                        showConfirmButton: false,
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
                    })
                    console.log(salidas);

                    $.post("views/ajax/salidas_ajax.php", { salidas }, function (dato) {
                        let response = (dato)
                        console.log(response);
                        setTimeout(function () {
                            location.href = 'index.php?page=c_registroSalidas'
                        }, 1200);

                    })
                }

            })

        }

    })
}