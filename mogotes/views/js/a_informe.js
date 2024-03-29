
//variables recepcion info
let tituloModalInforme = document.getElementById('tituloModalInforme')
let lebrijaInfo = document.getElementById('lebrijaInfo')
let cristalinaInfo = document.getElementById('cristalinaInfo')
let villaMercedesInfo = document.getElementById('villaMercedesInfo')
let manzanaBlancaInfo = document.getElementById('manzanaBlancaInfo')
let loteAnteriorInfo = document.getElementById('loteAnteriorInfo')
let textLoteAnteriorInfo = document.getElementById('textLoteAnteriorInfo')
let fecha_recepcionInfo = document.getElementById('fecha_recepcionInfo')
let pesoTotalLote = document.getElementById('pesoTotalLote')
let textUsuarioRecepcion = document.getElementById('textUsuarioRecepcion')



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

//variables para el texto del reporte de produccion
let textBocadillo = document.getElementById('textBocadillo')
let textEspejuelo = document.getElementById('textEspejuelo')
let textArequipe = document.getElementById('textArequipe')

//variables reporte embalaje
/* let ReporteEmbalajeDetalle1 = document.getElementById('ReporteEmbalajeDetalle1')
let ReporteEmbalajeDetalle2 = document.getElementById('ReporteEmbalajeDetalle2')
let ReporteEmbalajeEncabezado2 = document.getElementById('ReporteEmbalajeEncabezado2')
let ReporteEmbalajeEncabezado1 = document.getElementById('ReporteEmbalajeEncabezado1') */
let containerEmbalaje = document.getElementById('containerEmbalaje')


//EXTRAER EL CODIGO PARA APLICARLO A LAS FUNCIONES
const btnInfo = document.querySelectorAll('.btnInfo')
btnInfo.forEach(x => {
    x.addEventListener("click", (el) => {
        limpiarListados()
        cod = x.dataset.cod
        // console.log(cod);
        //PONERLE DE TITULO AL MODAL EL CODIGO DEL LOTE
        tituloModalInforme.innerText = `Registros del lote: ${cod}`

        //----FUNCIONES----
        traerRecepcion(cod)
        traerReportes(cod)
        traerEmbalaje(cod)

    })
})



//FUNCION TRAER LA RECEPCION DEL LOTE
function traerRecepcion(codigo) {
    info = { codigo: codigo }
    $.post("views/ajax/lotes_ajax.php", { info }, function (dato) {
        let response = JSON.parse(dato)
        console.log(response);

        //SE ASIGNAN LAS RESPUESTAS QUE TRAE LA BASE DE DATOS
        lebrijaInfo.innerText = `Lebrija ${response.lebrija} kg`
        cristalinaInfo.innerText = `La Cristalina ${response.cristalina} kg`
        villaMercedesInfo.innerText = `Villa Mercedes ${response.villa_mercedes} kg`
        manzanaBlancaInfo.innerText = `Manzana Blanca ${response.manzana_blanca} kg`
        textLoteAnteriorInfo.innerText = `Código del lote anterior: ${response.codigo_lote_anterior} -  Cantidad: ${response.peso_lote_anteior} kg`
        fecha_recepcionInfo.innerText = ` ${response.fecha_recepcion}`
        pesoTotalLote.innerText = ` ${response.peso} kg`
        textUsuarioRecepcion.innerText = `Usuario: ${response.nombres} ${response.apellidos}`

    })
    //SE LLAMA LA FUNCION QUE TRAER LOS PROCESOS DE ESCALDADO
    traerEscaldado(codigo)
}


//FUNCION TRAER TODOS LOS REGISTROS QUE HA TENIDO EL LOTE EN EL PORCESO DE ESCALDADO
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
                <span class="text-informe input-group-text ">F escaldado: <strong> ${x.fecha_escaldado}</strogn></span>
            </div>
            <div class="input-group  mb-1 ">
                <span class="text-informe  input-group-text" id=""> Guayaba verde: ${x.cantidad_verde} kg</span>
            </div>
            <hr>
            `
            divInfoEscaldado2.innerHTML += `
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text" id=""> Desinfectante: ${x.desinfectante} ml</span>
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






//FUNCION QUE TRAE TODOS LOS REPORTES QUE HAYA TENIDO EL LOTE
function traerReportes(codigo) {


    //TRAER LOS REPORTES DE LA TABLA DE REPORTE DE AREQUIPE
    infoReporteAre = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporteAre }, function (dato) {
        let response = JSON.parse(dato)
        //  console.log(response);
        response.length != 0
            ? textArequipe.innerText = `Reporte arequipe`
            : ''
        response.forEach(x => {


            ReporteArequipeInfo1.innerHTML += `
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  F fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
            </div>
            <div class="input-group  mb-1">
                  <span class="text-informe  input-group-text ">Azúcar: ${x.azucar} (kg) </span>
            </div>
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Botes Marmitas: ${x.botes_marmitas} </span>
            </div>
       <hr>
            `

            ReporteArequipeInfo2.innerHTML += `
         
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Leche:   ${x.leche} (kg) </span>
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

    //TRAER LOS REPORTES DE LA TABLA DE REPORTE DE BOCADILLO
    infoReporte = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporte }, function (dato) {
        let response = JSON.parse(dato)
        // console.log(response);
        response.length != 0
            ? textBocadillo.innerText = `Reporte bocadillo`
            : ''


        response.forEach(x => {
            ReporteBocadilloInfo1.innerHTML += `
            
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>
            <div class="input-group  mb-1">
            <span class="text-informe  input-group-text " >  F fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
            </div>
            <div class="input-group  mb-1">
                  <span class="text-informe  input-group-text ">Azúcar: ${x.azucar} kg</span>
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
            <span class="text-informe  input-group-text " >  Botes Pailas:   ${x.botes_pailas}</span>
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




    //TRAER LOS REPORTES DE LA TABLA DE REPORTE DE ESPEJUELO
    infoReporteEsp = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporteEsp }, function (dato) {
        let responses = JSON.parse(dato)
        //console.log(responses);
        responses.length != 0
            ? textEspejuelo.innerText = `Reporte espejuelo`
            : ''
        responses.forEach(x => {

            ReporteEspejueloInfo1.innerHTML += `
            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong></span>
            </div>

            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  F fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
            </div>

            <div class="input-group  mb-1">
                  <span class="text-informe  input-group-text ">Aceite de Oliva: ${x.aceite_oliva} ml </span>
            </div>

            <div class="input-group  mb-1">
                 <span class="text-informe  input-group-text " >  Pectina: ${x.pectina} gr </span>
            </div>
            
            <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Botes Marmitas:   ${x.botes_marmitas}</span>
            </div>

           
       <hr>
            `

            ReporteEspejueloInfo2.innerHTML += `
         
            <div class="input-group  mb-1">
                <span class="text-informe  input-group-text " >  Azúcar:   ${x.azucar} kg </span>
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









//TRAER LOS REPORTES DE EMBALAJE QUE SE ENCUENTREN REGISTRADO CON EL CÓDIGO<
function traerEmbalaje(codigo) {
    infoEmbalaje = { codigo: codigo }
    $.post("views/ajax/embalaje_ajax.php", { infoEmbalaje }, function (dato) {
        let responses = JSON.parse(dato)
        // console.log(responses);
        responses.forEach(x => {
            containerEmbalaje.innerHTML += `

            <div class="col" id="ReporteEmbalajeEncabezado1">

                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  Usuario:  <strong> ${x.nombres} ${x.apellidos}</strong> </span>
                    </div>
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  F embalaje: <strong>  ${x.fecha_embalaje} </strong> </span>
                    </div>
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  F fabricación:  <strong> ${x.fecha_fabricacion}</strong></span>
                    </div>
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  F vencimiento:  <strong> ${x.fecha_vencimiento}</strong> </span>
                    </div> 
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  Madera: ${x.madera} </span>
                    </div>           
         
            </div>

            <div class="col" id="ReporteEmbalajeEncabezado2">

                <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text ">Azúcar: ${x.azucar} (kg) </span>
                </div>
                <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Celofán: ${x.celofan} </span>
                </div>
                <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Bijao:  ${x.bijao}</span>
                </div>
                <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Recortes. :  ${x.recortes}</span>
                </div>
                <div class="input-group  mb-1">
                    <span class="text-informe  input-group-text " >  Tablas: ${x.tablas} </span>
                </div>          
       
            </div>
            <div class="col-12" id="ReporteEmbalajeDetalle1">
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  Producto:  <strong> ${x.producto}</strong></span>
                    </div>
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  Empaque:  <strong> ${x.empaque}</strong> </span>
                    </div> 
                    <div class="input-group  mb-1">
                        <span class="text-informe  input-group-text " >  Cantidad:  ${x.cantidad}</span>
                    </div>    
                <hr>
                <hr>
            </div>
            
            `


        })
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
    containerEmbalaje.innerHTML = ``

    textArequipe.innerText = ``
    textBocadillo.innerText = ``
    textEspejuelo.innerText = ``
}