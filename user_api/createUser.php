<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../DbConnection.php';
include_once '../User.php';

$db_conn = new DBConnection();
$conn = $db_conn->getConnection();

$user = new User($conn);

$statement = $user->createUser(
	'test@test.com', 
	'test1',
	'test1pwd!',
	'One',
	'Test',
	'Test Street, Vietnam',
	'084-000-000-000'
);

echo "User created.\n";
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
