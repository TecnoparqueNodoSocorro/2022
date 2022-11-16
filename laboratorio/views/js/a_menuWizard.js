let currentTab = 10; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  let x = document.getElementsByClassName("step");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  let x = document.getElementsByClassName("step");
  // Exit the function if any field in the current tab is invalid:
  //  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("signUpForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  let x, y, z, t, valid = true;
  x = document.getElementsByClassName("step");
  //validar input
  y = x[currentTab].getElementsByTagName("input");
  //validar select
  z = x[currentTab].querySelectorAll(".validar");

  // A loop that checks every input field in the current tab:
  for (let i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  for (let i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
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
    x[i].className = x[i].className.replace(" active", "");
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

// MENU 9 LIMPIEZA, DESINFECCIÓN Y ESTERILIZACIÓN
let check_limp = document.getElementById('check_limp');
let metodo_limpieza = document.getElementById('metodo_limpieza')

let check_des = document.getElementById('check_des')
let metodo_desinfeccion = document.getElementById('metodo_desinfeccion')

let check_ester = document.getElementById('check_ester')
let metodo_esterilizacion = document.getElementById('metodo_esterilizacion')


//cada cambio de cualquier select ejecuta la funcion
check_limp.addEventListener("change", validaCheckbox, false);
check_des.addEventListener("change", validaCheckbox, false);
check_ester.addEventListener("change", validaCheckbox, false);


//activar o desactivar los checkbox para habilitar o dehabilitar la textarea
function validaCheckbox() {
  let checked_limp = check_limp.checked;
  let checked_des = check_des.checked;
  let checked_ester = check_ester.checked;

  if (checked_limp) {
    metodo_limpieza.disabled = false
  } else {
    metodo_limpieza.disabled = true
    metodo_limpieza.value = ""
  }

  if (checked_des) {
    metodo_desinfeccion.disabled = false
  } else {
    metodo_desinfeccion.disabled = true
    metodo_desinfeccion.value = ""

  }

  if (checked_ester) {
    metodo_esterilizacion.disabled = false
  } else {
    metodo_esterilizacion.disabled = true
    metodo_esterilizacion.value = ""

  }
}

//MENU 10 ANEXOS A LA HOJA DE VIDA

function checkAnexos(){
  let x = document.getElementsByClassName("step");
  let check = x[10].getElementsByTagName('input["type=checkbox"]');
  console.log(check);
}