//variables
let session = document.getElementById("session");
let categoria = document.getElementById("categoria");
let item = document.getElementById("item");
let product_img = document.getElementById("product_img");
let titulo_prod = document.getElementById("titulo_prod");
let descr_producto = document.getElementById("descr_producto");
let btnguardar = document.querySelector("#btnguardar");

//listener

btnguardar.addEventListener("click", CrearArticulo)

// crear articulo
function CrearArticulo() {
    datosarticulo = {
        session_create: session.value,
        categoria_create: categoria.value,
        item_create: item.value,
        product_img_create: product_img.value,
        titulo_prod_create: titulo_prod.value,
        descr_producto_create: descr_producto.value,
    }

    postajax(datosarticulo);
}

function postajax(datosarticulo) {
    $.post("views/ajax/bari_pagina.ajax.php", { datosarticulo }, function (data) {
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