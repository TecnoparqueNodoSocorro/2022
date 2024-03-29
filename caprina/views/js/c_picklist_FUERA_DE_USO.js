





//ARRAY QUE VA A GUARDAR LOS CAPRINOS SELECCIONADOS PARA EL TRATAMIENTO
let objResult = []
//--------------------------------------------------------------------------------------

//ARRAY QUE VA A GUARDAR LOS CAPRINOS NO SELECCIONADOS EN EL TRATAMIENTO
let caprinosSin = []
//--------------------------------------------------------------------------------------

function traerCaprinos() {
  id_usuario = {
    id_usuario: id_usuario
  }
  $.post("views/ajax/caprino_ajax.php", { id_usuario }, function (dato) {
    response = JSON.parse(dato)
    console.log(response);


    (function ($) {

      $.fn.pickList = function (options) {

        var opts = $.extend({}, $.fn.pickList.defaults, options);

        this.fill = function () {
          var option = '';

          $.each(opts.data, function (key, val) {
            option += '<option data-usuario=' + val.id_usuario + ' data-codigo=' + val.codigo + '>' + 'Código: ' + val.codigo + '</option>';
          });
          this.find('.pickData').append(option);
        };
        this.controll = function () {
          var pickThis = this;

          pickThis.find(".pAdd").on('click', function () {
            var p = pickThis.find(".pickData option:selected");
            p.clone().appendTo(pickThis.find(".pickListResult"));
            p.remove();
          });

          pickThis.find(".pAddAll").on('click', function () {
            var p = pickThis.find(".pickData option");
            p.clone().appendTo(pickThis.find(".pickListResult"));
            p.remove();
          });

          pickThis.find(".pRemove").on('click', function () {
            var p = pickThis.find(".pickListResult option:selected");
            p.clone().appendTo(pickThis.find(".pickData"));
            p.remove();
          });

          pickThis.find(".pRemoveAll").on('click', function () {
            var p = pickThis.find(".pickListResult option");
            p.clone().appendTo(pickThis.find(".pickData"));
            p.remove();
          });
        };


        this.getValues = function () {
          this.find(".pickListResult option").each(function () {
            objResult.push({
              codigo: $(this).data('codigo'),
              id_usuario: $(this).data('usuario')
            });
          });
          return objResult;
        };

        this.init = function () {
          var pickListHtml =
            "<div class='row'>" +
            "  <div class='col-sm-5'>" +
            "	 <select class='form-control pickListSelect pickData' multiple></select>" +
            " </div>" +
            " <div class='col-sm-2 pickListButtons'>" +
            "	<button  class='pAdd btn btn-warning btn-sm'>" + opts.add + "</button>" +
            "      <button  class='pAddAll btn btn-warning btn-sm'>" + opts.addAll + "</button>" +
            "	<button  class='pRemove btn btn-warning btn-sm'>" + opts.remove + "</button>" +
            "	<button  class='pRemoveAll btn btn-warning btn-sm'>" + opts.removeAll + "</button>" +
            " </div>" +
            " <div class='col-sm-5'>" +
            "    <select class='form-control pickListSelect pickListResult' multiple></select>" +
            " </div>" +
            "</div>";

          this.append(pickListHtml);

          this.fill();
          this.controll();
        };

        this.init();
        return this;
      };

      $.fn.pickList.defaults = {
        add: 'Agregar',
        addAll: 'Agregar todos',
        remove: 'Borrar',
        removeAll: 'Borrar todos'
      };


    }(jQuery));

    //le asigno a val que es la variable que maneja todo la data del multipck, response que viene con los caprinos de la base de datos
    var val = response
    //----------------------------------------------------------------------

    var pick = $("#pickList").pickList({
      data: val
    });



    //funcion que recorre el pick list de lo que no van a recibir el tratamiento y los agrega al vector para después agregarlos a la base de datos con un NO
    function capturarCarpinosSin() {
      $(".pickData option").each(function () {
        caprinosSin.push({
          codigo: $(this).data('codigo'),
          id_usuario: $(this).data('usuario')
        });
      });
    }
    //--------------------------------------------------------------------------------------

    //ejecutar la funcion y guardar el tratamiento
    $("#getSelected").click(function () {

      //SE LLAMA LA FUNCION QUE CALCULA LOS ELEMENTOS SELECCIONADOS, SI NO SE LLAMA LA FUNCION EL ARRAY objResult QUEDA VACIO
      pick.getValues()
      /* console.log(pick.getValues()); */
      console.log(objResult);
      //--------------------------------------------------------------------------------------

      //SE LLAMA LA FUNCION QUE, RECORRE EL PRIMER PICKLIST Y EXTRAE LOS ELEMENTOS QUE NO SE SELECCIONARON
      capturarCarpinosSin()
      console.log(caprinosSin);
      //--------------------------------------------------------------------------------------

      //SE VALIDA LOS DATOS DEL FORMULARIO Y SI NO ESTAN VACIOS SE EJECUTA LA FUNCION
      if (tratamiento.value.trim() == "" || objResult.length == 0 || fecha_inicio_tratamiento.value.trim() == "") {
        DatosIncompletos()
      } else {
        //   caprinos = { descripcion_tratamiento: tratamiento.value, caprinos_tratamiento: caprinosSeleccion, fecha_inicio: fecha_inicio_tratamiento.value }
        //   //console.log(caprinos);
        GuardarIDtraramiento()
      }
    });
  })

}

//FUNCION PARA GUARDAR EL DATO DE LA DESCRIPCION DEL TRATAMIENTO Y YLA FECHA Y RETORNA EL ID PARA USARLO EN LAS CONSULTAS SIGUIENTES
async function GuardarIDtraramiento() {
  const datosTratamiento = {
    //ID DEL USUARIO TRAIDO DESDE LA PLANTILLA
    id_usuario: id_userOculto.value,
    //DATOS DEL TRATAMIENTO
    descripcion: tratamiento.value, fecha_inicio: fecha_inicio_tratamiento.value
  }
  //SI EL ARRAY ESTÁ VACIO SE TRAE EL ID DEL TRATAMIENTO QUE ES LA RESPUESTA DEL AJAX
  if (objResult.length > 0) {
    const idTratamiento = await $.post("views/ajax/caprino_ajax.php", { datosTratamiento });
    console.log(idTratamiento);
    let response = JSON.parse(idTratamiento)
    let id = parseInt(response.idTratamiento)
    // //console.log(typeof id);
    guardarCaprinosTratamiento(id, objResult)
    Swal.fire({
      title: 'Listo',
      text: `Caprinos agregados al tratamiento #${id}`,
      icon: 'success',
      showCancelButton: false,
      confirmButtonColor: '#f69100',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'OK',
      allowOutsideClick: () => {
        const popup = Swal.getPopup()
        popup.classList.remove('swal2-show')
        setTimeout(() => {
          popup.classList.add('animate__animated', 'animate__headShake')
        })
        setTimeout(() => {
          popup.classList.remove('animate__animated', 'animate__headShake')
        }, 500)
        return false
      }
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = 'index.php?page=c_registroTratamientos'
      }
    })
  } else {
    DatosIncompletos()
  }
}

function guardarCaprinosTratamiento(id, objResult) {
  //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
  let caprinosTratamiento = JSON.stringify(objResult)
  // console.log(caprinosTratamiento);
  $.post("views/ajax/caprino_ajax.php", { idtratatamiento: id, caprinos: caprinosTratamiento }, function (dato) {
    // let res = JSON.parse(dato);
    console.log(dato);
    guardarCaprinosSinTratamiento(id, caprinosSin)
  })
}

//FUNCION ENVIAR LOS CAPRINOS QUE ESTAN SIN EL TRATAMIENTO
function guardarCaprinosSinTratamiento(id, caprinosSin) {
  //SE VALIDA QUE EL ARRAY QUE GUARDA LOS ELEMENTOS QUE NO SE SELECCIONARION NO ESTE VACIO
  if (caprinosSin.length > 0) {

    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let caprinosSinTratamiento = JSON.stringify(caprinosSin)
    // console.log(caprinosSinTratamiento);
    $.post("views/ajax/caprino_ajax.php", { id_tratatamiento: id, caprinos_sin: caprinosSinTratamiento }, function (dato) {
      // let res = JSON.parse(dato);
      console.log(dato);

    })
  } else {
    //SI EL ARRAY ESTÁ VACIO SE RETORNA PARA EVITAR ERRORES TRATANDO DE HACER INSERCIONES VACIAS
    return;
  }
} 
