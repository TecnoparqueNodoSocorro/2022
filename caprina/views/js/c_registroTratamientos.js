//id usuario quemado
let id_usu = 1;

let tratamiento = document.getElementById('tratamiento')
let btnGuardarT = document.getElementById('btnGuardarT')
let fecha_inicio_tratamiento = document.getElementById('fecha_inicio_tratamiento')
let caprino_tratamiento_select = document.getElementById('caprino_tratamiento_select')
let tbodyTratamientos = document.getElementById('tbodyTratamientos')

let caprinos = {}
let caprinosSeleccion = []

if (caprino_tratamiento_select) {
    caprino_tratamiento_select.addEventListener("change", () => {
        codigo = { codigo: caprino_tratamiento_select.value }
        console.log(codigo);
        tbodyTratamientos.innerHTML = ``
        TraerCaprino()
    })

}


function TraerCaprino() {
    $.post("views/ajax/caprino_ajax.php", { codigo }, function (dato) {
        let response = JSON.parse(dato)
        console.log(response);


        let indice = caprinosSeleccion.findIndex((x) => x.codigo === response.codigo)
        if (caprinosSeleccion.length === 0) {
            caprinosSeleccion.push(response)
        } else if (indice === -1) {
            caprinosSeleccion.push(response)
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Caprino ya agregado',
                confirmButtonColor: '#f69100',
            })
        }

        console.log(caprinosSeleccion);
        caprinosSeleccion.map(x => {
            tbodyTratamientos.innerHTML += `
        <tr>
        <td>${x.codigo}</td>
        <td>${x.raza}</td>
        <td>${x.fecha_nacimiento}</td>   
        </tr>
        `

        })

    })
}





if (btnGuardarT) {
    btnGuardarT.addEventListener("click", () => {
        if (tratamiento.value.trim() == "" || caprinosSeleccion.length == 0 || fecha_inicio_tratamiento.value.trim() == "") {
            DatosIncompletos()
        } else {
            //   caprinos = { descripcion_tratamiento: tratamiento.value, caprinos_tratamiento: caprinosSeleccion, fecha_inicio: fecha_inicio_tratamiento.value }
            //   console.log(caprinos);
            GuardarIDtraramiento()
        }

    })
}
async function GuardarIDtraramiento() {
    const datosTratamiento = {
        id_usuario: id_usu,
        descripcion: tratamiento.value, fecha_inicio: fecha_inicio_tratamiento.value
    }
    if (caprinosSeleccion.length > 0) {
        const idTratamiento = await $.post("views/ajax/caprino_ajax.php", { datosTratamiento });
        console.log(idTratamiento);
        let response = JSON.parse(idTratamiento)
        let id = parseInt(response.idTratamiento)
        // console.log(typeof id);
        guardarCaprinosTratamiento(id, caprinosSeleccion)
        Swal.fire({
            title: 'Listo',
            text: `Caprinos agregados al tratamiento #${id}`,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#f69100',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'OK',
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
                location.href = 'index.php?page=c_registroTratamientos'

            }
        })
    } else {
        DatosIncompletos()
    }
}

function guardarCaprinosTratamiento(id, caprinosSeleccion) {
    let caprinosTratamiento = JSON.stringify(caprinosSeleccion)
    console.log(caprinosTratamiento);
    $.post("views/ajax/caprino_ajax.php", { idtratatamiento: id, caprinos: caprinosTratamiento }, function (dato) {
        let res = JSON.parse(dato);
        console.log(res);


    })
}