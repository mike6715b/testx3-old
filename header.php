<?php include "includes/dbc.inc.php"?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Ampyx v3 - Sustav za online provjeru znanja</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/jquery-3.3.1.min.js"></script>

</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<div id="header-logo">
					<a href="index.php"><img src="img/testx3.png"></a>
				</div>
			</div>
			<div id="info">
				<ul>
					<li>Bruno Rehak</li>
					<li>Vinka Rehaka 17, 34550 Pakrac</li>
					<li>tel: 034/438-421, mob:095/812/1448, <a href="http://www.mike6715b.com">www.mike6715b.com</a></li>
				</ul>
			</div>
		</div>
		<div class="status">
		<div id="logout">
			<form action="logout.php" method="get">
				<button type="sumbit" name="logout">Logout</button>
			</form>
		</div>
	</div>
	</header><!-- /header -->