<?php
// This class is to establish connection with the database

class DbConnection {
	private $host = "localhost";
	// Input user login here
	// For the sake of testing, 
	// feel free to use 'root' with pwd 'root'
	private $username = "root";
	private $password = "root";
	private $db = "test_db";

	public $conn;

	public function getConnection() {
		$this->conn = null;

		try {
			$this->conn = new PDO(
				"mysql:host=" . $this->host . ";dbname=" . $this->db,
				$this->username,
				$this->password
			);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		return $this->conn;
	}
}

?>
