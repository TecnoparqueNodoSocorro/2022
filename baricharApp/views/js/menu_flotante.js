let modal_body = document.getElementById('modal_body')

let titulo_categoria = document.getElementById('titulo_categoria')

let menupop = document.querySelectorAll(".menupop");
menupop.forEach((el) => {
    el.addEventListener("click", (e) => {
        modal_body.innerHTML = ``
        titulo_categoria.innerText = ``
        let idc = el.dataset.id
        console.log(idc);


        TraerProductosPorId(idc)
    })
})

function TraerProductosPorId(idc) {
    const idCat = { id: idc }
    //console.log(idCat);
    $.post("views/ajax/bari_productos.ajax.php", { idCat }, function (data) {
        response = JSON.parse(data)

        console.log(response);
        response.forEach(x => {
            titulo_categoria.innerText = x.nombre_categoria
            modal_body.innerHTML += `
                                        <div class="row">
                                            <div class="col-4 col-md-2">
                                                <img class="imgtarjeta" src="views/views/${x.img1}" alt="star">
                                            </div>

                                            <div class="col-7 col-md-6">
                                                <h2 class="nombre">${x.nombre}</h2>
                                                <div class="detalleproducto">
                                                ${x.descripcion}
                                                </div>

                                                <hr>

                                                <div>
                                                    <h2 class="precioproducto">$${x.precio}</h2>
                                                </div>

                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="row">

                                                    <div class="col-7">
                                                        <img class="logoE" src="views/views/${x.logo}" alt="">
                                                        <p class="name_empresa">${x.nombre_proveedor}</p>
                                                    </div>
                                                    <div class="col-5  col-md-2">
                                                        <button type="button" class="btn btn-primary redondo btn-sm"><i class="bi bi-bag-plus-fill"></i></button>
                                                        <label>Agregar</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                          `

        })
    })
}