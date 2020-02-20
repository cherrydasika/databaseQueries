<?php
require('includes/session.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('includes/siteLinksUsed.inc.html'); ?>
	<title>Index</title>
	<link type="text/css" rel="stylesheet" href="css/index.css">
	<script src="js/index.js" type="text/javascript"></script>

	
</head>
<body>
	<div class="container bg-light">
	<?php include('includes/siteNavigation.inc.html'); ?>
		<div class="row" style="margin-top:10px;">
			<div class="col-sm-3">
				
					<div class="form-group">
							<label for="start-date">Start Date:</label>
							<input type="date" class="form-control" id="start-date">
					</div>
					<div class="form-group">
							<label for="end-date">End Date:</label>
							<input type="date" class="form-control" id="end-date">
					</div>					
					<button type="submit" class="btn btn-primary" id="form-submit">Submit</button>
				
			</div>
			<div class="col-sm-9">
				<table class="table table-striped table-bordered table-hover table-sm table-plateSummary">
					<thead>
						<tr><th>PlateId</th><th>Mode</th><th>Thickness</th><th>Width</th><th>Length</th><th>Speed</th><th>Start Temp</th><th>Finish Temp</th></tr>
						<tr><th></th><th></th><th>(mm)</th><th>(mm)</th><th>(mm)</th><th>(m/s)</th><th>(°C )</th><th>(°C )</th></tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="text-xs-center" >
					<ul class="pagination" style="width:300px; margin: 0 auto;">
						<li class="page-item"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item "><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
	
	
</body>
</html>