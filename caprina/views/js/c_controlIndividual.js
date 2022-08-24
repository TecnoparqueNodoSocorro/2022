let codigo_caprino_control = document.getElementById('codigo_caprino_control')
let tbodyControl = document.getElementById('tbodyControl')
let btnTraer = document.getElementById('btnTraer')

if (codigo_caprino_control) {
    codigo_caprino_control.addEventListener("change", () => {
        LimpiarTabla()
        console.log(codigo_caprino_control.value);
        controlIndividual = { codigo_caprino_control: codigo_caprino_control.value }
        traerDatosCaprino()
    })
}

function traerDatosCaprino() {


    $.post("views/ajax/caprino_ajax.php", { controlIndividual }, function (dato) {
        let response = JSON.parse(dato)
        console.log(response);
        tbodyControl.innerHTML += `
        <tr>
        <td><button type="button" id="controlInfo" class="getInfo btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalDatos">
        Opciones </button></td>
        <td>${response.codigo}</td>
        <td>${response.raza}</td>
        <td>${response.fecha_nacimiento}</td>
        </tr>
        `
        const getInfo = document.querySelectorAll(".getInfo")
        getInfo.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {

                console.log(codigo_caprino_control.value);

                let headControl = document.getElementById('headControl')
                headControl.innerHTML = `Caprino con codigo: ${codigo_caprino_control.value}`

            })
        })
    })




}

function LimpiarTabla() {
    tbodyControl.innerHTML = ``
}


// -----------------------------------CONTROL INDIVIDUAL ENFERMEDADES------------------------------------------------
let peso_kilos = document.getElementById('peso_kilos')
//id usuario TRAIDO DE LA PLANTILLA
let id_users = id_userOculto.value;
let condicion = document.getElementById('condicion')
let textER = document.getElementById('textER')
let textEG = document.getElementById('textEG')
let textEM = document.getElementById('textEM')



let btnGuardarD = document.getElementById('btnGuardarD')
if (btnGuardarD) {
    btnGuardarD.addEventListener("click", () => {
        RegistrarEnfermedades()
    })
}



function RegistrarEnfermedades() {
    // VALIDAS DATOS
    if (peso_kilos.value.trim() == "" || condicion.value == "Seleccione la condición") {
        DatosIncompletos()
    } else {
        GuardarRegistro()
    }
}


function GuardarRegistro() {

    const caprinoRegistro = { peso: peso_kilos.value, condicion: condicion.value, enfermedad_respiratoria: textER.value, enfermedad_gastrointestinal: textEG.value, enfermedad_mordeduras: textEM.value, usuario: id_users, caprino: codigo_caprino_control.value }
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar nuevo control al caprino con código: ${codigo_caprino_control.value}?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#f69100',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Registrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("views/ajax/caprino_control_ajax.php", { caprinoRegistro }, function (dato) {
                let response = (dato)
                console.log(response);
                setTimeout(function () {
                    location.href = 'index.php?page=c_registroControlIndividual'
                }, 1200);

            })
            CerrarModal()
            Swal.fire({
                icon: 'success',
                title: `Nuevo control registrado `,
                showConfirmButton: false,
                timer: 1200
            })

        }

    })
}

//FUNCION  PARA CERRAR EL MODAL COMO PARA DEJAR EN FALSO EL CHECKEO DE LOS CHECKBOX
function CerrarModal() {
    $('#ModalDatos').on('hidden.bs.modal', function () {
        $(this).find("input,textarea").val('').end()
        $(this).find("select").val('0').end()

        $('#checkMor').prop('checked', false)
        $('#checkGas').prop('checked', false)
        $('#checkRes').prop('checked', false)
            .find("input[type=checkbox], input[type=radio]")
        $("#textEM").prop('disabled', true)
        $("#textEG").prop('disabled', true)
        $("#textER").prop('disabled', true)

            //.prop("checked", "")
            .end()
    });
}
CerrarModal()


//----------------CHECKBOX DEL MODAL DE LAS ENFERMEDADES AL CERRAR SIEMPRE QUEDE EN FALSO EL

let checkboxRes = document.getElementById('checkRes')
let checkboxGas = document.getElementById('checkGas');
let checkboxMor = document.getElementById('checkMor');

if (checkboxRes) {
    checkboxRes.addEventListener("change", validaCheckbox, false);
    validaCheckbox()
}
if (checkboxGas) {
    checkboxGas.addEventListener("change", validaCheckbox, false);
    validaCheckbox()
}
if (checkboxMor) {
    checkboxMor.addEventListener("change", validaCheckbox, false);
    validaCheckbox()
}

function validaCheckbox() {
    let check1 = checkboxRes.checked;
    let check2 = checkboxGas.checked;
    let check3 = checkboxMor.checked;

    if (check1) {
        textER.disabled = false
    } else {
        textER.disabled = true
        textER.value = ""
    }
    if (check2) {
        textEG.disabled = false
    } else {
        textEG.disabled = true
        textEG.value = ""
    }
    if (check3) {
        textEM.disabled = false
    } else {
        textEM.disabled = true
        textEM.value = ""
    }
}

//--------------------------------------------------------------------
