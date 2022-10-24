<?php

/*
	Class:
		User Model
	
	Function:
		The purpose of this class is to represent a user image as an object and facilitate uploading it to a database.
		In order to upload and create images on a database, a handler object is required for those specific methods.

*/

class User {

	private $username;
	private $password;
	private $email;

	function __construct($username, $password, $email) {

		$this->username = $username;
		$this->password = $password;
		$this->email = $email;

	}

	//Set methods
	public function setUsername($username) {
		$this->username = $username;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function setEmail($email) {
		$this->email = $email;
	}

	//Get methods
	public function getUsername() {
		return $this->username;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getEmail() {
		return $this->email;
	}

	//Static methods

	/* 
		Function: 
			getUsers()

		Usage: 
			User.getUsers(handler)

		Description:
			Returns a list/array/iterable object of all user entires in the database.

	*/
	public static function getUsers($handler) {
		$sql = "SELECT username FROM user";
		$statement = $handler->connect()->query($sql);

		return $statement->fetchAll();
	}

	/* 
		Function: 
			validate()

		Usage: 
			User.validate(handler, username, pass, "on"/"off")

		Description:
			Makes sure login information provided exists in the database.
			If yes, the user may log in. Otherwise, they provided incorrect or nonexistant information.
			$stay indicates if the user wants to stay logged in after closing their browser through cookies.

	*/
	public static function validate($handler, $name, $password, $stay) {

		$errorCode = 2; //2 is default error code, means failure
						//1 is success code if they decide they dont want to stay logged in
						//0 is success code if they want login to persist

		if (User::isUsername($name)) {

			$sql = "SELECT username FROM user WHERE username = ? AND password = ?";
			$statement = $handler->connect()->prepare($sql);
			$statement->execute([$name, $password]);

			$result = $statement->fetchAll();

			if (count($result) === 1 && $stay === "on") {
				
				$errorCode = 0;

			} elseif (count($result) === 1) {
				$errorCode = 1;
			}

		}

		return $errorCode;
	}

	/* 
		Function: 
			create()

		Usage: 
			User.create(handler, username, pass, email_address)

		Description:
			Inserts new user credentials in the database.
			This only goes through if username and email match the appropriate regular expressions.
			If username & email match the expressions, a DB query is performed.
			The user is then only inserted into the User table if the query came back with 0 results (no pre existing info found).

	*/
	public static function create($handler, $name, $password, $email) {

		$errorCode = 1; //2 is default error code, means failure
						//1 is success code if they decide they dont want to stay logged in
						//0 is success code if they want login to persist

		if (User::isUsername($name) && User::isEmail($email)) {

			$sql = "SELECT username FROM user WHERE username = ?";
			$statement = $handler->connect()->prepare($sql);
			$statement->execute([$name]);

			$usernameResult = $statement->fetchAll();

			$sql2 = "SELECT username FROM user WHERE email = ?";
			$statement2 = $handler->connect()->prepare($sql2);
			$statement2->execute([$email]);

			$emailResult = $statement2->fetchAll();

			if (count($usernameResult) === 0 && count($emailResult) === 0) {
				
				$sql2 = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";
				$statement2 = $handler->connect()->prepare($sql2);
				$statement2->execute([$name, $password, $email]);

				$errorCode = 0;

			}

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
	public static function isEmail($email) {
		return preg_match("/^([a-zA-Z0-9_.-]+)@([a-zA-Z0-9-]+)([a-zA-Z0-9.]+)$/", $email);
	}

	/*public static function isPassword($password) {

		$result = preg_match("^([^=`~\\\/{}\\[\\]<>\"\']+)$", $password);

		if (count($result) === 1) {
			return true;
		} else {
			return false;
		}
	}*/

}