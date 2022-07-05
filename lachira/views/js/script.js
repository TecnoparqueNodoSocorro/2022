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
            login = {user: user.value, password: pass.value}
            console.log(login);
        }
    })
}


//registro de usuarios
let empleado_nuevo = {}
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let nacimiento_user = document.getElementById('nacimiento_user')
let cargo_user = document.getElementById('cargo_user')
let btnRegistrar = document.getElementById('btnRegistrar')
if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        //    capturar el texto del select
        //     console.log(cosecha_user.options[cosecha_user.selectedIndex].text);

        if (cargo_user.value == "Seleccione el cargo" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "" || nacimiento_user.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            empleado_nuevo = { cargo: cargo_user.value, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value, fecha_nacimiento: nacimiento_user.value }
            console.log(empleado_nuevo);
        }
    })
}


// gestion de lotes creacion de lote
let lote ={}
let materia = document.getElementById('materia')
let fInicio = document.getElementById('fInicio')
let PesoIni = document.getElementById('PesoIni')
let pesoNeto = document.getElementById('pesoNeto')
let pesoDesper = document.getElementById('pesoDesper')
let adicion = document.getElementById('adicion')
let fermen = document.getElementById('fermen')
let btnCrearLote = document.getElementById('btnCrearLote')
if (btnCrearLote) {
    btnCrearLote.addEventListener("click", () => {

        if (materia.value.trim() == "" || fInicio.value.trim() == "" || fermen.value.trim() == "" || adicion.value.trim() == "" || pesoDesper.value.trim() == "" || pesoNeto.value.trim() == "" || PesoIni.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            lote={materia: materia.value, fecha_inicio: fInicio.value, fermentacion: fermen.value, adicion: adicion.value, peso_desperdiciado:pesoDesper.value, peso_neto:pesoNeto.value, peso_inicial: PesoIni.value}
            console.log(lote);
        }
    })
}


// gestion de lotes, se agregan las variables
let variables ={}
let brix = document.getElementById('brix')
let alcohol = document.getElementById('alcohol')
let ph = document.getElementById('ph')
let tds = document.getElementById('tds')
let ac = document.getElementById('ac')
let temp = document.getElementById('temp')
let hume = document.getElementById('hume')
let btnGuardarVar = document.getElementById('btnGuardarVar')
if (btnGuardarVar) {
    btnGuardarVar.addEventListener("click", () => {
        if (brix.value.trim() == "" || alcohol.value.trim() == "" || ph.value.trim() == "" || tds.value.trim() == "" || ac.value.trim() == "" || temp.value.trim() == "" || hume.value.trim() == "") {
            console.log("datos incorrectos");
        } else {
            variables={brix: brix.value, alcohol: alcohol.value, ph: ph.value, tds: tds.value, ac: ac.value, temperatura: temp.value,humedad: hume.value}
            console.log(variables);
        }
    })
}


