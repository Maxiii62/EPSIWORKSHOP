var map;
var infowindow;
var geoPosition = {lat: 50.283333, lng: 2.783333};
var destinationObjectif;
var directionsDisplay;
var directionsService;
var waypts = [];


function initMap() {

  directionsService = new google.maps.DirectionsService;
  directionsDisplay = new google.maps.DirectionsRenderer;

  map = new google.maps.Map(document.getElementById('map'), {
    center: geoPosition,
    zoom: 15
  });

  var infoWindow = new google.maps.InfoWindow({map: map});

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(document.getElementById('type-selector'));

  var autocomplete = new google.maps.places.Autocomplete(document.getElementById('pac-input'));
  autocomplete.bindTo('bounds', map);

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      geoPosition = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(geoPosition);
      infoWindow.setContent('Vous êtes ici');
      map.setCenter(geoPosition);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  $("input[name=mode]").on('click',function(){
    if(destinationObjectif){
     displayInfos(destinationObjectif);
     calculateAndDisplayRoute(destinationObjectif);
   }
  });

  autocomplete.addListener('place_changed', function() {
    // infowindow.close();
    // marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }

    calculateAndDisplayRoute(place);
    displayInfos(place);
  });

  map.addListener('dblclick', function(place) {
   placeMarkerAndPanTo(place, map);
  });

  infowindow = new google.maps.InfoWindow();

  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: geoPosition,
    radius: 15000,
    types: ['restaurant']//,'meal_takeaway','meal_delivery','cafe','food','resto','bakery']
  }, callback);
}

function placeMarkerAndPanTo(place, map) {
  var marker = new google.maps.Marker({
    position: place.latLng,
    map: map
  });

  waypts.push({
    location: place.latLng,
    stopover: true
  });


  map.panTo(place.latLng);
}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
    destinationObjectif = place;
    calculateAndDisplayRoute(place);
    displayInfos(place);
  });
}

function displayInfos(place){

  var request = {
    placeId: place.place_id
  };

  new google.maps.places.PlacesService(map).getDetails(request,displayComplementairesInfos);

  $("#photoMagasin").attr("src",place.photos[0].getUrl({'maxWidth': 1500, 'maxHeight': 1500}));

  if (place.opening_hours.open_now || !place.opening_hours){
    $("#estOuvert").text("OUVERT").css('color', 'green');
  }else{
    $("#estOuvert").text("FERME").css('color', 'red');
  }


  $("#nomMagasin").text(place.name);
  $("#adresseMagasin").text(place.vicinity);
}

function displayComplementairesInfos(place){

  $("#telephoneMagasin").text(place.international_phone_number);
  $("#siteWebMagasin").text();
  $("#siteWebMagasin").text(place.website);
  $("#siteWebMagasin").attr("href",place.website);

  $("#noteMagasin").empty();
  for(var i = 0; i < place.rating; i++){
    $("#noteMagasin").append("<i class='material-icons dp48'>star</i>");
  }

}

function calculateAndDisplayRoute(place) {
  // directionsDisplay.setMap(null);
  directionsDisplay.setMap(map);
//  document.getElementById('right-panel').empty();
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  directionsService.route({
    origin: geoPosition,
    destination: place.geometry.location,
    travelMode: $( "input[name=mode]:checked" ).val(),
    waypoints: waypts,
    unitSystem: google.maps.UnitSystem.METRIC
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections();
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

$("#createRdv").on('click',function(){
  $("#modalConnexion").openModal();
})

$(".closeModal").on('click',function(){
  $($(".modal").closest()).closeModal();
})

$( "#creationRDV" ).click(function() {
    console.log("doto");
           $.ajax({
               method: "POST",
               url : "/EPSIWORKSHOP/controller/controller.php",
               data: { ws: 'rdv', action : 'addRdv', date: $("#dateRDV").val(), horaire: $("#heureRDV").val(), coordonnees : destinationObjectif.geometry.location.lat() + ", " + destinationObjectif.geometry.location.lng(), nom : destinationObjectif.name, idUser : 1},
               success: function(response) {
                  if(response === "true"){
                    Materialize.toast('Rendez-vous ajouté ! ;-)', 4000 ,'green');
                   }else{
                     Materialize.toast('Problème(s) pour créer un rendez-vous', 4000 ,'red');
                   }
               }
          });
});
