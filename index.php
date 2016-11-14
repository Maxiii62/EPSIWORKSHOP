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
