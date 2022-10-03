function iniciarMap() {
  var coord = { lat: 6.63539, lng:-73.22376 };
  var map = new google.maps.Map(document.getElementById("app_mapa"), {
    zoom: 10,
    center: coord,
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map,
  });
}
