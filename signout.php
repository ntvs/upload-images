<?php 

	/*
		Script:
			Sign out script
		
		Function:
			The purpose of this script is to sign out the user.
			The script sets the:
				'secured' cookie - false - indicates that the user is logged out
				'connected' cookie - empty - clears the username of the user that was previously logged in
			
			The cookies will also expire instantly once the script runs.
			
			Redirect to the sign in page once done.

	*/

	$expiry = time()-time()+1; 

	setcookie("secured", "false", $expiry, "", "", "", TRUE);
	setcookie("connected", "empty", $expiry, "", "", "", TRUE);

	header("Location: signin.php");
	exit();

?>