//variables
/* let p_session = document.getElementById("pag_session"); */
/* let p_cat = document.getElementById("pag_cat");
let p_item = document.getElementById("pag_item"); */
let p_img = document.getElementById("pag_img");
let p_titulo = document.getElementById("pag_titulo");
let p_descr = document.getElementById("pag_descr");
//
let c_sesion = document.getElementById("pag_sesion");
let c_categ = document.getElementById("pag_cat");
let c_items = document.getElementById("pag_item");


//---------------------------VARIABLES DEL CAMBIO DE ESTADO-----------------------------------------
//------------------------------------------------------------------------------------------------
//SPAN DE TEXTO DEL BODY DEL MODAL
let spanEstadoPagina = document.getElementById('p_bloquear_desb')
//INPUT OCULTO QUE GUARDA EL VALOR DE LA PAGINA
let estadoPagina = document.getElementById('estadoPagina')
//BOTON PARA BLOQUEAR O DESBLOQUEAR
let btnBloqDesbPag = document.getElementById("btn_bloq_desbloq_pag");
//------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------



//--------------------------VARIABLES PARA EDITAR LA PAGINA-----------------------------------------
////------------------------------------------------------------------------------------------------
let edit_c_sesion = document.getElementById("edit_pag_sesion");
let edit_c_categ = document.getElementById("edit_pag_cat");
let edit_c_items = document.getElementById("edit_pag_item");
let edit_pag_img = document.getElementById("edit_pag_img");
let edit_pag_titulo = document.getElementById("edit_pag_titulo");
let edit_pag_descr = document.getElementById("edit_pag_descr");
let btnEditPag = document.getElementById("btnEditPag");
//------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------



let p_datosarticulo = {};
let p_btnguardar = document.querySelector("#pag_btnguardar");

//-----------------------------CLICK DEL BOTON PARA CREAR PAGINA--------------------------------
if (p_btnguardar) {
    p_btnguardar.addEventListener("click", CrearArticulo)
}
//---------------------------------------------------------------------------------------------------

//-------------SELECT CREAR PAGINA-----------------------------------------------------------
//--------------------------------------------------------------------------------------------
if (c_sesion) {
    c_sesion.addEventListener("change", CBOcategoria)
}

if (c_categ) {
    c_categ.addEventListener("change", CBOitems)
}
//--------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------


// ----------------------------FUNCION crear articulo----------------------------
function CrearArticulo() {
    // SE VALIDA QUE LOS CAMPOS NO ESTEN VACIOS
    if (p_img.value.trim() == "" || p_titulo.value.trim() == "" || p_descr.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: `Datos incompletos`,
            showConfirmButton: true,
            confirmButtonColor: '#a20202',
        })
    } else {

        p_datosarticulo = {
            session_create: c_sesion.value,
            categoria_create: c_categ.value,
            item_create: c_items.value,
            product_img_create: p_img.value,
            titulo_prod_create: p_titulo.value,
            descr_producto_create: p_descr.value,
        }
        //AL DARLE CLICK AL BOTON DE GUARDAR LANZA ESTE MODAL
        Swal.fire({
            title: 'Listo',
            text: `¿Crear página?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Crear',
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
                //SI EL RESULTADO SE CONFIRMA EJECUTA LA FUNCIÓN PARA CREAR LA PAGINA
                postajaxP(p_datosarticulo);
                Swal.fire({
                    icon: 'success',
                    title: `Página creada`,
                    showConfirmButton: true,
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
};
//-----------------------------------------------------------------------------------------
//----------------------------FUNCION QUE ENVIA EL JSON Y REALIZA EL LLAMADO AL AJAX-------
function postajaxP(pag_datosarticulo) {
    $.post("views/ajax/bari_pagina.ajax.php", { pag_datosarticulo }, function (data) {
        /*  let response = JSON.parse(data);
         console.log(response); */
        console.log(data);
    });
}
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------



//------------ combo categoria CREAR PAGINA------------------------------------------------
function CBOcategoria() {
    console.log(c_sesion.value);
    let datasesion = {
        sesion: c_sesion.value
    }
    $.post("views/ajax/bari_pagina.ajax.php", { datasesion }, function (data) {
        let response = JSON.parse(data);
        console.log(response);
        c_categ.innerHTML = `<option selected>Seleccione Categoria</option> `
        response.forEach(x => {
            //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
            opcion = document.createElement('option')
            opcion.value = x.categoria
            opcion.text = x.categoria
            c_categ.add(opcion)
        })
    });
}
//------------------------------------------------------------------------------------------------

//-----------------combo items CREAR PAGINA------------------------------------------------
function CBOitems() {
    let datacateg = {
        categ: c_categ.value
    }
    $.post("views/ajax/bari_pagina.ajax.php", { datacateg }, function (data) {
        let response = JSON.parse(data);
        console.log(response);
        c_items.innerHTML = `<option selected> Seleccione el Item</option> `
        response.forEach(x => {

            //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
            opcion = document.createElement('option')
            opcion.value = x.item
            opcion.text = x.item
            c_items.add(opcion)
        })
    });
}
//------------------------------------------------------------------------------------------------




//-------------SELECT EDITAR PAGINA-------------------------------
edit_c_sesion ? edit_c_sesion.addEventListener("change", CBOeditcategoria) : ''



edit_c_categ ? edit_c_categ.addEventListener("change", CBOedit_items) : ''

//---------------------------------------------------------------------------

/* function llenarSelectEditar() {
    CBOeditcategoria()
    CBOedit_items()
} */

//-----------------------------combo categoria editar pagina-----------------------------------------
function CBOeditcategoria() {
    edit_c_categ.innerHTML = `<option selected>Seleccione Categoria</option> `
    edit_c_items.innerHTML = `<option selected> Seleccione el Item</option>`

    // console.log(edit_c_sesion.value);
    //SE CREA EL JSON
    let datasesion = {
        sesion: edit_c_sesion.value
    }
    //LLAMADO AL AJAX
    $.post("views/ajax/bari_pagina.ajax.php", { datasesion }, function (data) {
        let response = JSON.parse(data);
        //console.log(response);
        //  edit_c_categ.innerHTML = `<option selected>Seleccione Categoria</option> `
        response.forEach(x => {
            //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
            opcion = document.createElement('option')
            opcion.value = x.categoria
            opcion.text = x.categoria
            edit_c_categ.add(opcion)
        })
    });
}
//----------------------------------------------------------------------------------


//--------------combo items EDITAR PAGINA ------------------------------------------
function CBOedit_items() {
    edit_c_items.innerHTML = `<option selected> Seleccione el Item</option>`
    let datacateg = {
        categ: edit_c_categ.value
    }
    $.post("views/ajax/bari_pagina.ajax.php", { datacateg }, function (data) {
        let response = JSON.parse(data);
        console.log(response);
        // edit_c_items.innerHTML = `<option selected> Seleccione el Item</option> `
        response.forEach(x => {

            //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
            opcion = document.createElement('option')
            opcion.value = x.item
            opcion.text = x.item
            edit_c_items.add(opcion)
        })
    });
}
//------------------------------------------------------------






//----------EXTRAER EL ID DE CADA REGISTRO----------------
let btnPag = document.querySelectorAll(".pag");
btnPag.forEach((el) => {
    el.addEventListener("click", (e) => {
        id = el.dataset.id
        // console.log(id);
    })
})

//-------FUNCION ABRIR MODAL PARA DESACTIVAR//------//------//------//------//------//------
function OpenModalBloquear() {

    $('#modal_bloquear_pagina').modal('show');

    //SE CREA EL JSON
    DataPag = { id: id }

    //SE REALIZA LA LLAMADA AL AJAX
    $.post("views/ajax/bari_pagina.ajax.php", { DataPag }, function (data) {
        response = JSON.parse(data);
        console.log(response);
        estadoPagina.value = response.estado
        if (response.estado == "1") {
            //texto span
            spanEstadoPagina.innerText = 'Activo'
            //clase del span o color del texto
            spanEstadoPagina.classList.remove('text-danger')
            spanEstadoPagina.classList.add('text-primary')
            //texto del boton
            btnBloqDesbPag.innerText = 'Desactivar'
        } else {
            //texto span
            spanEstadoPagina.innerText = 'Inactivo'
            //clase del span o color del texto
            spanEstadoPagina.classList.remove('text-primary')
            spanEstadoPagina.classList.add('text-danger')
            //texto del boton
            btnBloqDesbPag.innerText = 'Activar'
        }
    })
    //OPERADOR TERNARIO EIVTAR ERROR DEL BOTON
    btnBloqDesbPag ? btnBloqDesbPag.addEventListener("click", Bloq_DesbPagina) : ''
}
//------------------------------------------------------------------------------------------------------------

//----------FUNCION ACTIVAR O DESACTIVAR PAGINA//----------//----------//----------//----------//----------
function Bloq_DesbPagina() {
    //console.log(estadoPagina.value);

    if (estadoPagina.value == "1") {
        //SI EL ESTADO DE LA PAGINA ES 1 SE ENVIA COMO ESTADO 0
        data_NewEstado = {
            id: id,
            NewEstado: 0
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Desactivar pagina?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Desactivar',
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

                //SI SE CONFIRMA SE LLAMA LA FUNCION QUE CAMBIA EL ESTADO
                CambiarEstadoPagina(data_NewEstado);
                //------------------------------------------

                Swal.fire({
                    icon: 'success',
                    title: `Pagina desactivada`,
                    showConfirmButton: true,
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
                        //se recarga la pagina para mostrar el cambio
                        location.reload()
                    }
                })
            }
        })
    } else {
        data_NewEstado = {
            id: id,
            NewEstado: 1
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Activar pagina?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Activar',
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

                //SI SE CONFIRMA SE LLAMA LA FUNCION QUE CAMBIA EL ESTADO
                CambiarEstadoPagina(data_NewEstado);
                //------------------------------------------
                Swal.fire({
                    icon: 'success',
                    title: `Pagina activada`,
                    showConfirmButton: true,
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
                        //se recarga la pagina para mostrar el cambio
                        location.reload()
                    }
                })
            }
        })
    }
}
//---------------FIN FUNCION ACTIVAR O DESACTIVAR//---------------//---------------//---------------//---------------


//FUNCION QUE ENVIA EL JSON CREADO EN LA FUNCION Bloq_DesbPagina AL AJAX PARA CAMBIAR ESTADO
function CambiarEstadoPagina(data_NewEstado) {
    $.post("views/ajax/bari_pagina.ajax.php", { data_NewEstado }, function (data) {
        console.log(data);
    })
}
//----------------------------------------------------------------------------------------------------


//----------------ELIMINAR PAGINA//-------ELIMINAR PAGINA-----//------ELIMINAR PAGINA-------//------ELIMINAR PAGINA-------//-------------//-------------
function OpenModalEliminar() {
    //SE CREA EL JSON QUE ENVIA EL ID DE LA PAGINA
    dataDeletePagina = {
        id: id
    }
    console.log(id);
    Swal.fire({
        title: 'Eliminar página',
        text: `¿Seguro que quiere eliminar la página?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#a20202',
        confirmButtonText: 'Eliminar',
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

            //SI SE CONFIRMA SE LLAMA LA FUNCION QUE ELIMINA LA PAGINA
            EliminarPagina(dataDeletePagina);
            //------------------------------------------
            Swal.fire({
                icon: 'success',
                title: `Pagina eliminada`,
                showConfirmButton: true,
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
                    //se recarga la pagina para mostrar el cambio
                    location.reload()
                }
            })
        }
    })
}

function EliminarPagina(dataDeletePagina) {
    $.post("views/ajax/bari_pagina.ajax.php", { dataDeletePagina }, function (data) {
        console.log(data);
    })
}
//-------------------------//-------------//-----------------//-------------//---------------//-------------//-------------


//------//-----------//----------------ABRIR MODAL PARA EDITAR PAGINA//-----------//-----------//-----------//
function OpenModalEditar() {

    //apenas se abra el modal, se asigna el valor del select para que en cada cambio se blanquee
    //------------------------------------------------------------------------------------------
    edit_c_items.innerHTML = `<option selected> Seleccione el Item</option> `
    edit_c_categ.innerHTML = `<option selected>Seleccione Categoria</option>`
    //------------------------------------------------------------------------------------------

    $('#modal_editar_pagina').modal('show');
    //console.log(id);
    //SE CREA EL JSON
    DataPag = { id: id }

    //SE REALIZA LA LLAMADA AL AJAX
    $.post("views/ajax/bari_pagina.ajax.php", { DataPag }, function (data) {
        response = JSON.parse(data);
        console.log(response);
        //el valor de la sesion se trae de la base de datos para que el primer select ya tenga un valor
        //------------------------------------------------------------------------------------------
        edit_c_sesion.value = response.sesion
        //------------------------------------------------------------------------------------------

        //Se ejecuta la funcion que trae las categorias con el valor del primer select
        CBOeditcategoria()
        //------------------------------------------------------------------------------------------

        //------------------------------------------------------------------------------------------
        //Para que el select de categoria quedé con el mismo valor de la base de datos se crea ese valor y luego se agrega
        //QUEDA DOBLE ESE VALOR, PORQUE SI NO SE CREA NO SE PUEDE ASIGNAR AL SELECT
        option = document.createElement('option')
        option.value = response.categoria
        option.text = response.categoria
        edit_c_categ.add(option)
        //------------------------------------------------------------------------------------------

        //------------------------------------------------------------------------------------------
        //se le asigna el valor de la base de datos al select
        edit_c_categ.value = response.categoria
        //------------------------------------------------------------------------------------------


        //------------------------------------------------------------------------------------------
        //------------------------------------------------------------------------------------------
        //Como ya se tiene el valor de la categoria en el select, se ejecuta la funcion 
        //para que traiga los items que corresponden a esa categoria
        CBOedit_items()
        //------------------------------------------------------------------------------------------
        //Para que el select de item quedé con el mismo valor de la base de datos se crea ese valor y luego se agrega
        //QUEDA DOBLE ESE VALOR, PORQUE SI NO SE CREA NO SE PUEDE ASIGNAR AL SELECT
        opcion = document.createElement('option')
        opcion.value = response.item
        opcion.text = response.item
        edit_c_items.add(opcion)
        //------------------------------------------------------------------------------------------
        //se le asigna el valor de la base de datos al select
        edit_c_items.value = response.item
        //------------------------------------------------------------------------------------------


        //se asigna el resto de campos con los valores que se traen de la base de datos
        edit_pag_titulo.value = response.titulo
        edit_pag_descr.value = response.descripcion
        //------------------------------------------------------------------------------------------

    })
    btnEditPag ? btnEditPag.addEventListener("click", EditPag) : ''
}
//---------------------------------------------------------------------------------------------------------------------

function EditPag() {
    const DataEdit = {
        session_edit: edit_c_sesion.value,
        categoria_edit: edit_c_categ.value,
        item_edit: edit_c_items.value,
        // product_img_edit: edit_pag_img.value,
        titulo_prod_edit: edit_pag_titulo.value,
        descr_producto_edit: edit_pag_descr.value,
        id:id
    }
    console.log(DataEdit);
     Swal.fire({
        title: 'Editar página',

        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#a20202',
        confirmButtonText: 'Editar',
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

            //SI SE CONFIRMA SE LLAMA LA FUNCION QUE ELIMINA LA PAGINA
            $.post("views/ajax/bari_pagina.ajax.php", { DataEdit }, function (data) {
                response = (data);
                console.log(response);
            })
            //------------------------------------------
            Swal.fire({
                icon: 'success',
                title: `Pagina eliminada`,
                showConfirmButton: true,
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
                    //se recarga la pagina para mostrar el cambio
                    location.reload()
                }
            })
        }
    }) 
}
// editar articulo





// eliminar articulo 

/* session
categoria
item
product_img
titulo_prod
descr_producto */