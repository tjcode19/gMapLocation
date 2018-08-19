<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Agents Locat mion</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!--<script type="text/javascript" src="js/agentLocation.js"></script>-->
    <style>
      /* Always set the map height explicitly to define the size of the div
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
    <script>
      var customLabel = {
        SuperAgent: {
          label: 'S'
        },
        Agent: {
          label: 'A'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(6.5244, 3.3792),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

         
        

          // Change this depending on the name of your PHP or XML file
        
          getJSON('apps/jsonData.json', function (err, data) {
           
            //console.log(data.agents);
          var agent = data.agents;
          for (var i = 0; i < agent.length; i++) {
            var id = agent[i].id;
            var name = agent[i].name;
            var address = agent[i].address;
            var phone = agent[i].phone;
            var type = agent[i].type;
      
             var point = new google.maps.LatLng(
                        parseFloat(agent[i].lat),
                        parseFloat(agent[i].lng)
                      );
            
              setView(name, point, address, phone, type, map,infoWindow);              
            }

          });
        }

        function setView(name, point, address, phone, type, map,infoWindow){

          var infowincontent= document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = phone
              infowincontent.appendChild(text);

              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              console.log(name);
              console.log(point);
              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

        }


/*
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }*/

      var getJSON = function(url, callback) {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'json';

        xhr.onload = function() {

            var status = xhr.status;
            
            if (status == 200) {
              xhr.onreadystatechange = doNothing;
                callback(null, xhr.response);

            } else {
              xhr.onreadystatechange = doNothing;
                callback(status);
            }
        };

        xhr.send();
        };

      function doNothing() {}
    </script>

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOhLidnbu8M5SHInW9ciqRrUdSuLRmR2E&callback=initMap"
        async defer></script>

  </body>
</html>