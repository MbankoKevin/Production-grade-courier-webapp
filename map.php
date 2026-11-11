<?php

define("API_KEY", "AIzaSyAfl9xcfCQ8RrkePqB8Q9PtxgwQG2l7HLc");

?>
<?php 
include 'backend/conn.php';
if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM track WHERE track_id = {$id}";
    $result = $link->query($sql);

    $data = $result->fetch_assoc();

}

?>
<html>
<head>
<style>
body {
	font-family: Arial;
}

#map-layer {
	margin: 20px 0px;
	max-width: 1400px;
	min-height: 500;
  align-content: center;
}
.lbl-way-points {
    font-weight: bold;
    margin-bottom: 15px;
}
.way-points-option {
    display:inline-block;
    margin-right: 15px;
}
</style>
<script src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <h1 align="center">Package Current location and Moving</h1>
    <div>
      <h3 align="center"><a href="track.php">BACK</a></h3>
    
    <div id="map-layer"></div>
    <script>
      	var map;
		var waypoints
      	function initMap() {
        	  	var mapLayer = document.getElementById("map-layer"); 
            	var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
        		var defaultOptions = { center: centerCoordinates, zoom: 4 }
        		map = new google.maps.Map(mapLayer, defaultOptions);
	
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            directionsDisplay.setMap(map);

   
                
              
                    var start = '<?php echo $data["lon"] ?>';
                    var end = '<?php echo $data["lat"] ?>';
                    drawPath(directionsService, directionsDisplay,start,end);
                
           
            
      	}
        	function drawPath(directionsService, directionsDisplay,start,end) {
            directionsService.route({
              origin: start,
              destination: end,
              waypoints: waypoints,
              optimizeWaypoints: true,
              travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                directionsDisplay.setDirections(response);
                } else {
                window.alert('Problem in showing direction due to ' + status);
                }
            });
      }
	</script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap">
    </script>
</body>
</html> 