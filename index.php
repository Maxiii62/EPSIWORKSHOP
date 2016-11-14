<!DOCTYPE html>
<html>
  <head>
    <title>Restaurants autour d'Arras</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="front/css/google.css">
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

      <b>Rayon: </b>
      <input type="text" id="rayon" placeholder="Indiquez un rayon">
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>

  </body>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgaxtdS0y_Mwk-ennUmyB9mHlpQbBGHLg&libraries=places&callback=initMap" async defer></script>
  <script src="front/js/google.js" />
  <script>
    initMap();
  </script>
</html>
