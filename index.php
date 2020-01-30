<?php
require('includes/session.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Summary</title>

	<script type="text/javascript"
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="	crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script>$(function(){$(".header").load("includes/nav.inc.html");	});</script>	


	<link href='https://fonts.googleapis.com/css?family=Corben' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>
	<link type="text/css" rel="stylesheet" href="css/index.css">

	
</head>
<body>
	<div class="grid">
		<div class="title"><p>Prixxxx Technologies</p></div>

		<div class="header"></div>

		<div class="sidebar" >
			<form id="summary-form"  action="includes/index-summary.inc.php" method="POST" enctype="multipart/form-data">
				<p>Start date</p>
				<input type="date" id="start" name="product-start">
				<p>End date</p>
				<input type="date" id="end" name="product-end">
				<input type="submit" name="submit">
			</form>
			<div id="test"></div>
			
		</div>


		<div class="content">
			<table class="index-table">
				<thead><tr><th>MEID</th><th>COOLINGMODE</th><th>PLATETHICK</th><th>PLATEWIDTH</th><th>PLATELENGTH</th><th>PLATESPEED</th></tr></thead>
				<tbody></tbody>
			</table>
			
		</div>
		<div class="footer"></div>	
		<script>$(function(){$(".footer").load("includes/footer.inc.html");});</script>	


	</div>
</body>
</html>