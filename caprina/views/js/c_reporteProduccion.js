
//DATOS PARA LA GRÁFICA
let fecha1_gra = document.getElementById('fecha1_gra')
let fecha2_gra = document.getElementById('fecha2_gra')
let btnGenerarGrafica = document.getElementById('btnGenerarGrafica')

/* 
let datosGrafico
let fechas = []
let cantidades = []
 */
//se declara la varible chart de manera global para poder destruir el grafico al crear otro grafica
let chart

if (btnGenerarGrafica) {
    btnGenerarGrafica.addEventListener("click", () => {

        if (fecha1_gra.value.trim() == "" || fecha2_gra.value.trim() == "") {
            DatosIncompletos()
        } else {
            grafico = { id_usuario: id_userOculto.value, fecha_inicio: fecha1_gra.value, fecha_fin: fecha2_gra.value }

            $.post("views/ajax/reportes_ajax.php", { grafico }, function (dato) {
                res = JSON.parse(dato)
                console.log(res)
                //se extraen las fechas recorriendo el response y agregandolas en cada iteracion a un array
                const labels = res.map(function (e) {
                    return e.fecha_registro;
                });
                //se extraen las cantidades recorriendo el response y agregandolas en cada iteracion a un array
                const dataCantidad = res.map(function (e) {
                    return e.cantidad;
                });

                const canvas = document.querySelector('canvas');
                const ctx = canvas.getContext('2d');

                //si existe el grafico, lo borra para crear uno nuevo
                if (chart) {
                    chart.destroy();
                }
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cantidad de leche en litros',
                            data: dataCantidad,
                            backgroundColor: 'rgb(240, 188, 115)'
                        }]
                    }
                });

            })
        }

    })

}


function DatosIncompletos() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Datos incompletos',
        confirmButtonColor: '#f69100',
    })
}