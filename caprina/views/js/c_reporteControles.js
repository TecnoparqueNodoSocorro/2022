

//------------------------------REPORTE POR USUARIOS DE CONTROLES DE LOS CAPRINOS---------------------------------------------
let fecha_inicioReporteUsuario = document.getElementById('fecha_inicioReporteUsuario')
let fecha_finReporteUsuario = document.getElementById('fecha_finReporteUsuario')
let tbody_reporte_controlesReporteUsuario = document.getElementById('tbody_reporte_controlesReporteUsuario')
let thead_reporteReporteUsuario = document.getElementById('thead_reporteReporteUsuario')
let btnReporteControlesReporteUsuario = document.getElementById('btnReporteControlesReporteUsuario')
let seleccion_enfermedadReporteUsuario = document.getElementById('seleccion_enfermedadReporteUsuario')

if (btnReporteControlesReporteUsuario) {
    btnReporteControlesReporteUsuario.addEventListener("click", () => {

        //limpiar la tabla cada que se genere un reporte
        tbody_reporte_controlesReporteUsuario.innerHTML = ``
        //se llama la función para generar el reporte, funcion se encuentra en a_reporteControles.js
        ReporteControles(fecha_inicioReporteUsuario, fecha_finReporteUsuario, tbody_reporte_controlesReporteUsuario,
            thead_reporteReporteUsuario, seleccion_enfermedadReporteUsuario, id_cargoOculto, id_userOculto)
    })
}
