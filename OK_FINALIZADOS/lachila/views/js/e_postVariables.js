
//-----EXTRACCION DEL ID DEL USUARIO Y EL ID DEL CARGO PARA EL USO DE TODA LA APLICACION

let usuarioLogueado = document.getElementById("id_userOculto").value
let id_cargo_usuarioLogueado = document.getElementById("id_cargoOculto").value


//-------------------------VARIBALES PARA LOTES EN PRIMER FERMENTACION------------------------------------------ 

let brix1f = document.getElementById('brix1f')
let alcohol1f = document.getElementById('alcohol1f')
let ph1f = document.getElementById('ph1f')
let tds1f = document.getElementById('tds1f')
let ac1f = document.getElementById('ac1f')
let temp1f = document.getElementById('temp1f')
let hume1f = document.getElementById('hume1f')
let btnGuardarVar1f = document.getElementById('btnGuardarVar1f')

if (btnGuardarVar1f) {
    btnGuardarVar1f.addEventListener("click", () => {
        PostVariables(brix1f, alcohol1f, ph1f, tds1f, ac1f, temp1f, hume1f)
    })
}
//----------------------------------------------------------------- 

//-------------------------VARIBALES PARA LOTES EN SEGUNDA FERMENTACION------------------------------------------ 

let brix2f = document.getElementById('brix2f')
let alcohol2f = document.getElementById('alcohol2f')
let ph2f = document.getElementById('ph2f')
let tds2f = document.getElementById('tds2f')
let ac2f = document.getElementById('ac2f')
let temp2f = document.getElementById('temp2f')
let hume2f = document.getElementById('hume2f')
let btnGuardarVar2f = document.getElementById('btnGuardarVar2f')
if (btnGuardarVar2f) {
    btnGuardarVar2f.addEventListener("click", () => {
        PostVariables(brix2f, alcohol2f, ph2f, tds2f, ac2f, temp2f, hume2f)
    })
}

//-----------------------------------------------------------------
//FUNCTION GUARDAR VARIABLES
function PostVariables(brix, alcohol, ph, tds, ac, temp, hume) {
    if (brix.value.trim() == "" || alcohol.value.trim() == "" || ph.value.trim() == "" || tds.value.trim() == "" || ac.value.trim() == "" || temp.value.trim() == "" || hume.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Datos incompletos',
            confirmButtonColor: '#a20202',
        })

    } else {
        variables = { brix: brix.value, alcohol: alcohol.value, ph: ph.value, tds: tds.value, ac: ac.value, temperatura: temp.value, humedad: hume.value, usuario: usuarioLogueado, codigo: codigo, fase:faseLote }
        //console.log(variables);
        Swal.fire({
            title: 'Listo',
            text: `¿Registrar variables al lote ${codigo} ?`,
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

                $.post("views/ajax/variables_ajax.php", { variables }, function (dato) {
                    let response = (dato)
                    console.log(response);

                    setTimeout(function () {
                        location.href = 'index.php?page=e_gestionLotesUsuarios'
                    }, 1500);
                })
                LimpiarModal()
                Swal.fire({
                    icon: 'success',
                    title: `Variables registradas`,
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
                        location.href = 'index.php?page=e_gestionLotesUsuarios'
                    }
                })


            }
        })
    }
}