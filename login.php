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

	$attemptEmail = $_POST['email'];
	$attemptPass = $_POST['password'];

	//get the current user
	$stmt = $db->prepare("SELECT * FROM user WHERE email=:email ");
	$stmt->execute(array(':email' => $attemptEmail));
	$user = $stmt->fetch();

	echo $attemptEmail;
	echo "test";

	//check if the email is in the database
	if ($user){
		if ($attemptPass == $user['password'])
		{
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['signed-in'] = true;
			header( 'Location: /goalie.php' );
			echo "in!";
		}
	} else {
		//email not found
		header( 'Location: /signin.php' );
		echo "not in :/";
	}

}





?>