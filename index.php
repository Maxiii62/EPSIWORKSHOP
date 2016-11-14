<!DOCTYPE html>
<html>
  <head>
    <title>Restaurants autour d'Arras</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #map {
      height: 100%;
    }
#floating-panel {
position: absolute;
top: 10px;
left: 25%;
z-index: 5;
background-color: #fff;
padding: 5px;
border: 1px solid #999;
text-align: center;
font-family: 'Roboto','sans-serif';
line-height: 30px;
padding-left: 10px;
}

#right-panel {
font-family: 'Roboto','sans-serif';
line-height: 30px;
padding-left: 10px;
}

#right-panel select, #right-panel input {
font-size: 15px;
}

#right-panel select {
width: 100%;
}

#right-panel i {
font-size: 12px;
}

    #right-panel {
      height: 100%;
      float: right;
      width: 390px;
      overflow: auto;
    }

    #map {
      margin-right: 400px;
    }

    #floating-panel {
      background: #fff;
      padding: 5px;
      font-size: 14px;
      font-family: Arial;
      border: 1px solid #ccc;
      box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
      display: none;
    }

    @media print {
      #map {
        height: 500px;
        margin: 0;
      }

      #right-panel {
        float: none;
        width: auto;
      }
    }
    </style>
    <script>
var map;
var infowindow;
var arras = {lat: 50.2819029, lng: 2.7738087};

function initMap() {

  var directionsDisplay = new google.maps.DirectionsRenderer;

  map = new google.maps.Map(document.getElementById('map'), {
    center: arras,
    zoom: 15
  });

  // directionsDisplay.setMap(map);
  // directionsDisplay.setPanel(document.getElementById('right-panel'));

  infowindow = new google.maps.InfoWindow();

  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: arras,
    radius: 1500,
    types: ['restaurant']
  }, callback);
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
    calculateAndDisplayRoute(place);
  });
}

function calculateAndDisplayRoute(place) {

  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;

  // directionsDisplay.setMap(null);
  directionsDisplay.setMap(map);
//  document.getElementById('right-panel').empty();
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  directionsService.route({
    origin: arras,
    destination: place.geometry.location,
    travelMode: google.maps.TravelMode.DRIVING,
    unitSystem: google.maps.UnitSystem.METRIC
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
  </head>
  <body>
    <div id="floating-panel">
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMap" async defer></script>
  </body>
</html>
