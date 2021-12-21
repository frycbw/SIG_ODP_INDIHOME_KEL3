
<!DOCTYPE html>
<html>
<head>
	<title>GeoJSON tutorial - Leaflet</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 1080px;
			height: 600px;
		}
	</style>
</head>
<body>
<div id='map' style="width: 1080px; height: 600px;"></div> 
<script>
	var icon = L.icon({
    iconUrl: 'assets/images/location.png',

    iconSize:     [38, 38], // size of the iconw
    iconAnchor:   [22, 38], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -45] // point from which the popup should open relative to the iconAnchor
});
	var cities = L.layerGroup();
	var ODPopt = L.layerGroup();
	var ODPmax = L.layerGroup();
	<?php
		$gis=new mysqli('localhost', 'root', '', 'sigodp');
		$res=$gis->query("SELECT *, X(lokasi) x, Y(lokasi) y FROM presensi");
		while ($r=$res->fetch_array()) {
	?>

	var marker = 
	L.marker([<?=$r['y']?>, <?=$r['x']?>], {icon: icon}).addTo(cities);
	marker.bindPopup("<b>Lokasi ODP:</b> <br /> '<?=$r['tempat']?>' <br /> Jumlah Pelanggan:<b><?=$r['pelanggan']?></b>");
	marker.on('mouseover', function(evt) {this.openPopup();} );
	marker.on('mouseup', function(evt) {this.openPopup();} );
	marker.on('mousedown', function(evt) {this.closePopup();} );

	
	var odpopt = 
	L.circle([<?=$r['y']?>, <?=$r['x']?>], 100, {
		color: 'green',
		fillColor: '#00FF00',
		fillOpacity: 0.5
	}).addTo(ODPopt).bindPopup("Lokasi mencakup area optimal ODP <b>'<?=$r['tempat']?>'<b>, bisa dipasang jaringan internet");
	odpopt.on('mouseover', function(evt) {this.openPopup();} );
	odpopt.on('mouseout', function(evt) {this.closePopup();} );

	var odpmax = 
	L.circle([<?=$r['y']?>, <?=$r['x']?>], 200, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(ODPmax).bindPopup("Lokasi mencakup area luar ODP <b>'<?=$r['tempat']?>'<b>, bisa dipasang jaringan internet"); 
	odpmax.on('mouseover', function(evt) {this.openPopup();} );
	odpmax.on('mouseout', function(evt) {this.closePopup();} ); 

	
	<?php } ?>

	var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr}),
		streets  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

	var map = L.map('map', {
		center: [-7.6, 111.9],
		zoom: 15,
		layers: [streets, cities]
	});

	var baseLayers = {
		"Grayscale": grayscale,
		"Streets": streets
	};

	var overlays = {
		"ODP": cities,
		"ODP max": ODPmax,
		"ODP opimal" : ODPopt
	};



	L.control.layers(baseLayers, overlays).addTo(map);
</script>
</body>
</html>
