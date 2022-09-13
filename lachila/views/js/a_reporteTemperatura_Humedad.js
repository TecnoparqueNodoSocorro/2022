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
            //console.log(response);

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
            //se trae el canvas
            const canvas = document.querySelector('#myChart');
            const ctx = canvas.getContext('2d');

            //si existe el grafico, lo borra para crear uno nuevo
            if (chart) {
                chart.destroy();
            } chart = new Chart(ctx, {
                type: 'bar',
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
                type: 'bar',
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