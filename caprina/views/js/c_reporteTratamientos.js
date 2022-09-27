// -----------------------------------------------REPORTE DE TRATAMIENTOS-----------------------------------------------------
let fecha_inicioRTPU = document.getElementById('fecha_inicioRTPU')
let fecha_finRTPU = document.getElementById('fecha_finRTPU')
let btnReporteRTPU = document.getElementById('btnReporteRTPU')
let tbodyreporteTratamientoRTPU = document.getElementById('tbodyreporteTratamientoRTPU')

//--------------------DIV QUE SE OCULTA CUANDO SE DIBUJE LA TABLA----------------------
let div_formulario_tratamientos_c = document.getElementById('div_formulario_tratamientos_c')
div_formulario_tratamientos_c ? div_formulario_tratamientos_c.style.display.block : ''

//--------------------BOTON PARA REGARGAR LA PAGINA PARA REALIZAR UN NUEVO INFORME
let btn_recargar_reporte_c = document.getElementById('btn_recargar_reporte_c')
btn_recargar_reporte_c ? btn_recargar_reporte_c.style.display = "none" : ''


//-*-------------------AL DARLE CLICK AL BOTON RECARGA LA PAGINA BORRANDO EL CACHÉ
btn_recargar_reporte_c ? btn_recargar_reporte_c.addEventListener("click", _ => { location.reload() }) : ''


if (btnReporteRTPU) {
    btnReporteRTPU.addEventListener("click", () => {
        //SE LLAMA LA FUNCION QUE ESTA EN EL COMPONENTE a_reporteTratamientos.js
        ListarTratamientos_c(fecha_inicioRTPU, fecha_finRTPU, id_userOculto, id_cargoOculto, tbodyreporteTratamientoRTPU)

    })
}


function ListarTratamientos_c(fecha_ini, fecha_fin, idUser, idCargo, tabla) {
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
            console.log(response);
            if (response.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Sin registros en ese campo de fechas',
                    confirmButtonColor: '#f69100'
                })
            } else {

                //SI LA CONSULTA SE GENERA CORRECTAMENTE SE OCULTA EL FORMULARIO Y SE MUESTRA EL BOTON
                mostrar_c()
                //---------------------------------------------------------
                response.forEach(x => {
                    tabla.innerHTML += `
                <tr>
                <td>${x.id_tratamiento}</td>
                <td>${x.codigo_caprino}</td>
                <td>${x.estado}</td>
                <td>${x.raza}</td>
<!--               <td>${x.nombres} ${x.apellidos}</td> -->
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

function mostrar_c() {
    btn_recargar_reporte_c.style.display = "block"
    div_formulario_tratamientos_c.style.display = "none"
}