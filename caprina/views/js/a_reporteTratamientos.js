// -----------------------------------------------REPORTE DE TRATAMIENTOS-----------------------------------------------------
let fecha_inicioH = document.getElementById('fecha_inicioH')
let fecha_finH = document.getElementById('fecha_finH')
let btnReporteH = document.getElementById('btnReporteH')
let tbodyreporteTratamiento = document.getElementById('tbodyreporteTratamiento')
if (btnReporteH) {
    btnReporteH.addEventListener("click", () => {
        ListarTratamientos(fecha_inicioH, fecha_finH, id_userOculto, id_cargoOculto, tbodyreporteTratamiento)
    })
}

function ListarTratamientos(fecha_ini, fecha_fin, idUser, idCargo, tabla) {
    if (fecha_ini.value.trim() == "" || fecha_fin.value.trim() == "") {
        DatosIncompletos()
    } else {
        tabla.innerHTML = ``
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        reporte_tratamientos = { fecha_inicio: fecha_ini.value, fecha_fin: fecha_fin.value, id_usuario: idUser.value, id_cargo: idCargo.value }
        //ENVIA DEL JSON AL AJAX
        // console.log(reporte_tratamientos);
        $.post("views/ajax/reportes_ajax.php", { reporte_tratamientos }, (dato) => {
            let response = (JSON.parse(dato))
            // console.log(response);
            response.forEach(x => {
                tabla.innerHTML += `
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
        $('#reptratamientos').DataTable();

    }
}