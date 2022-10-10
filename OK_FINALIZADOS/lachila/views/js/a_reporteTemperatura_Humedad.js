//se declara la varible chart de manera global para poder destruir el grafico al crear otro grafica
let chart
let chartF2

//-----------------fechas para las graficas de la primer fermentacion-------------------------
let fec_inicio = document.getElementById("fecha_inicioG")
let fec_fin = document.getElementById("fecha_finG")
//----------------//----------------//----------------//----------------//----------------//----------------

//-----------------fechas para las graficas de la segunda fermentacion-------------------------
let fec_inicioF2 = document.getElementById("fecha_inicioGF2")
let fec_finF2 = document.getElementById("fecha_finGF2")
//----------------//----------------//----------------//----------------//----------------//----------------


//-------------------grafica para los lotes que estan en primera fermentacion- se le agrega a cada boton con el evento onclick--------------------------------
function GenerarGrafica() {
    if (fec_inicio.value.trim() == "" || fec_fin.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione las fechas correctamente',
            confirmButtonColor: '#a20202',
        })
    } else {
        //se muestra el div donde va en grafico porque se inicializa oculto
        document.getElementById("div_grafica").style.display = "block";
        //las variables del codigo y fase del lote se extraen al momento de darle click al boton de abrir el modal
        DatosGrafica = { cod: codigo, state: estado, inicio: fec_inicio.value, fin: fec_fin.value }

        $.post("views/ajax/variables_ajax.php", { DatosGrafica }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);

            //GENERAR GRAFICO FUNCIONANDO 100%
            //se extraen las fechas recorriendo el response y agregandolas en cada iteracion a un array
            const temp = response.map(function (e) {
                return e.temperatura;
            });
            //se extraen las cantidades recorriendo el response y agregandolas en cada iteracion a un array
            const fechas = response.map(function (e) {
                return e.fecha_registro;
            });

            //se extraen las fechas recorriendo el response y agregandolas en cada iteracion a un array
            const hume = response.map(function (e) {
                return e.humedad;
            });
            //se extraen el alcohol recorriendo el response y agregandolas en cada iteracion a un array
            const alcohol = response.map(function (e) {
                return e.alcohol;
            });
            //se extraen el brix recorriendo el response y agregandolas en cada iteracion a un array
            const brix = response.map(function (e) {
                return e.brix;
            });
            //se trae el canvas
            const canvas = document.querySelector('#myChart');
            const ctx = canvas.getContext('2d');

            //si existe el grafico, lo borra para crear uno nuevo
            if (chart) {
                chart.destroy();
            } chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Temperatura',
                        data: temp,
                        backgroundColor: 'rgb(255, 59, 36)',
                        label: 'Temperatura',
                        borderColor: 'rgb(255, 59, 36)',

                        pointStyle: 'circle',
                        pointRadius: 2,
                        pointHoverRadius: 3
                    },
                    {
                        label: 'Humedad',
                        data: hume,
                        backgroundColor: 'rgb(255, 182, 56)',
                        label: 'Humedad',
                        borderColor: 'rgb(255, 182, 56)',
                        pointStyle: 'circle',
                        pointRadius: 4,
                        pointHoverRadius: 5
                    },
                    {
                        label: 'Alcohol',
                        data: alcohol,
                        borderColor: 'rgb(48, 255, 149)',
                        label: 'Alcohol',
                        borderColor: 'rgb(48, 255, 149)',
                        pointStyle: 'circle',
                        pointRadius: 4,
                        pointHoverRadius: 5
                    },
                    {
                        label: 'Brix',
                        data: brix,
                        backgroundColor: 'rgb(10, 130, 255)',
                        label: 'Brix',
                        borderColor: 'rgb(10, 130, 255)',
                        pointStyle: 'circle',
                        pointRadius: 4,
                        pointHoverRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,

                        }
                    }
                }
            });


        })
    }



}
//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------
//-------------------grafica para los lotes que estan en segunda fermentacion- se le agrega a cada boton con el evento onclick--------------------------------
function GenerarGraficaF2() {

    if (fec_inicioF2.value.trim() == "" || fec_finF2.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione las fechas correctamente',
            confirmButtonColor: '#a20202',
        })
    } else {
        //se muestra el div donde va en grafico porque se inicializa oculto
        document.getElementById("div_graficaF2").style.display = "block";
        //las variables del codigo y fase del lote se extraen al momento de darle click al boton de abrir el modal
        DatosGrafica = { cod: codigo, state: estado, inicio: fec_inicioF2.value, fin: fec_finF2.value }
        // console.log(DatosGrafica);
        $.post("views/ajax/variables_ajax.php", { DatosGrafica }, function (dato) {
            let response = JSON.parse(dato)
            //  console.log(response);

            //GENERAR GRAFICO FUNCIONANDO 100%
            //se extraen las fechas recorriendo el response y agregandolas en cada iteracion a un array
            const temp = response.map(function (e) {
                return e.temperatura;
            });
            //se extraen las cantidades recorriendo el response y agregandolas en cada iteracion a un array
            const fechas = response.map(function (e) {
                return e.fecha_registro;
            });

            //se extraen las fechas recorriendo el response y agregandolas en cada iteracion a un array
            const hume = response.map(function (e) {
                return e.humedad;
            });

            const canvas = document.querySelector('#myChartF2');
            const ctx = canvas.getContext('2d');

            //si existe el grafico, lo borra para crear uno nuevo
            if (chart) {
                chart.destroy();
            } chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: 'Temperatura',
                        data: temp,
                        backgroundColor: 'rgb(203, 50, 52)'
                    },
                    {
                        label: 'Humedad',
                        data: hume,
                        backgroundColor: 'rgb(62, 95, 138)'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
                        }
                    }
                }


            });


        })
    }



}
//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------


//funcion para que al ocultar la grafica la destruya, se esconda el div y vacie los campos de las fechas
function OcultarGrafica() {
    document.getElementById("div_grafica").style.display = "none";
    fec_fin.value = ""
    fec_inicio.value = ""

    //si existe un grafico, entonces que al cerrar el modal se destruya
    chart ? chart.destroy() : ""

}
//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------
//funcion para que al ocultar la grafica la destruya, se esconda el div y vacie los campos de las fechas
function OcultarGraficaF2() {
    document.getElementById("div_graficaF2").style.display = "none";
    fec_finF2.value = ""
    fec_inicioF2.value = ""

    //si existe un grafico, entonces que al cerrar el modal se destruya
    chartF2 ? chartF2.destroy() : ""
}
//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------