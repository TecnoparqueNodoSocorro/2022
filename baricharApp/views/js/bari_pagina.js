//variables
let pag_session = document.getElementById("pag_session");
let pag_categ = document.getElementById("pag_cat");
let pag_item = document.getElementById("pag_item");
let pag_img = document.getElementById("pag_img");
let pag_titulo = document.getElementById("titulo_pag");
let pag_descr = document.getElementById("descr_pag");
let pag_datosarticulo={};
let pag_btnguardar = document.querySelector("#pag_btnguardar");

//listener

pag_btnguardar.addEventListener("click", CrearArticulo)

// crear articulo
function CrearArticulo() {
   pag_datosarticulo = {
        session_create: pag_session.value,
        categoria_create: pag_categ.value,
        item_create: pag_item.value,
        product_img_create: pag_img.value,
        titulo_prod_create: pag_titulo.value,
        descr_producto_create: pag_descr.value,
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