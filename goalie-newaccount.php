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

//current date
$date = date('Y-m-d H:i:s');

//insert the new user
$statement = $db->prepare('INSERT INTO user(first_name, last_name, email, password, last_visited) VALUES(:first, :last, :email, :password)');

$statement->bindParam(':first', $firstName);
$statement->bindParam(':last', $lastName);
$statement->bindParam(':email', $email);
$statement->bindParam(':password', $password);
//$statement->bindParam(':lastVisit', $date);
$wasSuccesful = $statement->execute();

echo $wasSuccesful;
?>