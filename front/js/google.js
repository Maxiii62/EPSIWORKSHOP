var map;
var infowindow;
var geoPosition = {lat: 50.283333, lng: 2.783333};
var destinationObjectif;
var directionsDisplay;
var directionsService;
var waypts = [];
var autoStop;
var idRdv;
var demarrageRoute;


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
    //types: ['restaurant']//,'meal_takeaway','meal_delivery','cafe','food','resto','bakery']
    types: ['restaurant','meal_takeaway','meal_delivery','cafe','food','resto','bakery']
  }, callback);
}


function initMapAppointements(){
  directionsService = new google.maps.DirectionsService;
  directionsDisplay = new google.maps.DirectionsRenderer;

  map = new google.maps.Map(document.getElementById('map'), {
    center: geoPosition,
    zoom: 15
  });

  var infoWindow = new google.maps.InfoWindow({map: map});

  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(document.getElementById('type-selector'));

  var autocomplete = new google.maps.places.Autocomplete(document.getElementById('endroitConducteurPrendre'));
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
    autoStop = place;


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

  $(".hideMagasin").removeClass("hide");

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

  destinationObjectif = place;

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

$(".participer").on('click',function(){
  $("#modalParticiper").openModal();
})

function participer(){
  $("#modalParticiper").openModal();
  idRdv = $(event.target).parents().closest("tr").attr("id");
}

$(".closeModal").on('click',function(){
  $($(".modal").closest()).closeModal();
})

$( "#creationRDV" ).click(function() {

    var date = new Date($("#datepicker_register").val());

    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();

           $.ajax({
               method: "POST",
               url : "/EPSIWORKSHOP/controller/controller.php",
               data: { ws: 'rdv', action : 'addRdv', date: year+"-"+month + "-" + day, horaire: $("#horaireRDV").val(), coordonnees : formatPositionDataBase(destinationObjectif.geometry.location.lat()) + ", " + formatPositionDataBase(destinationObjectif.geometry.location.lng()), nom : destinationObjectif.name, idUser : $("#id").val(), nbPlaces : $("#nbPlaces").val(),geoPosition : formatPositionDataBase(geoPosition.lat) + ", " + formatPositionDataBase(geoPosition.lng)},
               success: function(response) {
                  if(response === "true"){
                    Materialize.toast('Rendez-vous ajouté ! ;-)', 4000 ,'green');
                   }else{
                     Materialize.toast('Problème(s) pour créer un rendez-vous', 4000 ,'red');
                   }
               }
          });
});

function initLieuxSelect(){
  $.ajax({
      method: "POST",
      url : "/EPSIWORKSHOP/controller/controller.php?",
      data: { ws: 'rdv', action : 'getAllLieux'},
      success: function(response) {
        $("#selectLesLieux option").remove();

        $("#selectLesLieux").append("<option value='' disabled selected></option>")

        for(var i = 0; i < JSON.parse(response).length;i++){
            $("#selectLesLieux").append("<option value='" + JSON.parse(response)[i].coordonnees + "'>" + JSON.parse(response)[i].nomLieu + "</option>");
        }
      }
 });
}

$( "#searchRdv" ).click(function() {
  $.ajax({
      method: "POST",
      url : "/EPSIWORKSHOP/controller/controller.php?",
      data: { ws: 'rdv', action : 'getSearch', date: $("#dateRDV").val(), horaire: $("#horaireRDV").val(), coordonnees : $("#selectLesLieux").val(), nom: $("#selectLesLieux option:selected").text().replace("'","''"), idUser : $("#id").val()},
      success: function(response) {
        $("#lesRdv tr").remove();

         if(JSON.parse(response).length > 0){
           for(var i = 0; i < JSON.parse(response).length;i++){
               $("#lesRdv").append("<tr id="+JSON.parse(response)[i].idRdv+"><td>" + JSON.parse(response)[i].nom + " " + JSON.parse(response)[i].prenom + "'</td><td>" + JSON.parse(response)[i].horaire + "</td><td>" + JSON.parse(response)[i].nbPlaces + "</td><td>" + JSON.parse(response)[i].positionInitiale + "</td><td></button><button class='btn waves-effect waves-light blue' onclick='drawTrajetRDV("+JSON.parse(response)[i].idRdv + ")' name='action'>Voir le chemin<i class='material-icons right'>search</i></button><button class='btn waves-effect waves-light' onclick='participer()' type='submit' name='action'>JOINDRE<i class='material-icons right'>send</i></td><tr>");

               var coordonnees = {
                   geometry : {
                       location : {
                         lat : "",
                         lng : ""
                       }
                   }
               };

               var string = JSON.parse(response)[i].positionInitiale.split(",");

               var obj = {};
               obj.lat = parseFloat(string[0]);
               obj.lng = parseFloat(string[1]);

             }
          }else{
            $("#lesRdv").append("<tr><td colspan='4'>Aucun résulat</td><tr>");
            Materialize.toast('Aucun résultat', 4000 ,'red');
          }
      }
 });
});

$("#switchDirect").on("change",function(){
  if ($("#switchDirect").prop( "checked" )){
    $("#prendsMoiEndroit").addClass("hide");
  }else{
    $("#prendsMoiEndroit").removeClass("hide");
  }
})

$("#joinRdv").on("click",function(){

    var bool = $("#switchDirect").attr("checked");

    if (autoStop){
      $.ajax({
          method: "POST",
          url : "/EPSIWORKSHOP/controller/controller.php?",
          data: { ws: 'rdv', action : 'goRdv', idUser: $("#id").val(), idRdv: idRdv, position : formatPositionDataBase(autoStop.geometry.location.lat()) + ", " + formatPositionDataBase(autoStop.geometry.location.lng())},
          success: function(response) {
             if(parseFloat(JSON.parse(response)) > 0){
               Materialize.toast('Quelqu\'un viendra vous chercher ! ;-)', 4000 ,'green');
              }else{
                Materialize.toast('Problème(s) pour créer un rendez-vous', 4000 ,'red');
              }
          }
     });
   }else{
     $.ajax({
         method: "POST",
         url : "/EPSIWORKSHOP/controller/controller.php?",
         data: { ws: 'rdv', action : 'goRdv', idUser: $("#id").val(), idRdv: idRdv },
         success: function(response) {
            if(parseFloat(JSON.parse(response)) > 0){
              Materialize.toast('On se rejoint là bas ! ;-)', 4000 ,'green');
             }else{
               Materialize.toast('Problème(s) pour créer un rendez-vous', 4000 ,'red');
             }
         }
    });
   }
   $("#modalParticiper").closeModal();
   drawTrajetRDV(idRdv);
})

$("#selectLesLieux").on("change",function(){
 var coordonnees = {
     geometry : {
         location : {
           lat : "",
           lng : ""
         }
     }
 };

 var string = $("#selectLesLieux").val().split(",");

 coordonnees.geometry.location.lat = parseFloat(string[0]);
 coordonnees.geometry.location.lng = parseFloat(string[1]);

 calculateAndDisplayRoute(coordonnees);
 displayInfos(coordonnees);
 });


function drawTrajetRDV(idRdv){
  infoWindow = new google.maps.InfoWindow({map: map});

  $.ajax({
      method: "POST",
      url : "/EPSIWORKSHOP/controller/controller.php?",
      data: { ws: 'rdv', action : 'draw', idRdv: idRdv },
      success: function(response) {

        var result = JSON.parse(response);
        var coordonneesFin = result.infoTrajet.fin;
        var coordonneesDebut = result.infoTrajet.debut;
          //50.292761, 2.780611

          var debut = {
                    lat : parseFloat(coordonneesDebut.toString().split(",")[0]),
                    lng : parseFloat(coordonneesDebut.toString().split(",")[1])
          };

          infoWindow.setPosition(debut);
          infoWindow.setContent("Point de départ du conducteur " + result.infoTrajet.conducteur);

         var fin = {
             geometry : {
                 location : {
                   lat : parseFloat(coordonneesFin.toString().split(",")[0]),
                   lng : parseFloat(coordonneesFin.toString().split(",")[1])
                 }
             }
         };

        var finDisplay = debut;

        finDisplay.lat = parseFloat(coordonneesFin.toString().split(",")[0]);
        finDisplay.lng = parseFloat(coordonneesFin.toString().split(",")[1]);

         infoWindow.setPosition(finDisplay);
         infoWindow.setContent("Arrivée à " + result.infoTrajet.nomLieu);

         waypts = [];

         for (var i = 0; i < result.detours.length;i++){

           var chaine = result.detours[i].positionParticipant;

           var prendre = {
             lat : parseFloat(chaine.split(",")[0]),
             lng : parseFloat(chaine.split(",")[1])
           }

           waypts.push({
             location: prendre,
             stopover: true
           });

           var affichage = new google.maps.Marker({
              position: prendre,
              map: map,
              title: result.detours[i].autostoppeur
            });
            affichage.addListener('click', function() {
              infowindow.open(map, marker);
            });

        }

         geoPosition = debut;
         calculateAndDisplayRoute(fin);
         displayInfos(fin);

      }
 });
}

function formatPositionDataBase(chaine){

  var base = chaine.toString().split(".");

  var premierePartie = base[0];
  var deuxiemePartie = base[1];

  deuxiemePartie = deuxiemePartie.toString().substring(0,6);

  return premierePartie + "."+deuxiemePartie;
};
