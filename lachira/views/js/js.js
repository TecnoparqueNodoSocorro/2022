//tabla responsiva
$(document).ready(function () {
  var tabla1 = $('#responsive-table').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });

  // tablas que van dentro de un modal hay que iniciarlas

  $('#responsive-table-detalle').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });


  $('#responsive-table-envase').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });


  // al estar dentro de un tab toca inicializar la tabla para que sea responsiva
  $('#responsive-table-primera').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });



  var tabla2 = $('#responsive-tableSegunda').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });

  var tabla4 = $('#responsive-tableEnvase').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });


  var tabla3 = $('#responsive-tableHistorial').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "bAutoWidth": false,
    "ClassName": "none",
    "MultiSelect": false
  });

  $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
    var tabID = $(event.target).attr('data-bs-target');
    if (tabID === '#profile' || tabID === '#messages' || tabID === '#envasado' || tabID === '#home') {
      tabla2.columns.adjust().responsive.recalc();
      tabla3.columns.adjust().responsive.recalc();
      tabla4.columns.adjust().responsive.recalc();

    }
  });


  // tabla de detales responsiva dentro de un modal
  $("#detalles").on('shown.bs.modal', function () {
    $('#responsive-table-detalle').DataTable()
      .columns.adjust()
      .responsive.recalc();
  });

  $("#consultar").on('shown.bs.modal', function () {
    $('#responsive-table').DataTable()
      .columns.adjust()
      .responsive.recalc();
  });
  $("#envase").on('shown.bs.modal', function () {
    $('#responsive-table-envase').DataTable()
      .columns.adjust()
      .responsive.recalc();
  });



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




