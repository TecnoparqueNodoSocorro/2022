// Guardar datos del login y guardarlos en un array
let user = document.getElementById('username')
let pass = document.getElementById('pass')
let btn = document.getElementById('btnIniciar')
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        if (user.value.trim() == "" || pass.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            login = { user: user.value, password: pass.value }
            console.log(login);
        }
    })
}

//registro de EMPLEADO
let nuevoEmpleado = {}
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let cargo_user = document.getElementById('cargo_user')
let btnRegistrar = document.getElementById('btnRegistrar')
if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        if (cargo_user.value == "Seleccione el cargo" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            nuevoEmpleado = { cargo: cargo_user.options[cargo_user.selectedIndex].text, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value }
            console.log(nuevoEmpleado);
        }
    })
}


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

// REGISTRO EMBALAJE 
let embalaje = {}
let lote_embalaje = document.getElementById('lote_embalaje')
let azucarEmb = document.getElementById('azucarEmb')
let bijaoEmb = document.getElementById('bijaoEmb')
let celofanEmb = document.getElementById('celofanEmb')
let recortesEmb = document.getElementById('recortesEmb')
let maderaEmb = document.getElementById('maderaEmb')
let tablasEmb = document.getElementById('tablasEmb')
let embProducto = {}


// FUNCION BLANQUEA LOS INPUT
let control = document.getElementsByClassName('form-control')
function asignar() {
    lote_embalaje.value=0
    for (let index = 0; index < control.length; index++) {
        control[index].value=" "  
    }
}

//FUNCION GUARDAR DATOS FIJOS
function EnviarDatos() {
    embalaje = { lote: lote_embalaje.value, azucar: azucarEmb.value, bijao: bijaoEmb.value, celofan: celofanEmb.value, recortes: recortesEmb.value, madera: maderaEmb.value, tablas: tablasEmb.value, embalaje: embProducto }
}



// VARIABLES BOCADILLO

let espNav = document.getElementById('espNav')
let extrafino = document.getElementById('extrafino')
let veinte_t = document.getElementById('veinte_t')
let venti_ocho = document.getElementById('venti_ocho')
let ochenta_cuatro = document.getElementById('ochenta_cuatro')
let mooticos = document.getElementById('mooticos')
let unidades = document.getElementById('unidades')
let mooticos_c = document.getElementById('mooticos_c')
let moticos_unidades = document.getElementById('moticos_unidades')
let bocadillo_manzana = document.getElementById('bocadillo_manzana')
let lonja = document.getElementById('lonja')

let btnGuardarEmbB = document.getElementById('btnGuardarEmbB')
if (btnGuardarEmbB) {
    btnGuardarEmbB.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { especial_navideno: espNav.value, extrafino: extrafino.value, veinte_trienta: veinte_t.value, veintiocho_veinte: venti_ocho.value, ochenta_diez: ochenta_cuatro.value, moticos_10: mooticos.value, unidades: unidades.value, moticos_cinco: mooticos_c.value, moticos_unidades: moticos_unidades.value, bocadillo_manzana: bocadillo_manzana.value, lonja: lonja.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
}

//VARIABLES ESPEJUELO

let pastilla_unidad = document.getElementById('pastilla_unidad')
let moticos_esp = document.getElementById('moticos_esp')
let veinte_esp = document.getElementById('veinte_esp')
let cuarente_esp = document.getElementById('cuarente_esp')
let noventas_esp = document.getElementById('noventas_esp')
let mooticos_diez = document.getElementById('mooticos_diez')
let mooticos_cinco = document.getElementById('mooticos_cinco')
let btnGuardarEmbE = document.getElementById('btnGuardarEmbE')

if (btnGuardarEmbE) {
    btnGuardarEmbE.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { pastilla_unidad: pastilla_unidad.value, moticos_unidades: moticos_esp.value, veinte_cuarenta: veinte_esp.value, cuarenta_veinte: cuarente_esp.value,noventa_seis:  noventas_esp.value,mooticos_diez: mooticos_diez.value,moticos_cinco: mooticos_cinco.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
}

//VARIABLE AREQUIPE

let caja_2 = document.getElementById('caja_2')
let bocadillo_panelaU = document.getElementById('bocadillo_panelaU')
let bocadillo_panela = document.getElementById('bocadillo_panela')
let bocadillo_light = document.getElementById('bocadillo_light')
let herpos = document.getElementById('herpos')
let btnGuardarEmbA = document.getElementById('btnGuardarEmbA')

if (btnGuardarEmbA) {
    btnGuardarEmbA.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { caja_2Unidades: caja_2.value, bocadillo_panelaUnidad: bocadillo_panelaU.value, bocadillo_panela: bocadillo_panela.value, bocadillo_light: bocadillo_light.value, herpos:  herpos.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
}