<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Agents Locat mion</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!--<script type="text/javascript" src="js/agentLocationXMLApi.js"></script> Uncomment this to use XMLApi-->
    <script async defer type="text/javascript" src="js/agentLocationJSONApi.js"></script>
    <style>
      /* Map height is explicitly set to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Fill to windoww */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOhLidnbu8M5SHInW9ciqRrUdSuLRmR2E&callback=initMap"
        async defer></script>

  </body>
</html>