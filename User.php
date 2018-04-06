<?php 

class User {
	private $conn;
	private $table_name = "users";

	public $email;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $address;
	public $tel_number;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function __destruct() {

	}

	public function createUser($email, $username, $password, $first_name, $last_name, $address, $tel_number) {
		// Check if user is existed in the database
		$query = "SELECT COUNT(username) AS total FROM `users` WHERE username = :username";
		$statement = $this->conn->prepare($query);
		$statement->bindValue(':username', $username);
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		if ($row['total'] > 0) {
			die("Username already exists\n");
		}
		
		// Hash password before storing
		$pwd_hash = password_hash($password, PASSWORD_DEFAULT);

		// Insert user
		$query = "INSERT INTO `users` (email, username, password, first_name, last_name, address, tel_number) VALUES (:email, :username, :password, :first_name, :last_name, :address, :tel_number)";
		$statement = $this->conn->prepare($query);	
		$statement->bindValue(':email', $email);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $pwd_hash);
		$statement->bindValue(':first_name', $first_name);
		$statement->bindValue(':last_name', $last_name);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':tel_number', $tel_number);
		$statement->execute();

		return $statement;
	}

	public function getUser() {
		$query = "SELECT * FROM users";

		$statement = $this->conn->prepare($query);
		$statement->execute();

		return $statement;
	}

	public function updateUser() {
		//TODO: Similar to createUser - have to check for authentication before updating
	}
}

?>
