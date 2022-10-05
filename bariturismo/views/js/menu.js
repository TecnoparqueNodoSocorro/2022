
//capturar los dos checkboz del home
let checkUp = document.getElementById('btn-mas')
let checkDown = document.getElementById('btn-mas2')



//funciones si se selecciona uno el otro se des selecciona
function CheckBarichara(){
    checkUp.checked==true ? checkDown.checked = false :''
}
function CheckVillanueva(){
    checkDown.checked==true ? checkUp.checked = false :''
}

//al evento change de cada checkbox se le agrega la funcion de des-seleccionar el otro check
checkUp ? checkUp.addEventListener('change',CheckBarichara ) : ''
checkDown ? checkDown.addEventListener('change',CheckVillanueva ) : ''
