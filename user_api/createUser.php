<?php

session_start();

include_once '../DbConnection.php';
include_once '../User.php';

$db_conn = new DBConnection();
$conn = $db_conn->getConnection();

$user = new User($conn);

if(isset($_POST['createUser'])) {
        $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
        $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
        $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
        $first_name = !empty($_POST['first_name']) ? trim($_POST['first_name']) : null;
        $last_name = !empty($_POST['last_name']) ? trim($_POST['last_name']) : null;
        $address = !empty($_POST['address']) ? trim($_POST['address']) : null;
        $tel_number = !empty($_POST['tel_number']) ? trim($_POST['tel_number']) : null;

        $statement = $user->createUser($email, $username, $password, $first_name, $last_name, $address, $tel_number);

        echo "User created.\n";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create User</title>
    </head>
    <body>
        <h1>Create User</h1>
	<form action="createUser.php" method="post">	
            	<label>Email</label>
		<input type="text" name="email"><br>

            	<label>Username</label>
		<input type="text"  name="username"><br>

            	<label>Password</label>
		<input type="password" name="Password"><br>

            	<label>First Name</label>
		<input type="text" name="first_name"><br>

            	<label>Last Name</label>
		<input type="text" name="last_name"><br>

            	<label>Address</label>
		<input type="text" name="address"><br>

		<label>Tel. Number</label>
		<input type="text" name="tel_number"><br>

            	<input type="submit" name="createUser" value="Create User"><br>
        </form>
    </body>
</html>
