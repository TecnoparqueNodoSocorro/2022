
let body_modal_productos_prov = document.getElementById('body_modal_productos_prov')
let titulo_producto = document.getElementById('titulo_producto')


let info_proveedor = document.querySelectorAll(".info_proveedor");
info_proveedor.forEach((el) => {
    el.addEventListener("click", (e) => {
        body_modal_productos_prov.innerHTML=``
        titulo_producto.innerText=``
        let idp = el.dataset.id
        let nombrep = el.dataset.nombre
        //console.log(idp);
        titulo_producto.innerText=nombrep
        TraerProductosPorProv(idp)
    })
})
function TraerProductosPorProv(idp) {
    const idProv = { id: idp }


    //console.log(idCat);
    $.post("views/ajax/bari_productos.ajax.php", { idProv }, function (data) {
        response = JSON.parse(data)
        console.log(response);
        response.forEach(x => {
            //    titulo_categoria.innerText = x.nombre_categoria
            body_modal_productos_prov.innerHTML += `
                                        <div class="row">
                                            <div class="col-6" style="text-align:center">
                                             <picture>
                                                     <source  srcset="views/views/${x.img1}" type="image/svg+xml">
                                                     <img src="views/views/${x.img1}" class="img-fluid img-thumbnail" alt="...">
                                              </picture>
                                            </div>
                                            <div class="col-6" style="text-align:center">
                                            <picture>
                                                    <source srcset="views/views/${x.img2}" type="image/svg+xml">
                                                    <img src="views/views/${x.img2}" class="img-fluid img-thumbnail" alt="...">
                                             </picture>
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md 6">
                                                <h2 class="nombre"><strong>${x.nombre}</strong></h2>
                                                <h2 class="detalleproducto">
                                                ${x.descripcion}
                                                </h2>

                                           
                                                <div>
                                                    <h2 class="precioproducto">$${x.precio}</h2>
                                                </div>

                                            </div>                                    
                                            <hr size="5">
                                        </div>

                                        <style>
                                        .nombre {
                                            font-size: 110% !important;
                                            padding: 2% !important;
                                            margin: 2px !important;
                                            text-align: center;
                                          }
                                          
                                          .detalleproducto {
                                            font-size: 90% !important;
                                            padding: 2% !important;
                                            margin: 2px !important;
                                            text-align: center;
                                          }
                             
                                          .precioproducto {
                                            padding: 1px !important;
                                            text-align: center !important;
                                            font-size: 13px !important;
                                            margin: 0% !important;
                                            font-weight: 700;
                                          }
                                        </style>
                                          `
                                          

        })
    })
}