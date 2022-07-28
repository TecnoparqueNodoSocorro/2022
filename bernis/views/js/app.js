/* prueba de carga exitosa del archivo js  */
console.log("js cargado exitosamente");

/* JS CARGAR DATOS DE PRODUCTOS PARA EDITAR  */

$(document).on("click", "#btneditarp", function () {
  var idp = $(this).data("idp");
  /* alert(idp); */
  enviarproducto(idp);
});

function enviarproducto(idp) {
  /* llamado al ajax y envia parametros y se crea la variable en la cual se almacenara la respuesta */
  $.post("views/ajax/productos.ajax.php", { idp }, function (data) {
    let response = $.parseJSON(data);
    /* se almacena la respuesta en la variable response en formato json */
    console.log(response.data);
    /* se renderizan los datos en la pagina */
    let txtid = document.getElementById("prodId");
    let txtnombre = document.getElementById("nombre");
    let txtclasificacion = document.getElementById("clasificacion");
    let txtdescripcion = document.getElementById("descripcion");
    let txtcosto = document.getElementById("costo");
    let txtvalor = document.getElementById("valor");
    /* se extraen los datos del vector y se almacenan en variables */
    txtid.value = response.data.id;
    txtnombre.value = response.data.nombre;
    txtclasificacion.value = response.data.clasificacion;
    txtdescripcion.innerText = response.data.descripcion;
    txtcosto.value = response.data.costo;
    txtvalor.value = response.data.precio;
  });
}

/* JS ACTUALIZAR PRODUCTOS  */

$(document).on("click", "#btnActualizar", function () {
  var a_idp = document.getElementById("prodId").value;
  var a_nombre = document.getElementById("nombre").value;
  var a_descripcion = document.getElementById("descripcion").value;
  var a_costo = document.getElementById("costo").value;
  var a_valor = document.getElementById("valor").value;
  var a_clasificacion = document.getElementById("clasificacion").value;
  var upddatos = {
    "prodId": a_idp,
    "nombre": a_nombre,
    "descripcion": a_descripcion,
    "costo": a_costo,
    "valor": a_valor,
    "clasificacion": a_clasificacion,
  }
  actualizarproducto(upddatos);
});

function actualizarproducto(upddatos) {
  $.post("views/ajax/productos.ajax.php", upddatos, function (data) {
    console.log({ upddatos });
    let response = $.parseJSON(data);
    if (response.data === 1) {
      $("#modaleditarpro").modal('hide'); // creo que es asi
      // como mando a actualizar?
      location.href = 'index.php?page=productos';
    }
  });
}


/* ELIMINAR UN PRODUCTO */

$(document).on("click", "#btneliminar", function () {
  var idpdelete = $(this).data("idp");
 /*  alert(idpdelete); */
  eliminarproducto(idpdelete);
});

function eliminarproducto(idpdelete) {
  $.post("views/ajax/productos.ajax.php", { idpdelete }, function (data) {
    let response = $.parseJSON(data);
    location.href = 'index.php?page=productos';
  });
}
/* falta incluir procedimiento para eliminar la imagen tambien  */

/* ----------------------------------------------------------------- */

$(document).on("change", ".imageproducto", function () {
  const imagen = this.files[0];
  console.log({ imagen });
  const maxValor = 512000;
  if (imagen.type !== "image/jpeg" && imagen.type !== "image/png") {
    $(".imageproducto").val("");
    // mnsaje de error
  } else if (imagen.zise > maxValor) {
    $(".imageproducto").val("");
    // mensaje de error por tamaño
  } else { 
    let dataImagen = new FileReader();
    dataImagen.readAsDataURL(imagen);
    $(dataImagen).on("load", function (event) {

      const ruta = event.target.result;
      $(".reviewImagen").attr('src', ruta);
    });
  }


});

/* ELIMINAR UNA CATEGORIA */

$(document).on("click", "#btnrliminac", function () {
  var idpcategoria = $(this).data("idp");
 /*  alert(idpdelete); */
  eliminarcategoria(idpcategoria);
});


function eliminarcategoria(idpcategoria) {
  $.post("views/ajax/productos.ajax.php", { idpcategoria }, function (data) {
    let response = $.parseJSON(data);
    location.href = 'index.php?page=categorias';
  });
}



