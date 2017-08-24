<!doctype html>
<html lang="pt-br">
	<head>
		<title>
			Location API Android - PI 2017
		</title>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="./css/font/awesome/css/font-awesome.min.css" type="text/css" />
		<link rel="stylesheet" href="./css/location-api.css" type="text/css" />
		
	</head>
	
	<body>
		<!-- start HEADER -->
			<div id="header">
				<div class="left">
					<i class="fa fa-map-marker"></i>
					Location API Android
				</div>
				<div class="right">
					<a href="http:www.google.com" target="_blank" title="PI 2017">
						PI 2017
						<i class="fa fa-external-link"></i>
					</a>
				</div>

				<div class="cf"></div>
			</div>
		<!-- end HEADER -->
			



		<!-- start CONTENT -->
			<div id="content">
				<ul class="menu">
					<li>
						<a href="package/ctrl/CtrlMap.php|get-map-content" title="Tracking" class="selected">
							Tracking User
						</a>
					</li>
					<li>
						<a href="package/ctrl/CtrlMap.php|get-form-create-place" title="Cadastrar Places">
							Cadastrar UBS
						</a>
					</li>
					<li>
						<a href="package/ctrl/CtrlMap.php|get-form-update-place" title="Editar Places">
							Editar UBS
						</a>
					</li>
				</ul>

				<div id="ajax-content">
					<?php
						require_once(__PATH__.'view/content-location-api-app.php');
					?>
				</div>

				<div class="cf"></div>
			</div>
		<!-- end CONTENT -->
		



		<!-- start JAVASCRIPT -->
			<script type="text/javascript" src="./js/jquery.js" ></script>
			<script type="text/javascript" src="./js/modernizr.js" ></script>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC7LuI1mMcgzxjjfWq61vfFMab9YUkdRc&sensor=false&libraries=places"></script>
			<script type="text/javascript" src="./js/location-api.js" ></script>
		<!-- end JAVASCRIPT -->
	</body>
</html>