<?php 
	
	/*
		Template:
			Base page
		
		Function:
			Changes the header based on whether or not the user is logged in or not.
			Also contains the logic to display images which are fetched from the the image table if the user is logged in.
	*/


	//includes
	//include "class/Handler.php";
	//include "class/User.php";

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="img/favicon.png">

	<title><?php echo $title;?> - UploadImages</title>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/checkbox.css">

</head>
<body>

<?php 

	if (isset($_COOKIE['secured'])) {
		include "include/mastheadUser.inc.php";
	} else {
		include "include/masthead.inc.php";
	}

?>

<br />

<div class="wrapper">
	
	<div class="content">

		<!--Right Column-->
			<div class="col">

				<?php

				if (isset($_COOKIE['secured'])) {
					echo "<h1>Content</h1>";
					echo "<div class=\"imageGrid\">";
				} else {

				}

				?>
					
					<?php
						if (isset($_COOKIE['secured'])) {

							echo "<br />";

							if (count($images) > 0) {
								foreach ($images as $image) {

									//echo "<a href=\"\">"

									echo "<h3 style=\"font-weight: 100; font-size: 20px;\">" . $image['caption'] . "</h3>";

									echo "<a class=\"picPanel\" style=\"background-image: url('" . $image['fileLocation'] . "'); background-size: fit; background-repeat: no-repeat; background-size: cover; background-position: center; display: block;\" href=\"" . $image['fileLocation'] . "\" target=\"_blank\">";

									//echo "<img src=\"" . $image['fileLocation'] . "\" width=\"200px\" height=\"200px\"> <br />";
									echo "</a>";
						
									echo "<div class=\"uploaderTag\">" . $image['uploader'] . "</div>";
								}
							} else {
								echo "<p>No images to display!</p>";
							}

						} else {
							echo $contentRight; 
						}
					?>

				<?php

				if (isset($_COOKIE['secured'])) {
					echo "</div>";
				} else {

				}

				?>

			</div>

			<!--Splitter-->
			<div class="col" style="width: 140px;"></div>

			<!--Left Column-->
			<div class="col">
				
				<?php echo $contentLeft; ?>

			</div> 

	</div>

</div>

<?php include "include/footer.inc.php"?> 

</body>
</html>