

let fechaInicioRB = document.getElementById('fechaInicioRB')
let fechaFinRB = document.getElementById('fechaFinRB')
let reporte_producto = document.getElementById('reporte_producto')

let btnGenerarInfoTB = document.getElementById('btnGenerarInfoTB')


//variables tabla
let theadReporteTablaGeneral = document.getElementById('theadReporteTablaGeneral')
let tbodyReporteTablaGeneral = document.getElementById('tbodyReporteTablaGeneral')

//variables tabla
let theadReporteTablaProducto = document.getElementById('theadReporteTablaProducto')
let tbodyReporteTablaProducto = document.getElementById('tbodyReporteTablaProducto')


btnGenerarInfoTB ? btnGenerarInfoTB.addEventListener("click", GenerarReporteTB) : ''

function GenerarReporteTB() {
    if (fechaInicioRB.value == "" || fechaFinRB.value == "" || reporte_producto.value == "0") {

        DatosIncompletos()
    } else {


        switch (reporte_producto.value) {
            case "1":
                LimpiarTablas()
                GenerarReporteTablas(reporte_producto.value)
                break;
            case "2":
                LimpiarTablas()
                GenerarReporteTablas(reporte_producto.value)
                break;
            case "3":
                LimpiarTablas()
                GenerarReporteTablas(reporte_producto.value)
                break;
            case "4":
                LimpiarTablas()
                GenerarReporteTablas(reporte_producto.value)
                break;
            case "5":
                LimpiarTablas()
                GenerarReporteTablas(reporte_producto.value)
                break;

            default:
                break;
        }

    }
}

function GenerarReporteTablas(product) {
    const fechas_reporte = { fechaInicio: fechaInicioRB.value, fechaFin: fechaFinRB.value, producto: product }
    console.log(fechas_reporte);
    $.ajax({
        data: { fechas_reporte },
        type: "POST",
        dataType: "json",
        url: "views/ajax/informeTablas_ajax.php",
    })
        .done(function (data, textStatus, jqXHR) {

            // console.log("La solicitud se ha completado correctamente.");
            let response = data

            response.forEach(x => {
                if (product == "1") {
                    theadReporteTablaGeneral.innerHTML = `
                    <tr>
                    <th>Código lote</th>
                    <th>Fecha producción</th>
                    <th>Tabla bocadillos</th>
                    <th>Tabla extrafino</th>
                    <th>Tabla manzana</th>
                    <th>Tabla lonja</th>
                    <th>Dev. bocadillos</th>
                    <th>Dev. extrafino</th>
                    <th>Dev. manzana</th>
                    <th>Dev. lonja</th>
                    <th>Adic. bocadillos</th>
                    <th>Adic. extrafino</th>
                    <th>Adic. manzana</th>
                    <th>Adic. lonja</th>
                    <th>Total bocadillos</th>
                    <th>Total extrafino</th>
                    <th>Total manzana</th>
                    <th>Total lonja</th>
                    <th>Código lote adición</th>
                    </tr>
                    `
                    tbodyReporteTablaGeneral.innerHTML += `
                    <tr>
                    <td>${x.codigo_lote}</td>
                    <td>${x.fecha_fabricacion}</td>
                    <td>${x.total_bocadillo}</td>
                    <td>${x.total_extrafino}</td>
                    <td>${x.tabla_manzana}</td>
                    <td>${x.total_lonja}</td>
                    <td>${x.dev_tabla_bocadillos}</td>
                    <td>${x.dev_tabla_extrafino}</td>
                    <td>${x.dev_tabla_manzana}</td>
                    <td>${x.dev_tabla_lonja}</td>
                    <td>${x.adic_tabla_bocadillos}</td>
                    <td>${x.adic_tabla_extrafino}</td>
                    <td>${x.adic_tabla_manzana}</td>
                    <td>${x.dev_tabla_lonja}</td>
                    <td>${x.total_bocadillo}</td>
                    <td>${x.tabla_extrafino}</td>
                    <td>${x.total_manzana}</td>
                    <td>${x.total_lonja}</td>
                    <td>${x.codigo_lote}</td>
                    </tr>
                    `
                } else if (product == "2") {

                    theadReporteTablaGeneral.innerHTML = `
                <tr>
                <th>Lote</th>
                <th>F. producción</th>
                <th>T. Bocadillo</th>               
                <th>Dev. bocadillos</th>               
                <th>Adic. bocadillos</th>               
                <th>Total bocadillos</th>
                <th>Lote adición</th>
                </tr>
                `
                    tbodyReporteTablaGeneral.innerHTML += `
                <tr>
                <td>${x.codigo_lote}</td>
                <td>${x.fecha_fabricacion}</td>
                <td>${x.tabla_bocadillos}</td>
                <td>${x.dev_tabla_bocadillos}</td>                
                <td>${x.adic_tabla_bocadillos}</td>              
                <td>${x.total_bocadillo}</td>
                <td>${x.codigo_lote}</td>
                </tr>
                `

                }
                else if (product == "3") {

                    theadReporteTablaGeneral.innerHTML = `
                <tr>
                <th>Lote</th>
                <th>F. producción</th>
                <th>T. Manzana</th>               
                <th>Dev. Manzana</th>               
                <th>Adic. Manzana</th>               
                <th>Total Manzana</th>
                <th>Lote adición</th>
                </tr>
                `
                    tbodyReporteTablaGeneral.innerHTML += `
                <tr>
                <td>${x.codigo_lote}</td>
                <td>${x.fecha_fabricacion}</td>
                <td>${x.tabla_manzana}</td>
                <td>${x.dev_tabla_manzana}</td>                
                <td>${x.adic_tabla_manzana}</td>              
                <td>${x.total_manzana}</td>
                <td>${x.codigo_lote}</td>
                </tr>
                `

                }
                else if (product == "4") {

                    theadReporteTablaGeneral.innerHTML = `
                <tr>
                <th>Lote</th>
                <th>F. producción</th>
                <th>T. Extrafino</th>               
                <th>Dev. Extrafino</th>               
                <th>Adic. Extrafino</th>               
                <th>Total Extrafino</th>
                <th>Lote adición</th>
                </tr>
                `
                    tbodyReporteTablaGeneral.innerHTML += `
                <tr>
                <td>${x.codigo_lote}</td>
                <td>${x.fecha_fabricacion}</td>
                <td>${x.tabla_extrafino}</td>
                <td>${x.dev_tabla_extrafino}</td>                
                <td>${x.adic_tabla_extrafino}</td>              
                <td>${x.total_extrafino}</td>
                <td>${x.codigo_lote}</td>
                </tr>
                `

                }
                else if (product == "5") {

                    theadReporteTablaGeneral.innerHTML = `
                <tr>
                <th>Lote</th>
                <th>F. producción</th>
                <th>T. Lonja</th>               
                <th>Dev. Lonja</th>               
                <th>Adic. Lonja</th>               
                <th>Total Lonja</th>
                <th>Lote adición</th>
                </tr>
                `
                    tbodyReporteTablaGeneral.innerHTML += `
                <tr>
                <td>${x.codigo_lote}</td>
                <td>${x.fecha_fabricacion}</td>
                <td>${x.tabla_lonja}</td>
                <td>${x.dev_tabla_lonja}</td>                
                <td>${x.adic_tabla_lonja}</td>              
                <td>${x.total_lonja}</td>
                <td>${x.codigo_lote}</td>
                </tr>
                `

                }
            })
        })
        .fail(function (jqXHR, textStatus, errorThrown) {

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se pudo procesar la solicitud ' + textStatus,
                confirmButtonColor: '#5ac15d',

            })
            console.log("La solicitud a fallado: " + textStatus);

        });

}
function LimpiarTablas() {
    theadReporteTablaGeneral.innerHTML = ``
    tbodyReporteTablaGeneral.innerHTML = ``
}