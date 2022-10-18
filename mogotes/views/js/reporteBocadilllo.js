
// REPORTE DE BOCADILLO

let lote_bocadillo = document.getElementById('lote_bocadillo')
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

if (btnGuardarB) {
    btnGuardarB.addEventListener("click", () => {
        if (lote_bocadillo.value == "Seleccione el lote" || azucar.value.trim() == "" || recortes.value.trim() == "" || devolucion.value.trim() == "" || botesM.value.trim() == "" || botesP.value.trim() == "" || brix.value.trim() == ""
            || tablaExt.value.trim() == "" || tablaBoc.value.trim() == "" || tablaLon.value.trim() == "" || tablaMan.value.trim() == "") {
            console.log("Faltan datos");
        } else {
            reporteBocadillo = { lote_bocadillo: lote_bocadillo.value, azucar: azucar.value, recortes: recortes.value, devolucion: devolucion.value, botes_marmitas: botesM.value, botes_pailas: botesP.value, brix: brix.value, tabla_extrafino: tablaExt.value, tabla_bocadillos: tablaBoc.value, tabla_lonja: tablaLon.value, tabla_manzana: tablaMan.value }
            console.log(reporteBocadillo);
        }
    })
}