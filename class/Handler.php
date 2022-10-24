<?php 

/*
	Class:
		Database Handler
	
	Function:
		The purpose of this class is to establish a database connection.
		This connection is used with models in order to access tables and perform queries.
		The class accepts creditials to a database login as well as a database name.
		With the creditials, the connect() method creates a PHP Data Object (PDO) which allows for database communication.
		The method returns the PDO which can be used with the various models.

	Notes:
		server name/domain and charset are hardcoded in the class.
		credentials are also hardcoded and must be retyped every time a class is instantiated.
		Once all database operations are completed, the PDO can be "closed" by setting the variable to null.

*/

class Handler {

	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;

	function __construct($username, $password, $dbname) {

		$this->servename = "localhost";
		$this->charset = "utf8mb4";

		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;

	}

	public function connect() {

		try {
			
			$dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;

			$pdo = new PDO($dsn, $this->username, $this->password);

			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;

		} catch (PDOException $e) {
			echo "Connection not successful: " . $e->getMessage();
		}
	} 

}