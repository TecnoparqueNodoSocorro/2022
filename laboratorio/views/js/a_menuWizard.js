//ADMINISTRADOR Y EMPLEADO

let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  let x = document.getElementsByClassName("step");

  x ? x[n].style.display = "block" : ''
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    //en el primer tab se oculta el boton de ir hacia atras
    document.getElementById("prevBtn").style.display = "none";
  } else {

    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    //si ya se llegó al ultimo tab se oculta el de boton de avanzar
    document.getElementById("nextBtn").style.display = "none";
    // se muestra el boton de guardar
    document.getElementById("btnGuardarEquipo").style.display = "block";


  } else {
    //si no se ha llegado al final
    document.getElementById("nextBtn").innerHTML = "Siguiente";
    //se oculta el boton de guardar
    document.getElementById("btnGuardarEquipo").style.display = "none";
    //se muestra el boton de ir hacia adelante
    document.getElementById("nextBtn").style.display = "block";

  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  let x = document.getElementsByClassName("step");
  // Exit the function if any field in the current tab is invalid:

  //DESCOMENTAR PARA QUE LAS VALIDACIONES NO PERMITAN CAMBIAR DE PAGINA
  if (n == 1 && !validateForm()) return false;


  // Hide the current tab:
  //ocultar el tan anterior
  if (currentTab <= x.length) {
    x[currentTab].style.display = "none";
  }
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    x[currentTab].style.display = "block";
    // document.getElementById("signUpForm").submit();
    return false;
  }
  //al avanzar la pagina de riesgos asociados guarda los riesgos checkeados
  if (currentTab === 4) {
    //funcion en la pagina de a_registroEquipo.js
    GuardarRiesgos()
  }
  //al avanzar a la siguiente pagina se guardan los procesos de liempieza en un array para luego guardarse
  if (currentTab === 9) {
    //funcion en la pagina de a_registroEquipo.js
    guardarLimpieza()
  }

  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  let x, y, z, t, valid = true;
  x = document.getElementsByClassName("step");
  //validar input QUE TENGAN LA CLASE  ValidInput
  z = x[currentTab].querySelectorAll(".ValidInput");

  //validar los select
  y = x[currentTab].querySelectorAll(".validarSelect");


  //se recorre cada uno de los elementos que tengane sa clase
  for (let i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  for (let i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "0") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  let i, x = document.getElementsByClassName("stepIndicator");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace("active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

let inputs = document.querySelectorAll('.inputfile');
Array.prototype.forEach.call(inputs, function (input) {
  let label = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener('change', function (e) {
    let fileName = '';
    if (this.files && this.files.length > 1)
      fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
    else
      fileName = e.target.value.split('\\').pop();

    if (fileName)
      label.querySelector('span').innerHTML = fileName;
    else
      label.innerHTML = labelVal;
  });

});

const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

$("#attachment").on('change', function (e) {
  for (var i = 0; i < this.files.length; i++) {
    let fileBloc = $('<span/>', { class: 'file-block' }),
      fileName = $('<span/>', { class: 'name', text: this.files.item(i).name });
    fileBloc.append('<span class="file-delete"><span>+</span></span>')
      .append(fileName);
    $("#filesList > #files-names").append(fileBloc);
  };
  // Ajout des fichiers dans l'objet DataTransfer
  for (let file of this.files) {
    dt.items.add(file);
  }
  // Mise à jour des fichiers de l'input file après ajout
  this.files = dt.files;

  // EventListener pour le bouton de suppression créé
  $('span.file-delete').click(function () {
    let name = $(this).next('span.name').text();
    // Supprimer l'affichage du nom de fichier
    $(this).parent().remove();
    for (let i = 0; i < dt.items.length; i++) {
      // Correspondance du fichier et du nom
      if (name === dt.items[i].getAsFile().name) {
        // Suppression du fichier dans l'objet DataTransfer
        dt.items.remove(i);
        continue;
      }
    }
    // Mise à jour des fichiers de l'input file après suppression
    document.getElementById('attachment').files = dt.files;
  });
});


//codigo imagen registro equipo
function readURL(input) {
  if (input.files && input.files[0]) {
    if (input.files[0].size / 1024 > 650) {
      return false
    }
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
      $('#imagePreview').hide();
      $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function () {
  readURL(this);
});




//MENU 10 ANEXOS A LA HOJA DE VIDA

function checkAnexos() {
  let x = document.getElementsByClassName("step");
  let check = x[10].getElementsByTagName('input["type=checkbox"]');
  console.log(check);
}

//