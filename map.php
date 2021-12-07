<?php
 include "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>MY MAP</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="leaflet/leaflet.css"> -->
	<!-- <script src="leaflet.js"></script> -->



	<style type="text/css">
		#map {
			height: 400px;
			width: 100%;
			border: 1px solid blue;
		}

		.location {
			font-style: initial;
			font-family: "Trebuchet MS", Verdana, sans-serif;
		}
	</style>

</head>

<body>

	<div id="map" class="map">
		<script type="text/javascript">
			var map = L.map('map', {
				center: [-0.416665, 36.9499962],
				zoom: 13
			});
			var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright"></a> IoT and GIS'
			}).addTo(map);
			// var marker = L.marker([-0.416665, 36.9499962],).addTo(map).bindPopup('data').openPopup();

			// var blueIcon =  new normal_icon ({imageUrl: 'leaflet/images/marker-icon-2x.png'}),

		<?php
			$conn = new mysqli("localhost" ,"root", "","muringato");
			$result = mysqli_query($conn,"SELECT latitude,longitude, ph ,ec ,temperature, turbidity FROM water_quality WHERE latitude is not NULL or longitude is not NULL or ph is not NULL or ec is not NULL or temperature is not NULL or turbidity is not NULL");

        while ($row = mysqli_fetch_assoc($result)) {
			?>
			
			 var marker = L.marker([<?php echo $row['latitude']?>,<?php echo $row['longitude'] ?>]).addTo(map).bindPopup(<?php echo $row['temperature'] ?>); 
			
             <?php
 			       }
		       ?>  

		</script>

	</div>
	<center><a href="dashboard.php">Back to Dashboard</a></center>

</body>

</html>