//variables

let regEqui_cliente = document.getElementById('regEqui_cliente')

let regEqui_ubic = document.getElementById('regEqui_ubic')

regEqui_cliente ? regEqui_cliente.addEventListener("change", () => {
    regEqui_ubic.innerHTML = `<option selected>--Seleccionar ubicación</option> `
    traerUbicaciones(regEqui_cliente.value)
}) : ''

function traerUbicaciones(id) {
    $.ajax({
        data: { id_c: id },
        type: "POST",
        dataType: "json",
        url: "views/ajax/ubicaciones_ajax.php",
    }).done(function (data, textStatus, jqXHR) {
        console.log(data);
        data.forEach(x => {

            //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
            opcion = document.createElement('option')
            opcion.value = x.id
            opcion.text = x.nombre
            regEqui_ubic.add(opcion)
        })

    }).fail(function (jqXHR, textStatus, errorThrown) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se pudo procesar la solicitud ' + textStatus,
            confirmButtonColor: '#5ac15d',

        })

    });
}