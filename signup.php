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
		<div class="title"><p>Prixxxxx Technologies</p></div>	


		<div class="content">
			<form id="form-login"  action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
				<p>Signup</p>
                <input type="text" name="uid" placeholder="Username">	
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="repeat-pwd" placeholder=" Repeat Password">				
				<input type="submit" name="signup-submit">
			</form>	
			<?php					
				
				if(isset($_GET['signup'])){
					$signupCheck = $_GET['signup'];
					
					if($signupCheck=="empty"){
						echo "<p class='error'>Fields are empty</p>";
					}
					else if($signupCheck=="invaliduname"){
						echo "<p class='error'>Invalid username</p>";
					}
					else if($signupCheck=="matcherror"){
						echo "<p class='error'>Passwords do not match</p>";
					}
					else if($signupCheck=="nametaken"){
						echo "<p class='error'>Username already taken</p>";
					}
					else if($signupCheck=="success"){
						echo "<p class='success'>Successfully registered</p>";
					}
				}
			?>
		
			<p>Or to login click <a href="login.php"><b>here</b></a></p>
		</div>
		<div class="footer"></div>	
        <script>$(function(){$(".footer").load("includes/footer.inc.html");});</script>	

	</div>
</body>
</html>