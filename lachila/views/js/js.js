/* //tabla responsiva
$(document).ready(function () {


  // jquery para dependiendo de la pestaña donde estamos nos redireccione ya se a segunda f o etapa de envasado
  // primero se deja que por defecto el boton redireccione a la segunda fase
  $("#nextProcess").click(function () {
    $(location).attr('href', 'index.php?page=segundaF')
  })

  // luego de que se entr al tab de redirecciona a envasado
  $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    // activated tab
    var fase = $(event.target).attr('data-bs-target');

    if (fase === "#profile") {
      $("#nextProcess").click(function () {
        $(location).attr('href', 'index.php?page=faseEnvasado')
      })
    }
    if (fase === "#envasado") {
      $("#finishProcess").click(function () {
        $(location).attr('href', 'index.php?page=faseFin')
      })
    }
  });


});




 */