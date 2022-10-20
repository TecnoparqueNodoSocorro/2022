
// VARIABLES PARA GUARDAR LOS DATOS
let materiaDetalle = document.getElementById('materiaDetalle')
let fInicioDetalle = document.getElementById('fInicioDetalle')
let PesoIniDetalle = document.getElementById('PesoIniDetalle')
let pesoNetoDetalle = document.getElementById('pesoNetoDetalle')
let pesoDesperDetalle = document.getElementById('pesoDesperDetalle')
let adicionDetalle = document.getElementById('adicionDetalle')
let codigoDetalle = document.getElementById('codigoDetalle')

const btndetalles = document.querySelectorAll(".btndetalles")
btndetalles.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {
        //blanquea la tabla
        // console.log(el.dataset.id);
        //atributos data, CODIGO DEL LOTE Y FASE PARA USARLO EN EL LISTADO DE REGISTROS DEL LOTE
        id = el.dataset.id
        codigo = el.dataset.codigo

        document.getElementById('tituloDetalle').innerText=`Lote: ${codigo}`
        //console.log(id);
        getLote = { id: id }
        $.post("views/ajax/lotes_ajax.php", { getLote }, function (dato) {
            let response = JSON.parse(dato)
            //console.log(response);
            materiaDetalle.value = response.materia
            fInicioDetalle.value = response.fecha_inicio
            PesoIniDetalle.value = response.peso_inicial
            pesoNetoDetalle.value = response.peso_neto
            pesoDesperDetalle.value = response.p_desperdicio
            adicionDetalle.value = response.adicion
            codigoDetalle.value = response.codigo
        })
    })
})