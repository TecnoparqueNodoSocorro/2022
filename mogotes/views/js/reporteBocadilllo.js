
// REPORTE DE BOCADILLO VARIABLES

let azucar = document.getElementById('azucar')
let recortes = document.getElementById('recortes')
let devolucion = document.getElementById('devolucion')
let botesM = document.getElementById('botesM')
let botesP = document.getElementById('botesP')
let brix = document.getElementById('brix')
// TABLAS
let tablaExt = document.getElementById('tablaExt')
let tablaBoc = document.getElementById('tablaBoc')
let tablaLon = document.getElementById('tablaLon')
let tablaMan = document.getElementById('tablaMan')
let btnGuardarB = document.getElementById('btnGuardarB')

let reporteBocadillo = {}

//VARIABLES PARA VISUALIZAR LOS DATOS
let azucarView = document.getElementById('azucarView')
let recortesView = document.getElementById('recortesView')
let devolucionView = document.getElementById('devolucionView')
let botesMView = document.getElementById('botesMView')
let botesPView = document.getElementById('botesPView')
let brixView = document.getElementById('brixView')
// TABLAS
let tablaExtView = document.getElementById('tablaExtView')
let tablaBocView = document.getElementById('tablaBocView')
let tablaLonView = document.getElementById('tablaLonView')
let tablaManView = document.getElementById('tablaManView')


//variables de la tabla que meustra los registros que tiene un lote
let theadReporteBocadillo = document.getElementById('theadReporteBocadillo')
let tbodyReporteBocadillo = document.getElementById('tbodyReporteBocadillo')
let textoTituloReporteBocadillo = document.getElementById('textoTituloReporteBocadillo')

//SELECT EL LOTE, CAPTURA EL CODIGO 
let lote_bocadillo = document.getElementById('select_lote_reporteBocadillo')

// FUNCION QUE SE EJECUTA AL SELECCIONAR EL LOTE
lote_bocadillo ? lote_bocadillo.addEventListener("change", () => {

    theadReporteBocadillo.innerHTML = ``
    tbodyReporteBocadillo.innerHTML = ``

    infoReportesPorCodigo(lote_bocadillo.value)
}) : ''

function infoReportesPorCodigo(codigo) {
    infoReporte = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporte }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);
        response.forEach(x => {

            theadReporteBocadillo.innerHTML = `
            <tr>
            <th>Visualizar</td>          
            <th>Fecha registro</td>
            </tr>
            `
            tbodyReporteBocadillo.innerHTML += `
            <tr>
            <td><button type="button" data-id="${x.id}" class="extraerIdBoc btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-eye-fill"></i>
            </button></td>
            <td>${x.fecha_fabricacion}</td>
            </tr>
            `
        });

        const extraerIdBoc = document.querySelectorAll('.extraerIdBoc')
        extraerIdBoc.forEach((el) => {
            el.addEventListener("click", (e) => {
                idB = el.dataset.id
                // console.log(idB);
                idregistro = { id: idB }
                //se envia al ajax
                $.post("views/ajax/reportes_ajax.php", { idregistro }, function (dato) {
                    let response = JSON.parse(dato)
                    // console.log(response);
                    textoTituloReporteBocadillo.innerText = `Lote ${response.codigo_lote} Fecha: ${response.fecha_fabricacion}`
                    azucarView.value = response.azucar
                    recortesView.value = response.recortes
                    devolucionView.value = response.devolucion_tablas
                    botesMView.value = response.botes_marmitas
                    botesPView.value = response.botes_pailas
                    brixView.value = response.brix
                    tablaExtView.value = response.tabla_extrafino
                    tablaBocView.value = response.tabla_bocadillos
                    tablaLonView.value = response.tabla_lonja
                    tablaManView.value = response.tabla_manzana

                })

            })

        })

    })
}







btnGuardarB
    ? btnGuardarB.addEventListener("click", reporte_bocadillo)
    : ''

function reporte_bocadillo() {
    if (lote_bocadillo.value == "0" || azucar.value.trim() == "" || recortes.value.trim() == "" || devolucion.value.trim() == "" || botesM.value.trim() == "" || botesP.value.trim() == "" || brix.value.trim() == ""
        || tablaExt.value.trim() == "" || tablaBoc.value.trim() == "" || tablaLon.value.trim() == "" || tablaMan.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Los campos no pueden estar vacios`,
            confirmButtonColor: '#157347',
        })
    } else {
        reporteBocadillo = { codigo_lote: lote_bocadillo.value, id_usuario: id_usuario_oculto, azucar: azucar.value, recortes: recortes.value, devolucion: devolucion.value, botes_marmitas: botesM.value, botes_pailas: botesP.value, brix: brix.value, tabla_extrafino: tablaExt.value, tabla_bocadillos: tablaBoc.value, tabla_lonja: tablaLon.value, tabla_manzana: tablaMan.value }
        console.log(reporteBocadillo);
        guardarReporteBocadillo()
    }

}

function guardarReporteBocadillo() {
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar reporte de bocadillo?`,
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
            $.post("views/ajax/reportes_ajax.php", { reporteBocadillo }, function (dato) {
                console.log(dato);
            })
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
        }
    })
}