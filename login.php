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



	<link href='https://fonts.googleapis.com/css?family=Corben' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>
	<link type="text/css" rel="stylesheet" href="css/login.css">

	
	
</head>
<body>
<div class="grid">
		<div class="title"><p>Prixxxx Technologies</p></div>	
		<div class="content">
			<form id="form-login"  action="includes/login.inc.php" method="POST" enctype="multipart/form-data">
				<p>Login</p>
                <input type="text" name="userid" placeholder="Username">	
                <input type="password" name="pwd" placeholder="Password">			
				<input type="submit" name="login-submit">
			</form>	
			<?php 
				if(isset($_GET['error'])){
					$loginCheck = $_GET['error'];
					if($loginCheck =='emptyfields'){
						echo "<p class='error'>Username or Password empty</p>";
					}
					else if($loginCheck =='invalidDetails'){
						echo "<p class='error'>Username or Password invalid</p>";
					}
					else if($loginCheck =='invalidLogin'){
						echo "<p class='error'>Something went wrong. Please try again later.</p>";
					}
				}
			?>	
            <p>Or to signup please click <a href="signup.php"><b>here</b></a></p>
        </div>       
		<div class="footer"></div>	
        <script>$(function(){$(".footer").load("includes/footer.inc.html");});</script>	

	</div>
</body>
</html>