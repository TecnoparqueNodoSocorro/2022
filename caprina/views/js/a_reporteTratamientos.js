// -----------------------------------------------REPORTE DE TRATAMIENTOS-----------------------------------------------------
let fecha_inicioH = document.getElementById('fecha_inicioH')
let fecha_finH = document.getElementById('fecha_finH')
let btnReporteH = document.getElementById('btnReporteH')
let tbodyreporteTratamiento = document.getElementById('tbodyreporteTratamiento')
if (btnReporteH) {
    btnReporteH.addEventListener("click", () => {
        if (fecha_inicioH.value.trim() == "" || fecha_finH.value.trim() == "") {
            DatosIncompletos()
        } else {
            tbodyreporteTratamiento.innerHTML = ``

            reporte_tratamientos = { fecha_inicio: fecha_inicioH.value, fecha_fin: fecha_finH.value }
            console.log(reporte_tratamientos);
            $.post("views/ajax/reportes_ajax.php", { reporte_tratamientos }, (dato) => {
                let response = (JSON.parse(dato))
                console.log(response);
                response.forEach(x => {
                    tbodyreporteTratamiento.innerHTML += `
                    <tr>
                    <td>${x.codigo_caprino}</td>
                    <td>${x.raza}</td>
                    <td>${x.nombres} ${x.apellidos}</td>
                    <td>${x.id_tratamiento}</td>
                    <td>${x.descripcion}</td>
                    <td>${x.fecha_inicio}</td>
                    </tr>
                    `

                })
            })


        }
    })
}