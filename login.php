<?php 
session_start();

if (isset($_SESSION["signed-in"])) {
	//redirect to the main page
	header( 'Location: /goalie.php' );
} else {
	//connect to the DB
	require("dbConnector.php");
	$db = loadDatabase();

	// if (!isset($_SESSION['email'])) {
	// 	$_SESSION['email'] = $_POST['email'];
	// }

	//get the current user
	$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
	$stmt->execute(array(':email' => $_SESSION['email']));
	$user = $stmt->fetch();

	$attemptEmail = $_POST['email'];
	$attemptPass = $_POST['password'];

	//check if the email is in the database
	if ($user){
		echo $user['password'];
		echo $attemptPass;
	} else {
		//email not found
		echo "not found";
	}

}





?>