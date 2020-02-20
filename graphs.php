<?php
require('includes/session.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('includes/siteLinksUsed.inc.html'); ?>
	<title>PlateDetails</title>
	<link type="text/css" rel="stylesheet" href="css/index.css">
	<script src="js/graphs.js" type="text/javascript"></script>
	<script>

</script>
	
</head>
<body>

<div class="container bg-light">
<?php include('includes/siteNavigation.inc.html'); ?>
	<div class="row" style="margin:15px 0">
		<div class="col">
			<h4><small>1. Temperatures error across product cooling machine</small> </h4>
			<button type="submit" class="btn btn-primary" id="plateTemperature">Show</button>
			<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
			
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h4><small>2. Product pass rate</small> </h4>
			<button type="submit" class="btn btn-primary" id="platePassRate">Show</button>
			<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
			
			
		</div>
	</div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>