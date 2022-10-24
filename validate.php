<?php 
	
	/*
		Script:
			Validation script
		
		Function:
			The purpose of this script is to validate user credentials so that they can log in.
			If validation occurred successfully, the script then sets:
				'secured' cookie - true - indicates that the user is logged in
				'connected' cookie - username - stores the username of the user that is logged in
			
			If the user has indicated that they want to stay logged in, the cookies will expire in 1 day.
			Otherwise, the cookies will expire instantly.

			Redirect to the home page if successful, otherwise go back to the sign in page.
	*/
	
	//includes
	include "class/Handler.php";
	include "class/User.php";

	//DB connection using Handler class
	$handler = new Handler("root", "", "UploadImages");
	$handler->connect();
	
	$errorCode = User::validate($handler, $_POST['name'], $_POST['password'], $_POST['checkboxG3']);

	$handler = null;
 
	$headerLocation = "Location: signin.php";

	if ($errorCode === 0 || $errorCode === 1) {

		if ($errorCode === 0) {
			$expiry = time() + 60*60*24; //60*60*24 = 1 day, multiply further to get 1 month or more
		} else {
			$expiry = 0; //0 means the cookie will act like a session and die after browser is closed
		}

		$headerLocation = "Location: index.php";
		$secured = "true";
		$connected = $_POST['name'];

		setcookie("secured", $secured, $expiry, "", "", "", TRUE);
		setcookie("connected", $connected, $expiry, "", "", "", TRUE);

		header($headerLocation);
		exit();

	} else {

		header($headerLocation);
		exit();

	}

?>