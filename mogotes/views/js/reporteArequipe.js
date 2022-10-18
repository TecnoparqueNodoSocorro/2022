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

if (btnGuardarA) {
    btnGuardarA.addEventListener("click", () => {
        if (lote_arequipe.value == "Seleccione el lote" || leche.value.trim() == "" || azucarA.value.trim() == "" || marmitasA.value.trim() == "" || pailasA.value.trim() == "" || extrafinoA.value.trim() == "" || bocadillosA.value.trim() == "") {
            console.log("Faltan datos");
        } else {
            reporteArequipe = { lote_arequipe: lote_arequipe.value, leche: leche.value, azucar: azucarA.value, botes_marmitas: marmitasA.value, botes_pailas: pailasA.value, tabla_extrafino: extrafinoA.value, tabla_bocadillos: bocadillosA.value }
            console.log(reporteArequipe);
        }
    })
}
