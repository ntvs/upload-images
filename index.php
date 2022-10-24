<?php

	/*
		View:
			Home page
		
		Function:
			This view displays all pictures uploaded to the site & an upload form if the user is signed in.
			Otherwise, displays an informational home page with a sign up form.
	*/
	
	//includes
	include "class/Handler.php";
	include "class/User.php";
	include "class/Image.php";

	//DB connection using Handler class
	$handler = new Handler("root", "", "UploadImages");
	$handler->connect();

	$names = User::getUsers($handler);
	$images = Image::getImages($handler);
	$handler = null;

	/*echo "Users in DB: ";

	foreach ($names as $name) {
		echo $name['username'] . ", ";
	}

	echo "<br />";*/

	/*foreach ($images as $image) {
		echo $image['caption'] . " by: " . $image['uploader'] . " at: " . $image['uploadDate'] . ", ";

		echo "<img src=\"" . $image['fileLocation'] . "\" width=\"200px\"> <br />";
	}*/

	$title = "Home";
	$content = "Empty";

	if (isset($_COOKIE['secured'])) {
		

		$contentLeft = "

			<h1>Upload</h1>

			<!--Sign Up Form-->
			<form id=\"dragUpload\" action=\"upload.php\" method=\"POST\" enctype=\"multipart/form-data\">
				<ul>
					<li><input type=\"file\" name=\"filez\" id=\"fileInput\" style=\"display: none;\" onchange=\"addFiles(event);\" onselect=\"addFiles(event);\" required> <label for=\"fileInput\" id=\"fileLabel\" ondragover=\"overrideDefault(event); fileHover();\" ondragenter=\"overrideDefault(event); fileHover();\" ondragleave=\"overrideDefault(event); fileHoverEnd();\" ondrop=\"overrideDefault(event); fileHoverEnd(); addFiles(event);\"><h2 id=\"labelText\">Drag image to upload</h2><p>photos may be up to 2mb</p><p>files supported are .png .jpg</p></label></li>

					<li><p>Title/caption</p> <br /> <input type=\"text\" name=\"title\" style=\"width: 97%;\" required></li>

					<li><button name=\"upload\" id=\"uploadButton\" type=\"submit\">Upload</button></li>
				</ul>
			</form>

			<script>

				var dragUpload = document.getElementById(\"fileLabel\");
				var dragText = document.getElementById(\"labelText\");
				var fileInput = document.getElementById(\"fileInput\");
				var droppedFiles;

				function overrideDefault(event) {
					event.preventDefault();
					event.stopPropagation();
				}

				function fileHover() {
					dragUpload.classList.add(\"hovered\");
				}

				function fileHoverEnd() {
					dragUpload.classList.remove(\"hovered\");
				}

				function addFiles(event) {
					fileInput.files = event.dataTransfer.files;

					droppedFiles = event.target.files || event.dataTransfer.files;
					showFiles(droppedFiles);
					console.log(droppedFiles);
				}

				function showFiles(files) {
					if (files.length) {
						if (files[0].name.length > 20) {

							string = files[0].name;
							tokens = string.split(\"\");
							newString = \"\";

							for (var i = 0; i < 20; i++) {
								if (i == 19) {
									newString += \"...\";
								} else {
									newString += tokens[i];
								}
							}

							dragText.innerText = newString;

						} else {
							dragText.innerText = files[0].name;
						}
					}
				}

			</script>

		";

		$content = "

			<!--Right Column-->
			<div class=\"col\">
				<h1>Content</h1>
				<br />
				<p>Images Css Grid</p>

			</div>

			<!--Splitter-->
			<div class=\"col\" style=\"width: 140px;\"></div>

			<!--Left Column-->
			<div class=\"col\">
				<h1>Upload</h1>

				<!--Sign Up Form-->
				<form id=\"dragUpload\" action=\"upload.php\" method=\"POST\" enctype=\"multipart/form-data\">
					<ul>
						<li><input type=\"file\" name=\"filez\" id=\"fileInput\" style=\"display: none;\"> <label for=\"fileInput\" id=\"fileLabel\">Drag image to upload</label></li>

						<li><p>Title/caption</p> <br /> <input type=\"text\" name=\"title\" style=\"width: 402px;\" required></li>

						<li><button name=\"upload\" id=\"uploadButton\" type=\"submit\">Upload</button></li>
					</ul>
				</form>
			</div>

		";


	} else {
		
		$contentRight = "

			<h1>What is UI?</h1>
			<br />
			<p>UploadImages is a simple web application that allows users to view and download images uploaded by people around the world. To get started, log in or create a new account now!</p>

			<a href=\"\"><img src=\"img/uploadImagesGlyph.png\" style=\"margin-top: 110px;\"></a>

		";

		$contentLeft = "

			<h1>Make an account</h1>

			<!--Sign Up Form-->
			<form id=\"signUpForm\" action=\"create.php\" method=\"POST\">
				<ul>
	
					<li><p>Username</p> <br /> <input type=\"text\" name=\"name\"style=\"width: 97%;\" required></li>
					<li><p>Password</p> <br /> <input type=\"password\" name=\"password\"style=\"width: 97%;\" required></li>

					<li><p>Email</p> <br /> <input type=\"email\" name=\"email\" style=\"width: 97%;\" required></li>

					<li><ul>

						<!--http://www.csscheckbox.com/checkbox/43237/unoffensive-blue-check/-->
						<li><input type=\"checkbox\" name=\"checkboxG1\" id=\"checkboxG1\" class=\"css-checkbox\" required/><label for=\"checkboxG1\" class=\"css-label\">I am 18 years or older</label></li>
						<li><input type=\"checkbox\" name=\"checkboxG2\" id=\"checkboxG2\" class=\"css-checkbox\" required/><label for=\"checkboxG2\" class=\"css-label\">I agree with the terms</label></li>

					</ul></li>

					<li><button id=\"signUpButton\" type=\"submit\">Sign Up</button></li>
				</ul>
			</form>

		";

		$content = "

			<!--Right Column-->
			<div class=\"col\">
				<h1>What is UI?</h1>
				<br />
				<p>UploadImages is a simple web application that allows users to view and download images uploaded by people around the world. To get started, log in or create a new account now!</p>

				<a href=\"\"><img src=\"img/uploadImagesGlyph.png\" style=\"margin-top: 110px;\"></a>
			</div>

			<!--Splitter-->
			<div class=\"col\" style=\"width: 140px;\"></div>

			<!--Left Column-->
			<div class=\"col\">
				<h1>Make an account</h1>

				<!--Sign Up Form-->
				<form id=\"signUpForm\" action=\"create.php\" method=\"POST\">
					<ul>
						<li><ul>
							<li><p>Username</p> <br /> <input type=\"text\" name=\"name\"style=\"width: 190px;\" required></li>
							<li><p>Password</p> <br /> <input type=\"password\" name=\"password\"style=\"width: 190px;\" required></li>
						</ul></li>

						<li><p>Email</p> <br /> <input type=\"email\" name=\"email\" style=\"width: 402px;\" required></li>

						<li><ul>

							<!--http://www.csscheckbox.com/checkbox/43237/unoffensive-blue-check/-->
							<li><input type=\"checkbox\" name=\"checkboxG1\" id=\"checkboxG1\" class=\"css-checkbox\" required/><label for=\"checkboxG1\" class=\"css-label\">I am 18 years or older</label></li>
							<li><input type=\"checkbox\" name=\"checkboxG2\" id=\"checkboxG2\" class=\"css-checkbox\" required/><label for=\"checkboxG2\" class=\"css-label\">I agree with the terms</label></li>

						</ul></li>

						<li><button id=\"signUpButton\" type=\"submit\">Sign Up</button></li>
					</ul>
				</form>
			</div>

		";

	}

	
	

	include "include/base.inc.php";

?>
