// -----------------------------------------------REPORTE DE TRATAMIENTOS-----------------------------------------------------
let fecha_inicioRTPU = document.getElementById('fecha_inicioRTPU')
let fecha_finRTPU = document.getElementById('fecha_finRTPU')
let btnReporteRTPU = document.getElementById('btnReporteRTPU')
 let tbodyreporteTratamientoRTPU = document.getElementById('tbodyreporteTratamientoRTPU') 
if (btnReporteRTPU) {
    btnReporteRTPU.addEventListener("click", () => {
        //SE LLAMA LA FUNCION QUE ESTA EN EL COMPONENTE a_reporteTratamientos.js
        ListarTratamientos(fecha_inicioRTPU,fecha_finRTPU,id_userOculto,id_cargoOculto,tbodyreporteTratamientoRTPU)

    })
}