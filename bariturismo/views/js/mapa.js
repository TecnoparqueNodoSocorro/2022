


let map

let extraerC = document.querySelectorAll(".extraerC");
extraerC.forEach((el) => {
  
  el.addEventListener("click", (e) => {

    x = parseFloat(el.dataset.x)
    y = parseFloat(el.dataset.y)
/* 
    console.log(typeof x);
    console.log(typeof y); */
    $('#modalMapa').modal('show');
    iniciarMap(x,y)

  })
})

function iniciarMap(x,y) {
  
  let coord = { lat: x, lng: y };
  
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: coord,

  });
  let marker = new google.maps.Marker({
    position: coord,
    map: map
  });
  

}

/* const googleMapsScript = document.createElement('script');
googleMapsScript.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCNwjb8sRHTavZOap3RKPwVsOyAwo8nDXw&callback=iniciarMap';
document.head.appendChild(googleMapsScript); */