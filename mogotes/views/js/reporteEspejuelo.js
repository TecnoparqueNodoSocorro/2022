// REPORTE DE ESPEJUELO

let lote_espejuelo = document.getElementById('lote_espejuelo')
let azucarE = document.getElementById('azucarE')
let aceite_oliva = document.getElementById('aceite_oliva')
let pectina = document.getElementById('pectina')
let recortesE = document.getElementById('recortesE')
let dev_tablas = document.getElementById('dev_tablas')
let marmitasEsp = document.getElementById('marmitasEsp')
let pailasEsp = document.getElementById('pailasEsp')
let brixEsp = document.getElementById('brixEsp')

// TABLAS
let maderaEsp = document.getElementById('maderaEsp')
let metalicasEsp = document.getElementById('metalicasEsp')
let redondaEsp = document.getElementById('redondaEsp')
let suvenir = document.getElementById('suvenir')
let btnGuardarE = document.getElementById('btnGuardarE')

let reporteEspejuelo = {}

if (btnGuardarE) {
    btnGuardarE.addEventListener("click", () => {
        if (lote_espejuelo.value == "Seleccione el lote" || azucarE.value.trim() == "" || aceite_oliva.value.trim() == "" || pectina.value.trim() == "" || recortesE.value.trim() == "" || dev_tablas.value.trim() == "" || marmitasEsp.value.trim() == "" || pailasEsp.value.trim() == "" || brixEsp.value.trim() == "" || maderaEsp.value.trim() == "" || metalicasEsp.value.trim() == "" || redondaEsp.value.trim() == "" || suvenir.value.trim() == "") {
            console.log("Faltan datos")
        } else {

            reporteEspejuelo = { lote_espejuelo: lote_espejuelo.value, azucar: azucarE.value, aceite_oliva: aceite_oliva.value, recortes: recortesE.value, devolucion_tablas: dev_tablas.value, botes_marmitas: marmitasEsp.value, botes_pailas: pailasEsp.value, brix: brixEsp.value, tabla_madera: maderaEsp.value, tabla_metalica: metalicasEsp.value, redonda: redondaEsp.value, suvenir: suvenir.value }
            console.log(reporteEspejuelo);
        }
    })
}
