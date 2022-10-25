// VARIABLES PARA EL  ESCALDADO DE GUAYABA
let escaldadoGuayaba = {}
let lote_escaldada = document.getElementById('lote_escaldada')
let desperdicio = document.getElementById('desperdicio')
let desinfectante = document.getElementById('desinfectante')
let escaldada = document.getElementById('escaldada')
let guayaba_verde = document.getElementById('guayaba_verde')

let btnGuardarEsc = document.getElementById('btnGuardarEsc')


//seleccionar el lote al que se le va a registrar la escaldada
let select_lote_escaldado = document.getElementById('select_lote_escaldado')

//texto que va a mostrar el peso total de cada lote que se seleccione
let textoPesoLote = document.getElementById('textoPesoLote')


//tabla para mostrar los registros
let theadRegistros = document.getElementById('theadRegistros')
let tbodyRegistros = document.getElementById('tbodyRegistros')
let theadRegistrosSumatoria = document.getElementById('theadRegistrosSumatoria')
let tbodyRegistrosSumatoria = document.getElementById('tbodyRegistrosSumatoria')



// FUNCION QUE SE EJECUTA AL SELECCIONAR EL LOTE
select_lote_escaldado ? select_lote_escaldado.addEventListener("change", () => {
    //vaciar la tabla para no concatenar los registros
    theadRegistros.innerHTML = ``
    tbodyRegistros.innerHTML = ``

    theadRegistrosSumatoria.innerHTML = ``
    tbodyRegistrosSumatoria.innerHTML = ``


    //mostrar el span donde se va a mostrar la cantidad de kilos que tiene ese lote

    textoPesoLote.style.display = "block"
    textoPesoLote.style.fontWeight = "700"


    //guardar el codigo de cada lote con el evento change y asignarlo a una variable
    codigo = select_lote_escaldado.value
    if (codigo == "0") { //validar que el value del select no sea 0
        textoPesoLote.style.display = "none"
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Seleccione un lote`,
            confirmButtonColor: '#157347',
        })
    }
    //enivar  info al ajax-------------------------------------
    codigoLote = { codigo: codigo }
    $.post("views/ajax/lotes_ajax.php", { codigoLote }, function (dato) {
        let text = JSON.parse(dato);
        console.log(text);
        //mostrar la cantidad de kilos del lote
        textoPesoLote.innerText = `Lote con un peso total de ${text.peso} Kg`
    })
    //----------------------------------------------------------------------


    //-----------dibujar tabla de registros-------------
    escaldadosByCodigo = { codigo: codigo }
    $.post("views/ajax/escaldado_ajax.php", { escaldadosByCodigo }, function (data) {
        let response = JSON.parse(data);
        console.log(response);
        let total_desperdicio = response.reduce((x, y) => x += parseFloat(y.desperdicio), 0)
        let total_desifentante = response.reduce((x, y) => x += parseFloat(y.desinfectante), 0)
        let total_escaldada = response.reduce((x, y) => x += parseFloat(y.escaldada), 0)
        let total_cantidad_verde = response.reduce((x, y) => x += parseFloat(y.cantidad_verde), 0)


        console.log(total_desperdicio);
        response.forEach(x => {
            theadRegistros.innerHTML = `
            <tr>
            <th>Desperd.</th>
            <th>Desinfect.</th>
            <th>Escaldada</th>
            <th>Guaya. verde</th>
            <th>Usuario</th>
            <th>Fecha</th>
            </tr>
            `
            tbodyRegistros.innerHTML += `
            <tr>
            <td>${x.desperdicio} kg</td>
            <td>${x.desinfectante} ml</td>
            <td>${x.escaldada} kg</td>
            <td>${x.cantidad_verde} kg</td>
            <td>${x.nombres + " " + x.apellidos}</td>
            <td>${x.fecha_escaldado}</td>
            </tr>
            `
            theadRegistrosSumatoria.innerHTML = `
            <tr>
            <th>Total Desperd.</th>
            <th>Total Desinfect.</th>
            <th>Total Escaldada</th>
            <th>Total Guaya. verde</th>
            </tr>
            `

            tbodyRegistrosSumatoria.innerHTML = `
            <tr>
            <td>${total_desperdicio.toFixed(2)} kg</td>
            <td>${total_desifentante} ml</td>
            <td>${total_escaldada.toFixed(2)} kg</td>
            <td>${total_cantidad_verde.toFixed(2)} kg</td>
            </tr>
            `
        });
    })
    //---------------------------------------------------------

}) : ''



btnGuardarEsc
    ? btnGuardarEsc.addEventListener("click", guardar_escaldado)
    : ''

function guardar_escaldado() {
    if (select_lote_escaldado.value == "0" || desperdicio.value.trim() == "" || desinfectante.value.trim() == "" || escaldada.value.trim() == "" || guayaba_verde.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Los campos no pueden estar vacios`,
            confirmButtonColor: '#157347',
        })
    } else {
        escaldadoGuayaba = { id_usuario: id_usuario_oculto, codigo_lote: select_lote_escaldado.value, desperdicio: desperdicio.value, desinfectante: desinfectante.value, escaldada: escaldada.value, guayaba_verde: guayaba_verde.value }
        console.log(escaldadoGuayaba)
        guardar()
    }
}

function guardar() {
    Swal.fire({
        title: 'Listo',
        text: `Registrar proceso de escaldado?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#157347',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
        confirmButtonText: 'Registrar',
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
            $.post('views/ajax/escaldado_ajax.php', { escaldadoGuayaba })
                .done(function (msg) {
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
                })


        }
    })
}