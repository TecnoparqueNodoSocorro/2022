

let logo_emp = document.getElementById('logo_emp')
let formulario_post_cliente = document.querySelector('#formulario_post_cliente')

formulario_post_cliente ? formulario_post_cliente.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))


    console.log(data);
    let { name_emp, nit_emp, replegal_emp, ciudad_emp, direccion_emp, tel_emp, email_emp, password_emp, confirm_password_emp } = data

    console.log(name_emp.trim());
    if (name_emp.trim() == "" || nit_emp.trim() == "" || replegal_emp.trim() == "" || ciudad_emp.trim() == "" || direccion_emp.trim() == "" || tel_emp.trim() == "" || email_emp.trim() == "" || password_emp.trim() == "" || confirm_password_emp.trim() == "") {

        DatosIncompletos()
    } else if (confirm_password_emp.trim() != password_emp.trim()) {
        Swal.fire({
            icon: 'error',
            title: `Las contraseñas no coinciden`,
            showConfirmButton: true,
            confirmButtonColor: '#0d6efd',
            scrollbarPadding: false,
            heightAuto: false,
        })
    } else {
        PostCliente()

    }
} : ''






function PostCliente() {

    Swal.fire({
        title: 'Listo',
        text: `¿Guardar cliente?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        scrollbarPadding: false,
        heightAuto: false,
        cancelButtonColor: '#a20202',
        confirmButtonText: 'Guardar',
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
            //AL DARLE CLICK A CAMBIAR SE ENVIAN LOS DATOS DEL JSON 
            $.ajax({
                type: 'POST',
                url: 'views/ajax/clientes_ajax.php',
                data: new FormData(formulario_post_cliente),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            })
            .fail(function() {
                alert( "error" );
              })
            Swal.fire({
                icon: 'success',
                title: `Cliente guardado`,
                showConfirmButton: true,
                scrollbarPadding: false,
                heightAuto: false,
                confirmButtonColor: '#a20202',
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










//funcion para mostrar cuando a un formulario le falte algun dato
function DatosIncompletos() {
    Swal.fire({
        icon: 'error',
        title: `Datos incompletos`,
        showConfirmButton: true,
        confirmButtonColor: '#0d6efd',
        scrollbarPadding: false,
        heightAuto: false,
    })
}

validarImagen(logo_emp)
function validarImagen(fileInput) {

    fileInput ? fileInput.addEventListener('change', function () {
        var filePath = this.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        var sizeByte = this.files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        console.log(siezekiloByte);
        if (!allowedExtensions.exec(filePath)) {
            Swal.fire({
                title: 'Error de formato',
                text: `Por favor seleccione un archivo de imagen valido (JPEG/JPG/PNG)`,
                icon: 'error',
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',

            })
            fileInput.value = '';
            return false;
        } if (siezekiloByte > 650) {
            Swal.fire({
                title: 'Máximo 600 kb',
                text: `Por favor seleccione un tamaño de imagen más pequeña`,
                icon: 'error',
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',

            })
            fileInput.value = '';
            return false;
        }
    }) : ''
}

