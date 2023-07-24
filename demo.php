<!DOCTYPE html>
<html>
  <head>
    <title>Locator</title>
    <style>
      .marker-position {
        bottom: 5px;
        right: 1px;
        position: relative;
      }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
      #gmp-map {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
      }
    </style>
    <script>
      'use strict';
      /**
       * Defines an instance of the Locator+ solution, to be instantiated
       * when the Maps library is loaded.
       */
      function LocatorPlus(configuration) {
        const locator = this;

        locator.locations = configuration.locations || [];
        locator.capabilities = configuration.capabilities || {};

        const map_element = document.getElementById('gmp-map');
        locator.map = new google.maps.Map(map_element, configuration.mapOptions);
      }
    </script>
    <script type="text/javascript">
      markers = [];
      function removeAllMarkers() {
        for (let marker of markers) {
          marker.setMap(null);
        }
      }
      function showBusLocations() {
        var params = {
            "api_key": "42604b5787594cd8b5360df332607b8b",
            /* "RouteID": "70",
            "Lat": "{number}",
            "Lon": "{number}",
            "Radius": "{number}"*/
        };
        $.ajax({
            url: "https://api.wmata.com/Bus.svc/json/jBusPositions?" + $.param(params),
            type: "GET",
        })
        .done(function(data) {
          tempMarkers = []
          for (let item of data.BusPositions) {
            marker = new google.maps.Marker({
              position: {lat: item.Lat, lng: item.Lon},
              label: {
                text: item.RouteID,
                color: 'black',
                fontSize: '12px',
                className: 'marker-position',
              },
              map: locator.map,
              icon: "images/busicon.png"
            });
            tempMarkers.push(marker);
          };
          removeAllMarkers()
          markers = tempMarkers
        });
    };
    </script>
    <script>
      const CONFIGURATION = { 
        "mapOptions": {"center":{lat:38.9072,lng:-77.0369},"fullscreenControl":true,"mapTypeControl":false,"streetViewControl":false,"zoom":12,"zoomControl":true,"maxZoom":17,"mapId":""},
        "mapsApiKey": "AIzaSyBWewEB2WaDHz7ITuub6f3-HXGiBrdYzMg",
        "capabilities": {"input":true,"autocomplete":true,"directions":false,"distanceMatrix":true,"details":false,"actions":true}
      };

      function initMap() {
        locator = new LocatorPlus(CONFIGURATION);
        showBusLocations();
        window.setInterval(() => {
          showBusLocations();
        }, 15000)
      }
    </script>
  </head>
  <body>
    <?PHP require($_SERVER['DOCUMENT_ROOT'].'/MetroMate/navbar.php'); ?>
      <div id="gmp-map"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWewEB2WaDHz7ITuub6f3-HXGiBrdYzMg&callback=initMap&libraries=places,geometry&solution_channel=GMP_QB_locatorplus_v6_cABDF" async defer></script>
  </body>
</html> 