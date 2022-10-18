
// ESCALDADO DE GUAYABA
let escaldadoGuayaba = {}
let lote_escaldada = document.getElementById('lote_escaldada')
let lavada = document.getElementById('lavada')
let desinfectante = document.getElementById('desinfectante')
let escaldada = document.getElementById('escaldada')
let btnGuardarEsc = document.getElementById('btnGuardarEsc')

if (btnGuardarEsc) {
    btnGuardarEsc.addEventListener("click", () => {
        if (lote_escaldada.value == "Seleccione el lote" || lavada.value.trim() == "" || desinfectante.value.trim() == "" || escaldada.value.trim() == "") {
            console.log("Faltan datos");
        } else {
            escaldadoGuayaba = { lote_escaldada: lote_escaldada.value, lavada: lavada.value, desinfectante: desinfectante.value, escaldada: escaldada.value }
            console.log(escaldadoGuayaba);
        }
    })
}