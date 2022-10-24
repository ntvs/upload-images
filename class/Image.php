<?php

/*
	Class:
		Image Model
	
	Function:
		The purpose of this class is to represent a user image as an object and facilitate uploading it to a database.
		In order to upload and create images on a database, a handler object is required for those specific methods.

*/

class Image {

	private $uploader;
	private $caption;
	private $uploadDate;

	private $fileLocation;

	function __construct($uploader, $caption, $fileLocation) {

		$this->uploader = $uploader;
		$this->caption = $caption;

		$this->fileLocation = $fileLocation;

		$this->uploadDate = time();

	}

	//Set methods
	public function setUploader($uploader) {
		$this->uploader = $uploader;
	}
	public function setCaption($caption) {
		$this->caption = $caption;
	}

	//Get methods
	public function getUploader() {
		return $this->uploader;
	}
	public function getCaption() {
		return $this->caption;
	}
	public function getUploadDate() {
		return $this->uploadDate;
	}
	public function getFileLocation() {
		return $this->fileLocation;
	}

	//Static methods

	/* 
		Function: 
			getImages()

		Usage: 
			Image.getImages(handler)

		Description:
			Returns a list/array/iterable object of all image entires in the database.

	*/
	public static function getImages($handler) {
		$sql = "SELECT uploader, caption, uploadDate, fileLocation FROM image";
		$statement = $handler->connect()->query($sql);

		return $statement->fetchAll();
	}

	/* 
		Function: 
			create()

		Usage: 
			Image.create(handler, username, name_of_image, uploads/fileName.ext)

		Description:
			Attempts to upload image data to the database. This does not upload the file itself.

	*/
	public static function create($handler, $uploader, $caption, $fileLocation) {

		$errorCode = 1; //1 is default error code, means failure
						//0 is success code if image data entry has been created

		if (Image::isUsername($uploader) && Image::isCaption($caption)) {

			$sql = "INSERT INTO image (uploader, caption, fileLocation) VALUES (?, ?, ?)";
			$statement = $handler->connect()->prepare($sql);
			$statement->execute([$uploader, $caption, $fileLocation]);

			$errorCode = 0;

		}

		return $errorCode;
	}

	//Checking methods
	public static function isUsername($username) {

		$result = preg_match("/^[a-zA-Z0-9_]+$/", $username);

		return $result;

		//if (count($result[0]) === 1) {
		//	return true;
		//} else {
		//	return false;
		//}

	}
	public static function isCaption($caption) {

		$result = preg_match("/[a-zA-Z0-9,.?!\s]+/", $caption);

		return $result;

	}

}