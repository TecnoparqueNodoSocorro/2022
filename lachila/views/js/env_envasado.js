let btnAgregarCantidad = document.getElementById("btnAgregarCantidad")
let envase = document.getElementById("envaseEnv")
let cantidad = document.getElementById("cantidad")

let theadEnv = document.getElementById("theadEnv")
let tbodyEnv = document.getElementById("tbodyEnv")

const btnEnv = document.querySelectorAll(".btnEnv")
btnEnv.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {

        //limpiar tabla

        // console.log(el.dataset.id);
        //atributos data, CODIGO DEL LOTE Y FASE PARA USARLO EN EL LISTADO DE REGISTROS DEL LOTE
        id = el.dataset.id
        codigo = el.dataset.codigo

        //titulo del modal con el codigo del lote
        document.getElementById('tituloEnv').innerText = `Lote: ${codigo}`
        //console.log(id);
        //ListarEnvases(id, theadEnv, tbodyEnv)
        //limpiar tabla
        theadEnv.innerHTML = ""
        tbodyEnv.innerHTML = ""
        getEnv = { id: id, id_usuario: usuarioLogueado }
        //console.log(getEnv)
        $.post("views/ajax/envasado_ajax.php", { getEnv }, function (dato) {
            response = JSON.parse(dato)
            //console.log(response);
            response.forEach(x => {
                theadEnv.innerHTML = `
            <tr>
            <th>Código Lote</th>
            <th>Envase</th>
           <!-- <th>Usuario</th>-->
            <th>Cantidad</th>
            </tr>
            `
                tbodyEnv.innerHTML += `
            <tr>
            <td>${x.codigo}</td>
            <td>${x.capacidad}ml</td>
            <!-- <td>${x.nombres + " " + x.apellidos}</td>-->
            <td>${x.cantidad} </td>
            </tr>
            `
            })
        })
    })
})
btnAgregarCantidad ? btnAgregarCantidad.addEventListener("click", PostEnvasados) : ''


//FUNCION GUARDAR DATOS DE ENVASES
function PostEnvasados() {
    if (envase.value == "0" || cantidad.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite los campos',
        })
    } else {
        postEnvase = { lote_id: id, envase: envase.value, id_usuario: usuarioLogueado, cantidad: cantidad.value }
        //console.log(postEnvase);

        Swal.fire({
            title: 'Listo',
            text: `Registrar ${cantidad.value} envases de ${envase.options[envase.selectedIndex].text} del lote ${codigo}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Registrar',
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
                $.post("views/ajax/envasado_ajax.php", { postEnvase }, function (dato) {
                    console.log(dato);
                })
                setTimeout(function () {
                    location.reload()

                }, 1200);
                Swal.fire({

                    icon: 'success',
                    title: `Registro guardado`,
                    confirmButtonColor: '#d33',
                    showConfirmButton: true,
                    timer: 1200,
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
}
