// -----------------------------------------------REPORTE DE TRATAMIENTOS-----------------------------------------------------
let fecha_inicioH = document.getElementById('fecha_inicioH')
let fecha_finH = document.getElementById('fecha_finH')
let btnReporteH = document.getElementById('btnReporteH')
let reporte_tratamientos = {}
let tbodyreporteTratamiento = document.getElementById('tbodyreporteTratamiento')


//--------------------DIV QUE SE OCULTA CUANDO SE DIBUJE LA TABLA----------------------
let div_formulario_tratamientos = document.getElementById('div_formulario_tratamientos')
div_formulario_tratamientos ? div_formulario_tratamientos.style.display.block : ''

//--------------------BOTON PARA REGARGAR LA PAGINA PARA REALIZAR UN NUEVO INFORME
let btn_recargar_reporte = document.getElementById('btn_recargar_reporte')
btn_recargar_reporte ? btn_recargar_reporte.style.display = "none" : ''


//-*-------------------AL DARLE CLICK AL BOTON RECARGA LA PAGINA BORRANDO EL CACHÉ
btn_recargar_reporte ? btn_recargar_reporte.addEventListener("click", _ => { location.reload() }) : ''


if (btnReporteH) {
    btnReporteH.addEventListener("click", () => {
        ListarTratamientos(fecha_inicioH, fecha_finH, id_userOculto, id_cargoOculto, tbodyreporteTratamiento)
    })
}

function ListarTratamientos(fecha_ini, fecha_fin, idUser, idCargo, tabla) {
    if (fecha_ini.value.trim() == "" || fecha_fin.value.trim() == "") {
        DatosIncompletos()
    } else {
        //se limpia la tabla cada que se realice un consulta
        tabla.innerHTML = ``
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        reporte_tratamientos = { fecha_inicio: fecha_ini.value, fecha_fin: fecha_fin.value, id_usuario: idUser.value, id_cargo: idCargo.value }
        //ENVIA DEL JSON AL AJAX
        // console.log(reporte_tratamientos);
        $.post("views/ajax/reportes_ajax.php", { reporte_tratamientos }, (dato) => {
            let response = (JSON.parse(dato))
            //console.log(response);
            if (response.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Sin registros en ese campo de fechas',
                    confirmButtonColor: '#f69100'
                })
            } else {

                //SI LA CONSULTA SE GENERA CORRECTAMENTE SE OCULTA EL FORMULARIO Y SE MUESTRA EL BOTON
                mostrar()
                //---------------------------------------------------------
                response.forEach(x => {
                    tabla.innerHTML += `
                <tr>
                <td>${x.id_tratamiento}</td>
                <td>${x.estado}</td>
                <td>${x.codigo_caprino}</td>
                <td>${x.raza}</td>
                <td>${x.nombres} ${x.apellidos}</td>
                <td>${x.descripcion}</td>
                <td>${x.fecha_inicio}</td>
                </tr>
                `
                });
                $(".dt_tabla").DataTable({
                    /*  "lengthMenu": [[25, 50, -1], [25, 50, "All"]], */
                    dom: "Bfrtip",
                    order: ['0', 'desc']

                });
            }
        })


    }
}

function mostrar() {
    btn_recargar_reporte.style.display = "block"
    div_formulario_tratamientos.style.display = "none"
}