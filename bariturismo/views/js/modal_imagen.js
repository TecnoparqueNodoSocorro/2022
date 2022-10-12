
let visualizar_img1 = document.getElementById('visualizar_img1')
let visualizar_img2 = document.getElementById('visualizar_img2')

let titulo_modal_img1 = document.getElementById('titulo_modal_img1')
let titulo_modal_img2 = document.getElementById('titulo_modal_img2')


//extraer el id, el estado y la sesion mediante los data atributos
let imagen = document.querySelectorAll(".modal_imagen_div");
imagen.forEach((el) => {
    el.addEventListener("click", (e) => {
        img1 = el.dataset.img1
        nombre = el.dataset.nombre
        //  img2 = el.dataset.img2
        visualizar_img1.src="views/views/"+img1
        titulo_modal_img1.innerHTML=`${nombre} - imagen 1`
        //console.log(img1);
        //  console.log(img2);

    })
})


//extraer el id, el estado y la sesion mediante los data atributos
let imagen2 = document.querySelectorAll(".modal_imagen2_div");
imagen2.forEach((el) => {
    el.addEventListener("click", (e) => {
        img2 = el.dataset.img2
        nombre = el.dataset.nombre

        //  img2 = el.dataset.img2
        visualizar_img2.src="views/views/"+img2
        titulo_modal_img2.innerText=`${nombre} - imagen 2`

       // console.log(img2);
        //  console.log(img2);
    })
})