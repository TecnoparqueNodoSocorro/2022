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
let edit_prov_p_descripcion = document.getElementById('edit_prov_p_descripcion')
let edit_btnProducto = document.getElementById('edit_btnProducto')
//----------------------------------------------------------------------

//----CONDICIONAL TERNARIO PARA ENVITAR ERROR DEL ADDEVENTLISTENER--------------------
btnGuardarProducto ? btnGuardarProducto.addEventListener("click", datosNuevoProducto) : ''
edit_btnProducto ? edit_btnProducto.addEventListener("click", EditProducto) : ''
//----------------------------------------------------------------------

function datosNuevoProducto() {
    if (prov_p_categ.value.trim() == "" || prov_p_nombre.value.trim() == "" || prov_p_precio.value.trim() == "" || prov_p_descripcion.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: `Datos incompletos`,
            showConfirmButton: true,
            scrollbarPadding: false,
            heightAuto: false,
            confirmButtonColor: '#2d9fb4',
        })
    } else {
        nuevoProducto = {
            idproveedor: 1,
            categoria: prov_p_categ.value,
            nombre: prov_p_nombre.value,
            precio: prov_p_precio.value,
            img1: prov_p_imagen1.value,
            img2: prov_p_imagen2.value,
            descripcion: prov_p_descripcion.value
        }
        //console.log(nuevoProducto);
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
                AgregarProducto(nuevoProducto)
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
}

function AgregarProducto(nuevoProducto) {
    $.post("views/ajax/bari_productos.ajax.php", { nuevoProducto }, function (data) {
        /*  let response = JSON.parse(data);
         console.log(response); */
        console.log(data);
    });

}

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
            // console.log(res);
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

}
//----------------------------------------------------------------------------------------------------
function EditProducto() {
    if (edit_prov_p_categ.value == "0" || edit_prov_p_descripcion.value.trim() == "" || edit_prov_p_precio.value.trim() == "" || edit_prov_p_nombre.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: `Datos incompletos`,
            showConfirmButton: true,
            confirmButtonColor: '#2d9fb4',
            scrollbarPadding: false,
            heightAuto: false,
        })
    } else {
        //SI LOS CAMPOS ESTAN DILIGENCIADOS SE CREA UN JSON
        editProduct = {
            id: id,
            categoria: edit_prov_p_categ.value,
            nombre: edit_prov_p_nombre.value,
            precio: edit_prov_p_precio.value,
            descripcion: edit_prov_p_descripcion.value
        }
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
                //AL DARLE CLICK A CAMBIAR SE ENVIAN LOS DATOS DEL JSON CON EL ID DEL USUARIO Y LA NUEVA CLAVE
                EditarProducto(editProduct)
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
}

//FUNCION QUE ENVÍA EL JSON CON LOS DATOS PARA EDITAR O ACTUALIZAR
function EditarProducto(editProduct) {
    $.post("views/ajax/bari_productos.ajax.php", { editProduct }, function (data) {
        console.log(data);
    });

}