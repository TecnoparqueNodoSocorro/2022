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

//
let p_datosarticulo = {};

let p_btnguardar = document.querySelector("#pag_btnguardar");

//listener
if (p_btnguardar) {
    p_btnguardar.addEventListener("click", CrearArticulo)
}



if (c_sesion) {
    c_sesion.addEventListener("change", CBOcategoria)
}

if (c_categ) {
    c_categ.addEventListener("change", CBOitems)
}


// crear articulo
function CrearArticulo() {
    p_datosarticulo = {
        session_create: c_sesion.value,
        categoria_create: c_categ.value,
        item_create: c_items.value,
        product_img_create: p_img.value,
        titulo_prod_create: p_titulo.value,
        descr_producto_create: p_descr.value,
    }
    postajaxP(p_datosarticulo);
};

function postajaxP(pag_datosarticulo) {
    $.post("views/ajax/bari_pagina.ajax.php", { pag_datosarticulo }, function (data) {
        /*  let response = JSON.parse(data);
         console.log(response); */
        console.log(data);
    });

}




// combo categoria
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

//combo items 
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



// editar articulo





// eliminar articulo 

/* session
categoria
item
product_img
titulo_prod
descr_producto */