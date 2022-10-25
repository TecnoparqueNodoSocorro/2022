
//declaracion de variables
let select_cosecha_finalizar = document.getElementById('select_cosecha_finalizar')
let btnFinalizarLote = document.getElementById('btnFinalizarLote')

select_cosecha_finalizar ? select_cosecha_finalizar.addEventListener("change", () => {
    console.log(select_cosecha_finalizar.value);
}) : ''

btnFinalizarLote ? btnFinalizarLote.addEventListener("click", FinalizarLote) : ''

function FinalizarLote() {
    if (select_cosecha_finalizar.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione un lote',
            confirmButtonColor: '#157347',
        })
    } else {
        lote_fin = {
            codigo: select_cosecha_finalizar.value
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Finalizar lote?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#157347',
            cancelButtonColor: '#212529',
            scrollbarPadding: false,
            heightAuto: false,
            confirmButtonText: 'Finalizar',
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
                //se envia al ajax
                $.post("views/ajax/lotes_ajax.php", { lote_fin }, function (dato) {
                    console.log(dato);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Lote finalizado`,
                    scrollbarPadding: false,
                    heightAuto: false,
                    showConfirmButton: true,
                    confirmButtonColor: '#157347',
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

}