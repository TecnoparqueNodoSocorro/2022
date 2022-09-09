//-------------------------------------------------REGISTRAR PRODUCCIÓN-----------------------------------------------------
let codigo_caprino = document.getElementById('caprino_produccion_select')
let cantidad_leche = document.getElementById('cantidad_leche')
let fecha_prod = document.getElementById('fecha_prod')
let btnAdicionar = document.getElementById('btnAdicionar')
let produccion = {}
if (btnAdicionar) {
    btnAdicionar.addEventListener("click", () => {
        if (codigo_caprino.value == "0" || cantidad_leche.value.trim() == "" || fecha_prod.value.trim() == "") {
            DatosIncompletos()
        } else {
                //ENVIA DEL JSON AL AJAX
            produccion = { codigo_caprino: codigo_caprino.value, cantidad: cantidad_leche.value, fecha: fecha_prod.value, usuario: id_usuario }
             //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
            $.post("views/ajax/produccion_ajax.php", { produccion }, function (dato) {
                let response = (dato)
               // console.log(response);
            })
            Swal.fire({
                title: 'Listo',
                text: `${cantidad_leche.value} litros agregados del caprino con código: ${codigo_caprino.value}`,
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#f69100',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ok',

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
                    location.href = 'index.php?page=c_registroProduccion'

                }
            })
        }
    })
}

