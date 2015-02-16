<?php 
session_start();

$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$rePassword = $_POST['reenter'];

//connect to the DB
require("dbConnector.php");
$db = loadDatabase();

//if the passwords don't match or the email address is already taken
if (!$password == $rePassword)
{
	header('Location: goalie-signin.php');
}

$statement = $db->prepare('INSERT INTO preferences(back_color, for_color) VALUES (000000,111111)');
$statement->execute();

// get the new id
$statementID = $db->lastInsertId();

//current date
$date = date('Y-m-d H:i:s');

//insert the new user
$statement = $db->prepare('INSERT INTO user(first_name, last_name, email, password, last_visited, pref_id) VALUES(:first, :last, :email, :password, :dateVisit, :pref)');

$statement->bindParam(':first', $firstName);
$statement->bindParam(':last', $lastName);
$statement->bindParam(':email', $email);
$statement->bindParam(':password', $password);
$statement->bindParam(':dateVisit', $date);
$statement->bindParam(':pref', $statementID);
$wasSuccesful = $statement->execute();

header('Location: goalie-signin.php');

?>