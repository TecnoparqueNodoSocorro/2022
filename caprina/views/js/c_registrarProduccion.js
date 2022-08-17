//-------------------------------------------------REGISTRAR PRODUCCIÓN-----------------------------------------------------
let codigo_caprino = document.getElementById('caprino_produccion_select')
let cantidad_leche = document.getElementById('cantidad_leche')
let fecha_prod = document.getElementById('fecha_prod')
let btnAdicionar = document.getElementById('btnAdicionar')
let produccion = {}
if (btnAdicionar) {
    btnAdicionar.addEventListener("click", () => {
        if (codigo_caprino.value === 0 || cantidad_leche.value.trim() == "" || fecha_prod.value.trim() == "") {
            DatosIncompletos()
        } else {
            produccion = { codigo_caprino: codigo_caprino.value, cantidad: cantidad_leche.value, fecha: fecha_prod.value, usuario: id_usuario }
            $.post("views/ajax/produccion_ajax.php", { produccion }, function (dato) {
                let response = (dato)
                console.log(response);
            })
            Swal.fire({
                title: 'Listo',
                text: `${cantidad_leche.value} litros agregados del caprino con código: ${codigo_caprino.value}`,
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#f69100',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ok',

                allowOutsideClick: () => {
                    const popup = Swal.getPopup()
                    popup.classList.remove('swal2-show')
                    setTimeout(() => {
                        popup.classList.add('animate__animated', 'animate__headShake')
                    })
                    setTimeout(() => {
                        popup.classList.remove('animate__animated', 'animate__headShake')
                    }, 500)
                    return false
                }

            }).then((result) => {

                if (result.isConfirmed) {
                    location.href = 'index.php?page=c_registroProduccion'

                }
            })
        }
    })
}


//DATOS PARA LA GRÁFICA
let fecha1_gra = document.getElementById('fecha1_gra')
let fecha2_gra = document.getElementById('fecha2_gra')
let btnGenerarGrafica = document.getElementById('btnGenerarGrafica')
let datosGrafico

let fechas = []
let cantidades = []


if (btnGenerarGrafica) {
    btnGenerarGrafica.addEventListener("click", () => {
        if (fecha1_gra.value.trim() == "" || fecha2_gra.value.trim() == "") {
            DatosIncompletos()
        } else {
            grafico = { fecha_inicio: fecha1_gra.value, fecha_fin: fecha2_gra.value }

            $.post("views/ajax/reportes_ajax.php", { grafico }, function (dato) {
                res = JSON.parse(dato)
                console.log(res)
        

                const labels = res.map(function (e) {
                    return e.fecha_registro;
                });

                const dataCantidad = res.map(function (e) {
                    return e.cantidad;
                });

                const canvas = document.querySelector('canvas');
                const ctx = canvas.getContext('2d');

                const config = {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cantidad de leche en litros',
                            data: dataCantidad,
                            backgroundColor: 'rgb(240, 188, 115)'
                        }]
                    }
                };

                const chart = new Chart(ctx, config);
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