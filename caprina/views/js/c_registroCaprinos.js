
//---------------------------------- REGISTRO  DE CAPRINOS-------------------------------------------------------------------
let id_usuario = id_userOculto.value;


let raza = document.getElementById('raza')

//select con el origen del caprino
let origen = document.getElementById('origen')
//----------------------------------
let fecha_nac = document.getElementById('fecha_nac')
let codigoC = document.getElementById('codigo')


//SELECT QUE MUESTRA EL CODIGO DE LAS MADRES
let codigo_madre = document.getElementById('codigo_madre')
//----------------------select genero macho------------------
let CaprinoCapado = document.getElementById('CaprinoCapado')
//------------------------------------------------------------

//----------------------select genero hembra------------------
let CaprinoParto = document.getElementById('CaprinoParto')
//------------------------------------------------------------


let nuevoCaprino = {}
let btnRegistrarCaprino = document.getElementById('btnRegistrarCaprino')
//BOTON QUE EJECUTA LA FUNCION DE REGISTRAR CAPRINOS
btnRegistrarCaprino ? btnRegistrarCaprino.addEventListener("click", RegistrarCaprinos) : ''


//------------select seleccion del genero del caprino-----------
let CaprinoGenero = document.getElementById('CaprinoGenero')
//-------------------------------------------------------------







//------------mostrar div para colocar el codigo de la madre--------------------------------
function MostrarDivCodigoMadre() {
    document.getElementById("divCodigoMadre").style.display = 'block';
    caprinos_hembras.value = "0"

}
//----------------------------------------------------------------------------------------------

//------------ocultar div para colocar el codigo de la madre--------------------------------
function OcultarDivCodigoMadre() {
    document.getElementById("divCodigoMadre").style.display = 'none';
}
//----------------------------------------------------------------------------------------------

//Cada cambio del select del origen oculta o muestra el div ejecutando la funcion
//se hace un condicional ternario
origen ? origen.addEventListener("change", () => {
    //cada se mueva el select del origen, el select del genero vuelve a la posicion inicial
    CaprinoGenero.value = "0"
    switch (origen.value) {
        case '2':
            //EN CADA CAMBIO DEL SELECT DE ORIGEN SE OCULTAN LOS DIV DE INFORMACION DEL GENERO
            //SI SE ESCOLA OPCION 2 QUE ES ORIGEN NACIDO SE MUESTRA EL SELECT QUE TIENE TODOS LOS CODIGOS DE LAS HEMBRAS
            MostrarDivCodigoMadre()
            OcultarDivGenero()
            break;
        case '1':
            //EN CADA CAMBIO DEL SELECT DE ORIGEN SE OCULTAN LOS DIV DE INFORMACION DEL GENERO
            //EN CADA CAMBIO DEL SELECT SE OCULTA EL DIV QUE GUARDA EL SELECT CON LOS CODIGOS DE LAS CAPRINOS HEMBRAS
            OcultarDivCodigoMadre()
            OcultarDivGenero()
            break;
        case '3':
            //EN CADA CAMBIO DEL SELECT DE ORIGEN SE OCULTAN LOS DIV DE INFORMACION DEL GENERO
            //EN CADA CAMBIO DEL SELECT SE OCULTA EL DIV QUE GUARDA EL SELECT CON LOS CODIGOS DE LAS CAPRINOS HEMBRAS
            OcultarDivCodigoMadre()
            OcultarDivGenero()
            break;
        case '4':
            //EN CADA CAMBIO DEL SELECT DE ORIGEN SE OCULTAN LOS DIV DE INFORMACION DEL GENERO
            //EN CADA CAMBIO DEL SELECT SE OCULTA EL DIV QUE GUARDA EL SELECT CON LOS CODIGOS DE LAS CAPRINOS HEMBRAS
            OcultarDivCodigoMadre()
            OcultarDivGenero()
            break;
        default:
            //EN CADA CAMBIO DEL SELECT DE ORIGEN SE OCULTAN LOS DIV DE INFORMACION DEL GENERO
            //EN CADA CAMBIO DEL SELECT SE OCULTA EL DIV QUE GUARDA EL SELECT CON LOS CODIGOS DE LAS CAPRINOS HEMBRAS
            OcultarDivCodigoMadre()
            OcultarDivGenero()
    }
}) : ''
//----------------------------------------------------------------------------------------------

//------------mostrar div si el genero del caprino es macho--------------------------------
function MostrarDivGeneroMacho() {
    //SE RESETEAN LOS VALORES DE SI EL CAPRINO ES CAPADO O NO Y DE SI UA TUVO PARTOS O NO
    CaprinoCapado.value = "0"
    CaprinoParto.value = "0"
    //SI EL CAPRINO ES DE ORIGEN NACIDO SE OCULTAN LOS DOS DIV, UNO SI YA TUVO PARTOS Y EL OTRO SI ES CAPADO O NO PORQUE ES RECIEN NACIDO
    if (origen.value == "2") {
        document.getElementById("DivGeneroMacho").style.display = 'none';
        document.getElementById("DivGeneroHembra").style.display = 'none';
    } else {
        //SI EL ORIGEN ES CUALQUIER OTRO ENTONCES SE MUESTRA EL DIV DE SI ES CAPADO O NO
        document.getElementById("DivGeneroMacho").style.display = 'block';
        document.getElementById("DivGeneroHembra").style.display = 'none';
    }

}
//----------------------------------------------------------------------------------------------

//------------mostrar div si el genero del caprino es hembra--------------------------------
function MostrarDivGeneroHembra() {
    //SE RESETEAN LOS VALORES DE SI EL CAPRINO ES CAPADO O NO Y DE SI UA TUVO PARTOS O NO
    CaprinoCapado.value = "0"
    CaprinoParto.value = "0"
    //SI EL CAPRINO ES DE ORIGEN NACIDO SE OCULTAN LOS DOS DIV, UNO SI YA TUVP PARTOS Y EL OTRO SI ES CAPADO O NO PORQUE ES RECIEN NACIDO
    if (origen.value == "2") {
        document.getElementById("DivGeneroMacho").style.display = 'none';
        document.getElementById("DivGeneroHembra").style.display = 'none';
    } else {
        //SI EL ORIGEN ES CUALQUIER OTRO ENTONCES SE MUESTRA EL DIV DE SI YA TUVO PARTOS O NO
        document.getElementById("DivGeneroMacho").style.display = 'none';
        document.getElementById("DivGeneroHembra").style.display = 'block';
    }
}
//----------------------------------------------------------------------------------------------

//------------ocultar los dos div del genero del caprino- Y PONER RESETEAR LOS CAMPOS-------------------------------
function OcultarDivGenero() {
    document.getElementById("DivGeneroHembra").style.display = 'none';
    document.getElementById("DivGeneroMacho").style.display = 'none';
    CaprinoCapado.value = "0"
    CaprinoParto.value = "0"
}
//----------------------------------------------------------------------------------------------



//Cada cambio del select del genero oculta o muestra el div ejecutando la funcion 
CaprinoGenero ? CaprinoGenero.addEventListener("change", () => {
    switch (CaprinoGenero.value) {
        case 'macho':
            MostrarDivGeneroMacho()
            break;
        case 'hembra':
            MostrarDivGeneroHembra()
            break;

        default:
            OcultarDivGenero()
    }
}) : ''
//----------------------------------------------------------------------------------------------

//-----SELECT QUE MUESTRA LOS CAPRINO QUE SEAN DE GENERO HEMBRAS  PARA GUARDAR EL CODIGO DE LA MADRE---------------------------------------------
let caprinos_hembras = document.getElementById('caprinos_hembras')
//----------------------------------------------------------------------------------------------


function RegistrarCaprinos() {

    if (codigoC.value == "" || raza.value == "0" || origen.value == "0" || fecha_nac.value.trim() == "") {

        DatosIncompletos()
    } else if (origen.value == "2" && caprinos_hembras.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite el código de la madre del caprino',
            confirmButtonColor: '#f69100',
        })
        //SI NO SE HA SELECCIONADO EL ORIGEN
    } else if (CaprinoGenero.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione el género del caprino',
            confirmButtonColor: '#f69100',
        })
        //SI EL ORIGEN NO ES NACIDO Y NO HA SELECCIONADO SI ES CAPADO O NO
    } else if (CaprinoGenero.value == "macho" && origen.value != "2" && CaprinoCapado.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione si el caprino está capado o no',
            confirmButtonColor: '#f69100',
        })
        //SI EL ORIGEN NO ES NACIDO Y NO HA SELECCIONADO SI HA TENIDO PARTOS O NO
    } else if (CaprinoGenero.value == "hembra" && origen.value != "2" && CaprinoParto.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione si el caprino ya tuvo un parto o no',
            confirmButtonColor: '#f69100',
        })
        //SI ES MACHO SE ENVIA COMO DATO LA INFO DE SI ES CAPADO O NO
    } else if (CaprinoGenero.value == "macho") {
        //SI EL CAPRINO ES MACHO SE ENVIA EN LA PETICION EN EL CAMPO DE DATO SI ESTÁ CAPADO O NO
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        nuevoCaprino = {
            codigo: codigoC.value,
            raza: raza.options[raza.selectedIndex].text,
            origen: origen.options[origen.selectedIndex].text,
            fecha_nacimiento: fecha_nac.value,
            usuario: id_usuario,
            genero: CaprinoGenero.value,
            dato: CaprinoCapado.value,
            codigo_madre: caprinos_hembras.value
        }
        //  console.log(nuevoCaprino);
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        $.post("views/ajax/caprino_ajax.php", { nuevoCaprino }, function (dato) {
            let response = dato.trim()
              console.log(response);

            if (response == "ok") {
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo caprino registrado `,
                    showConfirmButton: true,
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
                        //SI SE CONFIRME REGARLA PAGINA
                        location.href = 'index.php?page=c_registroCaprinos'
                    }
                })
            } else if (response == "") {
                //AL AGREGAR UN CODIGO DE UN CAPRINO Y YA EXISTE EL CODIGO 
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Código ya existente',
                    confirmButtonColor: '#f69100',
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Contacte al administrador',
                    confirmButtonColor: '#f69100',
                })
            }
        })
        //SI ES HEMBRA SE ENVIA COMO DATO LA INFO DE SI HA TENIDO PARTOS ANTERIORMENTE O NO
    } else if (CaprinoGenero.value == "hembra") {
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        nuevoCaprino = {
            codigo: codigoC.value,
            raza: raza.options[raza.selectedIndex].text,
            origen: origen.options[origen.selectedIndex].text,
            fecha_nacimiento: fecha_nac.value,
            usuario: id_usuario,
            genero: CaprinoGenero.value,
            dato: CaprinoParto.value,
            codigo_madre: caprinos_hembras.value
        }
        //  console.log(nuevoCaprino);
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        $.post("views/ajax/caprino_ajax.php", { nuevoCaprino }, function (dato) {
            let response = dato.trim()
            //  console.log(response);

            if (response == "ok") {
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo caprino registrado `,
                    showConfirmButton: true,
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
                        //SI SE CONFIRME REGARLA PAGINA
                        location.href = 'index.php?page=c_registroCaprinos'
                    }
                })
            } else if (response == "") {
                //AL AGREGAR UN CODIGO DE UN CAPRINO Y YA EXISTE EL CODIGO 
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Código ya existente',
                    confirmButtonColor: '#f69100',
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Contacte al administrador',
                    confirmButtonColor: '#f69100',
                })
            }
        })
    }
}
//------------------------------------------------------------------------------------------------------------------------------------

//VOLVER DATA TABLE LA TABLA DE REPORTE DE CAPRINOS 
$(".rcaprinos_table").DataTable({
    /*  "lengthMenu": [[25, 50, -1], [25, 50, "All"]], */
    dom: "Bfrtip",
}); 

/* 
jQuery('.campoTel').keypress(function(tecla)

{

   if(tecla.charCode < 48 || tecla.charCode > 57)

   {

      return false;

   }

}); */
/* function NumText(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
} */
$('.campoTel').on('input', function() {
    $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
  });