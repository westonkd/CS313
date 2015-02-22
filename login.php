<?php 
session_start();

//if a current session is active
if (isset($_SESSION["signed-in"])) {
	//redirect to the main page
	header( 'Location: /goalie.php' );
	die();
} else {
	//connect to the DB
	require("dbConnector.php");
	$db = loadDatabase();

	//password decription
	require("password.php");

	$attemptEmail = $_POST['email'];
	$attemptPass = $_POST['password'];

	echo $attemptEmail . $attemptPass . "\n";

	//get the current user
	$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
	$stmt->execute(array(':email' => $attemptEmail));
	$user = $stmt->fetch();

	echo $user['password'];

	//check if the email is in the database
	if ($user) {
		if (password_verify($attemptPass, $user['password'])) {
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['signed-in'] = true;

			header('Location: /goalie.php');
			die();
		} 
	} 

	//login not succesful
	header( 'Location: /goalie-signin.php' );	
}
?>