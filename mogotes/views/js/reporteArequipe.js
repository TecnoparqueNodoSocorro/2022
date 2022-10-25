// REPORTE AREQUIPE

let lote_arequipe = document.getElementById('lote_arequipe')
let leche = document.getElementById('leche')
let azucarA = document.getElementById('azucarA')
let marmitasA = document.getElementById('marmitasA')
let pailasA = document.getElementById('pailasA')
let extrafinoA = document.getElementById('extrafinoA')
let bocadillosA = document.getElementById('bocadillosA')
let btnGuardarA = document.getElementById('btnGuardarA')
let reporteArequipe = {}

//variables de la tabla que meustra los registros que tiene un lote
let theadReporteArequipe = document.getElementById('theadReporteArequipe')
let tbodyReporteArequipe = document.getElementById('tbodyReporteArequipe')
let textoTituloReporteArequipe = document.getElementById('textoTituloReporteArequipe')



// VARIABLES PARA VISUALIZAR REPORTE AREQUIPE

let lote_arequipeView = document.getElementById('lote_arequipeView')
let lecheView = document.getElementById('lecheView')
let azucarAView = document.getElementById('azucarAView')
let marmitasAView = document.getElementById('marmitasAView')
let pailasAView = document.getElementById('pailasAView')
let extrafinoAView = document.getElementById('extrafinoAView')
let bocadillosAView = document.getElementById('bocadillosAView')
lote_arequipe
    ? lote_arequipe.addEventListener("change", () => {
        //console.log(lote_arequipe.value);
        infoReportesPorCodigoArequipe(lote_arequipe.value)
    })
    : ''

function infoReportesPorCodigoArequipe(codigo) {
    theadReporteArequipe.innerHTML = ``
    tbodyReporteArequipe.innerHTML = ``
    infoReporteAre = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporteAre }, function (dato) {
        let response = JSON.parse(dato)
        console.log(response);
        response.forEach(x => {

            theadReporteArequipe.innerHTML = `
            <tr>
            <th>Visualizar</td>          
            <th>Fecha registro</td>
            </tr>
            `
            tbodyReporteArequipe.innerHTML += `
            <tr>
            <td><button type="button" data-id="${x.id}" class="extraerIdAre btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal_arequipe">
            <i class="bi bi-eye-fill"></i>
            </button></td>
            <td>${x.fecha_fabricacion}</td>
            </tr>
            `
        });

        const extraerIdAre = document.querySelectorAll('.extraerIdAre')
        extraerIdAre.forEach((el) => {
            el.addEventListener("click", (e) => {
                idA = el.dataset.id
                //  console.log(idB);
                idregistroAre = { id: idA }
                //se envia al ajax
                $.post("views/ajax/reportes_ajax.php", { idregistroAre }, function (dato) {
                    let response = JSON.parse(dato)
                    console.log(response);
                    textoTituloReporteArequipe.innerText = `Lote ${response.codigo_lote} Fecha: ${response.fecha_fabricacion}`

                    lecheView.value = response.leche
                    azucarAView.value = response.azucar
                    marmitasAView.value = response.botes_marmitas
                    pailasAView.value = response.botes_pailas
                    extrafinoAView.value = response.tabla_extrafino
                    bocadillosAView.value = response.tabla_bocadillo
                })

            })

        })
    })
}



btnGuardarA
    ? btnGuardarA.addEventListener("click", guarderReporteArequipe)
    : ''
function guarderReporteArequipe() {

    if (lote_arequipe.value == "0" || leche.value.trim() == "" || azucarA.value.trim() == "" || marmitasA.value.trim() == "" || pailasA.value.trim() == "" || extrafinoA.value.trim() == "" || bocadillosA.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Los campos no pueden estar vacios`,
            confirmButtonColor: '#157347',
        })
    } else {
        reporteArequipe = { codigo_lote: lote_arequipe.value, id_usuario: id_usuario_oculto, leche: leche.value, azucar: azucarA.value, botes_marmitas: marmitasA.value, botes_pailas: pailasA.value, tabla_extrafino: extrafinoA.value, tabla_bocadillos: bocadillosA.value }
        console.log(reporteArequipe);
        guarderRA()
    }
}

function guarderRA() {
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar reporte de arequipe?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#157347',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
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
            //se envia al ajax
            $.post("views/ajax/reportes_ajax.php", { reporteArequipe }, function (dato) {
                console.log(dato);
            })
                .done(function () {
                    Swal.fire({
                        icon: 'success',
                        title: `Registro guardado`,
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
                }).fail(function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `Error en la petición`,
                        confirmButtonColor: '#157347',
                    })
                }).always(function () {
                    console.log("finalizo");
                });
            /*  Swal.fire({
                 icon: 'success',
                 title: `Registro guardado`,
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
             }) */
        }
    })
}