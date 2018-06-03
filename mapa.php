<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false&key=AIzaSyBUumAlYDzLHWD8KaIQWY6siQn0sF1lBcs"></script>
    <script src="mapa.js" type="text/javascript"></script>
  </head>
  <body>
    <center>
      <a href="" id="local"></a>
      <a href="" id="fecha" style= "color: black;"></a>
      <a href="" id="visita"></a>
    </center>
    <center>
      <img id="img_local"  alt="" height="128" width="128">
      <span id="puntaje" style="font-size: 30px;"></span>
      <img id="img_visita" alt="" height="128" width="128">
    </center>
    <center>
    <h5 id="distancia"></h5>
    <h5 id="tiempo"></h5>
    </center>
      <!-- <div class="container-fluid">
        <div class="row">
        
        </div>
      </div> -->
      <br>
      <div id="map"></div>
  </body>
</html>