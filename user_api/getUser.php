<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../DbConnection.php';
include_once '../User.php';

$db_conn = new DBConnection();
$conn = $db_conn->getConnection();

$user = new User($conn);

$statement = $user->getUser();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result, JSON_PRETTY_PRINT);

echo $json;

?>
