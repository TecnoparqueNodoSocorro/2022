//-------------------------------------CREACION DE LOTE-------------------------------------------------------------
let lote = {}
//VARIABLES PARA GUARDAR LOS DATOS DE UN LOTE-------------------


// ------------------------------------------------------------------------------------
let materia = document.getElementById('materia')
let fInicio = document.getElementById('fInicio')
let PesoIni = document.getElementById('PesoIni')
let pesoNeto = document.getElementById('pesoNeto')
let pesoDesper = document.getElementById('pesoDesper')
let adicion = document.getElementById('adicion')
let codigo = document.getElementById('codigo')

let btnCrearLote = document.getElementById('btnCrearLote')

//CONDICIONAL  PARA EVITAR ERROR DEL ADDEVENTLISTER
btnCrearLote ? btnCrearLote.addEventListener("click", CrearLote) : ''

//----------------------------------------------------------------------------------------------------------------------------



//-------------------------------------------------------------------FUNCION CREAR LOTE------------------------------------
function CrearLote() {

    if (codigo.value.trim() == "" || materia.value == "0" || fInicio.value.trim() == "" || adicion.value.trim() == "" || pesoDesper.value.trim() == "" || pesoNeto.value.trim() == "" || PesoIni.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Datos incompledtos',
            confirmButtonColor: '#a20202',
        })
    } else {
        lote = { codigo: codigo.value, materia: materia.value, fecha_inicio: fInicio.value, adicion: adicion.value, peso_desperdiciado: pesoDesper.value, peso_neto: pesoNeto.value, peso_inicial: PesoIni.value }
       // console.log(lote);
        Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo lote?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Registrar',
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
                $.post("views/ajax/lotes_ajax.php", { lote }, function (dato) {
                    let response = (dato)
                    //console.log(response);
                    if (response == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: `Nuevo lote registrado `,
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
                                location.href = 'index.php?page=a_gestionLotes'
                            }
                        })


                    } else if (response == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: `Código de lote ya existente`,
                            showConfirmButton: true,
                            confirmButtonColor: '#a20202'
                        })
                    }
                })
            }
        }
        )
        }
}












//-----------------------------------------------------------------------------------------------------------------------


/*   Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo lote?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#a20202',
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
                

                   /*  setTimeout(function () {
                        location.href = 'index.php?page=a_gestionLotes'
                    }, 1500); */

/*  Swal.fire({
     icon: 'success',
     title: `Nuevo lote registrado `,
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
         location.href = 'index.php?page=a_gestionLotes'
     }
 })
 
 
}
}) 
} */