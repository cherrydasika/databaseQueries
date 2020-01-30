<?php

// Redirect the page based on success criteria for the page. Log the details for successful input

require('../classes/user.class.php');

if(!isset($_POST['signup-submit']))
{
	header("Location: ../signup.html");
	exit();
}

$userexist = false;
$sqlError = false;
$userid = $_POST['uid'];
$pwd = $_POST['pwd'];
$repeatPwd = $_POST['repeat-pwd'];

if(empty($userid) || empty($pwd) || empty($repeatPwd)){
	header("Location: ../signup.html?error=emptyfields&uid=".$userid);
	exit();
}

else if(!preg_match("/^[a-zA-Z0-9]*$/", $userid)){
	header("Location: ../signup.html?error=invaliduid");
	exit();
}

else if($pwd!==$repeatPwd){
	header("Location: ../signup.html?error=pwdmatch&uid=".$userid);
	exit();
}

else{
	$isexist = $user->checkUserExist($userid);	
	if(count($isexist)>0){
		header("Location: ../signup.html?error=nametaken");	
		unset($user); 
		exit();
	}
	else
	{
		$sqlError = $user->registerUser($userid, $pwd);
		if($sqlError){
			header("Location: ../signup.html?error=sqlerror&uid=".$userid);
			unset($user); 
			exit();
		}
		else{
			header("Location: ../signup.html?signup=success");
			unset($user); 
			exit();
			

		}
		
	}

} 

?>


