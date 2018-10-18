
<?php
include_once './header.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 600px;  /* The height is 400 pixels */
        width: 80%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
  <center>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var regina_center = {lat: 50.445210, lng: -104.618896};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 12, center: regina_center});
  // The marker, positioned at Uluru
  //var marker = new google.maps.Marker({position: regina_center, map: map});

 
  var contentString = '<div id="content">'+
            '<h3>Cornwall</h3>'+
            '<div id="bodyContent">'+
            'Capacity: 150</br>Rate: $2/Hr</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        var icon = {
    url: "images/logo_bmp.png", // url
    scaledSize: new google.maps.Size(50, 60) // scaled size
    
};

        var marker = new google.maps.Marker({
          position: {lat: 50.451525, lng: -104.612961},
          map: map,
          icon: icon,
          title: 'Cornwall Parking\n\
Capacity: 200\n\
Rate: $2/Hr'
        });
        
                var marker1 = new google.maps.Marker({
          position: {lat: 50.417511, lng: -104.592789},
          map: map,
          icon: icon,
          title: 'University parking 1\n\
Capacity: 150\n\
Rate: $1/Hr'
        });
        var marker2 = new google.maps.Marker({
          position: {lat: 50.416178, lng: -104.587671},
          map: map,
          icon: icon,
          title: 'University parking 2 \n\
Capacity: 200\n\
Rate: $2/Hr'
        });
        var marker3 = new google.maps.Marker({
          position: {lat: 50.445589, lng: -104.533629},
          map: map,
          icon: icon,
          title: 'Victoria mall Parking\n\
Capacity: 200\n\
Rate: $2/Hr'
        });
        var marker4 = new google.maps.Marker({
          position: {lat: 50.403484, lng: -104.645675},
          map: map,
          icon: icon,
          title: 'Harbour Landing Parking\n\
Capacity: 200\n\
Rate: $2/Hr'
        });
        var marker5 = new google.maps.Marker({
          position: {lat: 50.417482, lng: -104.620048},
          map: map,
          icon: icon,
          title: 'Golden Mile Parking\n\
Capacity: 100\n\
Rate: $2/Hr'
        });
google.maps.event.addListener(marker1, 'click', function () {
            window.location.href = 'home_bmp.php?pos=1';
        });
        google.maps.event.addListener(marker, 'click', function () {
            window.location.href = 'home_bmp.php?pos=2';
        });
  google.maps.event.addListener(marker2, 'click', function () {
            window.location.href = 'home_bmp.php?pos=3';
        });
        google.maps.event.addListener(marker3, 'click', function () {
            window.location.href = 'home_bmp.php?pos=4';
        });
        google.maps.event.addListener(marker4, 'click', function () {
            window.location.href = 'home_bmp.php?pos=5';
        });
        google.maps.event.addListener(marker5, 'click', function () {
            window.location.href = 'home_bmp.php?pos=6';
        });
}


//AIzaSyCWDCyB9gofmkjNWYDTcndLtTLcaYCp5xs
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-3bG19FZpTJtcAIia80peuKR1RrvjJk4&callback=initMap">
    </script>
  </center>
  </body>
</html>