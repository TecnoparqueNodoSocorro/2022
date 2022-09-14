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
            }

            )

            $('.dt_tabla').DataTable();
        }

        )


    }
}


/* datatable */

var $datatableBT = $('.dt_tabla');

$datatableBT.dataTable({
    "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
    dom: "Blfrtip",
    buttons: [
        {
            extend: "copy",
            className: "btn-sm"
        },
        {
            extend: "csv",
            className: "btn-sm"
        },
        {
            extend: "excel",
            className: "btn-sm"
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm"
        },
        {
            extend: "print",
            className: "btn-sm"
        }
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar MENU registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del START al END de un total de TOTAL registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de MAX registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    'order': [[0, 'asc']],
    'columnDefs': [
        { orderable: false, targets: [0] }
    ]
});