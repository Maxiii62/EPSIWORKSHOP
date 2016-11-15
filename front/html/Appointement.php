<!DOCTYPE html>
<html>
  <head>
    <title>Créer un rendez-vous</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/google.css">
  </head>
  <body>

    <input id="pac-input" class="controls" type="text"
        placeholder="Saisissez un endroit où manger">

    <div id="type-selector" class="controls">
      <input type="radio" name="mode" id="changetype-all" value="DRIVING" checked="checked">
      <label for="changetype-all" style="color:white;">Voiture</label>

      <input type="radio" name="mode" id="changetype-establishment" value="WALKING">
      <label for="changetype-establishment" style="color:white;">Marche</label>

      <input type="radio" name="mode" id="changetype-address" value="BICYCLING">
      <label for="changetype-address" style="color:white;">Vélo</label>

      <input type="radio" name="mode" id="changetype-geocode" value="TRANSIT">
      <label for="changetype-geocode" style="color:white;">Transport en commun</label>
    </div>

    <div id="right-panel"></div>
    <div id="map"></div>

    <div class="row">
        <div class="col s12 m3">
          <div class="card hidden">
            <div class="card-image">
              <img src="" id="photoMagasin"/>
              <span class="card-title" id="nomMagasin"></span>
            </div>
            <div class="card-content">

                <div>
                    <p>ADRESSE : <span id="adresseMagasin"></span> </p>
                </div>

                <div>
                    <p>TELEPHONE : <span id="telephoneMagasin"></span> </p>
                </div>

                <div>
                    <p>SITE WEB : <a href="" id="siteWebMagasin"></a> </p>
                </div>

                <div id="statut">
                    <p>STATUT : <span id="estOuvert" style="font-weight: bold;"></span> </p>
                </div>

                <div>
                    <p>NOTE : <span id="noteMagasin"></span> </p>
                </div>


            </div>


          </div>
        </div>
      </div>



  </body>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../../materialize/js/materialize.js"></script>
  <script src="../../materialize/js/init.js"></script>
  <script src="../../materialize/js/script.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMap" async defer></script>
  <script src="../js/google.js" />
  <script>
    initMap();
    $('#mode').material_select();
  </script>
</html>
