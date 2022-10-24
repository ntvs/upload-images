<?php

	/*
		View:
			Sign in page
		
		Function:
			This view displays a form to sign into the site if the user is not logged in.
			If the user IS logged in, then this page is inaccessible and redirects to the home page.
	*/

	//includes
	include "class/Handler.php";
	include "class/User.php";

	$title = "Sign in";

	$contentRight = "

		<h1 >Have an Account?</h1>
		<br />
		<p>Just sign in to gain access to all our features, including photo sharing, uploading, and downloading!</p>

		<a href=\"\"><img src=\"img/uploadImagesGlyph.png\" style=\"margin-top: 89px;\"></a>

	";

	$contentLeft = "

		<h1>Sign In</h1>

		<!--Sign Up Form-->
		<form id=\"signUpForm\" method=\"POST\" action=\"validate.php\">
			<ul>
				<li><p>Username</p> <br /> <input type=\"text\" name=\"name\"style=\"width: 97%;\" required></li>
				<li><p>Password</p> <br /> <input type=\"password\" name=\"password\"style=\"width: 97%;\" required></li>

				<!--http://www.csscheckbox.com/checkbox/43237/unoffensive-blue-check/-->
				<li><input type=\"checkbox\" name=\"checkboxG3\" id=\"checkboxG3\" class=\"css-checkbox\" /><label for=\"checkboxG3\" class=\"css-label\">Stay logged in</label></li>

				<li><button id=\"signInButton\" type=\"submit\">Sign In</button></li>
		</form>

	";


	$content = "

		<!--Right Column-->
		<div class=\"col\">
			<h1 >Have an Account?</h1>
			<br />
			<p>Just sign in to gain access to all our features, including photo sharing, uploading, and downloading!</p>

			<a href=\"\"><img src=\"img/uploadImagesGlyph.png\" style=\"margin-top: 89px;\"></a>
		</div>

		<!--Splitter-->
		<div class=\"col\" style=\"width: 140px;\"></div>

		<!--Left Column-->
		<div class=\"col\">
			<h1>Sign In</h1>

			<!--Sign Up Form-->
			<form id=\"signUpForm\" method=\"POST\" action=\"validate.php\">
				<ul>
					<li><ul>
						<li><p>Username or email</p> <br /> <input type=\"text\" name=\"name\"style=\"width: 190px;\" required></li>
						<li><p>Password</p> <br /> <input type=\"password\" name=\"password\"style=\"width: 190px;\" required></li>
					</ul></li>

					<!--
					<li><p>Username or email</p> <br /> <input type=\"text\" name=\"name\" style=\"width: 402px;\"></li>

					<li><p>Password</p> <br /> <input type=\"password\" name=\"password\" style=\"width: 402px;\"></li>
					-->

					<!--http://www.csscheckbox.com/checkbox/43237/unoffensive-blue-check/-->
					<li><input type=\"checkbox\" name=\"checkboxG3\" id=\"checkboxG3\" class=\"css-checkbox\" /><label for=\"checkboxG3\" class=\"css-label\">Stay logged in</label></li>

					<li><button id=\"signInButton\" type=\"submit\">Sign In</button></li>
			</form>
		</div>

	"; 

	if (isset($_COOKIE['secured'])) {
		header("Location: index.php");
	} else {
		include "include/base.inc.php";
	}	