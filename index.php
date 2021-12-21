<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ODPNganjuk</title>
	<link type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
	integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
	crossorigin="">
	<link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">



	<style>
		html, body {
			color: #757575;
			font-family : 'Open Sans', sans-serif;
			font-style : normal;
			font-weight : 400;
		}
		
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-dark" id="navbar_hight">
		<div class="container">
			<!-- Just an image -->
			<nav class="navbar navbar-light">
				<a class="navbar-brand" href="#">
					<img src="assets/images/11.png" width="50px" height="auto" alt="">
				</a>
				<div class="row">
					<div class="col-md-12 text-light"><h4>Sistem Informasi Geografis</h4></div>
					<div class="col-md-12 text-light"><h4>Informasi Titik ODP indihome di Nganjuk</h4></div>
				</div>
			</nav>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="navbar_hight">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?page=profile">Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?page=listodp">List ODP</a>
					</li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link" href="?page=daftarodp">Daftarkan ODP</a>
					</li>
					</ul>
			</div>
		</div>
	</nav>
	<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	switch ($_GET['page']) {
		case 'profile':
			include 'profile.php';
			break;
		case 'listodp':
			include 'data/list_odp.php';
			break;
			case 'daftarodp':
				include 'data/daftarkan.php';
				break;
		
		default:
			include 'home.php';
			break;
	}
	?>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	

	<script type="text/javascript" src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
	integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
	crossorigin=""></script>
	<script type="text/javascript">
		
	</script>
	<!--Datatables-->
	<script src="admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#example1').DataTable();
	</script>
</body>
</html>