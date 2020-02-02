﻿<?php
/*
Redirect the page based on the user input. On successful connection log the details. 
*/
require('../classes/user.class.php');

if(!isset($_POST['login-submit']))
{
	header("Location: ../login.html");
	exit();
}

$userid = $_POST['userid'];
$pwd = $_POST['pwd'];
$userArr;

if(empty($userid) || empty($pwd)){
	header("Location: ../login.html?error=emptyfields");
	exit();
}
else{

	$userArr = $user->checkUserExist($userid);	
	$pwdCheck = password_verify($pwd, $userArr[0]["userpwd"]);
	if($pwdCheck==false){
		header("Location: ../login.html?error=invalidDetails");
		exit();
	}
	else if($pwdCheck==true){
		session_start();
		$_SESSION['userId']=$userArr["idusers"];
		header("Location: ../index.php?login=success");
		exit();

	}
	else{
		header("Location: ../login.html?error=invalidLogin");
		exit();
	}



}



?>


