<?php
require('includes/session.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('includes/siteLinksUsed.inc.html'); ?>
	<title>PlateDetails</title>
	<link type="text/css" rel="stylesheet" href="css/index.css">
	<script src="js/platedetails.js" type="text/javascript"></script>

	
</head>
<body>
	<div class="container bg-light">

	<?php include('includes/siteNavigation.inc.html'); ?>
	
	

	<!-- The Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		
			<!-- Modal Header -->
			<div class="modal-header">
			<h4 class="modal-title">Weather API from OpenWeather</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
				
				
				<div class="input-group">
					<input type="text" class="form-control" id="cityName" placeholder="Enter City Name">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary" id="cityWeather">Submit</button>
					</span>
				</div>
					
				
				<table class="table table-striped table-bordered table-hover table-sm table-weather" style="margin-top:15px;">
					
					<tbody>
						
					</tbody>
					
				</table>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			
		</div>
		</div>
	</div>
		<div class="row" style="margin:15px 0;">
			<div class="col-sm-4">
				<div class="input-group">
					<input type="text" class="form-control" id="plateId" placeholder="Enter Plate ID">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary" id="plateDetails">Submit</button>
						<!-- Button to Open the Modal -->
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Open WeatherAPI</button>
					</span>
				</div>
			</div>		
		</div>			
				
		<div class="row" id="detailReportTables" style="display:none;">
			<div class="col">
				<p class="text-center">Report generated on <?php echo date("Y/m/d"); ?> at <?php echo date("h:i:sa"); ?> </p>
				<h4>Plate Basic Info<small class="text-primary">--Data from local database.</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateSummary1">
					<tbody></tbody>
					
				</table>
				<h4>Plate Change Details<small class="text-primary">--Data from local database.</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateSummary2">
					<tbody></tbody>
					
				</table>
				<h4>Plate Summary<small class="text-primary">--Data from local database.</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateSummary3">
					<thead>
						<tr><th></th><th>Target</th><th>Calculated</th><th>Measured</th></tr>								
					</thead>
					<tbody></tbody>
					
				</table>
				<h4>Plate Composition<small class="text-primary">--Data from local database.</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateComposition">					
					<tbody></tbody>
					
				</table>
				<h4>Plate Water Flow Rate <small class="text-primary">--Data from local database.</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateWaterFlowRate">
					<thead>
						<tr><th></th><th colspan="6">Top Section</th><th colspan="6">Bottom Section</th></th></tr>
						<tr><th></th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th></tr>
					</thead>
					<tbody>
						
					</tbody>
					
				</table>
				<h4>Plate Edge Masking<small class="text-danger">--Using API to get data from a different database.</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateEdgeMask">
					<thead>
						<tr><th></th><th colspan="2">Drive Side</th><th colspan="2">Operator Side</th></th></tr>
						<tr><th></th><th>Measured</th><th>Reference</th><th>Measured</th><th>Reference</th></tr>
					</thead>
					<tbody></tbody>
					
				</table>

				<h4>Plate Temperature <small class="text-danger">--Using API to get data from a database hosted on remote server (Dreamhost).</small></h4>
				<table class="table table-striped table-bordered table-hover table-sm table-plateTemperature">
					<thead>
						<tr><th><th colspan="9">Entry Side</th>
						<tr><th><th colspan="3">Head</th><th colspan="3">Center</th><th colspan="3">Tail</th></tr>
						<tr><th></th><th>H</th><th>T</th><th>OT</th><th>H</th><th>T</th><th>OT</th><th>H</th><th>T</th><th>OT</th></tr>
					</thead>
					<tbody></tbody>
					
				</table>

				
				
				
			
			</div>
			
		</div>
	</div>
	
	
</body>
</html>