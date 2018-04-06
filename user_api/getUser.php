<?php

session_start();

include_once '../DbConnection.php';
include_once '../User.php';

$db_conn = new DBConnection();
$conn = $db_conn->getConnection();

$user = new User($conn);

if(isset($_POST['getUser'])){
	$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
	$password = !empty($_POST['password']) ? trim($_POST['password']) : null;
	$email = !empty($_POST['user_email']) ? trim($_POST['user_email']) : null;

	$isAuthenticated = $user->userLogin($username, $password);
	if ($isAuthenticated == 1) {
		$statement = $user->getUser($email);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($result, JSON_PRETTY_PRINT);

		echo '<pre>' . $json . '</pre>';
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Get User</title>
    </head>
    <body>
        <h1>Authenticate to get User</h1>
        <form action="getUser.php" method="post">
                <label>Username</label>
                <input type="text" name="username"><br>
                <label>Password</label>
                <input type="password" name="password"><br>
                <label>User email to look up</label>
                <input type="text" name="user_email"><br>

            	<input type="submit" name="getUser" value="Get User">
        </form>
    </body>
</html>

