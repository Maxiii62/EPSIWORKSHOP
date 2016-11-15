<!DOCTYPE html>
<html>
  <head>
    <title>Restaurants autour d'Arras</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="front/css/google.css">
    <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div id="floating-panel">
      <b>Mode de transport: </b>
      <select id="mode">
        <option value="DRIVING">Voiture</option>
        <option value="WALKING">Marche</option>
        <option value="BICYCLING">Vélo</option>
        <option value="TRANSIT">Transport en commun</option>
      </select>

      <!-- <b>Rayon: </b>
      <input type="text" id="rayon" placeholder="Indiquez un rayon"> -->
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
  <script src="materialize/js/materialize.js"></script>
  <script src="materialize/js/init.js"></script>
  <script src="materialize/js/script.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMap" async defer></script>
  <script src="front/js/google.js" />
  <script>
    initMap();
  </script>
</html>
