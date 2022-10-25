// REPORTE DE ESPEJUELO

let lote_espejuelo = document.getElementById('lote_espejuelo')
let azucarE = document.getElementById('azucarE')
let aceite_oliva = document.getElementById('aceite_oliva')
let pectina = document.getElementById('pectina')
/* let recortesE = document.getElementById('recortesE')
let dev_tablas = document.getElementById('dev_tablas') */
let marmitasEsp = document.getElementById('marmitasEsp')
let pailasEsp = document.getElementById('pailasEsp')
let brixEsp = document.getElementById('brixEsp')
// TABLAS
let metalicasEsp = document.getElementById('metalicasEsp')
let redondaEsp = document.getElementById('redondaEsp')


//VARIABLES PARA VISUALIZAR
let azucarEView = document.getElementById('azucarEView')
let aceite_olivaView = document.getElementById('aceite_olivaView')
let pectinaView = document.getElementById('pectinaView')
let marmitasEspView = document.getElementById('marmitasEspView')
let pailasEspView = document.getElementById('pailasEspView')
let brixEspView = document.getElementById('brixEspView')
let metalicasEspView = document.getElementById('metalicasEspView')
let redondaEspView = document.getElementById('redondaEspView')


let btnGuardarE = document.getElementById('btnGuardarE')
let reporteEspejuelo = {}

//variables de la tabla que meustra los registros que tiene un lote
let theadReporteEspejuelo = document.getElementById('theadReporteEspejuelo')
let tbodyReporteEspejuelo = document.getElementById('tbodyReporteEspejuelo')
let textoTituloReporteEspejuelo = document.getElementById('textoTituloReporteEspejuelo')


lote_espejuelo
    ? lote_espejuelo.addEventListener("change", () => {
        theadReporteEspejuelo.innerHTML = ``
        tbodyReporteEspejuelo.innerHTML = ``
        // console.log(lote_espejuelo.value);
        infoReportesPorCodigoEsp(lote_espejuelo.value)
    })
    : ''

function infoReportesPorCodigoEsp(codigo) {
    infoReporteEsp = { codigo: codigo }
    $.post("views/ajax/reportes_ajax.php", { infoReporteEsp }, function (dato) {
        let responses = JSON.parse(dato)
        console.log(responses);
        responses.forEach((y) => {
            console.log(y.id);
            theadReporteEspejuelo.innerHTML = `
            <tr>
            <th>Visualizar</td>          
            <th>Fecha registro</td>
            </tr>
            `
            tbodyReporteEspejuelo.innerHTML += `
            <tr>
            <td><button type="button" data-id="${y.id}" class="extraerIdEsp btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal_espejuelo">
            <i class="bi bi-eye-fill"></i>
            </button></td>
            <td>${y.fecha_fabricacion}</td>
            </tr>
            `
        });

        const extraerIdEsp = document.querySelectorAll('.extraerIdEsp')
        extraerIdEsp.forEach((el) => {
            el.addEventListener("click", (e) => {
                idE = el.dataset.id
              //  console.log(idB);
                idregistroEsp = { id: idE }
                //se envia al ajax
                $.post("views/ajax/reportes_ajax.php", { idregistroEsp }, function (dato) {
                    let response = JSON.parse(dato)
                    //console.log(response);
                    textoTituloReporteEspejuelo.innerText = `Lote ${response.codigo_lote} Fecha: ${response.fecha_fabricacion}`
                    azucarEView.value = response.azucar
                    aceite_olivaView.value = response.aceite_oliva
                    pectinaView.value = response.pectina
                    marmitasEspView.value = response.botes_marmitas
                    pailasEspView.value = response.botes_pailas
                    brixEspView.value = response.brix
                    metalicasEspView.value = response.tabla_metalica
                    redondaEspView.value = response.redonda

                })

            })

        })

    })
}


btnGuardarE
    ? btnGuardarE.addEventListener("click", guardarReporteEspejuelo)
    : ''

function guardarReporteEspejuelo() {
    if (lote_espejuelo.value == "0" ||
        azucarE.value.trim() == "" ||
        aceite_oliva.value.trim() == "" ||
        pectina.value.trim() == "" ||
        marmitasEsp.value.trim() == "" ||
        pailasEsp.value.trim() == "" ||
        brixEsp.value.trim() == "" ||
        metalicasEsp.value.trim() == "" ||
        redondaEsp.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Los campos no pueden estar vacios`,
            confirmButtonColor: '#157347',
        })
    } else {

        reporteEspejuelo = {
            codigo_lote: lote_espejuelo.value,
            id_usuario: id_usuario_oculto,
            azucar: azucarE.value,
            pectina: pectina.value,
            aceite_oliva: aceite_oliva.value,
            botes_marmitas: marmitasEsp.value,
            botes_pailas: pailasEsp.value,
            brix: brixEsp.value,
            tabla_metalica: metalicasEsp.value,
            redonda: redondaEsp.value
        }
        console.log(reporteEspejuelo);
        guarderRE()
    }
}
function guarderRE() {
    ;
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar reporte de espejuelo?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#157347',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
        confirmButtonText: '¿Registrar',
        cancelButtonText: 'Cancelar',
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
            //se envia al ajax
            $.post("views/ajax/reportes_ajax.php", { reporteEspejuelo }, function (dato) {
                console.log(dato);
            })
            Swal.fire({
                icon: 'success',
                title: `Registro guardado`,
                scrollbarPadding: false,
                heightAuto: false,
                showConfirmButton: true,
                confirmButtonColor: '#157347',
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
                    location.reload()
                }
            })
        }
    })
}