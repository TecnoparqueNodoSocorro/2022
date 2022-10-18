// RECEPCION DE GUAYABA

let recepcionGuayaba = {}
let newLote = document.getElementById('newLote')
let lebrija = document.getElementById('lebrija')
let mogotes = document.getElementById('mogotes')
let villaMercedes = document.getElementById('villaMercedes')
let manzanaBlanca = document.getElementById('manzanaBlanca')
let btnGuardar = document.getElementById('btnGuardar')
// adicionar lote anterior, por ahora sin función
let loteAnterior = document.getElementById('loteAnterior')
let btnAdicionar = document.getElementById('btnAdicionar')
if (btnAdicionar) {
    btnAdicionar.addEventListener("click", () => {
        console.log(loteAnterior.value);

    })
}
/////////////////////////////////////////////

if (btnGuardar) {
    btnGuardar.addEventListener("click", () => {
        if (newLote.value.trim() == "" || lebrija.value.trim() == "" || mogotes.value.trim() == "" ||
            villaMercedes.value.trim() == "" || manzanaBlanca.value.trim() == "") {
            console.log("datos incompletos");
        } else {
            recepcionGuayaba = { lote: newLote.value, lebrija: lebrija.value, mogotes: mogotes.value, villaMercedes: villaMercedes.value, manzanaBlanca: manzanaBlanca.value }
            console.log(recepcionGuayaba);
        }
    })
}

