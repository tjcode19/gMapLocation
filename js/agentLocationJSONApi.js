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

     
    

      // This will get raw json data and populate it to javascript        
      getJSON('data/jsonData.json', function (err, data) {
      var agent = data.agents;
      Array.prototype.forEach.call(agent, function(agentElem) {
        var id = agentElem.id;
        var name = agentElem.name;
        var address = agentElem.address;
        var phone = agentElem.phone;
        var type = agentElem.type;
  
         var point = new google.maps.LatLng(
                    parseFloat(agentElem.lat),
                    parseFloat(agentElem.lng)
                  );
          
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
        });

      });
    }

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