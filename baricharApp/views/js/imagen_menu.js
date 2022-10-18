
let imagen_menu1 = document.getElementById('imagen_menu1')
let imagen_menu11 = document.getElementById('imagen_menu2')




//extraer el id, el estado y la sesion mediante los data atributos
let imagen = document.querySelectorAll(".extraerImagen");
imagen.forEach((el) => {
    el.addEventListener("click", (e) => {
        imagen = el.dataset.imagen

        imagen_menu1.srcset="views"+imagen
        imagen_menu11.src="views"+imagen



    })
})

