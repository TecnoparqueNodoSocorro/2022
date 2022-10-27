
//variables recepcion info
let tituloModalInforme = document.getElementById('tituloModalInforme')
let lebrijaInfo = document.getElementById('lebrijaInfo')
let cristalinaInfo = document.getElementById('cristalinaInfo')
let villaMercedesInfo = document.getElementById('villaMercedesInfo')
let manzanaBlancaInfo = document.getElementById('manzanaBlancaInfo')
let loteAnteriorInfo = document.getElementById('loteAnteriorInfo')
let textLoteAnteriorInfo = document.getElementById('textLoteAnteriorInfo')
let fecha_recepcionInfo = document.getElementById('fecha_recepcionInfo')

//variables escaldado info
let desperdicioInfo = document.getElementById('desperdicioInfo')
let desinfectanteInfo = document.getElementById('desinfectanteInfo')
let escaldadaInfo = document.getElementById('escaldadaInfo')
let guayabaverdeInfo = document.getElementById('guayabaverdeInfo')
let usuarioInfo = document.getElementById('usuarioInfo')
let fechaEscaldadoInfo = document.getElementById('fechaEscaldadoInfo')
let divInfoEscaldado1 = document.getElementById('divInfoEscaldado1')
let divInfoEscaldado2 = document.getElementById('divInfoEscaldado2')


//variables reportes
let ReporteBocadilloInfo1 = document.getElementById('ReporteBocadilloInfo1')
let ReporteBocadilloInfo2 = document.getElementById('ReporteBocadilloInfo2')
let ReporteEspejueloInfo1 = document.getElementById('ReporteEspejueloInfo1')
let ReporteEspejueloInfo2 = document.getElementById('ReporteEspejueloInfo2')
let ReporteArequipeInfo1 = document.getElementById('ReporteArequipeInfo1')
let ReporteArequipeInfo2 = document.getElementById('ReporteArequipeInfo2')



const btnInfo = document.querySelectorAll('.btnInfo')
btnInfo.forEach(x => {
    x.addEventListener("click", (el) => {
        limpiarListados()
        cod = x.dataset.cod
        // console.log(cod);
        tituloModalInforme.innerText = `Registros del lote: ${cod}`
        traerRecepcion(cod)
        traerReportes(cod)
        traerEmbalaje(cod)

    })
})


function traerRecepcion(codigo) {
    info = { codigo: codigo }
    $.post("views/ajax/lotes_ajax.php", { info }, function (dato) {
        let response = JSON.parse(dato)
        //   console.log(response);
        lebrijaInfo.innerText = `Lebrija ${response.lebrija} kg`
        cristalinaInfo.innerText = `La Cristalina ${response.cristalina} kg`
        villaMercedesInfo.innerText = `Villa Mercedes ${response.villa_mercedes} kg`
        manzanaBlancaInfo.innerText = `Manzana Blanca ${response.manzana_blanca} kg`
        textLoteAnteriorInfo.innerText = `Código del lote anterior: ${response.codigo_lote_anterior} -  Cantidad: ${response.peso_lote_anteior} kg`
        fecha_recepcionInfo.innerText = ` ${response.fecha_recepcion}`

    })
    traerEscaldado(codigo)
}
function traerEscaldado(codigo) {
    escaldadosByCodigo = { codigo: codigo }
    $.post("views/ajax/escaldado_ajax.php", { escaldadosByCodigo }, function (data) {
        let dato = JSON.parse(data);
        // console.log(dato);

        dato.forEach(x => {
            divInfoEscaldado1.innerHTML += `
            <div class="input-group  mb-1">
            <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>
            <div class="input-group  mb-1 ">
                    <span class="text-informe  input-group-text" id=""> Desinfectante: ${x.desinfectante} ml</span>
             </div>
            <div class="input-group  mb-1 ">
                <span class="text-informe  input-group-text" id=""> Guayaba verde: ${x.cantidad_verde} kg</span>
            </div>
            <hr>
            `
            divInfoEscaldado2.innerHTML += `
            <div class="input-group  mb-1">
            <span class="text-informe input-group-text ">Fecha escaldado: <strong> ${x.fecha_escaldado}</strogn></span>
            </div>
            <div class="input-group  mb-1">
                     <span class="text-informe  input-group-text " >  Escaldada: ${x.escaldada} kg</span>
            </div>
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text ">Desperdicio: ${x.desperdicio} kg</span>
            </div>
            <hr>

            `
        })
    })

}









function traerReportes(codigo) {


    infoReporteAre = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporteAre }, function (dato) {
        let response = JSON.parse(dato)
        //  console.log(response);
        response.forEach(x => {

            ReporteArequipeInfo1.innerHTML += `
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Leche:   ${x.botes_pailas} (L) </span>
            </div>

            <div class="input-group  mb-1">
                  <span class="text-informe  input-group-text ">Azúcar: ${x.azucar} (lb) </span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Botes Marmitas: ${x.botes_marmitas} </span>
            </div>
            

       <hr>
            `

            ReporteArequipeInfo2.innerHTML += `
         
            <div class="input-group  mb-1">
            <span class="text-informe  input-group-text " >  Fecha fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
           </div>
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Botes Pailas:   ${x.botes_pailas}</span>
            </div> 
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla Extrafino:  ${x.tabla_extrafino}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla Bocadillos:  ${x.tabla_bocadillo}</span>
            </div>

            <hr>
            `
        })
    })











    infoReporte = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporte }, function (dato) {
        let response = JSON.parse(dato)
        // console.log(response);
        response.forEach(x => {
            ReporteBocadilloInfo1.innerHTML += `
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Botes Pailas:   ${x.botes_pailas}</span>
            </div>

            <div class="input-group  mb-1">
                  <span class="text-informe  input-group-text ">Azúcar: ${x.azucar} lb</span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Recortes: ${x.recortes} </span>
            </div>
            
            <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Devolución Tablas:   ${x.devolucion_tablas}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Botes Marmitas:   ${x.botes_marmitas}</span>
            </div>
           
       <hr>
            `

            ReporteBocadilloInfo2.innerHTML += `
         
            <div class="input-group  mb-1">
            <span class="text-informe  input-group-text " >  Fecha fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
           </div>
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  °Brix:   ${x.brix}</span>
            </div> 
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla extrafino:  ${x.tabla_extrafino}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla Bocadillos:  ${x.tabla_bocadillos}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla Lonja:  ${x.tabla_lonja}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla Manzana:  ${x.tabla_manzana}</span>
            </div>
            <hr>
            `
        })
    })




    infoReporteEsp = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporteEsp }, function (dato) {
        let responses = JSON.parse(dato)
        //console.log(responses);
        responses.forEach(x => {

            ReporteEspejueloInfo1.innerHTML += `
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Azúcar:   ${x.azucar} lb </span>
            </div>

            <div class="input-group  mb-1">
                  <span class="text-informe  input-group-text ">Aceite de Oliva: ${x.aceite_oliva} </span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Pectina: ${x.pectina} </span>
            </div>
            
            <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Botes Marmitas:   ${x.botes_marmitas}</span>
            </div>

           
       <hr>
            `

            ReporteEspejueloInfo2.innerHTML += `
         
            <div class="input-group  mb-1">
            <span class="text-informe  input-group-text " >  Fecha fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
           </div>
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Botes Pailas:   ${x.botes_pailas}</span>
            </div> 
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  °Brix:  ${x.brix}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Tabla Metálicas:  ${x.tabla_metalica}</span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Redonda:  ${x.redonda
                }</span>
            </div>

            <hr>
            `
        })
    })
}









function traerEmbalaje(codigo) {
    infoEmbalaje = { codigo: codigo }
    $.post("views/ajax/embalaje_ajax.php", { infoEmbalaje }, function (dato) {
        let responses = JSON.parse(dato)
        console.log(responses);
    })
}





function limpiarListados() {
    divInfoEscaldado2.innerHTML = ``
    divInfoEscaldado1.innerHTML = ``
    ReporteBocadilloInfo1.innerHTML = ``
    ReporteBocadilloInfo2.innerHTML = ``
    ReporteArequipeInfo1.innerHTML = ``
    ReporteArequipeInfo2.innerHTML = ``
    ReporteEspejueloInfo1.innerHTML = ``
    ReporteEspejueloInfo2.innerHTML = ``
}