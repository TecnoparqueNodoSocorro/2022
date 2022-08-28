//variables
let p_session = document.getElementById("pag_session");
let p_cat = document.getElementById("pag_cat");
let p_item = document.getElementById("pag_item");
let p_img = document.getElementById("pag_img");
let p_titulo = document.getElementById("pag_titulo");
let p_descr = document.getElementById("pag_descr");
//
let p_datosarticulo={};
let p_btnguardar = document.querySelector("#pag_btnguardar");

//listener

p_btnguardar.addEventListener("click", CrearArticulo)

// crear articulo
function CrearArticulo() {
   p_datosarticulo = {
        session_create: p_session.value,
        categoria_create: p_cat.value,
        item_create: p_item.value,
        product_img_create: p_img.value,
        titulo_prod_create: p_titulo.value,
        descr_producto_create: p_descr.value,
    }

    postajax(pag_datosarticulo);
}

function postajax(pag_datosarticulo) {
    $.post("views/ajax/bari_pagina.ajax.php", { pag_datosarticulo }, function (data) {
        let response = $.parceJSON(data);
        console.log(response);
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