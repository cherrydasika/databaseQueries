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
	<script type="text/javascript" src="js/prtdetails.js"></script>
	<script>$(function(){$(".header").load("includes/nav.inc.html");	});</script>

	<link href='https://fonts.googleapis.com/css?family=Corben' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>
	<link type="text/css" rel="stylesheet" href="css/prtdetails.css">
	
	
	
</head>
<body>
<div class="grid">
		<div class="title"><p>Prixxxx Technologies</p></div>

		<div class="header"></div>

		

		<div class="content">
			<fieldset>
				<input id="edmask_id" type="text" name="edmaskId" placeholder="Enter ID">
				<ul class="edmask-options">
					<li>This is one</li>
					<li>This is two</li>
				</ul>

			</fieldset>
			
		</div>
		<div class="footer"><p>Copyright @ <a href="http://www.primetals.com" style="color:white; ">www.primetals.com</a></p></div>	


	</div>
</body>
</html>