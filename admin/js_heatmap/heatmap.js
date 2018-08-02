var map, heatmap;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 21.422578, lng: 39.827725},
          mapTypeId: 'satellite'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });
      }

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
      }

      // Heatmap data
      //{lat: 21.422578, lng: 39.827725},


      // random data
      function getPoints() {
        var lotsOfMarkers = [];

        for( var i = 1; i <= 100; i++) {

           var random = new google.maps.LatLng( 21.42+(Math.floor(Math.random() * 9999) + 10000)/10000000, 39.82+(Math.floor(Math.random() * 9999) + 10000)/10000000 );

            lotsOfMarkers.push(random);
        }

        for( var i = 1; i <= 50; i++) {

           var random = new google.maps.LatLng( 21.40+(Math.floor(Math.random() * 9999) + 10000)/1000000, 39.83+(Math.floor(Math.random() * 9999) + 10000)/10000000 );

            lotsOfMarkers.push(random);
        }

        return lotsOfMarkers;
      }
