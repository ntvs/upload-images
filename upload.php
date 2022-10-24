<?php

    /*
		Script:
			File upload script
		
		Function:
            The goal of this script is to upload an image to the server host machine and add its metadata to the Image table.
            
            This script also generates the name of the file to be uploaded.
            
            A series of checks takes place before the upload happens:
                Check if the user is logged in
                Check if the upload button was pressed before (to prevent execution of the script without first being at the index page)
                Check the file size, units is bytes, limit is 2MB
                Confirm if file is indeed an image - allow only PNG and JPG to be uploaded

            Then, add the image metadata to the table after the file has been uploaded.

			Refresh the page at the end of the script.
	*/

//includes
include "class/Handler.php";
include "class/Image.php";


$headerLocation = "Location: signin.php";

//Check if the user is logged in
if (isset($_COOKIE['secured'])) {

    //Check if the upload button was pressed before
    if(isset($_POST['upload'])) {

        $uploadDirectory = "uploads/";

        $fileLocation = $uploadDirectory . time() . basename($_FILES['filez']['name']);

        $uploadOk = 1;

        $fileType = strtolower(pathinfo($fileLocation, PATHINFO_EXTENSION));


        //Check the file size, units is bytes, limit is 2MB
        if ($_FILES['filez']['size'] > 2000000) {

            echo "Your file is larger than 500000! Try again.";
            $uploadOk = 0;

        }


        //Confirm if file is indeed an image
        $check = getimagesize($_FILES['filez']['tmp_name']);

        if ($check) {
            echo "File is an image - " . $check['mime'] . ".";
        } else {
            echo "File is not an image. Upload failed.";
            $uploadOk = 0;
        }


        //Allow only PNG and JPG to be uploaded
        if (!($fileType == "png" || $fileType == "jpg" || $fileType == "jpeg")) {

            echo "Only .png and .jpg files are allowed!";
            $uploadOk = 0;

        }


        //Complete the upload procedure 
        if ($uploadOk === 1) {

            $uploadStatus = move_uploaded_file($_FILES['filez']['tmp_name'], $fileLocation);

            if ($uploadStatus) {
                echo "The file " . basename($_FILES['filez']['name']) . " has been uploaded successfully!";


                //Make a DB entry for the image if upload is successful
                //DB connection using Handler class
                $handler = new Handler("root", "", "UploadImages");
                $handler->connect();
                
                $errorCode = Image::create($handler, $_COOKIE['connected'], $_POST['title'], $fileLocation);

                $handler = null;


            } else {
                echo "Error uploading file.";
            }

        } else {
            echo "Error uploading file (end of code).";
        }

    }

}

header($headerLocation);
exit();