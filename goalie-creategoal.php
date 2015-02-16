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

//get the current user
$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
$stmt->execute(array(':email' => $_SESSION['email']));
$user = $stmt->fetch();



//current date
$date = date('Y-m-d H:i:s');

// //insert the new user
// $statement = $db->prepare('INSERT INTO user(first_name, last_name, email, password, last_visited, pref_id) VALUES(:first, :last, :email, :password, :dateVisit, :pref)');

// $statement->bindParam(':first', $firstName);
// $statement->bindParam(':last', $lastName);
// $statement->bindParam(':email', $email);
// $statement->bindParam(':password', $password);
// $statement->bindParam(':dateVisit', $date);
// $statement->bindParam(':pref', $statementID);
// $wasSuccesful = $statement->execute();

// header('Location: goalie-signin.php');

echo $user['id'];

?>
