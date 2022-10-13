//-----VARIABLES PARA EL REGISTRO DE PRODUCTOS---------------------
let prov_p_categ = document.getElementById('prov_p_categ')
let prov_p_nombre = document.getElementById('prov_p_nombre')
let prov_p_precio = document.getElementById('prov_p_precio')
let prov_p_imagen1 = document.getElementById('prov_p_imagen1')
let prov_p_imagen2 = document.getElementById('prov_p_imagen2')
let prov_p_descripcion = document.getElementById('prov_p_descripcion')
let btnGuardarProducto = document.getElementById('btnGuardarProducto')
//----------------------------------------------------------------------

let res

//-----VARIABLES PARA MOSTRAR PRODUCTOS---------------------
let mostrar_categoria_prod = document.getElementById('mostrar_categoria_prod')
let mostrar_nombre_prod = document.getElementById('mostrar_nombre_prod')
let mostrar_precio_prod = document.getElementById('mostrar_precio_prod')
let mostrar_descrip_prod = document.getElementById('mostrar_descrip_prod')
//----------------------------------------------------------------------
//-----VARIABLES PARA EDITAR PRODUCTOS---------------------
let edit_prov_p_categ = document.getElementById('edit_prov_p_categ')
let edit_prov_p_nombre = document.getElementById('edit_prov_p_nombre')
let edit_prov_p_precio = document.getElementById('edit_prov_p_precio')
let edit_prov_p_imagen1 = document.getElementById('edit_prov_p_imagen1')
let edit_prov_p_imagen2 = document.getElementById('edit_prov_p_imagen2')


let edit_prov_p_descripcion = document.getElementById('edit_prov_p_descripcion')
let edit_btnProducto = document.getElementById('edit_btnProducto')
let edit_prod_id = document.getElementById('edit_prod_id')

//----------------------------------------------------------------------


let imagen_producto1 = document.getElementById('imagen_producto1')
let imagen_producto1_1 = document.getElementById('imagen_producto1_1')
let imagen_producto2 = document.getElementById('imagen_producto2')
let imagen_producto2_2 = document.getElementById('imagen_producto2_2')


/* //----CONDICIONAL TERNARIO PARA ENVITAR ERROR DEL ADDEVENTLISTENER--------------------
btnGuardarProducto ? btnGuardarProducto.addEventListener("click", datosNuevoProducto) : ''
edit_btnProducto ? edit_btnProducto.addEventListener("click", EditProducto) : ''
//---------------------------------------------------------------------- */


//-----------NUEVO PRODUCTO----------------------------


const form_agregar_produc = document.querySelector('#form_agregar_produc')

form_agregar_produc ? form_agregar_produc.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))

    let element = document.querySelectorAll('#form_agregar_produc .form_prodcut_agre')

    element.forEach(x => {
        // console.log(x.name, x.value);
        if (x.value.trim() == "") {
            Swal.fire({
                title: 'Error',
                text: `Complete los campos`,
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok',
            })
        }else if (prov_p_imagen1.value == "" && prov_p_imagen2.value == "" ) {
            Swal.fire({
                title: 'Error',
                text: `Seleccione mínimo una imagen`,
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok',
            })

        }  else {
            datosNuevoProducto()
        }


    })

    console.log(data);
} : ''



function datosNuevoProducto() {

    Swal.fire({
        title: 'Listo',
        text: `¿Agregar nuevo producto?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#a20202',
        confirmButtonText: 'Agregar',
        scrollbarPadding: false,
        heightAuto: false,
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
            //AL DARLE CLICK A CAMBIAR SE ENVIAN LOS DATOS DEL JSON CON EL ID DEL USUARIO Y LA NUEVA CLAVE
            $.ajax({
                type: 'POST',
                url: 'views/ajax/bari_productos.ajax.php',
                data: new FormData(form_agregar_produc),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            });
            Swal.fire({
                icon: 'success',
                title: `Producto agregado`,
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


/* function AgregarProducto(nuevoProducto) {
    $.post("views/ajax/bari_productos.ajax.php", { nuevoProducto }, function (data) {
        
        console.log(data);
    });

}  */

//----------EXTRAER EL ID DE CADA REGISTRO----------------
let btnIdProd = document.querySelectorAll(".id_producto");
btnIdProd.forEach((el) => {
    el.addEventListener("click", (e) => {
        id = el.dataset.id
        estado = el.dataset.estado

        // console.log(estado);
    })
})
//----------------------------------------------------------------------

//----------ACTIVAR O DESACTIVAR PRODUCTO-----------------------
function activar_desactivar() {

    if (estado == "1") {
        CambioEstadoProd = {
            id: id,
            NewEstado: 0
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Desactivar producto?`,
            icon: 'question',
            scrollbarPadding: false,
            heightAuto: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Desactivar',
            scrollbarPadding: false,
            heightAuto: false,
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
                CambiarEstadoProducto(CambioEstadoProd)
                //------------------------------------------
                Swal.fire({
                    icon: 'success',
                    title: `Producto desactivado`,
                    showConfirmButton: true,
                    scrollbarPadding: false,
                    heightAuto: false,
                    confirmButtonColor: '#2d9fb4',
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
    } else if (estado == "0") {
        CambioEstadoProd = {
            id: id,
            NewEstado: 1
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Activar producto?`,
            icon: 'question',
            scrollbarPadding: false,
            heightAuto: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            scrollbarPadding: false,
            heightAuto: false,
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
                CambiarEstadoProducto(CambioEstadoProd)
                //------------------------------------------
                Swal.fire({
                    icon: 'success',
                    title: `Producto activado`,
                    showConfirmButton: true,
                    scrollbarPadding: false,
                    heightAuto: false,
                    confirmButtonColor: '#2d9fb4',
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
//FUNCION QUE ENVIA EL JSON CREADO EN LA FUNCION Bloq_DesbPagina AL AJAX PARA CAMBIAR ESTADO
function CambiarEstadoProducto(CambioEstadoProd) {
    $.post("views/ajax/bari_productos.ajax.php", { CambioEstadoProd }, function (data) {
        console.log(data);
    })
}
//----------------------------------------------------------------------------------------------------



//----------ELIMINAR PRODUCTOS---------------------------
function eliminarProductos() {
    DataDeleteProd = { id: id }
    Swal.fire({
        title: 'Listo',
        text: `Eliminar producto?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#a20202',
        scrollbarPadding: false,
        heightAuto: false,
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
            //AL DARLE CLICK SE EJECUTA LA FUNCION
            DeleteProduct(DataDeleteProd)
            Swal.fire({
                icon: 'success',
                title: `Producto eliminado`,
                scrollbarPadding: false,
                heightAuto: false,
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

function DeleteProduct(DataDeleteProd) {
    $.post("views/ajax/bari_productos.ajax.php", { DataDeleteProd }, function (data) {
        console.log(data);
    })
}

//----------ABRIR MODAL DE VISUALIZAR-----------------------

function OpenModalVerProduct() {
    console.log("ver");
    $('#mostrar_modal_prod').modal('show');
    dataProduct = {
        id: id
    }
    //SE LLAMA A LA FUNCION QUE TRAE LA DATA DE LA BASE DE DATOS Y SE LE ASIGNA A LOS CAMPOS 
    MostrarInfoProduc(dataProduct)
    mostrar_descrip_prod.value = res.descripcion
    mostrar_precio_prod.innerText = res.precio
    mostrar_nombre_prod.innerText = res.nombre
    mostrar_categoria_prod.innerText = res.categoria
    imagen_producto1.srcset="views/views/"+res.img1
    imagen_producto1_1.src = "views/views/"+res.img1
    imagen_producto2.srcset="views/views/"+res.img2
    imagen_producto2_2.src = "views/views/"+res.img2
}
//----------------------------------------------------------------------------------------------------

function MostrarInfoProduc(dataProduct) {
    $.ajax({
        async: false,
        url: "views/ajax/bari_productos.ajax.php",
        type: 'POST',
        data: { dataProduct },
        success: function (response) {
            res = JSON.parse(response);
             console.log(res);
        },
        error: function (error) {
            console.log(error);
        }
    });

}
//----------ABRIR MODAL DE EDITAR-----------------------

function OpenModalEditProduct() {
    //console.log("editar");
    $('#edit_modal_prod').modal('show');
    dataProduct = {
        id: id
    }

    //SE LLAMA A LA FUNCION QUE TRAE LA DATA DE LA BASE DE DATOS Y SE LE ASIGNA A LOS CAMPOS 
    MostrarInfoProduc(dataProduct)
    console.log(res);
    edit_prov_p_descripcion.value = res.descripcion
    edit_prov_p_precio.value = res.precio
    //FALTAN LAS IMAGENES
    edit_prov_p_nombre.value = res.nombre
    edit_prov_p_categ.options[prov_p_categ.selectedIndex].text = res.categoria
    edit_prov_p_categ.value = res.id_categoria
    edit_prod_id.value = res.id_producto

}
//----------------------------------------------------------------------------------------------------

//editar produto




const form_edit_produc = document.querySelector('#form_edit_produc')

form_edit_produc ? form_edit_produc.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))

    let element = document.querySelectorAll('#form_edit_produc .form_prodcut_edit')
    // console.log(element)
    element.forEach(x => {
        // console.log(x.name, x.value);
        if (x.value.trim() == "") {
            Swal.fire({
                title: 'Error',
                text: `Complete los campos`,
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok',
            })
        } else {
            EditProducto()
        }


    })

    console.log(data);
} : ''











function EditProducto() {

    Swal.fire({
        title: 'Listo',
        text: `¿Editar producto?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        scrollbarPadding: false,
        heightAuto: false,
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
            //AL DARLE CLICK A CAMBIAR SE ENVIAN LOS DATOS DEL JSON 
            $.ajax({
                type: 'POST',
                url: 'views/ajax/bari_productos.ajax.php',
                data: new FormData(form_edit_produc),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            });
            Swal.fire({
                icon: 'success',
                title: `Producto editado`,
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
/* //FUNCION QUE ENVÍA EL JSON CON LOS DATOS PARA EDITAR O ACTUALIZAR
function EditarProducto(editProduct) {
    $.post("views/ajax/bari_productos.ajax.php", { editProduct }, function (data) {
        console.log(data);
    });

}  */

validarImagenProducto(prov_p_imagen1)
validarImagenProducto(prov_p_imagen2)
validarImagenProducto(edit_prov_p_imagen1)
validarImagenProducto(edit_prov_p_imagen2)


function validarImagenProducto(fileInput) {

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