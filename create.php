<?php 
	
	/*
		Script:
			User creation script
		
		Function:
			The purpose of this script is to create a new user.
			If creation occurred successfully, the user should automatically be logged in and the script sets:
				'secured' cookie - true - indicates that the user is logged in
				'connected' cookie - username - stores the username of the user that is newly logged in
			
			These cookies are also set to expire immediately.

			Redirect to the home page at the end of the script.
	*/
	
	//includes
	include "class/Handler.php";
	include "class/User.php";

	//DB connection using Handler class
	$handler = new Handler("root", "", "UploadImages");
	$handler->connect();
	
	$errorCode = User::create($handler, $_POST['name'], $_POST['password'], $_POST['email']);

	$handler = null;
 
	$headerLocation = "Location: index.php";

	if ($errorCode === 0) {

		$expiry = time() + 60*60*24; //60*60*24 = 1 day, multiply further to get 1 month or more

		$secured = "true";
		$connected = $_POST['name'];

		setcookie("secured", $secured, $expiry, "", "", "", TRUE);
		setcookie("connected", $connected, $expiry, "", "", "", TRUE);

	} 

	header($headerLocation);
	exit();

?>