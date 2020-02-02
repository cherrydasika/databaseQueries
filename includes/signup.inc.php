<?php
// Redirect the page based on success criteria for the page. Log the details for successful input
if(!isset($_POST['signup-submit']))
{
	header("Location: ../signup.php");
	exit();
}
require('../classes/user.class.php');
require('../classes/validate.class.php');

$userexist = false;
$sqlError = false;
$userid = $_POST['uid'];
$pwd = $_POST['pwd'];
$repeatPwd = $_POST['repeat-pwd'];

/* Validate the user inputs and return them back in the string */

if(empty($userid) || empty($pwd) || empty($repeatPwd)){
	header("Location: ../signup.php?signup=empty&uid=".$userid);
	exit();
}

else if(!preg_match("/^[a-zA-Z]*$/", $userid)){
	header("Location: ../signup.php?signup=invaliduname");
	exit();
}

else if($pwd!==$repeatPwd){
	header("Location: ../signup.php?signup=matcherror&uid=".$userid);
	exit();
}


else{
	$isexist = $user->checkUserExist($userid);	
	if(count($isexist)>0){
		header("Location: ../signup.php?signup=nametaken");	
		unset($user); 
		exit();
	}
	else
	{
		$sqlError = $user->registerUser($userid, $pwd);
		if($sqlError){
			header("Location: ../signup.php?signup=sqlerror&uid=".$userid);
			unset($user); 
			exit();
		}
		else{
			header("Location: ../signup.php?signup=success");
			unset($user); 
			exit();
			

		}
		
	}

} 



?>


