
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

//DEVOLUCION TABLAS VARIABLES
let dev_tablaExt = document.getElementById('dev_tablaExt')
let dev_tablaBoc = document.getElementById('dev_tablaBoc')
let dev_tablaLon = document.getElementById('dev_tablaLon')
let dev_tablaMan = document.getElementById('dev_tablaMan')
//ADICION TABLAS VARIABLES
let adic_tablaExt = document.getElementById('adic_tablaExt')
let adic_tablaBoc = document.getElementById('adic_tablaBoc')
let adic_tablaLon = document.getElementById('adic_tablaLon')
let adic_tablaMan = document.getElementById('adic_tablaMan')
let adic_codigo_lote = document.getElementById('adic_codigo_lote')


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
//DEVOLUCION TABLAS VARIABLES
let view_dev_tablaExt = document.getElementById('view_dev_tablaExt')
let view_dev_tablaBoc = document.getElementById('view_dev_tablaBoc')
let view_dev_tablaLon = document.getElementById('view_dev_tablaLon')
let view_dev_tablaMan = document.getElementById('view_dev_tablaMan')
//ADICION TABLAS VARIABLES
let view_adic_tablaExt = document.getElementById('view_adic_tablaExt')
let view_adic_tablaBoc = document.getElementById('view_adic_tablaBoc')
let view_adic_tablaLon = document.getElementById('view_adic_tablaLon')
let view_adic_tablaMan = document.getElementById('view_adic_tablaMan')
let view_adic_codigo_lote = document.getElementById('view_adic_codigo_lote')

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
            <td><button type="button" data-id="${x.idL}" class="extraerIdBoc btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    console.log(response);
                    textoTituloReporteBocadillo.innerText = `Lote ${response.codigo_lote} Fecha: ${response.fecha_fabricacion}`
                    azucarView.value = response.azucar
                    recortesView.value = response.recortes
                    botesMView.value = response.botes_marmitas
                    botesPView.value = response.botes_pailas
                    brixView.value = response.brix
                    tablaExtView.value = response.tabla_extrafino
                    tablaBocView.value = response.tabla_bocadillos
                    tablaLonView.value = response.tabla_lonja
                    tablaManView.value = response.tabla_manzana
                    //DEVOLUCION TABLAS VARIABLES
                    view_dev_tablaExt.value = response.dev_tabla_extrafino
                    view_dev_tablaBoc.value = response.dev_tabla_bocadillos
                    view_dev_tablaLon.value = response.dev_tabla_lonja
                    view_dev_tablaMan.value = response.dev_tabla_manzana
                    //ADICION TABLAS VARIABLES
                    view_adic_tablaExt.value = response.adic_tabla_extrafino
                    view_adic_tablaBoc.value = response.adic_tabla_bocadillos
                    view_adic_tablaLon.value = response.adic_tabla_lonja
                    view_adic_tablaMan.value = response.adic_tabla_manzana
                    view_adic_codigo_lote.value = response.codigo_lote_adicion
                })

            })

        })

    })
}







btnGuardarB
    ? btnGuardarB.addEventListener("click", reporte_bocadillo)
    : ''

function reporte_bocadillo() {
    console.log(dev_tablaBoc.value , tablaBoc.value, dev_tablaBoc.value > tablaBoc.value);
    if (lote_bocadillo.value == "0" ||
        azucar.value.trim() == "" ||
        recortes.value.trim() == "" ||
        botesM.value.trim() == "" ||
        botesP.value.trim() == "" ||
        brix.value.trim() == "" ||
        tablaExt.value.trim() == "" ||
        tablaBoc.value.trim() == "" ||
        tablaLon.value.trim() == "" ||
        tablaMan.value.trim() == "" ||
        dev_tablaExt.value.trim() == "" ||
        dev_tablaBoc.value.trim() == "" ||
        dev_tablaLon.value.trim() == "" ||
        dev_tablaMan.value.trim() == "" ||
        adic_tablaExt.value.trim() == "" ||
        adic_tablaBoc.value.trim() == "" ||
        adic_tablaLon.value.trim() == "" ||
        adic_tablaMan.value.trim() == "" ||
        adic_codigo_lote.value.trim() == ""
    ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Los campos no pueden estar vacios`,
            confirmButtonColor: '#157347',
        })
    } else if (parseFloat(dev_tablaExt.value)  > parseFloat(tablaExt.value)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Verifique las cantidades de las tablas de extrafino a devolver  `,
            confirmButtonColor: '#157347',
        })
    } else if (parseFloat(dev_tablaBoc.value) > parseFloat(tablaBoc.value)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Verifique las cantidades de las tablas de bocadillo a devolver 2`,
            confirmButtonColor: '#157347',
        })
    } else if (parseFloat(dev_tablaLon.value) > parseFloat(tablaLon.value)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Verifique las cantidades de las tablas de lonjas a devolver 3`,
            confirmButtonColor: '#157347',
        })
    } else if (parseFloat(dev_tablaMan.value) > parseFloat(tablaMan.value)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Verifique las cantidades de las tablas de manzana a devolver 4`,
            confirmButtonColor: '#157347',
        })
    } else {
        reporteBocadillo = {
            codigo_lote: lote_bocadillo.value,
            id_usuario: id_usuario_oculto,
            azucar: azucar.value,
            recortes: recortes.value,
            botes_marmitas: botesM.value,
            botes_pailas: botesP.value,
            brix: brix.value,
            tabla_extrafino: tablaExt.value,
            tabla_bocadillos: tablaBoc.value,
            tabla_lonja: tablaLon.value,
            tabla_manzana: tablaMan.value,

            dev_tabla_extrafino: dev_tablaExt.value,
            dev_tabla_bocadillos: dev_tablaBoc.value,
            dev_tabla_lonja: dev_tablaLon.value,
            dev_tabla_manzana: dev_tablaMan.value,

            adic_tabla_extrafino: adic_tablaExt.value,
            adic_tabla_bocadillos: adic_tablaBoc.value,
            adic_tabla_lonja: adic_tablaLon.value,
            adic_tabla_manzana: adic_tablaMan.value,
            codigo_lote_adicion: adic_codigo_lote.value


        }
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